-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- ホスト: localhost
-- 生成日時: 2021 年 12 月 15 日 02:49
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
-- データベース: `gsacf_l06_07`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `gamazon_users_table`
--

CREATE TABLE `gamazon_users_table` (
  `id` int(12) NOT NULL,
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

INSERT INTO `gamazon_users_table` (`id`, `username`, `username_kana`, `email_address`, `password`, `is_admin`, `is_deleted`, `created_at`, `updated_at`) VALUES
(1, 'testuser01', 'テストユーザーゼロイチ', 'testuser01@test.gmail.com', '111', 1, 0, '2021-12-14 11:20:10', '2021-12-14 11:20:10'),
(2, 'testuser02', 'テストユーザーゼロ二', 'testuser02@test.gmail.com', '222', 0, 0, '2021-12-14 11:20:10', '2021-12-14 11:20:10'),
(3, 'testuser03', 'テストユーザーゼロサン', 'testuser03@test.gmail.com', '333', 0, 0, '2021-12-14 11:20:10', '2021-12-14 11:20:10'),
(4, 'testuser04', 'テストユーザーゼロヨン', 'testuser04@test.gmail.com', '444', 0, 0, '2021-12-14 11:20:10', '2021-12-14 11:20:10'),
(5, 'testuser05', 'テストユーザーゼロゴ', 'testuser05@test.gmail.com', '555', 0, 0, '2021-12-14 11:20:10', '2021-12-14 11:20:10');

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
(1, NULL, 'new balance(ニューバランス)', '[ニューバランス] スニーカー ML574(現行モデル) 【Amazon.co.jp限定カラーあり】', '4.4', 4211, 1, 'レディーススニーカー', '6,430', '返品無料（一部対象外）', 'M', '・靴幅: 2E', '1', 'ニューバランスのアイコニックモデルである「574」のデザインラインは保持し、フィット性、クッション性、グリップ性をアップグレードした「ML574」。元々はオフロード対応モデルとして登場し、安定感、グリップ性の高いモデル。', '1906年、米国マサチューセッツ州ボストンでニューバランス社は誕生しました。その後50年間は、整形外科で使用されるアーチサポートや矯正靴を作り続けました。このアーチサポートをシューズに入れると新しいバランス感覚が生まれることから、\"ニューバランス\"という会社名になりました。ニューバランスは、スポーツに真剣に取り組む人々のためのブランドです高品質で斬新なテクノロジーのスポーツシューズとアパレルを、さまざまなサイズとウィズで展開するとうユニークな方法でアスリートのニーズに応えています。', '1 x 1 x 1 cm; 680 g', '2020-06-09', 'New Balance Japan,Inc. =New Balance=', 'B089X39G3N', 'ML574(現行モデル)', 'ユニセックス大人', 1, 1, '2021-12-14 15:01:58', '2021-12-14 15:01:58');

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
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- テーブルの AUTO_INCREMENT `products_table`
--
ALTER TABLE `products_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- テーブルの AUTO_INCREMENT `product_like_table`
--
ALTER TABLE `product_like_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
