-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 12 月 16 日 04:36
-- サーバのバージョン： 10.4.21-MariaDB
-- PHP のバージョン: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- データベース: `gsacf_l06_09`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gamazon_users_table`
--

CREATE TABLE `gamazon_users_table` (
  `id` int(12) NOT NULL,
  `image` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `username` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `username_kana` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `email_address` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `is_admin` int(1) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `gamazon_users_table`
--

INSERT INTO `gamazon_users_table` (`id`, `image`, `username`, `username_kana`, `email_address`, `password`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, NULL, 'testuser01', 'テストユーザーゼロイチ', 'testuser01@test.gmail.com', '111', 1, 0, '2021-12-14 11:20:10', '2021-12-14 11:20:10'),
(2, NULL, 'testuser02', 'テストユーザーゼロ二', 'testuser02@test.gmail.com', '222', 0, 0, '2021-12-14 11:20:10', '2021-12-14 11:20:10'),
(3, NULL, 'testuser03', 'テストユーザーゼロサン', 'testuser03@test.gmail.com', '333', 0, 0, '2021-12-14 11:20:10', '2021-12-14 11:20:10'),
(4, NULL, 'testuser04', 'テストユーザーゼロヨン', 'testuser04@test.gmail.com', '444', 0, 0, '2021-12-14 11:20:10', '2021-12-14 11:20:10'),
(5, NULL, 'testuser05', 'テストユーザーゼロゴ', 'testuser05@test.gmail.com', '555', 0, 0, '2021-12-14 11:20:10', '2021-12-14 11:20:10'),
(6, NULL, 'testuser06', 'aaa', 'aaa', '111', 0, 0, '2021-12-16 11:56:29', '2021-12-16 11:56:29'),
(7, NULL, 'testuser01', 'aaa', 'aaa', '111', 0, 0, '2021-12-16 11:58:58', '2021-12-16 11:58:58'),
(8, NULL, 'testuser07', 'aaa', 'aaa', '111', 0, 0, '2021-12-16 11:59:58', '2021-12-16 11:59:58'),
(9, 'upload/20211216041555e882b9a04b134b82f1e5f857803cda58.png', 'testuser08', 'aaa', 'aaa', '111', 0, 0, '2021-12-16 12:15:55', '2021-12-16 12:15:55'),
(10, 'upload/20211216042022e882b9a04b134b82f1e5f857803cda58.png', 'testuser09', 'aaa', 'aaa', '1111', 0, 0, '2021-12-16 12:20:22', '2021-12-16 12:20:22');

-- --------------------------------------------------------

--
-- テーブルの構造 `products_table`
--

CREATE TABLE `products_table` (
  `id` int(12) NOT NULL,
  `image` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `shop` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `title` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `stars` varchar(999) COLLATE utf8mb4_bin DEFAULT NULL,
  `evaluation` int(128) DEFAULT NULL,
  `bestseller_flag` int(1) DEFAULT NULL,
  `category` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `price` varchar(128) COLLATE utf8mb4_bin NOT NULL,
  `henpin` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `size` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `size_chart` varchar(500) COLLATE utf8mb4_bin DEFAULT NULL,
  `similar` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `product_introduction` varchar(1000) COLLATE utf8mb4_bin DEFAULT NULL,
  `brand_introduction` varchar(1000) COLLATE utf8mb4_bin DEFAULT NULL,
  `product_size` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `handling_date` date DEFAULT NULL,
  `manufacturer` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `asin` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `model_number` varchar(12) COLLATE utf8mb4_bin DEFAULT NULL,
  `department` varchar(128) COLLATE utf8mb4_bin DEFAULT NULL,
  `ranking` int(128) DEFAULT NULL,
  `review` int(128) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `products_table`
--

INSERT INTO `products_table` (`id`, `image`, `shop`, `title`, `stars`, `evaluation`, `bestseller_flag`, `category`, `price`, `henpin`, `size`, `size_chart`, `similar`, `product_introduction`, `brand_introduction`, `product_size`, `handling_date`, `manufacturer`, `asin`, `model_number`, `department`, `ranking`, `review`, `created_at`, `updated_at`) VALUES
(1, NULL, 'new balance(ニューバランス)', '[ニューバランス] スニーカー ML574(現行モデル) 【Amazon.co.jp限定カラーあり】', '4.4', 4211, 1, 'レディーススニーカー', '6,430', '返品無料（一部対象外）', 'M', '・靴幅: 2E', '1', 'ニューバランスのアイコニックモデルである「574」のデザインラインは保持し、フィット性、クッション性、グリップ性をアップグレードした「ML574」。元々はオフロード対応モデルとして登場し、安定感、グリップ性の高いモデル。', '1906年、米国マサチューセッツ州ボストンでニューバランス社は誕生しました。その後50年間は、整形外科で使用されるアーチサポートや矯正靴を作り続けました。このアーチサポートをシューズに入れると新しいバランス感覚が生まれることから、\"ニューバランス\"という会社名になりました。ニューバランスは、スポーツに真剣に取り組む人々のためのブランドです高品質で斬新なテクノロジーのスポーツシューズとアパレルを、さまざまなサイズとウィズで展開するとうユニークな方法でアスリートのニーズに応えています。', '1 x 1 x 1 cm; 680 g', '2020-06-09', 'New Balance Japan,Inc. =New Balance=', 'B089X39G3N', 'ML574(現行モデル)', 'ユニセックス大人', 1, 1, '2021-12-14 15:01:58', '2021-12-14 15:01:58'),
(2, 'upload/202112140913133ffeb14562f67901d57041294cc5eb01.jpg', NULL, 'test', NULL, NULL, NULL, NULL, '1540', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-14 17:13:13', '2021-12-14 17:13:13'),
(3, 'upload/202112140927070b6c68775fe47b15ae2a7655bfc998d3.jpg', NULL, 'test', NULL, NULL, NULL, NULL, '200', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-14 17:27:07', '2021-12-14 17:27:07'),
(4, 'upload/20211215062054fc9218217a82af7eacad07662c579f3c.jpg', NULL, 'testup', NULL, NULL, NULL, NULL, '1540', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-15 14:20:54', '2021-12-15 14:20:54'),
(5, 'upload/2021121509192672dda432ea0c490f47e7994702d9d491.png', 'test2', 'test2', NULL, NULL, NULL, 'test2', '1540', NULL, NULL, NULL, NULL, 'test2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-15 17:19:26', '2021-12-15 17:19:26'),
(6, 'upload/20211215092349b682a603e9579c453b1b6d2019f3b01c.jpg', 'test3', 'test3', NULL, NULL, NULL, 'test3', '1000', NULL, NULL, NULL, NULL, 'aaaaa', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-15 17:23:49', '2021-12-15 17:23:49'),
(7, 'upload/20211215093208bbaa9cf78fa70efed3799ff83f44aa4a.png', 'i-Shirt(アイシャツ)', '[アイシャツ] i-shirt 完全ノーアイロン ストレッチ 超速乾 スリムフィット 長袖 アイシャツ ワイシャツ メンズ ノンアイロン', NULL, NULL, NULL, 'ワイシャツ', '3990', NULL, NULL, NULL, NULL, 'i-Shirt(アイシャツ)は「洗ったらアイロン掛け」というワイシャツの常識を変える完全ノーアイロンシャツです。\r\n夜洗濯をして翌朝には着ることができる「超速乾機能」、ストレスフリーな着心地を実現する「ストレッチ機能」など、着用からお手入れまでの快適性を追求しています。\r\n生地メーカーとの共同開発により、「形態安定性(W&W性)5級」を取得。「完全ノーアイロン」を実現しました。\r\nこだわりの日本製生地はソフトなポリエステルニットで、スポーツウェア等にも使われる高機能素材。体の動きに合わせて生地が伸び縮みする高いストレッチ性が特徴で、動作時の負荷が少なく着用ストレスも軽減します。\r\n完全ノーアイロン、ストレッチ、超速乾の機能で快適な着心地やイージーケア性に優れています。\r\nデザインはシンプルでビジネスーシーンにも取り入れやすくさりげなくおしゃれをアピールできます。', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-15 17:32:08', '2021-12-15 17:32:08');

-- --------------------------------------------------------

--
-- テーブルの構造 `product_like_table`
--

CREATE TABLE `product_like_table` (
  `id` int(12) NOT NULL,
  `user_id` int(12) NOT NULL,
  `product_id` int(12) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- テーブルのデータのダンプ `product_like_table`
--

INSERT INTO `product_like_table` (`id`, `user_id`, `product_id`, `created_at`) VALUES
(1, 1, 1, '2021-12-14 16:10:51');

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `gamazon_users_table`
--
ALTER TABLE `gamazon_users_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `products_table`
--
ALTER TABLE `products_table`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `product_like_table`
--
ALTER TABLE `product_like_table`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルの AUTO_INCREMENT
--

--
-- テーブルの AUTO_INCREMENT `gamazon_users_table`
--
ALTER TABLE `gamazon_users_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- テーブルの AUTO_INCREMENT `products_table`
--
ALTER TABLE `products_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- テーブルの AUTO_INCREMENT `product_like_table`
--
ALTER TABLE `product_like_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
