<?php
session_start();
require_once './classes/UserLogic.php';
$result = UserLogic::checkLogin();
if ($result) {
  header('Location: signup_form.php');
  return;
}

$err = $_SESSION;

// セッションの初期化
$_SESSION = array();
session_destroy();

$title = 'ログイン画面';
require('./header.php');
?>
    <?php if (isset($err['msg'])) : ?>
      <p class="err_txt"><?php echo $err['msg']; ?></p>
    <?php endif; ?>
    <form action="login.php" method="POST">
      <div class="form-item">
        <label for="email">メールアドレス：</label>
        <input type="email" name="email">
        <?php if (isset($err['email'])) : ?>
          <p class="err_txt"><?php echo $err['email']; ?></p>
        <?php endif; ?>
      </div>
      <div class="form-item">
        <label for="password">パスワード：</label>
        <input type="password" name="password">
        <?php if (isset($err['password'])) : ?>
          <p class="err_txt"><?php echo $err['password']; ?></p>
        <?php endif; ?>
      </div>
      <input type="submit" value="ログイン">
    </form>
    <a href="signup_form.php" class="signup_link">新規登録はこちら</a>
  </div>
</body>
</html>