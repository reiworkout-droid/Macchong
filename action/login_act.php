<?php
session_start();
include __DIR__ . '/../models/User.php';


$username = $_POST['username'];
$password = $_POST['password'];

$userModel = new User();
$userModel->login($username, $password);

header('Location: index.php');
exit();