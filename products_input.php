<?php

// var_dump('a');
// exit();

session_start();
include("functions.php");
check_session_id();
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>商品入力フォーム</title>
</head>

<body>
<form action="create_file.php" method="post" enctype="multipart/form-data">
    <fieldset>
      <legend>商品入力フォーム</legend>
      <a href="products_read.php">一覧画面</a>
      <a href="logout.php">ログアウト</a>
      <div>
        タイトル: <input type="text" name="title">
      </div>
      <div>
        価格: <input type="text" name="price">
      </div>
      <div>
        <input type="file" name="upfile" accept="image/*" capture="camera" />
      </div>
      <div>
        <button>決定</button>
      </div>
    </fieldset>
  </form>

</body>

</html>