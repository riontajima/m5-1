<?php 
  try{
    require('dbconnect.php');
    
    $stmt = $pdo->prepare('select * from mypdo order by id desc limit 0,10');
    $result  = $stmt->execute();
  
  
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
  <title>TOP</title>
</head>
<body>
  <h1>投稿一覧</h1>
  <p>→<a href="input.html">新しい投稿</a></p>
  <hr>
  <?php if(!$result){?>
    <p>表示するメモはありません</p>
  <?php } else { while ($line = $stmt->fetch()) {?>
    <p><?php echo htmlspecialchars($line['name']);?>:
    <a href="memo.php?id=<?php echo $line['id'];?>">
    <?php echo htmlspecialchars(mb_substr($line['comment'],0,50));?></a></p>
    <p><?php echo htmlspecialchars($line['created']);?></p>
    <hr>
    <?php }}?>
  </body>
</html>