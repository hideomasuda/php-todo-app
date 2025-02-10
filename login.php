<?php
ini_set("display_errors", TRUE);
session_start();
require_once('./classes/UserLogic.php');

// エラーメッセージ
$err = [];

// バリデーション
if (!$email = filter_input(INPUT_POST, 'email')) {
  $err['email'] = 'メールアドレスを入力してください。';
}
if (!$password = filter_input(INPUT_POST, 'password')) {
  $err['password'] = 'パスワードを入力してください。';
}


if (count($err) > 0) {
  // エラーがあった場合はlogin.phpに戻す
  $_SESSION = $err;
  header('Location: login_form.php');
  return;
}
// ログイン成功時の処理
$result = UserLogic::login($email, $password);
// ログイン失敗時の処理
if (!$result) {
  header('Location: login_form.php');
  return;
}

// var_dump($_SESSION);
$title = 'ログイン完了';
require('./header.php');
?>

    <p class="ta_c">こんにちは、<?php echo $_SESSION['login_user']['name']; ?>さん！<br>ログインが完了しました！</p>
    <p class="ta_c"><a href="./mypage.php">マイページへ</a></p>

  </div>
</body>
</html>