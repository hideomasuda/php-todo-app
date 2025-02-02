<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo $title ?></title>
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
    <h1><?php echo $title ?></h1>