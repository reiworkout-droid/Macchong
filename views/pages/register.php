  <?php
    include 'models/User.php';

    $user_id = $_GET['id'];

    $userModel = new User();
    $users = $userModels->view($user_id);


  ?>
  <h1>ユーザー作成</h1>

  <form action="register_act.php" method="POST">

    <p>
      <input type="hidden" name="user_id" value="<?= $record["id"] ?>">
    </p>    
    <p>
      <label>氏名:</label>
      <input type="text" value="<?= $record["name"] ?>">
    </p>    
    <p>
      <label>活動エリア:</label>
      <select name="area" id="area">
        <option value="" >選択してください</option>
        <option value="fukuoka">福岡県</option>
        <option value="kumamoto">熊本県</option>
        <option value="okayama">岡山県</option>
        <option value="philippines">フィリピン</option>
      </select>
    </p>
    <p>
      <label>分野:</label>
      <div name="field" id="field">
        <label><input type="checkbox" name="bulk_up" value="bulk_up">筋肥大</label>
        <label><input type="checkbox" name="power" value="power">筋力アップ</label>
        <label><input type="checkbox" name="diet" value="diet">ダイエット</label>
        <label><input type="checkbox" name="health_maintenance" value="health_maintenance">健康維持</label>
        <label><input type="checkbox" name="functional_training" value="functional_training">機能改善・リハビリ</label>
        <label><input type="checkbox" name="nutrition_guidance" value="nutrition_guidance">食事指導</label>
      </div>
    </p>
    <p>
      <label>強み:</label>
      <div name="speciality" id="speciality">
        <label><input type="checkbox" name="beginner" value="beginner">初心者向け</label>
        <label><input type="checkbox" name="women_focused" value="women_focused">女性向け</label>
        <label><input type="checkbox" name="competition_support" value="competition_support">大会出場サポート</label>
        <label><input type="checkbox" name="health_maintenance" value="health_maintenance">健康維持</label>
        <label><input type="checkbox" name="functional_training" value="functional_training">機能改善・リハビリ</label>
        <label><input type="checkbox" name="nutrition_guidance" value="nutrition_guidance">食事指導</label>
      </div>
    </p>
    <p>
      <label>資格:</label>
      <input type="text" name="qualify">
    </p>
    <p>
      <label>プロフィール:</label>
      <textarea name="bio" id="bio"></textarea>
    </p>
    <p>
    <p>
      <button type="submit">作成</button>
      <a href="index.php">戻る</a>
    </p>
  </form>
