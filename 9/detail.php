<?php
	require_once dirname(__FILE__)."/config.php";

	if(isset($_COOKIE["PHPSESSID"])){
		if(isset($_GET["id"])){
			$pdo = new PDO('mysql:dbname='.MySQL_Name.';charset=utf8;host='.MySQL_Host, MySQL_User, MySQL_Pass);

			$stmt = $pdo->prepare("SELECT * FROM gs_an_table WHERE id=:id");
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
				<div class="container">
				<header>
				  <nav class="navbar navbar-default">
				    <div class="container-fluid">
				      <div class="navbar-header">
				      <a class="navbar-brand" href="detail.php?id=<?php	echo $_GET["id"]; ?>">登録データ更新</a>
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

		<div class="form-inline">
			<label>名前</label>	
			<input type="text" name="name" value="<?php echo $result['name']; ?>" placeholder="例　神崎隆二" class="form-control" required>
		</div>
		<div class="form-inline">
			<label>年齢</label>
			<input type="number" min="0" name="age" value="<?php echo $result['age']; ?>" placeholder="例　25" class="form-control">
		</div>
		<div class="form-inline">
			<label>性別</label>
			<select class="form-control" name="sex">
				<option value="1"<?php if($result['sex']==1){echo " selected";} ?>>男</option>
				<option value="2"<?php if($result['sex']==2){echo " selected";} ?>>女</option>
			</select>
		</div>
		<div class="form-inline">
			<label>住所</label>
			<input type="text" value="<?php echo $result['address']; ?>" name="address" placeholder="例　東京都 新宿区" class="form-control">
		</div>
		<div class="form-inline">
			<label>出身地</label>
			<select class="form-control" name="pref">
				<?php
					require_once dirname(__FILE__)."/config.php";
					foreach($pref as $id => $name){
				?>
					<option value="<?php echo $id; ?>"<?php if($result['pref']==$id){echo " selected";} ?>><?php echo $name; ?></option>
				<?php
					}
				?>
			</select> 
		</div>
		<div class="form-inline">
			<label>電話番号</label>	
			<input type="tel" name="tel" value="<?php echo $result['tel']; ?>" placeholder="例　03-0000-0000" class="form-control" required>
		</div>
		<div class="form-inline">
			<label>メールアドレス</label>	
			<input type="email" name="email" value="<?php echo $result['email']; ?>" placeholder="例　test@gmail.com" class="form-control" required>
		</div>
		<div class="form-inline">
			<label>自分のスキル</label>	
			<input type="text" name="mySkill" value="<?php echo $result['mySkill']; ?>" placeholder="例　PHP,C+" class="form-control" required>
		</div>
		<div class="form-inline">
			<label>交換したいスキル</label>	
			<input type="text" name="acSkill" value="<?php echo $result['acSkill']; ?>" placeholder="例　Perl,JavaScript" class="form-control" required>
		</div>
		<input type="hidden" name="id" value="<?php echo $result['id']; ?>">
		<div class="form-inline">
			<label>備考</label>
			<input type="text" name="notes" value="<?php echo $result['notes']; ?>" class="form-control">
		</div>
		<label>内容<textarea name="naiyou" rows="4" class="form-control" cols="40"><?php echo $result['naiyou']; ?></textarea></label><br>
		<label>コメント<textarea name="comment" rows="4" class="form-control" cols="40"><?php echo $result['comment']; ?></textarea></label><br>

		<input type="submit" class="btn btn-primary" value="更新">
		<input type="submit" class="btn btn-danger" value="削除" onclick="document.forms[0].action = 'delete.php';">
						</div>
					</form>
<?php			}	?>
<?php		}
		}
	}else{
		require_once('login.php');
	}
?>

</div>
</body>
</html>
