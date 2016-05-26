<?php
	require_once dirname(__FILE__)."/config.php";

	if(isset($_COOKIE["PHPSESSID"])){
		$pdo = new PDO('mysql:dbname='.MySQL_Name.';charset=utf8;host='.MySQL_Host, MySQL_User, MySQL_Pass);

		$stmt = $pdo->prepare("SELECT id, substr(indate, 1, 10) as indate, name, email FROM gs_an_table ORDER BY ID LIMIT 5");

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
			<link rel="stylesheet" href="css/range.css">
			<link href="css/bootstrap.min.css" rel="stylesheet">
			<style>div{padding: 10px;font-size:16px;}</style>
			</head>
			<body id="main">
			<div class="container">
			<!-- Head[Start] -->
			<header>
			  <nav class="navbar navbar-default">
			    <div class="container-fluid">
			      <div class="navbar-header">
			      <a class="navbar-brand" href="select.php">メニュー</a>
			    </div>
			  </nav>
			</header>
			<table class="table table-striped table-bordered table-hover">
				<tr>
					<th>ID</th>
					<th>登録日</th>
					<th>名前</th>
					<th>メールアドレス</th>
					<th>アクション</th>
				</tr>
				<?php
					while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
				?>
					<tr>
						<td><?php echo $result['id']; ?></td>
						<td><?php echo $result['indate']; ?></td>
						<td><?php echo $result['name']; ?></td>
						<td><?php echo $result['email'];?></td>
						<td><a href="detail.php?id=<?php echo $result['id']; ?>">詳細を表示</a></td>
					</tr>
			<?php
				}
			?>
<?php	}
	}else{
		require_once('login.php');
	}
?>

</div>
</body>
</html>
