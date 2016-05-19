<?php
  if(!isset($_POST["id"])){
  	  header ('Location: ./detail.php');
  	  exit;
  }
  
  $id = $_POST["id"];
  
  try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', '');
  } catch (PDOException $e){
    exit('エラー：'.$e->getMessage());
  }

  $stmt = $pdo->prepare("DELETE FROM gs_an_table WHERE id=:id");
  $stmt->bindValue(':id',$id);
  $status = $stmt->execute();

  if($status==false){
    echo "SQLエラー";
    exit;

  }else{
    echo "削除完了";
    echo "<br>";
    echo "<br>";
    ?>
    <a href='./select.php'>一覧へ戻る</a>
    <?php
    exit;
  }
?>
