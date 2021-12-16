<?php

// var_dump($_GET['id']);
// exit;
session_start();
include("functions.php");
check_session_id();

$user_id = $_SESSION['id'];
$product_id = $_GET['id'];
$user_image =$_SESSION['image'];

$pdo = connect_to_db();

// $sql = 'SELECT * FROM products_table LEFT OUTER JOIN (SELECT product_id, COUNT(id) AS like_count FROM product_like_table GROUP BY product_id) AS result_table ON products_table.id = result_table.product_id';
$sql = "SELECT * FROM products_table WHERE id={$product_id}";
// $stmt->bindValue(':product_id', $_GET['id'], PDO::PARAM_STR);

$stmt = $pdo->prepare($sql);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}


$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
$outputImg = "";

foreach ($result as $record) {
    $outputImg .= "
  <img src='{$record['image']}'/>
  ";
}

foreach ($result as $record) {
    $output .= "
  <div class='newstore'><span class='new_store'><h3>出品者:{$record["shop"]}</h3></span></div>
  <span class='limit_color'><h2>{$record["title"]}</h2></span>
    <p>投稿日時：{$record["updated_at"]}</p>

  ";
}

$output2 = "";
foreach ($result as $record) {
    $output2 .= "
    <span class='font_price'>￥<h2>{$record["price"]}</h2></span>
";
}

$product_updated_at = "";
foreach ($result as $record) {
    $product_updated_at .= "
";
}

$ProductIntro = "";
foreach ($result as $record) {
    $ProductIntro .= "
    <span class='seven_return'><h3>商品説明:</h3> {$record['product_introduction']}</span>
";
}

$sql = 'SELECT * FROM product_comment_table WHERE product_id = :product_id ORDER BY created_at DESC';
$stmt = $pdo->prepare($sql);

$stmt->bindValue(':product_id', $product_id, PDO::PARAM_STR);

try {
    $status = $stmt->execute();
} catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
}

// SQL実行の処理
$result_comment = $stmt->fetchAll(PDO::FETCH_ASSOC);
$output_comment = "";
foreach ($result_comment as $record_comment) {
    $output_comment .= "
    <li class='comment_list'>
    <div style='display:flex'>
        <img src=' {$user_image}' style='clip-path: circle(50% at 50% 50%); width:25px'>
        <div class='list_comment_name'>{$_SESSION['username']}</div>
    </div>
        <div class='list_comment'>{$record_comment["comment"]}</div>
        <div class='list_created_at'>投稿日時：{$record_comment["created_at"]}</div>
    </li>
    ";
}
?>
<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=Shift_JIS" />
    <link rel="stylesheet" type="text/css" href="./css/custumer_page.css" />
    <link href="css/style.css" type="text/css" rel="stylesheet">
    <title>Gamazon.co.jp</title>
    <link rel="icon" href="./img/favicon1.ico" type="image/x-icon">

    <style>
        body {
            font-family: 'Amazon Ember';
        }
    </style>
</head>

<body>
    <header>
        <div class="header_nav">
            <div class="header_container1" id="i_header_container1">
                <div><a href="./index.php"><img src="img/gamazon.png" alt="" class="header_logo"></a></div>
                <div>
                    <div style="font-size: 14px;">こんにちは</div>
                    <div><img src="img/i_location 1.png" alt="">お届け先を選択</div>
                </div>
                <form>
                    <div class="nav_container">
                        <div class="nav_left">
                            <select name="" id="" class="selecter">
                                <option>All</option>
                            </select>
                        </div>
                        <!-- <div class="nav_fill"> -->
                        <input type="text" class="header_search">
                        <!-- </div> -->
                        <div class="nav_right">
                            <img src="img/search 1.png" alt="" style="width: 24px;height: 24px;left: 11px;top: 8px;">
                        </div>
                    </div>
                </form>
                <div><img src="img/japan_flag.png" alt=""></div>
                <div class="header_forsend_container">
                    <div style="font-size: 14px;">こんにちは<?= $_SESSION['username'] ?>さん</div>
                    <div>アカウント＆リスト</div>
                    <p class="arrow_box">ふきだし1</p>
                </div>
                <div class="header_forsend_container">
                    <div>返品もこちら</div>
                    <div>注文履歴</div>
                </div>
                <div class="header_forsend_container">
                    <div><img src="img/cart.png" alt="">カート</div>
                </div>
            </div>
        </div>
        <div class="header_container2">
            <div class="menu-trigger" style="width: auto; height: auto;">
                <p><img src="img/hamburger 1.png" alt="">すべて</p>
            </div>
            <p>Gamazon ポイント:<span style="color: chocolate;">10000000</span></p>
            <p>タイムセール</p>
            <p>Yondle本</p>
            <p>ビューティー＆パーソナルケア</p>
            <p>おもちゃ＆ホビー</p>
            <p>車＆バイク</p>
            <a href="https://www.facebook.com/groups/gsnight" target="_blank" rel="noopener noreferrer"><img src="img/g_s_night.png" alt=""></a>
        </div>
        <div class="batsu_box">
            <span class="batsu" id="batsu"></span>
        </div>
        <nav>
            <div class="hmenu-customer-profile">
                <img src="" alt="" style="clip-path: circle(50% at 50% 50%);">
                <b>こんにちは <?= $_SESSION['username'] ?>さん</b>
            </div>
            <div id="hmenu-content">
                <ul class="hmenu hmenu-visible" data-menu-id="1">
                    <li class="white" style="background-color: #fff !important;">
                        <div class="hmenu-item-title " style="color: #111111; font-weight: bold;">アカウント＆リスト</div>
                    </li>
                    <li><a href="./logout.php" class="hmenu-item">ログアウト</a></li>
                    <li><a href="./products_input.php" class="hmenu-item">商品を売ってみる</a>
                    </li>
                    <li><a href="/gp/movers-and-shakers/?ref_=nav_em_ms_0_1_1_4" class="hmenu-item">人気度ランキング</a></li>
                    <li class="hmenu-separator" style="border-bottom: 1px solid #d5dbdb;padding: 0;margin: 5px 0;"></li>
                    <li>
                        <div class="hmenu-item-title ">デジタルコンテンツ＆デバイス</div>
                    </li>
                    <li><a href="" class="hmenu-item" data-menu-id="2" data-ref-tag="nav_em_1_1_1_6">
                            <div>Prime Video</div><i class="nav-sprite hmenu-arrow-next"></i>
                        </a></li>
                    <li><a href="" class="hmenu-item" data-menu-id="3" data-ref-tag="nav_em_1_1_1_7">
                            <div>Amazon Music</div><i class="nav-sprite hmenu-arrow-next"></i>
                        </a></li>
                    <li><a href="" class="hmenu-item" data-menu-id="4" data-ref-tag="nav_em_1_1_1_8">
                            <div>Android アプリストア</div><i class="nav-sprite hmenu-arrow-next"></i>
                        </a></li>
                    <li><a href="" class="hmenu-item" data-menu-id="5" data-ref-tag="nav_em_1_1_1_9">
                            <div>Echo &amp; Alexa</div><i class="nav-sprite hmenu-arrow-next"></i>
                        </a></li>
                    <li><a href="" class="hmenu-item" data-menu-id="6" data-ref-tag="nav_em_1_1_1_10">
                            <div>Fireタブレット</div><i class="nav-sprite hmenu-arrow-next"></i>
                        </a></li>
                    <li><a href="" class="hmenu-item" data-menu-id="7" data-ref-tag="nav_em_1_1_1_11">
                            <div>Fire TV</div><i class="nav-sprite hmenu-arrow-next"></i>
                        </a></li>
                    <li><a href="" class="hmenu-item" data-menu-id="8" data-ref-tag="nav_em_1_1_1_12">
                            <div>Kindle 本＆電子書籍リーダー</div><i class="nav-sprite hmenu-arrow-next"></i>
                        </a></li>
                    <li><a href="" class="hmenu-item" data-menu-id="9" data-ref-tag="nav_em_1_1_1_13">
                            <div>Audible オーディオブック</div><i class="nav-sprite hmenu-arrow-next"></i>
                        </a></li>
                    <li class="hmenu-separator"></li>
                    <li>
                        <div class="hmenu-item-title ">カテゴリー</div>
                    </li>
                    <li><a href="" class="hmenu-item" data-menu-id="10" data-ref-tag="nav_em_1_1_1_15">
                            <div>本・コミック・雑誌</div><i class="nav-sprite hmenu-arrow-next"></i>
                        </a></li>
                    <li><a href="" class="hmenu-item" data-menu-id="11" data-ref-tag="nav_em_1_1_1_16">
                            <div>DVD・ミュージック・ゲーム</div><i class="nav-sprite hmenu-arrow-next"></i>
                        </a></li>
                    <li><a href="" class="hmenu-item" data-menu-id="12" data-ref-tag="nav_em_1_1_1_17">
                            <div>家電・カメラ・AV機器</div><i class="nav-sprite hmenu-arrow-next"></i>
                        </a></li>
                    <li><a href="" class="hmenu-item" data-menu-id="13" data-ref-tag="nav_em_1_1_1_18">
                            <div>パソコン・オフィス用品</div><i class="nav-sprite hmenu-arrow-next"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="overlay"></div>
    </header>

    <div id="pagebody">
        <div class="main_contents">
            <!-- サブメニュー（左カラム） -->
            <div id="submenu">
                <div class="shoespic">
                    <?= $outputImg ?>
                </div>
                </ul>
            </div>
            <!-- コンテンツ（中央と右の2カラム） -->
            <div id="content">
                <!-- ニュース（中央カラム） -->
                <div id="news">
                    <div class="news_container">
                        <?= $output ?>
                        <hr />
                        <div class=" newprice"><span class="price_font">価格:</span>
                            <span class="font_price"><?= $output2 ?></span><span class="free">&返品:交渉次第</span>
                            <br><?= $product_updated_at ?>
                        </div>
                        <br>
                        <div class="differentsize">
                            <?= $ProductIntro ?> <br>
                        </div>
                        <div style="margin:20px 0px"><span class="font_prime">Prime</span><span class="try_before"> try before you buy</span>
                        </div>
                        <div class="switchArea">
                            <input type="checkbox" id="switch1">
                            <label for="switch1"><span></span></label>
                            <div id="swImg"></div>
                        </div>
                    </div>
                    <!-- ピックアップ（右カラム） -->
                    <div id="pickup">
                        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
                        <h5><span class="share">シェアする</span></h5>
                        <ul class="follow-me">
                            <li><a href="https://www.facebook.com"></a></li>
                            <li><a href="https://twitter.com"></a></li>
                            <li><a href="https://www.youtube.com"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <hr />
        <h2 style="margin-left: 20px;">レビューorコンタクト</h2>
        <div class="comment_input_container" style="display: flex; justify-content:center; width:95%; margin:20px">

            <div class="comment_main" style="width:30%">
                <form action="comment_create.php" method="POST">
                    <fieldset style="border: none;">
                        <legend></legend>
                        <!-- <a href="thread_read.php">スレ画面</a> -->
                        <!-- <div>
                            <div class="comment_titles">
                                名前:
                            </div> -->
                            <input type="hidden" name="comment_name" value="<?= $_SESSION['username'] ?>" style="border: solid 1px black; border-radius:3px padding:0%;margin:10px">
                        <!-- </div> -->
                        <div>
                            <div class="comment_titles">
                            
                            </div>
                            <!-- <input type="text" name="comment" placeholder="Comment"> -->
                            <textarea name="comment" id="" cols="60" rows="5" placeholder="コメントを残す" style="border: solid 1px black; border-radius:3px; padding:0%;margin:10px"></textarea>
                        </div>
                        <div style="width:400px; margin: 0 auto;">
                            <button class="comment_btn">書き込む</button>
                        </div>
                        <input type="hidden" name="product_id" value="<?= $_GET['id'] ?>">
                    </fieldset>
                </form>
            </div>
            <div class="comment_container" style="margin-left: 50px; list-style:none;width:70% ">
                <ul>
                    <?= $output_comment ?>
                </ul>
            </div>

        </div>

        <!-- フッタ -->
        <footer>
            <div class=" footer_back">
                <a href="#i_header_container1">
                    <p>トップへ戻る</p>
                </a>
            </div>
            <!-- <nav> -->
            <div class="footer_logo">
                <img src="./img/gamazon.png" alt="">
                <p>Conditions of UsePrivacy NoticeInterest Based Ads Policy© 2021, Gamazon.com, Inc. oritsaffiliates</p>
            </div>
            <!-- </nav> -->
        </footer>
        <!-- </div> -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous">
        </script>
        <script src="./js/header.js"></script>
</body>

</html>