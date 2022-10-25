<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>投稿詳細</title>
</head>
<body>
  <?php 
  try{
  require('dbconnect.php');
  $stmt = $pdo->prepare('select * from mypdo where id = :id');
  $id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
  if(!$id){
    echo '表示する投稿を選択してください';
  }
  $stmt->bindParam(':id', $id, PDO::PARAM_INT);
  $stmt->execute();

  $aryList = $stmt->fetch(PDO::FETCH_ASSOC);
  if(!$aryList){
    echo '投稿が見つかりません';
  }

  }catch(PDOException $e){
    echo $e->getMessage()."-".$e->getLine().PHP_EOL;
  }
  ?>

  <div class="memo">
    <h2>氏名：<?php echo htmlspecialchars($aryList['name']);?></h2>
    <h3>コメント：<?php echo htmlspecialchars($aryList['comment']);?></h3>
    <p><?php echo htmlspecialchars($aryList['created']);?></p>
  </div>

  <p>
  <a href="update.php?id=<?php echo $aryList['id'];?>">編集する</a>|
  <a href="delete_do.php?id=<?php echo $aryList['id']?>">削除する</a><br>
  <a href="index.php">→ 投稿一覧へ</a>

  </p>
</body>
</html>