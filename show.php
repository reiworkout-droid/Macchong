<<<<<<< Updated upstream
=======
<?php
session_start();
require_once 'models/User.php';
require_once 'functions.php';

// $user_id = $_SESSION['user_id'];
$user_id = (int)$_GET['id'];

$userModel = new User();
$userDetail = $userModel->getById($user_id);
$user = $userDetail;

if ($user) {
    $birthday = new DateTime($user['birthday']);
    $user['age'] = (new DateTime())->diff($birthday)->y;
    // 分野を日本語化
    $user['field_ja'] = $user['field'] ? fieldToJa($user['field']) : '未登録';
    $user['speciality_ja'] = $user['speciality'] ? specialityToJa($user['speciality']) : '未登録';
    $user['area_ja'] = $user['area'] ? areaToJa($user['area']) : '未登録';
    $user['sex_ja'] = sexToJa($user['sex']);
} else {
    echo 'ユーザーが存在しません';
    exit;
}


$title = '詳細画面';
$page_css = 'show.css';
include 'views/common/header.php';
include 'views/pages/show.php';
include 'views/common/footer.php';
exit();
>>>>>>> Stashed changes
