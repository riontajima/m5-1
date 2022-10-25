<?php
  try{
    require('dbconnect.php');
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);
    if(!empty($name) && !empty($comment)){
      $sql = 'insert into mypdo(name ,comment ,created) values(:name ,:comment ,:created)';
      $stmt = $pdo->prepare($sql);
      $created = date('Y-m-d H:m:s');
      $stmt->bindValue(':name' ,$name ,PDO::PARAM_STR);
      $stmt->bindValue(':comment' ,$comment ,PDO::PARAM_STR);
      $stmt->bindValue(':created' ,$created ,PDO::PARAM_STR);
      $stmt->execute();
      echo '登録が完了しました';
      echo '<br>→ <a href="index.php">トップへ戻る</a>';
      exit();
    }
  }catch(PDOException $e){
    echo $e->getMessage()."-".$e->getLine().PHP_EOL;
  }
?>