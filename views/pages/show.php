  <h1>トレーナー詳細</h1>
  <p><strong>ユーザーネーム:</strong> <?= htmlspecialchars($user['username'], ENT_QUOTES, 'UTF-8') ?></p>
  <p><strong>名前:</strong> <?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?></p>
  <p><strong>性別:</strong> <?= htmlspecialchars($user['sex'], ENT_QUOTES, 'UTF-8') ?></p>
  <p><strong>年齢:</strong> <?= htmlspecialchars($user['age'], ENT_QUOTES, 'UTF-8') ?></p>
  <p><strong>活動エリア:</strong> <?= htmlspecialchars($user['area_ja'], ENT_QUOTES, 'UTF-8') ?></p>
  <p><strong>分野:</strong> <?= htmlspecialchars($user['field_ja'], ENT_QUOTES, 'UTF-8') ?></p>
  <p><strong>強み:</strong> <?= htmlspecialchars($user['speciality_ja'], ENT_QUOTES, 'UTF-8') ?></p>
  <p><strong>資格・成績:</strong> <?= htmlspecialchars($user['qualify'], ENT_QUOTES, 'UTF-8') ?></p>
  <p><strong>プロフィール:</strong> <?= htmlspecialchars($user['bio'], ENT_QUOTES, 'UTF-8') ?></p>
  <p>
    <a href="edit.php?id=<?= $user['id'] ?>">編集</a>
    <a href="delete.php?id=<?= $user['id'] ?>" onclick="return confirm('本当に削除しますか？');">削除</a>
    <a href="index.php">戻る</a>
  </p>
