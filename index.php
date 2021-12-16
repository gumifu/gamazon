<?php
session_start();
include("functions.php");
check_session_id();


$user_id = $_SESSION['id'];
$user_image = $_SESSION['image'];
// var_dump($user_image);
// exit;

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
        <a href='./custumer_page.php?id={$record["id"]}'>
        <div class='item_card_list'>
          <img src='{$record["image"]}' height='150px'>
          <h2>{$record["title"]}</h2>
          <p>{$record["product_introduction"]}</p>
        </div></a>
  ";
}

?>
<!DOCTYPE html>
<html lang="jp">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Gamazon.co.jp</title>
    <link rel='stylesheet' href='https://unpkg.com/ress/dist/ress.min.css'>
    <link rel="icon" href="./img/favicon1.ico" type="image/x-icon">
    <link href="css/style.css" rel="stylesheet">
    <!-- <link href="css/flickity-docs.css" rel="stylesheet"> -->
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="css/slider.css">
    <style>
        body {
            background-color: #E5E5E5;
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
                    <div style="font-size: 14px;"><?= $_SESSION['username'] ?>さん</div>
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
            <a href="https://www.facebook.com/groups/gsnight" target="_blank" rel="noopener noreferrer"><img src="
                img/g_s_night.png" alt=""></a>
        </div>

        <div class="batsu_box">
            <span class="batsu" id="batsu"></span>
        </div>
        <nav>
            <div class="hmenu-customer-profile" style="display: flex;">
                <img src="<?= $_SESSION['image'] ?>" alt="" style="clip-path: circle(50% at 50% 50%); width:25px">
                <b>こんにちは <?= $_SESSION['username'] ?>さん</b>
            </div>

            <div id="hmenu-content">
                <ul class="hmenu hmenu-visible" data-menu-id="1">
                    <li class="white">
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
                        </a></li>
                    <ul class="hmenu-compress-section compressed">
                        <li class="hmenu-mini-divider"></li>
                        <li><a href="" class="hmenu-item" tabindex="-1" data-menu-id="14" data-ref-tag="nav_em_1_1_1_19">
                                <div>ホーム＆キッチン・ペット・DIY</div><i class="nav-sprite hmenu-arrow-next"></i>
                            </a></li>
                        <li><a href="" class="hmenu-item" tabindex="-1" data-menu-id="15" data-ref-tag="nav_em_1_1_1_20">
                                <div>食品・飲料・お酒</div><i class="nav-sprite hmenu-arrow-next"></i>
                            </a></li>
                        <li><a href="" class="hmenu-item" tabindex="-1" data-menu-id="16" data-ref-tag="nav_em_1_1_1_21">
                                <div>ドラッグストア・ビューティー</div><i class="nav-sprite hmenu-arrow-next"></i>
                            </a></li>
                        <li><a href="" class="hmenu-item" tabindex="-1" data-menu-id="17" data-ref-tag="nav_em_1_1_1_22">
                                <div>ベビー・おもちゃ・ホビー</div><i class="nav-sprite hmenu-arrow-next"></i>
                            </a></li>
                        <li><a href="" class="hmenu-item" tabindex="-1" data-menu-id="18" data-ref-tag="nav_em_1_1_1_23">
                                <div>服・シューズ・バッグ ・腕時計</div><i class="nav-sprite hmenu-arrow-next"></i>
                            </a></li>
                        <li><a href="" class="hmenu-item" tabindex="-1" data-menu-id="19" data-ref-tag="nav_em_1_1_1_24">
                                <div>スポーツ＆アウトドア</div><i class="nav-sprite hmenu-arrow-next"></i>
                            </a></li>
                        <li><a href="" class="hmenu-item" tabindex="-1" data-menu-id="20" data-ref-tag="nav_em_1_1_1_25">
                                <div>車＆バイク・産業・研究開発</div><i class="nav-sprite hmenu-arrow-next"></i>
                            </a></li>
                    </ul>
                </ul>
            </div>
        </nav>
        <div class="overlay"></div>
    </header>
    <!-- <div class="body_container"> -->
    <ul class="slider">
        <li><img src="img/amazon_echo.jpg" alt="" style="width: 100%;"></li>
        <li><img src="img/amazon_2.jpg" alt=""></li>
        <li><img src="img/amazon_3.jpg" alt=""></li>
        <li><img src="img/amazon_4.jpg" alt=""></li>
        <!-- <li><img src="img/amazon_5.jpg" alt=""></li> -->
        <!--/slider-->
    </ul>
    <div class="item_card_container">
        <div class="item_card_wrap">
            <?= $output ?>
        </div>
        <!-- </div> -->
        <!-- <div class="gamazon_video">
      <div class="gamazon_video_contents">
        <p>Gamazon Video: Recommended for you</p>
        <iframe width="560" height="315" src="https://www.youtube.com/embed/3GdMDYf_uN4" title="YouTube video player"
          frameborder="0"
          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
          allowfullscreen></iframe>
      </div>
      <div class="gamazon_video_contents">
        <p>BOXデザイン004</p>
        <img src="img/300x180.png">
      </div>
    </div> -->

    </div>
    <footer>
        <div class="footer_back">
            <a href="#i_header_container1">
                <p>トップへ戻る</p>
            </a>
        </div>
        <!-- <nav> -->
        <div class="footer_logo">
            <img src="./img/gamazon.png" alt="">
            <small>Conditions of UsePrivacy NoticeInterest Based Ads Policy© 2021, Gamazon.com, Inc. or its affiliates</small>
        </div>
        <!-- </nav> -->
    </footer>


    <!-- <script src="./js/flickity-docs.min.js"></script> -->
    <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <!--自作のJS-->
    <script src="./js/slider.js"></script>
    <script src="./js/header.js"></script>

</body>

</html>