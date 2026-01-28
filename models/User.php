<?php
include __DIR__ . '/../functions.php';

Class User {
    private $pdo;//Classのプロパティ
    // ユーザクラスを生成するたびにDB接続関数を実行する
    public function __construct() {
        $this->pdo = connect_to_db_pre();
    }
    
    /**
     * 全ユーザーを取得する
     * @return array
     **/
    public function getAll() {
        $sql = 'SELECT * FROM users_table ORDER BY id DESC';
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
            header('Location: ../index.php');
            exit();
        }

    }


    /* 本登録を処理する
    * @param string $name
    * @param string $email
    * @return int
    **/
    public function register($user_id, $password, $speciality, $qualify, $bio) {

        $sql = "INSERT INTO trainer_profile (user_id, area, field, speciality, qualify, bio, created_at) VALUES (:user_id, :area, :field, :speciality, :qualify, :bio, now())";
        $stmt = $this->pdo->prepare($sql);
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



}