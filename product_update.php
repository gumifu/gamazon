<?php
session_start();
include("functions.php");
check_session_id();

if (
  !isset($_POST['title']) || $_POST['title'] == '' ||
  !isset($_POST['price']) || $_POST['price'] == '' ||
  !isset($_POST['id']) || $_POST['id'] == ''
) {
  echo json_encode(["error_msg" => "no input"]);
  exit();
}

$todo = $_POST["title"];
$deadline = $_POST["price"];
$id = $_POST["id"];

$pdo = connect_to_db();

$sql = "UPDATE products_table SET title=:title, price=:price, updated_at=now() WHERE id=:id";

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':title', $title, PDO::PARAM_STR);
$stmt->bindValue(':price', $price, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

header("Location:products_read.php");
exit();
