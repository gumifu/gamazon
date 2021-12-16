<?php

// echo'<pre>';
// var_dump($_POST);
// echo'</pre>';
// exit();

session_start();
include("functions.php");
// check_session_id();

// var_dump('OK');
// exit;

if (
  !isset($_POST['username']) || $_POST['username'] == '' ||
  !isset($_POST['username_kana']) || $_POST['username_kana'] == '' ||
  !isset($_POST['email_address']) || $_POST['email_address'] == '' ||
  !isset($_POST['password']) || $_POST['password'] == ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit('paramError');
}

$username = $_POST["username"];
$username_kana = $_POST["username_kana"];
$email_address = $_POST["email_address"];
$password = $_POST["password"];

// echo'<pre>';
// var_dump($_POST["username"]);
// echo'</pre>';


// 画像データの確認
if (isset($_FILES['upfile']) && $_FILES['upfile']['error'] == 0) {
  // 送信が正常に行われたときの処理
  $uploaded_file_name = $_FILES['upfile']['name'];
  $temp_path  = $_FILES['upfile']['tmp_name'];
  $directory_path = 'upload/';

  $extension = pathinfo($uploaded_file_name, PATHINFO_EXTENSION);
  $unique_name = date('YmdHis').md5(session_id()) . '.' . $extension;
  $save_path = $directory_path . $unique_name;

  if (is_uploaded_file($temp_path)) {
    if (move_uploaded_file($temp_path, $save_path)) {
      chmod($save_path, 0644);
      // $img = '<img src="'. $save_path . '" >';
    } else {
      exit('Error:アップロードできませんでした');
    }
  } else {
    exit('Error:画像がありません');
  }

} else {
  exit('Error:画像が送信されていません');
}



$pdo = connect_to_db();


$sql = 'SELECT COUNT(*) FROM gamazon_users_table WHERE username=:username';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

if ($stmt->fetchColumn() > 0) {
  echo '<p>すでに登録されているユーザです．</p>';
  echo '<a href="login.php">login</a>';
  exit();
}

$sql = 'SELECT * FROM gamazon_users_table WHERE username=:username AND password=:password AND is_deleted=0';

$sql = 'INSERT INTO gamazon_users_table(id, image, username, username_kana, email_address, password, is_admin, is_deleted, created_at, updated_at) VALUES(NULL, :image, :username, :username_kana, :email_address, :password, 1, 0, now(), now())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':image', $save_path, PDO::PARAM_STR);
$stmt->bindValue(':username', $username, PDO::PARAM_STR);
$stmt->bindValue(':username_kana', $username_kana, PDO::PARAM_STR);
$stmt->bindValue(':email_address', $email_address, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:login.php");
exit();


