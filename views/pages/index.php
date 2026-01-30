  <h1>トレーナー一覧</h1>
  <a href="input.php" class="btn" id="inputBtn">新規登録</a>

  <table class="trainer-table">
    <tr>
      <th>名前</th>
      <th>年齢</th>
      <th>性別</th>
      <th>エリア</th>
      <th>分野</th>
    </tr>
    <?php foreach ($users as $user): ?>
      <tr>
        <td><?= $user['username'] ?></td>
        <td><?= $user['name'] ?></td>
        <td><?= htmlspecialchars($user['age']) ?></td>
        <td><?= $user['sex_ja'] ?></td>
        <td><?= htmlspecialchars($user['area_ja']) ?></td>
        <td><?= htmlspecialchars($user['field_ja']) ?></td>
        <td>
<<<<<<< Updated upstream
          <a href="register.php?id=<?= $user['id'] ?>">本登録</a>
          <a href="show.php?id=<?= $user['id'] ?>">詳細</a>
          <a href="edit.php?id=<?= $user['id'] ?>">編集</a>
=======
          <a href="register.php?id=<?= $user['id'] ?>" class="btn" id="registerBtn">本登録</a>
          <a href="show.php?id=<?= $user['id'] ?>" class="btn" id="showBtn">詳細</a>
>>>>>>> Stashed changes
        </td>
      </tr>
    <?php endforeach; ?>
  </table>