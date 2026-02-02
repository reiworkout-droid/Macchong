<?php
include 'models/User.php';
session_start();

$title = 'ログイン';
$page_css = 'login.css';



include 'views/common/header.php';
include 'views/pages/login.php';
include 'views/common/footer.php';
exit();