<?php
session_start();
include __DIR__ . '/../models/User.php';


$username = $_POST['username'];
$password = $_POST['password'];

$userModel = new User();
$userModel->login($username, $password);

$_SESSION['username'] = $username;
// $role = $_SESSION['role'];
var_dump($_SESSION['role']);


if ($_SESSION['role'] === 'trainer') {
    header('Location: ../trainersHome.php');
    exit();
} else {
    header('Location: ../index.php');
    exit();
}