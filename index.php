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
  <script>
    document.addEventListener("DOMContentLoaded", function() {
      document.querySelectorAll(".task-item").forEach(item => {
        item.addEventListener("click", function() {
          const taskId = this.dataset.id;
          fetch(`toggle_status.php?id=${taskId}`)
            .then(response => response.json())
            .then(data => {
              if (data.success) {
                this.classList.toggle("completed");
                this.querySelector(".task-text").classList.toggle("line-through");
              }
            });
        });
      });
    });
  </script>
</head>
<body>
  <div class="container">
    <h1>ToDoリスト</h1>

    <!-- タスク追加フォーム -->
    <form action="add.php" method="POST" class="task-form">
      <input type="text" name="task" placeholder="新しいタスクを追加" required>
      <div class="date-input-container">
        <label for="deadline">期限日:</label>
        <input type="date" id="deadline" name="deadline">
      </div>
      <button type="submit">＋ 追加</button>
    </form>

    <!-- タスク一覧 -->
    <ul class="task-list">
      <?php foreach ($tasks as $task): ?>
        <li class="task-item <?= $task['status'] ? 'completed' : ''; ?>" data-id="<?= $task['id'] ?>">
          <span class="task-text <?= $task['status'] ? 'line-through' : ''; ?>">
            <?= htmlspecialchars($task['task'], ENT_QUOTES, 'UTF-8') ?>
          </span>
          <div class="task-status">締切: <?= $task['deadline'] ? $task['deadline'] : 'なし'; ?></div>
          <a href="delete.php?id=<?= $task['id'] ?>" class="btn-delete">🗑 削除</a>
        </li>
      <?php endforeach; ?>
    </ul>
  </div>
</body>
</html>