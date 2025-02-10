<?php
session_start();
$title = 'ユーザー登録画面';
require_once './functions.php';
require_once './classes/UserLogic.php';

$result = UserLogic::checkLogin();
if ($result) {
  header('Location: mypage.php');
  return;
}

$login_err = isset($_SESSION['login_err']) ? $_SESSION['login_err'] : null;
unset($_SESSION['login_err']);
require('./header.php');
?>
    <?php if (isset($login_err)) : ?>
      <p class="err_txt"><?php echo $login_err; ?></p>
    <?php endif; ?>

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