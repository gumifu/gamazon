<?php
session_start();

include("functions.php");
check_session_id();

$id = $_GET["id"];

$pdo = connect_to_db();

$sql = 'SELECT * FROM products_table WHERE id=:id';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}

$record = $stmt->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>商品情報の編集画面</title>
</head>

<body>
  <form action="product_update.php" method="POST">
    <fieldset>
      <legend>商品情報の編集画面</legend>
      <a href="products_read.php">一覧画面</a>
      <div>
        タイトル: <input type="text" name="title" value="<?= $record["title"] ?>">
      </div>
      <div>
        価格: <input type="text" name="price" value="<?= $record["price"] ?>">
      </div>
      <div>
        <button>決定</button>
      </div>
      <input type="hidden" name="id" value="<?= $record["id"] ?>">
    </fieldset>
  </form>

</body>

</html>