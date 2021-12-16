<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>認証エラー</title>
  <link rel="stylesheet" type="text/css" href="css/login_act.css" />
</head>

<header>

</header>
<body>
 
<div class="main-contents">
  <div>
    <?= $val ?>
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
</div>


</body>

</html>



<?php
// var_dump($_POST);
// exit();
session_start();
include('functions.php');

// データ受け取り
$email_address = $_POST['email_address'];
$password = $_POST['password'];

// DB接続
$pdo = connect_to_db();

// SQL実行
// username，password，is_deletedの3項目全てを満たすデータを抽出する．
$sql = 'SELECT * FROM gamazon_users_table WHERE email_address=:email_address AND password=:password AND is_deleted=0';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email_address', $email_address, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

// var_dump($status);
// exit();

// ユーザ有無で条件分岐
$val = $stmt->fetch(PDO::FETCH_ASSOC);
if (!$val) {
  echo "<div class='wrapper-padding-medium'>";
  echo "<div class='logo'><img src='img/black_logo.png' class='logo-img'><span class='logo-txt'></span></div>";
  echo "<div class='error-msg'>ご確認ください。</div>";
  echo "<div class='lead-dd'>認証に失敗しました。<br>認証のためのユーザ名またはパスワードをご確認の上再度入力してください。</div>";
  echo "<div class='totop-btn'><a href=login.php>トップページへ</a></div>";
  echo "</div>";
  exit();
} else if ($val['is_admin'] == 1) {
  $_SESSION = array();
  $_SESSION['user_id'] = $val['id'];
  $_SESSION['session_id'] = session_id();
  $_SESSION['is_admin'] = $val['is_admin'];
  $_SESSION['username'] = $val['username'];
  header("Location:products_input.php");
} else {
  $_SESSION = array();
  $_SESSION['user_id'] = $val['id'];
  $_SESSION['image'] = $val['image'];
  $_SESSION['session_id'] = session_id();
  $_SESSION['is_admin'] = $val['is_admin'];
  $_SESSION['username'] = $val['username'];
  header("Location:index.php");
  exit();
}

?>

