<?php
/*
|--------------------------------------------------------------------------
| CSVファイルのデータ出力
|--------------------------------------------------------------------------
|
|
|
|
|
*/
$file_name = 'data/data.csv'; //読み込むファイルを変数に格納

$data = file($file_name); //単純な配列形式でデータを取得


$file = fopen($file_name,"r") or die("OPENエラー $file_name"); // ファイルを読み込み込みモード（a）で開く

flock($file,LOCK_SH); // 排他ロック

// $array = fgetcsv($file,100,","); //csvデータを取得

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>アンケート集計結果</title>
  </head>
  <h1>アンケート集計結果</h1>
  <h2>総データ件数:<?php echo count($data); ?></h2>
  <?php
  while(list($name,$email,$gender,$pref) = fgetcsv($file,1000,","))
  {
    echo $name;
    echo '<br>';
    echo $email;
    echo '<br>';
    echo $gender;
    echo '<br>';
    echo $pref;
    echo '<br>';
  }
  fclose($file); //ファイルを閉じる
   ?>

   <h1>グラフ</h1>

  <body>

  </body>
</html>
