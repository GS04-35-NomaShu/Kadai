<?php

	require_once dirname(__FILE__)."/config.php";
	function authentication(){
		// 既に認証済みであれば、再度認証は行わない。無条件でTRUE
		if(isset($_COOKIE["PHPSESSID"])){
			return true;
		}else{
			$id = $_POST["id"];
			$password = $_POST["password"];
			
			if(!isset($id) || !isset($password)){
				return false;
			}
			
			$pdo = new PDO('mysql:dbname='.MySQL_Name.';charset=utf8;host='.MySQL_Host, MySQL_User, MySQL_Pass);
			
			// IDとパスワードの組み合わせに合致するデータの件数を取得する
			$stmt = $pdo->prepare("SELECT count(*) as count FROM login_table WHERE id=:id and password=:password");
			$stmt->bindValue(':id',$id);
			$stmt->bindValue(':password',$password);
			$flag = $stmt->execute();
			if(!$flag){
				header ('Location: ./error.php');
				exit;
			}
			
			// SQL実行結果を取得。この指定方法で取得すれば
			// 下記のように項目名でデータを参照できる。
			$result = $stmt->fetch(PDO::FETCH_ASSOC);
			
			// 件数が1件の場合 = つまり、IDとパスワードの組み合わせが存在した
			if($result['count'] == 1){
				// セッション開始
				session_start();
				return true;
			}else{
				return false;
			}
		}
	}
?>
