<?php
include 'functions.php';

Class User {
    private $pdp;//Classのプロパティ
    // ユーザクラスを生成するたびにDB接続関数を実行する
    public function __construct() {
        $this->pdo = connect_db();
    }
    
    /**
     * 全ユーザーを取得する
     * @return array
     **/
    public function getAll() {
        $sql = 'SELECT * FROM users ORDERBY id DESC';
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
}