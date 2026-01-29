<?php
session_start();
include '../models/User.php';

if (
  !isset($_POST['username']) || $_POST['username'] === '' ||
  !isset($_POST['password']) || $_POST['password'] === '' ||
  !isset($_POST['name']) || $_POST['name'] === '' ||
  !isset($_POST['sex']) || $_POST['sex'] === '' ||
  !isset($_POST['birthday']) || $_POST['birthday'] === '' ||
  !isset($_POST['role']) || $_POST['role'] === '' 
) {
  exit('入力項目に誤りがあります');
}

$username = $_POST["username"];
$password = $_POST["password"];
$name = $_POST["name"];
$sex = $_POST["sex"];
$birthday = $_POST["birthday"];
$role = $_POST["role"];

$userModel = new User();

$user_id = $userModel->create(
  $_POST['username'], 
  $_POST['password'], 
  $_POST['name'], 
  $_POST['sex'], 
  $_POST['birthday'], 
  $_POST['role']
  );
$_SESSION['user_id'] = $user_id;
header('Location: index.php');
exit();