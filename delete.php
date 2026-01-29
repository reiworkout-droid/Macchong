<?php
include 'models/User.php';

if (!isset($_GET['id'])) {
  echo "ユーザーIDが指定されていません。";
  exit;
}

$id = $_GET['id'];

$userModel = new User();
$user = $userModel->delete($id);

header("Location: index.php");

exit();
