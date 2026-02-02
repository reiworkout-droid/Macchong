<?php
include 'models/User.php';
session_start();
$user_id = $_SESSION['user_id'];

$userModels = new User();
$users = $userModels->view($user_id);

include 'views/common/header.php';
include 'views/pages/trainer/register.php';
include 'views/common/footer.php';
exit();