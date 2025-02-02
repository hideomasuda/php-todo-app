<?php
require 'db.php';
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
  <div class="container">
    <h1>ToDoリスト</h1>

    <!-- タスク追加フォーム -->
    <form action="add.php" method="POST" class="task-form">
      <input type="text" name="task" placeholder="新しいタスクを追加" required>
      <input type="date" name="deadline" placeholder="期限日を設定">
      <button type="submit">＋ 追加</button>
    </form>

    <!-- タスク一覧 -->
    <ul class="task-list">
      <?php foreach ($tasks as $task): ?>
        <li class="task-item <?= $task['status'] ? 'completed' : ''; ?>">
          <span class="task-text"><?= htmlspecialchars($task['task'], ENT_QUOTES, 'UTF-8') ?></span>
          <div class="task-actions">
            <a href="complete.php?id=<?= $task['id'] ?>" class="btn-complete">
              <?= $task['status'] ? '⏪ 未完了' : '✅ 完了'; ?>
            </a>
            <a href="delete.php?id=<?= $task['id'] ?>" class="btn-delete">🗑 削除</a>
          </div>
          <div class="task-status">
            締切: <?= $task['deadline'] ? $task['deadline'] : 'なし'; ?> 
            <?= $task['status'] ? ' | 完了: ' . $task['completed_at'] : ''; ?>
          </div>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</body>
</html>
