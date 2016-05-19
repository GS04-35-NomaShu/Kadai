<?php
	if(isset($_COOKIE["PHPSESSID"])){
		if(isset($_GET["id"])){
			$pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', '');

			$stmt = $pdo->prepare("SELECT id, indate, name, email, naiyou, comment FROM gs_an_table WHERE id=:id");
			$stmt->bindValue(':id', $_GET["id"], PDO::PARAM_INT );

			$flag = $stmt->execute();

			if(!$flag){
				echo "SQLエラー";
			}else{
?>
				<!DOCTYPE html>
				<html lang="ja">
				<head>
				<meta charset="utf-8">
				<meta http-equiv="X-UA-Compatible" content="IE=edge">
				<meta name="viewport" content="width=device-width, initial-scale=1">
				<title>登録データ更新</title>
				<link rel="stylesheet" href="css/range.css">
				<link href="css/bootstrap.min.css" rel="stylesheet">
				<style>div{padding: 10px;font-size:16px;}</style>
				</head>
				<body id="main">
				<header>
				  <nav class="navbar navbar-default">
				    <div class="container-fluid">
				      <div class="navbar-header">
				      <a class="navbar-brand" href="detail.php?id=<?php	echo $_GET["id"];	?>">登録データ更新</a>
				    </div>
				  </nav>
				</header>
<?php			if ( $result = $stmt->fetch(PDO::FETCH_ASSOC)){	?>
					<form method="post" name="mainForm" action="update.php">
						<input type="hidden" name="id" value="<?php	echo $result['id']	?>">
						<div class="jumbotron">
						<fieldset>
							<a href="detail.php?id=<?php	echo $result['id'];	?>">
								登録日時<?php	echo $result['indate']	?>
							</a>
							<br>
							<br>
							<label>名前：<input type="text" required name="name" value="<?php	echo $result['name']	?>"></label><br>
							<label>Email：<input type="text" required name="email" value="<?php	echo $result['email']	?>"></label><br>
							<label>内容：<textArea name="naiyou" rows="4" cols="40"><?php	echo $result['naiyou']	?></textArea></label><br>
							<label>コメント：<textArea name="comment" rows="4" cols="40"><?php	echo $result['comment']	?></textArea></label><br>
							<input type="submit" value="更新">
							<input type="submit" value="削除" onclick="document.forms[0].action = 'delete.php';">
						</fieldset>
						</div>
					</form>
<?php			}	?>
<?php		}
		}
	}else{
		require_once('login.php');
	}
?>

</body>
</html>
