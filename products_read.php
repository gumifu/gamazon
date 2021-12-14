<?php

// var_dump('a');
// exit();


session_start();
include("functions.php");
check_session_id();

$user_id = $_SESSION['id'];

$pdo = connect_to_db();

$sql = 'SELECT * FROM products_table LEFT OUTER JOIN (SELECT product_id, COUNT(id) AS like_count FROM product_like_table GROUP BY product_id) AS result_table ON products_table.id = result_table.product_id';

$stmt = $pdo->prepare($sql);

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}


$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output = "";
foreach ($result as $record) {
  $output .= "
    <tr>
      <td><img src='{$record["image"]}' height='150px'></td>
      <td>{$record["shop"]}</td>
      <td>{$record["title"]}</td>
      <td>{$record["stars"]}</td>
      <td>{$record["evaluation"]}</td>
      <td>{$record["bestseller_flag"]}</td>
      <td>{$record["category"]}</td>
      <td>{$record["price"]}</td>
      <td>{$record["henpin"]}</td>
      <td>{$record["size"]}</td>
      <td>{$record["size_chart"]}</td>
      <td>{$record["similar"]}</td>
      <td>{$record["product_introduction"]}</td>
      <td>{$record["brand_introduction"]}</td>
      <td>{$record["product_size"]}</td>
      <td>{$record["handling_date"]}</td>
      <td>{$record["manufacturer"]}</td>
      <td>{$record["asin"]}</td>
      <td>{$record["model_number"]}</td>
      <td>{$record["department"]}</td>
      <td>{$record["ranking"]}</td>
      <td>{$record["review"]}</td>
      <td>{$record["updated_at"]}</td>
      <td><a href='like_create.php?user_id={$user_id}&product_id={$record["id"]}'>like{$record["like_count"]}</a></td>
      <td><a href='product_edit.php?id={$record["id"]}'>修正</a></td>
      <td><a href='product_delete.php?id={$record["id"]}'>削除</a></td>
      
    </tr>
  ";
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>商品表示画面</title>
</head>

<body>
  <fieldset>
    <legend>商品表示画面</legend>
    <a href="products_input.php">入力画面</a>
    <a href="products_logout.php">ログアウト</a>
    <table>
      <thead>
        <tr>
          <th>画像</th>
          <th>ショップ</th>
          <th>タイトル</th>
          <th>星の数</th>
          <th>評価数</th>
          <th>ベストセラーフラグ</th>
          <th>カテゴリ</th>
          <th>価格</th>
          <th>返品について</th>
          <th>サイズ</th>
          <th>サイズ表</th>
          <th>この商品を買った人はこんな商品も買っています</th>
          <th>商品紹介</th>
          <th>ブランド紹介</th>
          <th>製品サイズ</th>
          <th>Gamazonでの取り扱い日</th>
          <th>メーカー</th>
          <th>ASIN</th>
          <th>商品モデル番号</th>
          <th>部門</th>
          <th>Gamazon売れ筋ランキング</th>
          <th>レビュー</th>
          <th>更新日</th>
        </tr>
      </thead>
      <tbody>
        <?= $output ?>
      </tbody>
    </table>
  </fieldset>
</body>

</html>