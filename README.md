# ToDoリスト管理アプリ
ToDoリストを管理できるWebアプリケーションです。  
PHPとMySQLを使用して構築し、タスクのCRUD操作が可能です。  

## 機能一覧
* タスクの追加
* タスクの完了・未完了の切り替え
* タスクの削除
* タスクの作成日時・完了日時を記録  

## 🛠️ 技術スタック
* PHP 8.0.3
* MySQL(MariaDB) 10.4.18
* HTML / CSS
* XAMPP（ローカル開発環境）

## 🚀 インストール方法
### 1️⃣ クローンする
```sh
git clone https://github.com/hideomasuda/php-todo-app.git
cd php-todo-app
```

### 2️⃣ 環境をセットアップ（XAMPP）
db.sql を phpMyAdmin にインポート
db.php の接続情報を編集（特に設定を変更していない場合は下記のままで問題ありません。）
```
$host = 'localhost';
$dbname = 'todo_app';
$username = 'root';
$password = '';

```

### 3️⃣ サーバーを起動（XAMPP）
XAMPPの Apache と MySQL を起動
（スクショのようにApacheとMySQLが緑色のアイコンでRunningになれば準備OKです）

<img width="669" alt="Image" src="https://github.com/user-attachments/assets/d151f4ab-a886-4ad9-b880-cbd6f88a13d6" />

ブラウザで http://localhost/php-todo-app/index.php にアクセス

### 今後の改善予定
* ユーザー認証機能の追加
* タスクの期限管理機能
* タスクの優先度設定

### ライセンス
MIT ライセンス
© 2025 hideomasuda
