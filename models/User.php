<?php
require_once __DIR__ . '/../functions.php';

Class User {
    private $pdo;//Classのプロパティ
    // ユーザクラスを生成するたびにDB接続関数を実行する
    public function __construct() {
        $this->pdo = connect_to_db_pre();//ローカルホスト
        // $this->pdo = connect_to_db();//さくら
    }
    
    /**
     * 全ユーザーを取得する
     * @return array
     **/
    public function getAll() {
        $sql = 'SELECT
                    u.id,
                    u.username,
                    u.name,
                    u.sex,
                    u.birthday,
                    p.area,
                    p.field,
                    p.speciality,
                    CASE
                        WHEN p.user_id IS NULL THEN 0
                        ELSE 1
                    END AS is_registered,
                    COALESCE(result_table.like_count, 0) AS like_count
                FROM users_table u
                LEFT OUTER JOIN trainer_profile p
                    ON u.id = p.user_id
                LEFT OUTER JOIN (
                    SELECT
                        trainer_id,
                        COUNT(*) AS like_count
                    FROM like_table
                    GROUP BY trainer_id
                ) AS result_table
                    ON u.id = result_table.trainer_id
                WHERE u.role = "trainer"
                AND u.deleted_at IS NULL;';
        $stmt = $this->pdo->prepare($sql);

        try {
            $stmt->execute();
        } catch (PDOException $e) {
            echo "データ取得エラー: " . $e->getMessage();
            exit;
        }
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    /**
     * 指定したIDのユーザーを取得する
     **/
    public function getById($user_id) {
        $sql = 'SELECT
                    u.id,
                    u.username,
                    u.name,
                    u.sex,
                    u.birthday,
                    p.area,
                    p.field,
                    p.speciality,
                    p.qualify,
                    p.bio,
                CASE
                    WHEN p.user_id IS NULL THEN 0
                    ELSE 1
                END AS is_registered
                FROM users_table u
                LEFT JOIN trainer_profile p
                    ON u.id = p.user_id
                WHERE u.id = :id
                AND u.deleted_at IS NULL;';
    $stmt = $this->pdo->prepare($sql);
    $stmt->bindParam(':id', $user_id, PDO::PARAM_INT);
    try {
        $stmt->execute();
    } catch (PDOException $e) {
        echo "データ取得エラー: " . $e->getMessage();
        exit;
    }
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    return $user;
    }

    /* 新規ユーザーを作成する
    * @param string $name
    * @param string $email
    * @return int
    **/
    public function create($username, $password, $name, $sex, $birthday, $role) {
        // パスワードハッシュ化
        $password_hash = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO users_table (id, username, password, name, sex, birthday, role, created_at, updated_at, deleted_at) VALUES (NULL, :username, :password, :name, :sex, :birthday, :role, now(), now(), NULL)";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password_hash);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':sex', $sex);
        $stmt->bindParam(':birthday', $birthday);
        $stmt->bindParam(':role', $role);

        try {
        $stmt->execute();
        //最後にINSERTしたIDをModel
        return $this->pdo->lastInsertId();
        } catch (PDOException $e) {
        echo "ユーザー作成エラー: " . $e->getMessage();
        exit;
        }
    }

    /* ログインを実行する
    * @param string $name
    * @param string $email
    * @return int
    **/
    public function login($username, $password) {
        $sql = 'SELECT * FROM users_table WHERE username=:username AND deleted_at is NULL';


        // DB接続
        //サクラ
        // $pdo = connect_to_db();
        //ローカルホスト
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':username', $username, PDO::PARAM_STR);

        try {
        $status = $stmt->execute();
        } catch (PDOException $e) {
        echo json_encode(["sql error" => "{$e->getMessage()}"]);
        exit();
        }

        // ユーザ有無で条件分岐
        $user = $stmt->fetch(PDO::FETCH_ASSOC);//一つを取り出す

        // パスワードをハッシュ化したものとの正誤を判別
        if (!$user || !password_verify($password, $user['password'])) {
            echo "<p>ログイン情報に誤りがあります。</p>";
            echo "<a href = ../login.php>ログイン</a>";
            exit();
        } else {
            session_regenerate_id(true);
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['role'] = $user['role'];
        }
    }


    /* 本登録を処理する
    * @param string $name
    * @param string $email
    * @return int
    **/
    public function register($user_id, $area, $field, $speciality, $qualify, $bio) {

        $sql = "INSERT INTO trainer_profile (user_id, area, field, speciality, qualify, bio, created_at) VALUES (:user_id, :area, :field, :speciality, :qualify, :bio, now())";
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':area', $area);
        $stmt->bindParam(':field', $field);
        $stmt->bindParam(':speciality', $speciality);
        $stmt->bindParam(':qualify', $qualify);
        $stmt->bindParam(':bio', $bio);

        try {
        $stmt->execute();
        } catch (PDOException $e) {
        echo "ユーザー作成エラー: " . $e->getMessage();
        exit;
        }
    }

    /* 対象idを参照する
    * @param string $name
    * @param string $email
    * @return int
    **/
    public function view($user_id) {

        $sql = 'SELECT * FROM users_table WHERE id=:id AND deleted_at is NULL';

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':id', $user_id, PDO::PARAM_INT);

        try {
        $status = $stmt->execute();
        } catch (PDOException $e) {
        echo json_encode(["sql error" => "{$e->getMessage()}"]);
        exit();
        }

        $record = $stmt->fetch(PDO::FETCH_ASSOC);
        return $record;
    }



    /* いいね数の表示
    * @param string $user_id
    * @param string $trainer_id
    * @return int
    **/
    public function addLike($user_id, $trainer_id) {

        //likeの有無を確認する
        $sql = 'SELECT COUNT(*) FROM like_table WHERE user_id=:user_id AND trainer_id=:trainer_id';
        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
        $stmt->bindValue(':trainer_id', $trainer_id, PDO::PARAM_STR);

        try {
        $status = $stmt->execute();
        } catch (PDOException $e) {
        echo json_encode(["sql error" => "{$e->getMessage()}"]);
        exit();
        }

        $like_count = $stmt->fetchColumn();

        if ($like_count > 0) {
            $sql = 'DELETE FROM like_table WHERE user_id=:user_id AND trainer_id=:trainer_id';
        } else {
            $sql = 'INSERT INTO like_table(id, user_id, trainer_id,  created_at) VALUES(NULL, :user_id, :trainer_id, now())';
        }

        $stmt = $this->pdo->prepare($sql);
        $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
        $stmt->bindValue(':trainer_id', $trainer_id, PDO::PARAM_STR);
        
        try {
        $status = $stmt->execute();
        } catch (PDOException $e) {
        echo json_encode(["sql error" => "{$e->getMessage()}"]);
        exit();
        }
    }
}

