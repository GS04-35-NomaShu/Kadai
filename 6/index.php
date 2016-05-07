<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>アンケート</title>
  <link rel="stylesheet" href="./css/reset.css">
  <link rel="stylesheet" href="./css/main.css">
</head>
<body>
    <h1>アンケート入力</h1>

  <form action="check.php" method="POST" id="formbd">
    <table>

      <tr>
        <td>
          <label>名前</label>
        </td>
        <td>
          <input type="text" name="name">
        </td>
        <td>
          <label>メールアドレス</label>
        </td>
        <td>
          <input type="email" name="email">
        </td>
      </tr>
      <tr>
        <td>
          <label>都道府県</label>
        </td>
        <td>
          <input type="text" name="pref">
        </td>
        <td>
          <label>男</label>
          <input type="radio" name="gender" value="男">
          <label>女</label>
          <input type="radio" name="gender" value="女">
        </td>
        <td>
          <input type="submit" value="入力内容確認">
        </td>
      </tr>
    </table>
  </form>

</body>
</html>
