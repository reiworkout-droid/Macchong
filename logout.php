<?php
include 'models/User.php';

session_start();

//セッションを空にする
$_SESSION = array();
//情報を削除する
if (isset($_COOKIE[session_name()])) {
  setcookie(session_name(), '', time() - 42000, '/');
}
//サーバーが用意した領域を壊す
session_destroy();
header('Location: login.php');
exit();