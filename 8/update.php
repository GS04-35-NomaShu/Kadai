<?php
  if(!isset($_POST["id"])){
  	  header ('Location: ./detail.php');
  	  exit;
  }
  
  $id = $_POST["id"];
  $name = $_POST["name"];
  $email = $_POST["email"];
  $naiyou = $_POST["naiyou"];
  $comment = $_POST["comment"];

  try {
    $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', '');
  } catch (PDOException $e){
    exit('エラー：'.$e->getMessage());
  }

  $stmt = $pdo->prepare("UPDATE gs_an_table SET name = :name, email = :email, naiyou = :naiyou, comment = :comment WHERE id=:id");
  $stmt->bindValue(':id',$id);
  $stmt->bindValue(':name',$name);
  $stmt->bindValue(':email',$email);
  $stmt->bindValue(':naiyou',$naiyou);
  $stmt->bindValue(':comment',$comment);
  $status = $stmt->execute();

  if($status==false){
    echo "SQLエラー";
    exit;

  }else{
    echo "更新完了";
    echo "<br>";
    echo "<br>";
    ?>
    <a href="detail.php?id=<?php	echo $id;	?>">更新画面へ戻る</a>
    <?php
    exit;
  }
?>
