-- データベースを作成（存在しない場合のみ）
CREATE DATABASE IF NOT EXISTS todo_app;
USE todo_app;

-- タスク管理テーブルを作成
CREATE TABLE IF NOT EXISTS tasks (
    id INT AUTO_INCREMENT PRIMARY KEY,
    task VARCHAR(255) NOT NULL,
    status TINYINT(1) DEFAULT 0,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    completed_at TIMESTAMP NULL DEFAULT NULL
);

-- 初期データを追加（オプション）
INSERT INTO tasks (task, status, created_at, completed_at) VALUES
('買い物に行く', 0, NOW(), NULL),
('PHPの勉強をする', 1, NOW(), NOW()),
('ジムに行く', 0, NOW(), NULL);
