<?php
include 'models/User.php';

$userModels = new User();
$users = $userModels->getAll();

$title = 'トレーナー一覧';
include 'views/common/header.php';
include 'views/pages/index.php';
include 'views/common/footer.php';
exit();
