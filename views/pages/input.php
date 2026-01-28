  <h1>ユーザー作成</h1>

  <form action="create.php" method="POST">
    <p>
      <label>ユーザーネーム:</label>
      <input type="email" name="username" placeholder="メールアドレスを入力して下さい" required>
    </p>
    <p>
      <label>パスワード:</label>
      <input type="text" name="password" placeholder="パスワードを入力して下さい"required>
    </p>
    <p>
      <label>名前:</label>
      <input type="text" name="name" placeholder="名前を入力してください"required>
    </p>
    <p>
      <label>性別:</label>
      <select name="sex" id="sex">
        <option value="" >選択してください</option>
        <option value="male">男性</option>
        <option value="female">女性</option>
        <option value="other">選択しない</option>
      </select>
    </p>
    <p>
      <label>生年月日:</label>
      <input type="date" name="birthday" required>
    </p>
    <p>
      <label>登録区分:</label>
      <select name="role" id="role">
        <option value="" >選択してください</option>
        <option value="trainer">トレーナー</option>
        <option value="client">一般ユーザー</option>
      </select>
    </p>
    <p>
      <button type="submit">作成</button>
      <a href="index.php">戻る</a>
    </p>
  </form>
