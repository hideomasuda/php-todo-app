<?php
session_start();
require_once('./classes/UserLogic.php');
require_once('./functions.php');

// ログインしているか判定し、していなかったら新規登録画面へ返す
$resurt = UserLogic::checkLogin();

if (!$resurt) {
  $_SESSION['login_user'] = 'ユーザを登録してログインしてください！';
  header('Location: signup_form.php');
  return;
}

$login_user = $_SESSION['login_user'];

$title = 'マイページ';
require('./header.php');
?>

    <p>ログインユーザ：<?php echo h($login_user['name']); ?></p>
    <p>メールアドレス：<?php echo h($login_user['email']); ?></p>
    <a href="./login.php">ログアウト</a>
  </div>
</body>
</html>