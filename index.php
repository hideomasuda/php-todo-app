<?php
//ini_set('display_errors', "On"); //エラー表示オン
require 'db.php'; //データベース接続

// タスク一覧を取得
$sql = "SELECT * FROM tasks ORDER BY created_at DESC";
$stmt = $pdo->query($sql);
$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ToDoリスト</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>ToDoリスト</h1>

  <!-- タスク追加フォーム -->
  <form action="add.php" method="POST">
    <input type="text" name="task" placeholder="新しいタスクを追加" required>
    <button type="submit">追加</button>
  </form>

  <!-- タスク一覧表示 -->
  <ul>
    <?php foreach ($tasks as $task): ?>
      <li>
        <span style="text-decoration: <?= $task['status'] ? 'line-through' : 'none'; ?>">
          <?=  htmlspecialchars($task['task'], ENT_QUOTES, 'UTF-8') ?>
        </span>
        <a href="complete.php?id=<?=  $task['id'] ?>"><?= $task['status'] ? '[未完了に戻す]' : '[完了]'; ?></a>
        <a href="delete.php?id=<?=  $task['id'] ?>">[削除]</a>
        <span class="status">
          作成日時：<?= $task['created_at']; ?><br>
          完了日時：<?= $task['status'] ?  $task['completed_at'] : ''; ?>
        </span>
      </li>
    <?php endforeach; ?>
  </ul>
</body>
</html>