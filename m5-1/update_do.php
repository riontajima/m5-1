<?php
  try{
    require("dbconnect.php");

    $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
    $name = filter_input(INPUT_POST, 'name', FILTER_SANITIZE_SPECIAL_CHARS);
    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_SPECIAL_CHARS);
  
    if(!empty($name) && !empty($comment)){
      $created = date('Y-m-d H:m:s');
      $stmt = $pdo->prepare("update mypdo set name=:name, comment=:comment, created=:created where id=:id");
      $stmt->bindParam(':id', $id, PDO::PARAM_INT);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindParam(':comment', $comment, PDO::PARAM_STR);
      $stmt->bindParam(':created', $created, PDO::PARAM_STR);
      $stmt->execute();
    }
    header('Location: memo.php?id='.$id);

  }catch(PDOException $e){
    echo $e->getMessage()."-".$e->getLine().PHP_EOL;
  }
  ?>