<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ショップアカウント登録画面</title>
  <link rel="stylesheet" type="text/css" href="css/login.css" />

</head>

<body>
<div class="wrapper-padding-medium">
    <div class="logo"><img src='img/black_logo.png' class="logo-img"><span class="logo-txt"></span></div>
      <div class="main-content">
        <form action="shop_register_act.php" method="POST" enctype="multipart/form-data">
          <div class="input-box">
            <div class="input-contents">   
              <div class="input-contents-inner">
                <h1 class="h1-spacing-small">店舗用アカウント作成</h1> 
                <label for="label-email" class="input-title">
                  ショップ名
                </label>
                <div class="input-text">
                  <input type="text" name="username">
                </div>
                <label for="label-email" class="input-title">
                  フリガナ
                </label>
                <div class="input-text">
                  <input type="text" name="username_kana">
                </div>
                <label for="label-email" class="input-title">
                  Eメールアドレス
                </label>
                <div class="input-text">
                  <input type="text" name="email_address">
                </div>
                <div class="input-section">
                  <div class="input-title">
                    パスワード
                  </div>
                  <div class="input-text"><input type="password" id="input_pass" name="password" placeholder="最低６文字必要です">
                  <!-- <button id="btn_passview">表示</button> -->
                  </div>
                  <div class="pw-caution">
                    <img src="img/information-icon.png" class="pw-information-img">パスワードは最低６文字ありますか？
                  </div>
                  <div class="input-title">
                    もう一度パスワードを入力してください
                  </div>
                  <div class="input-text"><input type="password" id="input_pass" name="password">
                  <!-- <button id="btn_passview">表示</button> -->
                  </div>
                  <div class="input-title">
                    アイコンを選択してください
                  </div>
                  <div class="input-image">
                    <input type="file" name="upfile" accept="image/*" capture="camera"/>
                  </div>
                  <div>
                    <button class="login-btn button-style">ショップアカウントを作成する</button>
                  </div>
                </div><!-- input-section -->

                <div class="caution-text">Gamazonの<a href="#">利用規約</a>と<a href="#">プライバシー規約</a>に同意いただける場合はアカウントを作成してください。</div>
                <div class="divider-inner"></div>
                <div class="caution-text">すでにアカウントをお持ちですか？ <a href="login.php">▶︎ サインイン</a><br>
                個人用の購入アカウントですか？ <a href="register.php">▶︎ Gamazonアカウントを作成</a></div>

              </div><!-- input-contents-inner -->
            </div><!-- input-contents -->  
          </div><!-- input-box -->  
    
  
  
        <!-- <div class="input-box">
      <div class="input-contents">
        <div class="input-title">
          ユーザー名</div><div class="input-text"><input type="text" name="username">
        </div>
        <div class="input-contents">
        <div class="input-title">
            パスワード</div><div class="input-text"><input type="password" id="input_pass" name="password">
          <button id="btn_passview">表示</button>
        </div>
        <div>
          <button class="login-btn">登録する</button>
        </div>
        <div class="confirm">
          アカウントをお持ちですか？→
            <a href="login.php">ログイン</a>
        </div> -->
    </form>
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
    
  <script src="js/pw.js"></script>

</body>

</html>