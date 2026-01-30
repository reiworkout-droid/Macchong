<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'ユーザー管理' ?></title>
    <link rel="stylesheet" href="/homework/EC_site/Macchong2/views/common/common.css">
    <link rel="stylesheet" href="/homework/EC_site/Macchong2/views/common/menu.css">
    <!-- ページ固有のcss -->
    <?php if(!empty($page_css)): ?>
        <link rel="stylesheet" href="/homework/EC_site/Macchong2/views/pages/css/<?php echo $page_css; ?>">
    <?php endif; ?>
</head>
<body>
    <div class="menu-wrapper">
    <input type="checkbox" id="menu-toggle" hidden>
    
    <label class="menu-icon" for="menu-toggle">
        <span></span>
        <span></span>
        <span></span>
    </label>
    
    <div class="overlay"></div>
    
    <nav class="menu">
        <ul>
            <li><a href="index.php">一覧</a></li>
            <li><a href="input.php">新規作成</a></li>
            <li><a href="login.php">ログイン</a></li>
            <li><a href="logout.php">ログアウト</a></li>
        </ul>
    </nav>
    </div>
    <main>

