<?php
	require_once dirname(__FILE__)."/config.php";

  if(!isset($_POST["id"])){
  	  header ('Location: ./detail.php');
  	  exit;
  }

  $name = $_POST["name"];
  $email = $_POST["email"];
  $naiyou = $_POST["naiyou"];
  $age = $_POST["age"];
  $sex = $_POST["sex"];
  $address = $_POST["address"];
  $pref = $_POST["pref"];
  $tel = $_POST["tel"];
  $mySkill = $_POST["mySkill"];
  $acSkill = $_POST["acSkill"];
  $notes = $_POST["notes"];
  $comment = $_POST["comment"];

  try {
    $pdo = new PDO('mysql:dbname='.MySQL_Name.';charset=utf8;host='.MySQL_Host, MySQL_User, MySQL_Pass);
  } catch (PDOException $e){
    exit('エラー：'.$e->getMessage());
  }

  $stmt = $pdo->prepare("UPDATE gs_an_table SET name = :name, email = :email, age = :age, sex = :sex, address = :address, pref = :pref, tel = :tel, mySkill = :mySkill, acSkill = :acSkill, notes = :notes, comment = :comment, naiyou = :naiyou  WHERE id=:id");
  $stmt->bindValue(':id',$_POST["id"]);
  $stmt->bindValue(':name',$name);
  $stmt->bindValue(':email',$email);
  $stmt->bindValue(':naiyou',$naiyou);
  $stmt->bindValue(':age',$age);
  $stmt->bindValue(':sex',$sex);
  $stmt->bindValue(':address',$address);
  $stmt->bindValue(':pref',$pref);
  $stmt->bindValue(':tel',$tel); 
  $stmt->bindValue(':mySkill',$mySkill);
  $stmt->bindValue(':acSkill',$acSkill);
  $stmt->bindValue(':notes',$notes);
  $stmt->bindValue(':comment',$comment);
  $status = $stmt->execute();

  if($status==false){
    echo "<meta charset='utf-8'>SQLエラー";
    exit;

  }else{
    echo "<meta charset='utf-8'>更新完了";
    echo "<br>";
    echo "<br>";
    ?>
    <a href="detail.php?id=<?php echo $_POST["id"]; ?>">更新画面へ戻る</a>
    <?php
    exit;
  }
?>
