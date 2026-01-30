  
  <h1>ログイン</h1>
  
  <form action="action/login_act.php" id="form" method="POST">
    <p class="position" >
      <label class="positionLeft">ユーザーネーム:</label>
      <input type="email" name="username" class="positionRight" placeholder="メールアドレスを入力して下さい" required>
    </p>
    <p class="position">
      <label class="positionLeft">パスワード:</label>
      <input type="text" name="password" class="positionRight" placeholder="パスワードを入力して下さい"required>
    </p>

    <div class="login">
        <button class="btn" id="loginButton">ログイン</button>
    </div>
    <div class="register">
        <span class="refisterOr">または</span>
        <a href="register.php">登録する</a>
    </div>
