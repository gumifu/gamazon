<?php
// POSTデータ確認
// var_dump($_POST);
// exit;

session_start();
include("functions.php");
check_session_id();

if (
    !isset($_POST['comment']) || $_POST['comment'] == '' 
    // !isset($_POST['comment_name']) || $_POST['comment_name'] == ''
    // !isset($_POST['comment']) || $_POST['comment'] == '' //必須項目（todo と deadline）が空で送信されている．
) {
    exit('ParamError'); //<Param> パラメータ
}else{
    $comment_name = $_POST['comment_name'];
}

//データ受け取り

$comment = $_POST['comment'];
$comment_name = $_POST['comment_name'];
$product_id = $_POST['product_id'];

$pdo = connect_to_db();
// var_dump($comment);
// exit;
// var_dump($comment_name);
// var_dump($comment);
// var_dump($product_id);
// exit;
// exit($comment_name);

// DB接続
// 各種項目設定
// $dbn = 'mysql:dbname=gsacf_l06_07;charset=utf8mb4;port=3306;host=localhost';
// $user = 'root'; //ユーザ名
// $pwd = ''; //パスワード

// DB接続 //↓共通のコード
// try {
//     $pdo = new PDO($dbn, $user, $pwd);
// } catch (PDOException $e) {
//     echo json_encode(["db error" => "{$e->getMessage()}"]);
//     exit();
// } //↑共通のコード

// echo 'OK';
// exit;
// exit('OK');
// SQL作成&実行

// var_dump($product_id);
// exit;

$sql = 'INSERT INTO product_comment_table (id, product_id, comment_name, comment, created_at, updated_at) VALUES (NULL, :product_id, :comment_name, :comment, now(), now())';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':product_id', $product_id, PDO::PARAM_STR);
$stmt->bindValue(':comment_name', $comment_name, PDO::PARAM_STR);
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR);
// var_dump($sql);
// exit;
// SQL実行（実行に失敗すると `sql error ...` が出力される）
try {
    $status = $stmt->execute(); //ここでSQLにいく？？？
} catch (PDOException $e) { //失敗時
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}
// exit($status);
//ここで止まっている！！！
// exit('OK');

$sql = 'UPDATE products_table SET updated_at=now() WHERE id=:product_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':product_id', $product_id, PDO::PARAM_STR);

try {
    $status = $stmt->execute(); //ここでSQLにいく？？？
} catch (PDOException $e) { //失敗時
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}
// exit('OK');
//SQL が正常に実行された場合は，データ入力画面に移動することとする
header('Location:./custumer_page.php?id=' . $product_id);
exit();
