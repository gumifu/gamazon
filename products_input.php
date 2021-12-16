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
  <link rel="stylesheet" type="text/css" href="css/products_input.css" />

</head>

<body>
<div class="wrapper-padding-medium">
    <div class="logo"><img src='img/black_logo.png' class="logo-img"><span class="logo-txt"></span></div>
      <div class="main-content">
        <div class="header-contents">
          <div class="user-name">
            <?= $_SESSION['username'] ?>さん
          </div>
          <!-- <div class="products-list">
            <a href="products_read.php">一覧画面</a>
          </div> -->
          <div class="logout-btn">
            <a href="logout.php">ログアウト</a>
          </div>
        </div>
        <form action="create_file.php" method="post" enctype="multipart/form-data">
        <div class="input-box">
            <div class="input-contents">   
              <div class="input-contents-inner">
                <h1 class="h1-spacing-small">商品入力フォーム</h1> 
                <div class="input-title">
                  画像ファイルをアップロードしてください
                </div>
                <div class="input-image">
                  <input type="file" name="upfile" accept="image/*" capture="camera" />
                </div>
                <div class="input-title">
                  ショップ
                </div>
                <div class="input-text">
                  <input type="text" name="shop">
                </div>
                <div class="input-title">
                  タイトル
                </div>
                <textarea rows="3" cols="40" type="text" name="title"></textarea>
                <div class="input-title">
                  カテゴリ
                </div>
                <div class="input-text">
                  <input type="text" name="category">
                </div>
                <div class="input-title">
                  価格
                </div>
                <div class="input-text">
                  <input type="text" name="price">
                </div>
                <div class="input-title">
                  商品紹介
                </div>
                <div class="input-text">
                  <textarea rows="10" cols="40" type="text" name="product_introduction"></textarea>
                </div>
                <div class="input-title">
                  連絡先：取引時の連絡先 or 方法を入力してください
                </div>
                <div class="input-text">
                  <input type="text" name="contact" placeholder="twitter：@***、facebook：@名前 などでもOK">
                </div>
                <div>
                  <button class="submit-btn">決定</button>
                </div>
                </div><!-- input-contents-inner -->
              </div><!-- input-contents -->  
            </div><!-- input-box -->  
          </form>
        </div>
      </div>

  <div class="divider-inner"></div>

  <div class="footer">
    <div class="site-map">
      <div><a href="#" alt="利用規約">利用規約</a></div>
      <div><a href="#" alt="プライバシー規約">プライバシー規約</a></div>
      <div><a href="#" alt="ヘルプ">ヘルプ</a></div>
    </div>
    <div class="copyright">
      Copyright - Gamazon, 2021 All Rights Reserved.
    </div>
  </div><!-- footer -->

</body>

</html>