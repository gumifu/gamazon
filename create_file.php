<?php

// echo'<pre>';
// var_dump($_FILES);
// echo'</pre>';
// exit();

session_start();
include("functions.php");
check_session_id();

if (
  !isset($_POST['title']) || $_POST['title'] == '' ||
  !isset($_POST['price']) || $_POST['price'] == ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

$title = $_POST['title'];
$price = $_POST['price'];


// ここからファイルアップロード&DB登録の処理

// 他ファイル読み込み，POSTデータの受け取りなど

// データの確認
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

// ファイル保存処理など

$pdo = connect_to_db();

$sql = 'INSERT INTO products_table(id, title, price, image, created_at, updated_at) VALUES(NULL, :title, :price, :image, sysdate(), sysdate())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':price', $price, PDO::PARAM_STR);
$stmt->bindValue(':image', $save_path, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:products_input.php");
exit();