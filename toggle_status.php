<?php
require 'db.php';

if (isset($_GET['id'])) {
  $id = intval($_GET['id']);
  $sql = "UPDATE tasks SET status = NOT status WHERE id = :id";
  $stmt = $pdo->prepare($sql);
  $stmt->bindValue(':id', $id, PDO::PARAM_INT);
  $stmt->execute();
  echo json_encode(['success' => true]);
} else {
  echo json_encode(['success' => false]);
}
?>
