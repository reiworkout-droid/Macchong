  <form action="action/login_act.php" method="POST">
    <p>
      <label>ユーザーネーム:</label>
      <input type="email" name="username" placeholder="メールアドレスを入力して下さい" required>
    </p>
    <p>
      <label>パスワード:</label>
      <input type="text" name="password" placeholder="パスワードを入力して下さい"required>
    </p>

    <div class="login">
        <button class="loginButton">ログイン</button>
    </div>
    <div class="register">
        <span class="refisterOr">または</span>
        <a href="register.php">登録する</a>
    </div>
