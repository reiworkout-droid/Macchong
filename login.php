<?php
include 'models/User.php';
session_start();

$title = 'ログイン';
include 'views/common/header.php';
include 'views/pages/login.php';
include 'views/common/footer.php';
exit();