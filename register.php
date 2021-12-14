<!DOCTYPE html>
<html lang="ja">

<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ユーザー登録画面</title>
  <link rel="stylesheet" type="text/css" href="css/login.css" />

</head>

<body>
<div class="wrapper-padding-medium">
    <div class="logo"><img src='img/black_logo.png' class="logo-img"><span class="logo-txt">.co.jp</span></div>
      <div class="main-content">
        <form action="register_act.php" method="POST">
          <div class="input-box">
            <div class="input-contents">   
              <div class="input-contents-inner">
                <h1 class="h1-spacing-small">アカウントを作成</h1> 
                <label for="label-email" class="input-title">
                  Eメールまたは携帯電話番号
                </label>
                <div class="input-text">
                  <input type="text" name="username">
                </div>
                <div class="input-section">
                  <div class="input-title">
                    パスワード
                  </div>
                  <div class="input-text"><input type="password" id="input_pass" name="password">
                    <button id="btn_passview">表示</button>
                  </div>
                  <div>
                    <button class="login-btn button-style">ログイン</button>
                  </div>
                </div><!-- input-section -->
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

  <script src="js/pw.js"></script>

</body>

</html>