<?php
//ini_set('display_errors', "On"); //エラー表示オン

require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $task = $_POST['task'];

  if (!empty($task)) {
    $sql = "INSERT INTO tasks (task) VALUES (:task)";
    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':task', $task, PDO::PARAM_STR);
    $stmt->execute();
  }
}

header('Location: index.php');
exit;
?>