  <h1>トレーナー一覧</h1>
  <a href="input.php">登録</a>

  <table>
    <tr>
      <th>名前</th>
      <th>年齢</th>
      <th>性別</th>
      <th>エリア</th>
      <th>分野</th>
    </tr>
    <?php foreach ($users as $user): ?>
      <tr>
        <td><?= $user['name'] ?></td>
        <td><?= $user['age'] ?></td>
        <td><?= $user['sex'] ?></td>
        <td><?= $user['area'] ?></td>
        <td><?= $user['field'] ?></td>
        <td>
          <a href="show.php?id=<?= $user['id'] ?>">詳細</a>
          <a href="edit.php?id=<?= $user['id'] ?>">編集</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>