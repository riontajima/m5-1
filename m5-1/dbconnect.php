<?php
    $dsn = 'データベース名';
    $user = 'ユーザー名';
    $password = 'パスワード';
    $pdo = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));

    $sql = "CREATE TABLE IF NOT EXISTS mypdo(
      id INT AUTO_INCREMENT PRIMARY KEY,
      name Varchar(32) NOT NULL,
      comment TEXT,
      created DATETIME)";
      $stmt = $pdo->query($sql);
?>