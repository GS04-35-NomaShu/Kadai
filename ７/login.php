<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>ログイン</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->

<!-- onsubmitとはsubmitボタンが押下されたタイミングで実行した処理を記述する場所 -->
<!-- 今回はsubmitのタイミングでID認証を行いたいので、認証用の関数を記載 -->
<form name="login_form" method="post" action="" onsubmit="auth();">
  <div class="jumbotron">
   <fieldset>
    <legend>ログイン情報入力</legend>
    <table>
    	<tr>
    		<td><label>ID：</label></td>
    		<td><input type="text" required name="id"></td>
    	</tr>
    	<tr>
    		<td><label>パスワード：</label></td>
    		<td><input type="password" required name="password"></td>
    	</tr>
    	<tr>
    		<td align='center' colspan='2'>
	    		<input type="submit" value="ログイン">
    		</td>
    	</tr>
    </table>
    </fieldset>
  </div>
</form>

<?php
	// login.phpを開いた際、既にログイン済みならselect.phpへ自動で遷移する(submitを使用)
	// このようにsubmit関数を用いれば、ボタンが押下されるタイミング以外にも動的にsubmitが行える。
	if(isset($_COOKIE["PHPSESSID"])){
		echo '<script type="text/javascript">document.login_form.submit();</script>';
	}
?>

<script type="text/javascript">
<!--
    function auth(){
    	<?php
    		// 認証処理が記載されたphpファイルを読み込み
    		require_once('auth.php');
    		
    		// 認証を行う
    		$res = authentication();
    		
    		if($res){
    			// 認証結果が問題無ければ
    			header ('Location: ./select.php');
    		}
    	?>
    };
// -->
</script>

<!-- Main[End] -->
</body>
</html>