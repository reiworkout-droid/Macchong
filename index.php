<?php
require_once 'models/User.php';
require_once 'functions.php';

$userModels = new User();
$users = $userModels->getAll();

foreach ($users as &$user) {
    $birthday = new DateTime($user['birthday']);
    $user['age'] = (new DateTime())->diff($birthday)->y;
    // 分野を日本語化
    $user['field_ja'] = $user['field'] ? fieldToJa($user['field']) : '未登録';
    $user['area_ja'] = $user['field'] ? areaToJa($user['area']) : '未登録';
    $user['sex_ja'] = sexToJa($user['sex']);
}
unset($user);


$title = 'トレーナー一覧';
$page_css = 'index.css';
include 'views/common/header.php';
include 'views/pages/index.php';
include 'views/common/footer.php';
exit();
