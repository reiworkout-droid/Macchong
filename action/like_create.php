<?php
session_start();
include_once __DIR__ . '/../models/User.php';

$user_id = $_SESSION['user_id'];
$trainer_id = $_GET['trainer_id'];

$userModel = new User();
$like_count = $userModel->addLike($user_id, $trainer_id);

header('Location: ../index.php');