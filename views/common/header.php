<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'ユーザー管理' ?></title>
<<<<<<< Updated upstream
=======
    <link rel="stylesheet" href="/homework/EC_site/Macchong2/views/common/common.css">
    <link rel="stylesheet" href="/homework/EC_site/Macchong2/views/common/menu.css">
    <!-- ページ固有のcss -->
    <?php if(!empty($page_css)): ?>
        <link rel="stylesheet" href="/homework/EC_site/Macchong2/views/pages/css/<?php echo $page_css; ?>">
    <?php endif; ?>
>>>>>>> Stashed changes
</head>
<body>
    <nav>
        <a href="index.php">一覧</a>
        <a href="input.php">新規作成</a>
        <a href="login.php">ログイン</a>
        <a href="logout.php">ログアウト</a>
    </nav>
    <main>

