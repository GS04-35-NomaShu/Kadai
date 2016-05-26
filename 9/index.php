<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>POSTデータ登録</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>
<div class="container">
<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">SKILL EXCHANGE</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="post" action="insert.php">
	<div class="jumbotron">
		<legend>スキル登録フォーム</legend>
		<div class="form-inline">
			<label>名前</label>	
			<input type="text" name="name" placeholder="例　神崎隆二" class="form-control" required>
		</div>
		<div class="form-inline">
			<label>年齢</label>
			<input type="number" min="0" name="age" placeholder="例　25" class="form-control">
		</div>
		<div class="form-inline">
			<label>性別</label>
			<select class="form-control" name="sex">
				<option value="1">男</option>
				<option value="2">女</option>
			</select>
		</div>
		<div class="form-inline">
			<label>住所</label>
			<input type="text" name="address" placeholder="例　東京都 新宿区" class="form-control">
		</div>
		<div class="form-inline">
			<label>出身地</label>
			<select class="form-control" name="pref">
				<?php
					require_once dirname(__FILE__)."/config.php";
					foreach($pref as $id => $name){
				?>
					<option value="<?php echo $id; ?>"><?php echo $name; ?></option>
				<?php
					}
				?>
			</select> 
		</div>
		<div class="form-inline">
			<label>電話番号</label>	
			<input type="tel" name="tel" placeholder="例　03-0000-0000" class="form-control" required>
		</div>
		<div class="form-inline">
			<label>メールアドレス</label>	
			<input type="email" name="email" placeholder="例　test@gmail.com" class="form-control" required>
		</div>
		<div class="form-inline">
			<label>自分のスキル</label>	
			<input type="text" name="mySkill" placeholder="例　PHP,C+" class="form-control" required>
		</div>
		<div class="form-inline">
			<label>交換したいスキル</label>	
			<input type="text" name="acSkill" placeholder="例　英語,中国語" class="form-control" required>
		</div>
		<div class="form-inline">
			<label>備考</label>
			<input type="text" name="notes" class="form-control">
		</div>
		<label>コメント<textarea name="comment" rows="4" class="form-control" cols="40"></textarea></label><br>
		<input type="submit" class="btn btn-primary" value="送信">
	</div>
</form>
<!-- Main[End] -->

</div>
</body>
</html>
