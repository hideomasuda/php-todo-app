<?php
session_start();
// ini_set("display_errors", TRUE);
require_once('./classes/UserLogic.php');

// エラーメッセージ
$err = [];

$token = filter_input(INPUT_POST, 'csrf_token');
// トークンがない、もしくは一致しない場合、処理を中止
if (!isset($_SESSION['csrf_token']) || $token !== $_SESSION['csrf_token']) {
  exit('不正なリクエスト');
}

unset($_SESSION['csrf_token']);

// バリデーション
if (!$username = filter_input(INPUT_POST, 'username')) {
  $err[] = 'ユーザー名を入力してください。';
}
if (!$email = filter_input(INPUT_POST, 'email')) {
  $err[] = 'メールアドレスを入力してください。';
}
$password = filter_input(INPUT_POST, 'password');
if (!preg_match("/[a-zA-Z0-9]{1,8}/u", $password)) { //実際はもっと厳しく正規表現を書く
  $err[] = 'パスワードを正しく入力してください。(英数字1~8文字)';
}
$password_conf = filter_input(INPUT_POST, 'password_conf');
if ($password_conf !== $password) {
  $err[] = '上のパスワードと一致しません。';
}

if (count($err) === 0) {
  // ユーザーを登録する処理
  $hasCreated = UserLogic::createUser($_POST);

  if (!$hasCreated) {
    $err[] = '登録に失敗しました。';
  }
}

$title = 'ユーザー登録完了画面';
require('./header.php');
?>

    <?php if (count($err) == 0): ?>
      <p>ユーザー登録が完了しました！</p>
      <a href="./login_form.php">ログイン画面へ</a>
    <?php else: ?>
      <?php foreach ($err as $e): ?>
        <p><?= $e ?></p>
      <?php endforeach; ?>
      <a href="./signup_form.php">戻る</a>
    <?php endif; ?>
  </div>
</body>
</html>