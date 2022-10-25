<?php
  try{
    require('dbconnect.php');
    $stmt = $pdo->prepare('select * from mypdo where id = :id');
    $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $edit = $stmt->fetch(PDO::FETCH_ASSOC);
  }catch(PDOException $e){
  echo $e->getMessage()."-".$e->getLine().PHP_EOL;
}
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>編集ページ</title>
</head>
<body>
  <form action="update_do.php" method="post">
    <input type="hidden" name='id' value="<?php echo $id; ?>">
    <input type="text" name="name" value=<?php echo htmlspecialchars($edit['name']);?>><br>
    <textarea name="comment" cols="50" rows="10" placeholder="編集内容を入力してください"><?php echo htmlspecialchars($edit['comment']);?></textarea>
    <button type="submit">編集</button>
  </form>
</body>
</html>