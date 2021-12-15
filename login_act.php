<link rel="stylesheet" type="text/css" href="css/login_act.css" />


<?php
// var_dump($_POST);
// exit();
session_start();
include('functions.php');

// データ受け取り
$username = $_POST['username'];
$password = $_POST['password'];

// DB接続
$pdo = connect_to_db();

// SQL実行
// username，password，is_deletedの3項目全てを満たすデータを抽出する．
$sql = 'SELECT * FROM gamazon_users_table WHERE username=:username AND password=:password AND is_deleted=0';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
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
  echo "<div class='logo'><img src='img/logo.png' class='logo-img'>Gamazon</div></div>";
  echo "<div class='error-msg'>- 認証エラー -</div>";
  echo "<div class='lead-dd'>認証に失敗しました。<br>認証のためのユーザ名またはパスワードをご確認の上再度入力してください。</div>";
  echo "<div class='totop-btn'><a href=login.php>トップページへ</a></div>";
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
  $_SESSION['session_id'] = session_id();
  $_SESSION['is_admin'] = $val['is_admin'];
  $_SESSION['username'] = $val['username'];
  header("Location:index.php");
  exit();
}


// $val = $stmt->fetch(PDO::FETCH_ASSOC);
// if (!$val) {
//   echo "<div class='logo'><img src='img/logo.png' class='logo-img'>Gamazon</div></div>";
//   echo "<div class='error-msg'>- 認証エラー -</div>";
//   echo "<div class='lead-dd'>認証に失敗しました。<br>認証のためのユーザ名またはパスワードをご確認の上再度入力してください。</div>";
//   echo "<div class='totop-btn'><a href=login.php>トップページへ</a></div>";
//   exit();
// } else {
//   $_SESSION = array();
//   $_SESSION['user_id'] = $val['id'];
//   $_SESSION['session_id'] = session_id();
//   $_SESSION['is_admin'] = $val['is_admin'];
//   $_SESSION['username'] = $val['username'];
//   header("Location:index.html");
//   exit();
// }
