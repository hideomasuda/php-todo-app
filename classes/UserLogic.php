<?php
require('db.php');

class UserLogic {
  /**
   * ユーザーを登録する
   * @param array $userData
   * @return bool $result
   */
  public static function createUser($userData) {
    global $pdo;
    $result = false;

    $sql = 'INSERT INTO users (name, email, password) VALUES (?, ?, ?)';

    // ユーザーデータを配列に入れる
    $arr = [];
    $arr[] = $userData['username'];
    $arr[] = $userData['email'];
    $arr[] = password_hash($userData['password'], PASSWORD_DEFAULT);

    try {
      $stmt = $pdo->prepare($sql);
      $result = $stmt->execute($arr);
      return $result;
    } catch(\Exception $e) {
      return $result;
    }
  }
}
?>