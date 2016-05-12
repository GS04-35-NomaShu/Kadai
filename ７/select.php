<?php
	if(isset($_COOKIE["PHPSESSID"])){
		$pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost', 'root', '');

		$stmt = $pdo->prepare("SELECT name, email, age, naiyou, comment FROM gs_an_table");

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
			<title>フリーアンケート表示</title>
			<link rel="stylesheet" href="css/range.css">
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<style>div{padding: 10px;font-size:16px;}</style>
			</head>
			<body id="main">
			<!-- Head[Start] -->
			<header>
			  <nav class="navbar navbar-default">
			    <div class="container-fluid">
			      <div class="navbar-header">
			      <a class="navbar-brand" href="select.php">データ登録</a>
			    </div>
			  </nav>
			</header>
			<!-- Head[End] -->
			<table border="3" style="margin-left:40px;">
				<tr bgcolor="#ff6347">
					<th>名前</th>
					<th>Eメールアドレス</th>
					<th>年齢</th>
					<th>内容</th>
					<th>コメント</th>
				</tr>
<?php
				while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
?>
					<tr>
						<td><?php	echo $result['name']	?></td>
						<td><?php	echo $result['email']	?></td>
						<td><?php	echo $result['age']		?></td>
						<td><?php	echo $result['naiyou']	?></td>
						<td><?php	echo $result['comment']	?></td>
					</tr>
<?php			}	?>
			</table>
<?php	}
	}else{
		require_once('login.php');
	}
?>
<!-- Main[End] -->

</body>
</html>
