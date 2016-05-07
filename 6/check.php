<?php
// 関数ライブラリ読み込み
require 'functions.php';
//入力した内容を取得する
$name = $_POST['name'];
$email = $_POST['email'];
$pref = $_POST['pref'];

if(isset($_POST['gender']))
{
  $gender = $_POST['gender'];
}
else
{
  $gender = '';
}

// 入力した内容をエスケープ
$safe_name = escape($name);
$safe_email = escape($email);
$safe_pref = escape($pref);
$safe_gender = escape($gender);

// 空の配列を作成
$errors = array();


// 入力内容が空の時エラーメッセージを保存
if($safe_name == '')
{
  $errors[] = '名前が入力されていません。';
}
if($safe_email == '')
{
  $errors[] = 'メールアドレスが入力されていません。';
}
if($safe_pref == '')
{
  $errors[] = '都道府県が入力されていません。';
}


// 空のチェックは保留  
if($safe_gender == '')
{
  $errors[] = '性別が入力されていません。';
}


?>

<!-- エラーがある時 -->
<?php
// エラーメッセージの出力
if (count($errors) > 0)
{
  foreach($errors as $message)
  {
    echo "<strong style='color: red'>".$message."</strong><br>";
  }

}

 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
   <meta charset="UTF-8">
   <title>アンケート入力確認画面</title>
 </head>
 <body>

   <!-- エラーがない時 -->
  <form action="finish.php" method="POST">
    <h2>以下の内容で送信しますか？</h2>
    <p><?php echo $safe_name; ?></p>
    <p><?php echo $safe_email; ?></p>
    <p><?php echo $safe_pref; ?></p>
    <p><?php echo $safe_gender; ?></p>

    <!-- エラーがある時 -->
    <?php if(count($errors) > 0): ?>
      <input type="submit" value="戻る" onClick="history.back()">
    <!-- エラーがない時 -->
    <?php else: ?>
      <input type="hidden" name="name" value="<?php echo $safe_name;  ?>">
      <input type="hidden" name="email" value="<?php echo $safe_email; ?>">
      <input type="hidden" name="pref" value="<?php echo $safe_pref; ?>">
      <input type="hidden" name="gender" value="<?php echo $safe_gender; ?>">
      <input type="submit" value="送信する">
      <input type="submit" value="戻る" onClick="history.back()">
  　<?php endif; ?>
    </form>
   </body>
  </html>
