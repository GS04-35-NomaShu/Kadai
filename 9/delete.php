<?php
	require_once dirname(__FILE__)."/config.php";

  if(!isset($_POST["id"])){
  	  header ('Location: ./detail.php');
  	  exit;
  }
  
  $id = $_POST["id"];
  
  try {
    $pdo = new PDO('mysql:dbname='.MySQL_Name.';charset=utf8;host='.MySQL_Host, MySQL_User, MySQL_Pass);
  } catch (PDOException $e){
    exit('エラー：'.$e->getMessage());
  }

  $stmt = $pdo->prepare("DELETE FROM gs_an_table WHERE id=:id");
  $stmt->bindValue(':id',$id);
  $status = $stmt->execute();

  if($status==false){
    echo "<meta charset='utf-8'>SQLエラー";
    exit;

  }else{
    echo "<meta charset='utf-8'>削除完了";
    echo "<br>";
    echo "<br>";
    ?>
    <a href='./select.php'>一覧へ戻る</a>
    <?php
    exit;
  }
?>
