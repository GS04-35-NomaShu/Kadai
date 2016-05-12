<?php
  //1. POSTデータ取得（）
  if(!isset($_POST["name"])){
  	  header ('Location: ./index.php');
  	  exit;
  }
  
  $name = $_POST["name"];
  $email = $_POST["email"];
  $naiyou = $_POST["naiyou"];
  $age = $_POST["age"];
  $comment = $_POST["comment"];
  $password = $_POST["password"];

  //2. DB接続します
  $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', '');

  //３．データ登録SQL作成 ※頭にコロンがつく executeは実行するコマンド
  $stmt = $pdo->prepare("INSERT INTO gs_an_table (id, name, email, naiyou, indate, age, comment, password )VALUES(NULL, :name, :email, :naiyou, sysdate(), :age, :comment, :password)");
  $stmt->bindValue(':name',$name);
  $stmt->bindValue(':email',$email);
  $stmt->bindValue(':naiyou',$naiyou);
  $stmt->bindValue(':age',$age);
  $stmt->bindValue(':comment',$comment);
  $stmt->bindValue(':password',$password);
  $status = $stmt->execute();

  //４．データ登録処理後
  if($status==false){
    //Errorの場合$status=falseとなり、エラー表示
    echo "SQLエラー";
    exit;

  }else{
    //５．登録完了表示
    echo "登録完了";
    exit;


  }
?>
