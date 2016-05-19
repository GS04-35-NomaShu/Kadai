<?php
	if(isset($_COOKIE["PHPSESSID"])){
		$pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', '');

		$stmt = $pdo->prepare("SELECT id, substr(indate, 1, 10) as indate, name, email FROM gs_an_table ORDER BY indate desc LIMIT 5");

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
			<title>登録データ一覧</title>
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<style>div{padding: 10px;font-size:16px;}</style>
			</head>
			<body id="main">
			<!-- Head[Start] -->
			<header>
			  <nav class="navbar navbar-default">
			    <div class="container-fluid">
			      <div class="navbar-header">
			      <a class="navbar-brand" href="select.php">メニュー</a>
			    </div>
			  </nav>
			</header>
<?php			while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){	?>
					<a href="detail.php?id=<?php	echo $result['id'];	?>">
						<?php	echo $result['indate']	?>
						<?php	echo $result['name']	?>
						<?php	echo $result['email']	?>
					</a>
					<br>
<?php			}	?>
<?php	}
	}else{
		require_once('login.php');
	}
?>

</body>
</html>
