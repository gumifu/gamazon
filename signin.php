<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ログイン画面</title>
  <link rel="stylesheet" type="text/css" href="css/signin.css" />

</head>

<body>
  <div class="logo"><img src='img/logo.png' class="logo-img">Gamazon</div>

  <!-- ログイン画面1ページ目 -->
  <form action="signin_act.php" method="POST">
    <h2>ログイン</h2>
    <div class="input-box">
      <div class="input-contents">
        <div class="input-title">
          Eメールまたは携帯電話番号
        </div>
        <div class="input-text">
          <input type="text" name="username">
        </div>
        <div class="input-contents">
          <div class="input-title">
            パスワード</div>
          <div class="input-text"><input type="password" id="input_pass" name="password">
            <button id="btn_passview">表示</button>
          </div>
          <div>
            <button class="next-btn">次に進む</button>
          </div>
        </div>

        <div class="caution-text">Gamazonの<a href="#">利用規約</a>と<a href="#">プライバシー規約</a>に同意いただける場合はログインしてください。</div>

        <div>▶︎&nbsp;<a href="#">お困りですか?</div>

        <div class="confirm-text">初めてGamazonをご利用ですか？</div>

        <div class="register-btn"><a href="_register.php">Gamazonアカウントを作成する</a></div>

  </form>

  <!-- ログイン画面2ページ目 -->
  <form action="signin_act.php" method="POST">
    <h2>ログイン</h2>
    <!-- ここに1ページ目で入力したメールアドレスを表示 -->
    <div><a href="#" alt="" class="mailad-change">変更</a></div>
    <div class="input-box">
      <div class="input-contents">
        <div class="input-title">
          パスワード
        </div>
        <div><a href="#" alt="" class="forget-pw">パスワードを忘れた場合</a></div>
        <div class="input-text"><input type="password" id="input_pass" name="password">
          <button id="btn_passview">表示</button>
        </div>
        <div>
          <button class="signin-btn">ログイン</button>
        </div>
        <label>
          <input type="checkbox" name="level" value="ok">
            ログインしたままにする
        </label>
        <div>
        <button id="detail-btn">詳細</button>
        <p class="balloon">
          <span>
          <p class="bg-gray">[ログインしたままにする] チェックボックス</p>  
          <p class="detail-txt">「ログインしたままにする」を選択すると、このデバイスでログインが求められる回数が減ります。<br>
            お客様のアカウントのセキュリティを保つため、個人でお使いのデバイスでのみこのオプションを使うようにしてください。</span>
          </p>
          </p>  
        </div>
      </div>

      <div class="caution-text">Gamazonの<a href="#">利用規約</a>と<a href="#">プライバシー規約</a>に同意いただける場合はログインしてください。</div>

      <div>▶︎&nbsp;<a href="#">お困りですか?</div>

      <div class="confirm-text">初めてGamazonをご利用ですか？</div>

      <div class="register-btn"><a href="_register.php">Gamazonアカウントを作成する</a></div>

  </form>




  <div class="footer">
    <div class="site-map">
      <div><a href="#" alt="利用規約">利用規約</a></div>
      <div><a href="#" alt="プライバシー規約">プライバシー規約</a></div>
      <div><a href="#" alt="ヘルプ">ヘルプ</a></div>
    </div>
    <div class="copyright">
      Copyright - Gamazon, 2021 All Rights Reserved.
    </div>

  </div>

  <script src="js/signin.js"></script>

</body>

</html>