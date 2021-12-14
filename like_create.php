<?php
// var_dump($_GET);
// exit();

include('functions.php');

$user_id = $_GET['user_id'];
$todo_id = $_GET['product_id'];

$pdo = connect_to_db();

$sql = 'SELECT COUNT(*) FROM product_like_table WHERE user_id=:user_id AND product_id=:product_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':product_id', $product_id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$like_count = $stmt->fetchColumn();

if ($like_count != 0) {
  $sql = 'DELETE FROM product_like_table WHERE user_id=:user_id AND product_id=:product_id';
} else {
  $sql = 'INSERT INTO product_like_table (id, user_id, product_id, created_at) VALUES (NULL, :user_id, :product_id, sysdate())';
}

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
$stmt->bindValue(':product_id', $product_id, PDO::PARAM_STR);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:products_read.php");
exit();
