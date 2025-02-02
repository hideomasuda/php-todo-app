<?php
ini_set('display_errors', TRUE);
require 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $task = $_POST['task'];
  $deadline = $_POST['deadline'];

  if (!empty($task)) {
    if (!empty($deadline)) {
      $sql = "INSERT INTO tasks (task, deadline) VALUES (:task, :deadline)";
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':task', $task, PDO::PARAM_STR);
      $stmt->bindValue(':deadline', $deadline, PDO::PARAM_STR);
      $stmt->execute();
    } else {
      $sql = "INSERT INTO tasks (task) VALUES (:task)";
      $stmt = $pdo->prepare($sql);
      $stmt->bindValue(':task', $task, PDO::PARAM_STR);
      $stmt->execute();
    }
  }
}

header('Location: index.php');
exit;
?>