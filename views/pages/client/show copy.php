  <h1>トレーナー詳細</h1>
  <p class="position"><strong class="positionLeft">ユーザーネーム:</strong> <?= $user['username'] ?></p>
  <p class="position"><strong class="positionLeft">名前:</strong> <?= $user['name'] ?></p>
  <p class="position"><strong class="positionLeft">性別:</strong> <?= $user['sex_ja'] ?></p>
  <p class="position"><strong class="positionLeft">年齢:</strong> <?= htmlspecialchars($user['age'], ENT_QUOTES, 'UTF-8') ?></p>
  <p class="position"><strong class="positionLeft">活動エリア:</strong> <?= htmlspecialchars($user['area_ja'], ENT_QUOTES, 'UTF-8') ?></p>
  <p class="position"><strong class="positionLeft">分野:</strong> <?= htmlspecialchars($user['field_ja'], ENT_QUOTES, 'UTF-8') ?></p>
  <p class="position"><strong class="positionLeft">強み:</strong> <?= htmlspecialchars($user['speciality_ja'], ENT_QUOTES, 'UTF-8') ?></p>
  <p class="position"><strong class="positionLeft">資格・成績:</strong> <?= $user['qualify'] ?></p>
  <p class="position"><strong class="positionLeft">プロフィール:</strong> <?= $user['bio'] ?></p>
  <p class="btnArea">
    <!-- likeに変える🤗⇩ -->
    <!-- <a href="delete.php?id=<?= $user['id'] ?>" onclick="return confirm('本当に削除しますか？');" class="btn" id="deleteBtn">削除</a> -->
    <a href="index.php" class="btn" id="returnBtn">戻る</a>
  </p>
