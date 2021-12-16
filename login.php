<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン画面</title>
  <link rel="stylesheet" type="text/css" href="css/login.css" />

</head>

<body>
  <div class="wrapper-padding-medium">
    <div class="logo"><img src='img/black_logo.png' class="logo-img"><span class="logo-txt"></span></div>
      <div class="main-content">
        <!-- ログイン画面1ページ目 -->
        <form action="login_act.php" method="POST">
          <div class="input-box">
            <div class="input-contents">   
              <div class="input-contents-inner">
                <h1 class="h1-spacing-small">ログイン</h1> 
                <label for="label-email" class="input-title">
                  Eメールまたは携帯電話番号
                </label>
                <div class="input-text">
                  <input type="text" name="email_address">
                </div>
                <div class="input-section">
                  <label for="label-email" class="input-title">
                    パスワード
                  </label>
                  <div class="input-text"><input type="password" id="input_pass" name="password">
                    <!-- <button id="btn_passview">表示</button> -->
                  </div>
                  <div>
                    <button class="login-btn button-style">ログイン</button>
                  </div>
                </div><!-- input-section -->
                <div class="caution-text">Gamazonの<a href="#">利用規約</a>と<a href="#">プライバシー規約</a>に同意いただける場合はログインしてください。</div>

                <div class="">▶︎&nbsp;<a href="#">お困りですか?</div>
              </div><!-- input-contents-inner -->
            </div><!-- input-contents -->
              <div class="confirm-divider">
                <h5>初めてGamazonをご利用ですか？</h5>
              </div>
              <div class="register-btn button-style user-resister-btn"><a href="register.php">Gamazonアカウントを作成する</a></div>
              <div class="register-btn button-style"><a href="shop_register.php">ショップアカウントを作成する</a></div>
          </div><!-- input-box -->   
        </form>
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
  </div>
  <script src="js/pw.js"></script>

</body>

</html>