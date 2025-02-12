<?php
session_start();
require_once('./classes/UserLogic.php');

if (!$logout = filter_input(INPUT_POST, 'logout')) {
  exit('不正なリクエストです。');
}
// ログインしているか判定し、セッションが切れていたら「ログインしてください」と表示
$resurt = UserLogic::checkLogin();

if (!$resurt) {
  exit('セッションが切れましたので、ログインし直してください。');
}

// ログアウトする
UserLogic::logout();

$title = 'ログアウト';
require('./header.php');
?>

    <p>ログアウトしました。</p>
    <a href="login_form.php">ログイン画面へ</a>
  </div>
</body>
</html>