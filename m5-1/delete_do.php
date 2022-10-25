<?php
  try{
    require('dbconnect.php');
    $stmt = $pdo->prepare('delete from mypdo where id=:id');
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    
    header('Location: index.php');
  }catch(PDOException $e){
  echo $e->getMessage()."-".$e->getLine().PHP_EOL;
}
?>