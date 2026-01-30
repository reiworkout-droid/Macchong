  <h1>ユーザー作成</h1>

  <form action="action/create.php" id="form" method="POST">
    <p class="position">
      <label class="positionLeft">ユーザーネーム:</label>
      <input type="email" name="username" class="positionRight" placeholder="メールアドレスを入力して下さい" required>
    </p>
    <p class="position">
      <label class="positionLeft">パスワード:</label>
      <input type="text" name="password" class="positionRight" placeholder="パスワードを入力して下さい"required>
    </p>
    <p class="position">
      <label class="positionLeft">名前:</label>
      <input type="text" name="name" class="positionRight" placeholder="名前を入力してください"required>
    </p>
    <p class="position">
      <label class="positionLeft">性別:</label>
      <select name="sex" id="sex" class="positionRight">
        <option value="" >選択してください</option>
        <option value="male">男性</option>
        <option value="female">女性</option>
        <option value="other">選択しない</option>
      </select>
    </p>
    <p class="position">
      <label class="positionLeft">生年月日:</label>
      <input type="date" name="birthday" class="positionRight" required>
    </p>
    <p class="position">
      <label class="positionLeft">登録区分:</label>
      <select name="role" id="role" class="positionRight">
        <option value="" >選択してください</option>
        <option value="trainer">トレーナー</option>
        <option value="client">一般ユーザー</option>
      </select>
    </p>
    <p class="btnArea">
      <button type="submit" class="btn" id="inputBtn">作成</button>
      <a href="index.php" class="btn" id="returnBtn">戻る</a>
    </p>
  </form>
