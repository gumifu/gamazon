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
        <input type="file" name="upfile" accept="image/*" capture="camera" />
      </div>
      <div>
        ショップ: <input type="text" name="shop">
      </div>
      <div>
        タイトル: <input type="text" name="title">
      </div>
      <div>
        カテゴリ: <input type="text" name="category">
      </div>
      <div>
        価格: <input type="text" name="price">
      </div>
      <div>
        商品紹介: <textarea rows="10" cols="60" type="text" name="product_introduction"></textarea>
      </div>
      <div>
        <button>決定</button>
      </div>
    </fieldset>
  </form>

</body>

</html>