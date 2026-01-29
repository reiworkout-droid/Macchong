<?php
include 'models/User.php';

$userModel = new User();
$userModel->register($user_id, $password, $speciality, $qualify, $bio);

include 'views/common/header.php';
include 'views/pages/register.php';
include 'views/common/footer.php';
exit();