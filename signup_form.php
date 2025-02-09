<?php
$title = 'ユーザー登録画面';
require_once 'functions.php';
require('./header.php');
?>
    <form action="register.php" method="POST">
      <div class="form-item">
        <label for="username">ユーザー名：</label>
        <input type="text" name="username">
      </div>
      <div class="form-item">
        <label for="email">メールアドレス：</label>
        <input type="email" name="email">
      </div>
      <div class="form-item">
        <label for="password">パスワード：</label>
        <input type="password" name="password">
      </div>
      <div class="form-item">
        <label for="password_conf">パスワード確認：</label>
        <input type="password" name="password_conf">
      </div>
      <input type="hidden" name="csrf_token" value="<?php echo h(setToken()); ?>">
      <input type="submit" value="新規登録">
    </form>
  </div>
</body>
</html>