<?php
require 'db.php';

if (isset($_GET['id'])) {
  $id = $_GET['id'];

  // 現在のタスクの完了状態を取得
  $sql = "SELECT status FROM tasks WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  $stmt->execute();

  $task = $stmt->fetch(PDO::FETCH_ASSOC);

  if ($task) {
    if ($task['status'] == 1) {
      // 完了を未完了に戻し、完了日時にNULLをセットする
      $sql = "UPDATE tasks SET status = 0, completed_at = NULL WHERE id = :id";
    } else {
      // 完了にし、完了日時に今の日時をセットする
      $sql = "UPDATE tasks SET status = 1, completed_at = NOW() WHERE id = :id";
    }

    $stmt = $pdo->prepare($sql);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
  }

}

header('Location: index.php');
exit;
?>