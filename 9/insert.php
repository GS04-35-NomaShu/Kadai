<?php
	require_once dirname(__FILE__)."/config.php";

  //1. POSTデータ取得（）
  if(!isset($_POST["name"])){
  	  header ('Location: ./index.php');
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

  //2. DB接続します
  try {
    $pdo = new PDO('mysql:dbname='.MySQL_Name.';charset=utf8;host='.MySQL_Host, MySQL_User, MySQL_Pass);
  } catch (PDOException $e){
    exit('エラー：'.$e->getMessage());
  }

  //３．データ登録SQL作成 ※頭にコロンがつく executeは実行するコマンド
  $stmt = $pdo->prepare("INSERT INTO gs_an_table (id, name, email, naiyou, indate, age, sex, address, pref, tel, mySkill, acSkill, notes, comment )VALUES(NULL, :name, :email, :naiyou, sysdate(), :age, :sex, :address, :pref, :tel, :mySkill, :acSkill, :notes, :comment)");
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

  //４．データ登録処理後
  if($status==false){
    //Errorの場合$status=falseとなり、エラー表示
    echo '<meta charset="utf-8">SQLエラー';
    exit;

  }else{
    //５．登録完了表示
    echo '<meta charset="utf-8">登録完了';
    exit;


  }
?>
