<?php
// 関数ライブラリ読見込み
require 'functions.php';

// 入力内容を取得
$name = $_POST['name'];
$email = $_POST['email'];
$pref = $_POST['pref'];
$gender = $_POST['gender'];


// 入力内容をエスケープ

$safe_name = escape($name);
$safe_email = escape($email);
$safe_pref = escape($pref);
$safe_gender = escape($gender);


/*
|--------------------------------------------------------------------------
| CSVに保存
|--------------------------------------------------------------------------
|
|
|
|
|
|
*/
$file_name = 'data/data.csv'; //書き込むファイルを変数に格納
$array = compact("name","email","gender","pref"); //「compact」$を指定しなくても変数を配列に格納できる
$string = implode(',',$array);  // 配列データをカンマで区切って結合


$file = fopen($file_name,"a") or die("OPENエラー $file_name"); // ファイルを書き込みモード（a）で開く

flock($file,LOCK_EX); // 排他ロック

fputs($file,$string."\n");  // 改行込でファイルに書き込み

fclose($file); //ファイルを閉じる
?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <title>アンケート送信完了画面</title>
 </head>
 <body>
     <h1>アンケートご協力ありがとうございました。</h1>
     <p>以下の内容で送信しました。</p>
     <br>
     <p><?php echo $safe_name; ?></p>
     <p><?php echo $safe_email; ?></p>
     <p><?php echo $safe_pref; ?></p>
     <p><?php echo $safe_gender; ?></p>
</body>
</html>
