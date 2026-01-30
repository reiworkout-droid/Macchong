  <h1>トレーナー一覧</h1>
  <a href="input.php" class="btn" id="inputBtn">新規登録</a>

  <table class="trainer-table">
    <tr>
      <th>ユーザーネーム</th>
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

          <a href="register.php?id=<?= $user['id'] ?>" class="btn" id="registerBtn">本登録</a>
          <a href="show.php?id=<?= $user['id'] ?>" class="btn" id="showBtn">詳細</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>