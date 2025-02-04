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
  header('Location: login.php');
  return;
}
// ログイン成功時の処理
$result = UserLogic::login($email, $password);
// ログイン失敗時の処理
if (!$result) {
  header('Location: login.php');
  return;
}

// var_dump($_SESSION);
$title = 'ログイン完了画面';
require('./header.php');
?>

    <?php if (count($err) == 0): ?>
      <p class="ta_c">こんにちは、<?php echo $_SESSION['login_user']['name']; ?>さん！<br>ログインが完了しました！</p>
      <p class="ta_c"><a href="index.php">ToDoリストへ</a></p>
    <?php else: ?>
      <?php foreach ($err as $e): ?>
        <p><?= $e ?></p>
      <?php endforeach; ?>
      <p class="ta_c"><a href="login.php">ログイン画面に戻る</a></p>
    <?php endif; ?>

  </div>
</body>
</html>