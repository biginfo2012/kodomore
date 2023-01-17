-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- ホスト: mysql2015.db.sakura.ne.jp
-- 生成日時: 2021 年 1 月 25 日 20:50
-- サーバのバージョン： 5.7.32-log
-- PHP のバージョン: 7.1.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

--
-- データベース: `kodomore_db_develop`
--

-- --------------------------------------------------------

--
-- テーブルの構造 `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_age`
--

CREATE TABLE `t_age` (
  `age_id` int(11) NOT NULL COMMENT '年齢ID',
  `age_info` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '年齢範囲'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='年齢マスタ（削除予定??）';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_area`
--

CREATE TABLE `t_area` (
  `area_id` bigint(20) UNSIGNED NOT NULL COMMENT '地域ID',
  `area_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '地域名',
  `prefecture_id` int(11) DEFAULT NULL COMMENT '都道府県ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='地域テーブル';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_articles`
--

CREATE TABLE `t_articles` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '記事ID',
  `title` varchar(255) DEFAULT NULL COMMENT 'タイトル',
  `post_date` date DEFAULT NULL COMMENT '投稿日',
  `prefecture_id` int(11) DEFAULT NULL COMMENT '都道府県ID',
  `main_img` varchar(255) DEFAULT NULL COMMENT 'イメージ',
  `main_text` mediumtext COMMENT '記事',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '作成日',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='記事テーブル';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_articles_comments`
--

CREATE TABLE `t_articles_comments` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '記事コメントID',
  `article_id` int(11) DEFAULT NULL COMMENT '記事ID',
  `user_id` int(11) DEFAULT NULL COMMENT 'ユーザーID',
  `user_name` varchar(255) DEFAULT NULL COMMENT 'ユーザー名',
  `title` varchar(255) DEFAULT NULL COMMENT 'タイトル',
  `content` varchar(255) DEFAULT NULL COMMENT '記事の内容',
  `user_group` int(11) DEFAULT NULL,
  `attention` int(11) DEFAULT '0' COMMENT '記事のコメントに対する注目した!の数',
  `help` int(11) DEFAULT '0' COMMENT '記事のコメントに対する役に立った!の数',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新日',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '作成日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='記事コメントテーブル';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_articles_comments_follow`
--

CREATE TABLE `t_articles_comments_follow` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID',
  `comment_id` int(11) DEFAULT NULL COMMENT '記事コメントID',
  `user_id` int(11) DEFAULT NULL COMMENT 'ユーザID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='記事のコメントに対するフォロー数';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_articles_content`
--

CREATE TABLE `t_articles_content` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'コンテンツID',
  `article_id` int(11) DEFAULT NULL COMMENT '記事ID',
  `img` varchar(255) DEFAULT NULL COMMENT 'サブ写真',
  `sub_title` varchar(255) DEFAULT NULL COMMENT 'サブタイトル',
  `sub_text` mediumtext COMMENT 'サブ本文',
  `item_order` int(11) DEFAULT NULL COMMENT '表示順序',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '作成日',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='記事コンテンツテーブル';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_articles_profile`
--

CREATE TABLE `t_articles_profile` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID',
  `user_id` int(11) DEFAULT NULL COMMENT '投稿者ID',
  `post_name_setting` int(11) DEFAULT NULL COMMENT '表示名設定',
  `post_name` varchar(255) DEFAULT NULL COMMENT '表示名',
  `second_name_setting` int(11) DEFAULT NULL COMMENT '肩書き設定｜0：非表示｜1：表示',
  `second_name` varchar(255) DEFAULT NULL,
  `profile_img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='記事投稿者';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_child_garden`
--

CREATE TABLE `t_child_garden` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT '基本ID',
  `child_id` int(11) NOT NULL COMMENT '子供ID',
  `type` int(11) DEFAULT NULL COMMENT '園種類｜1：卒業した学園の場合｜2：入学予定の学園の場合',
  `garden_id` int(11) DEFAULT NULL COMMENT '学園ID',
  `garden_detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '学園に対してのコメント'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='子供学園情報テーブル';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_city`
--

CREATE TABLE `t_city` (
  `city_id` bigint(20) UNSIGNED NOT NULL COMMENT '都市マスタID',
  `prefecture_id` bigint(20) NOT NULL COMMENT '都道府県ID',
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '都市名'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='都市マスタ';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_city_area`
--

CREATE TABLE `t_city_area` (
  `city_id` bigint(20) UNSIGNED NOT NULL COMMENT '都市ID',
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '都市名',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '作成日',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新日',
  `area_id` bigint(20) NOT NULL COMMENT '地域ID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='地域マスタ';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_close_day`
--

CREATE TABLE `t_close_day` (
  `close_day_id` bigint(20) NOT NULL,
  `garden_id` bigint(20) NOT NULL,
  `saturday` tinyint(4) DEFAULT NULL,
  `sunday` tinyint(4) DEFAULT NULL,
  `holiday` tinyint(4) DEFAULT NULL,
  `GW` tinyint(4) DEFAULT NULL,
  `GW_remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `summer` tinyint(4) DEFAULT NULL,
  `summer_remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `winter` tinyint(4) DEFAULT NULL,
  `winter_remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `spring` tinyint(4) DEFAULT NULL,
  `spring_remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='休園日情報';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_close_day_detail`
--

CREATE TABLE `t_close_day_detail` (
  `close_day_detail_id` bigint(20) NOT NULL,
  `close_day_id` bigint(20) NOT NULL,
  `close_day_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `close_day_detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='休園日詳細情報';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_event`
--

CREATE TABLE `t_event` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `event_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_source_edit_by` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_source_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `event_photo_under` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_exit_history`
--

CREATE TABLE `t_exit_history` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '退園履歴ID',
  `user_id` int(11) DEFAULT NULL COMMENT 'ユーザID',
  `reason` mediumtext COMMENT '退園理由',
  `use_rate` int(11) DEFAULT NULL COMMENT 'ユーザー評価',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '作成日',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学園退園履歴テーブル';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_experience`
--

CREATE TABLE `t_experience` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT '体験ID',
  `experience_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'タイトル'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='体験テーブル';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_faq`
--

CREATE TABLE `t_faq` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'よくある質問ID',
  `question` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '質問',
  `answer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '回答',
  `type` int(11) DEFAULT NULL COMMENT '1: 保育内容について 2: 園の給食･おやつについて 3: 持ち物について 4: 入園について',
  `garden_id` int(11) DEFAULT NULL COMMENT '学園ID',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '作成日',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='よくある質問テーブル';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_favourite`
--

CREATE TABLE `t_favourite` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'いいねID',
  `user_id` int(11) NOT NULL COMMENT 'ユーザーID',
  `image_id` int(11) DEFAULT NULL COMMENT '画像ID',
  `updated_at` datetime DEFAULT NULL COMMENT '更新日',
  `created_at` datetime DEFAULT NULL COMMENT '作成日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='画像いいね履歴';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_feature`
--

CREATE TABLE `t_feature` (
  `feature_id` bigint(20) NOT NULL COMMENT '特徴ID',
  `garden_id` bigint(20) NOT NULL COMMENT '学園ID',
  `feature` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '特徴コメント'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='園特徴';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_garden`
--

CREATE TABLE `t_garden` (
  `garden_id` bigint(20) UNSIGNED NOT NULL COMMENT '学園ID',
  `garden_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '学園名',
  `garden_name_second` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '学園名フリガナ',
  `garden_public_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '学園法人名',
  `garden_public_name_second` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '学園法人名フリガナ',
  `prefecture_id` bigint(20) NOT NULL COMMENT '都道府県ID',
  `city_id` bigint(20) NOT NULL COMMENT '都市ID',
  `town_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '都市名',
  `garden_age_id` bigint(20) DEFAULT NULL COMMENT '年齢ID',
  `kind_id` int(11) NOT NULL COMMENT '種類ID',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '住所',
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '郵便番号',
  `religion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '関係',
  `elementary_school` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '付属学校',
  `higher_school` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '中学校',
  `high_school` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '高校',
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '場所',
  `bus_route` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'バスルート',
  `bus_route_img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'バスルート画像',
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '状態',
  `photo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '写真',
  `photo_attachment` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '写真コメント',
  `photo_type` int(11) DEFAULT NULL COMMENT 'ロゴイメージ形式｜0：横｜1：??｜2：??',
  `comment_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'コメントタイトル',
  `comment_description` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'コメント説明',
  `monthly_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '月謝',
  `deposit_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '入金手数料',
  `founding` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '創立年月日',
  `capacity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '能力',
  `working_time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '勤務時間',
  `close_day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '休日',
  `distribution_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '配布日',
  `reception_date` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '受付日',
  `recruitment_status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '募集ステータス',
  `exam_fee` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '試験料',
  `document_request` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '書類申請',
  `document_submit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '書類提出',
  `entrance_fee` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '入学金',
  `payment_procedure` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '支払い手続き',
  `entrance_remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '入園について補足',
  `reception_place` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '受付場所',
  `individual_conclusion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '個別結果',
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '電話番号',
  `mobile_second` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '電話番号2',
  `fax` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'FAX',
  `url` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '学園URL',
  `contact_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '受付担当者名',
  `contact_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '受付担当者アドレス',
  `review` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'レビュー',
  `story_teacher` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '園長先生の言葉',
  `map_setting` int(11) DEFAULT NULL COMMENT 'MAP設定',
  `map_iframe` mediumtext COLLATE utf8mb4_unicode_ci COMMENT 'MAPフレーム'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='学園テーブル';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_garden_age`
--

CREATE TABLE `t_garden_age` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '保育対象年齢ID',
  `start_age` varchar(255) DEFAULT NULL COMMENT '開始 歳',
  `start_month` varchar(255) DEFAULT NULL COMMENT '開始 日or月',
  `end_age` varchar(255) DEFAULT NULL COMMENT '最後 歳',
  `end_month` varchar(255) DEFAULT NULL COMMENT '最後 日or月',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '作成日',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='保育対象年齢';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_garden_direction`
--

CREATE TABLE `t_garden_direction` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '学園アクセスID',
  `garden_id` int(11) DEFAULT NULL COMMENT '学園ID',
  `start_target` varchar(255) DEFAULT '' COMMENT '出発地点',
  `direction` varchar(255) DEFAULT NULL COMMENT '方向',
  `during_time` varchar(255) DEFAULT NULL COMMENT '時間'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学園アクセス';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_garden_event`
--

CREATE TABLE `t_garden_event` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `garden_id` bigint(20) NOT NULL,
  `event_id` bigint(20) NOT NULL,
  `point` int(11) NOT NULL,
  `point_detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_garden_experience`
--

CREATE TABLE `t_garden_experience` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT '体験入園ID',
  `garden_id` bigint(20) NOT NULL COMMENT 'サブキャプション',
  `experience_id` bigint(20) NOT NULL COMMENT '体験ID',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '作成日',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='体験入園';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_garden_favourite`
--

CREATE TABLE `t_garden_favourite` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'いいねID',
  `user_id` int(11) DEFAULT NULL COMMENT 'ユーザID',
  `garden_id` int(11) DEFAULT NULL COMMENT '園ID',
  `favourite_date` date DEFAULT NULL COMMENT 'いいねした日付',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '作成日',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='園に対するいいね情報テーブル';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_garden_img`
--

CREATE TABLE `t_garden_img` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT '画像ID',
  `garden_id` bigint(20) NOT NULL COMMENT '園ID',
  `img` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'イメージ',
  `img_source` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '提供元',
  `caption` text COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '説明文',
  `favourite` int(11) NOT NULL DEFAULT '0' COMMENT 'いいね数',
  `type` int(11) NOT NULL DEFAULT '1',
  `top` int(11) NOT NULL DEFAULT '0' COMMENT 'TOPイメージ',
  `public_type` int(11) NOT NULL DEFAULT '0' COMMENT '公開状態｜0:公開｜1:非公開',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '作成日',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='学園画像情報テーブル';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_garden_keyword`
--

CREATE TABLE `t_garden_keyword` (
  `id` int(11) NOT NULL COMMENT '主キー',
  `garden_id` bigint(20) DEFAULT NULL COMMENT '園ID',
  `keyword_id` int(11) DEFAULT NULL COMMENT 'キーワードID'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='学園別キーワード（中間）';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_garden_main_uniform`
--

CREATE TABLE `t_garden_main_uniform` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '制服情報ID',
  `image_id` int(11) DEFAULT NULL COMMENT '画像ID',
  `image_type` varchar(255) DEFAULT NULL,
  `garden_id` int(11) DEFAULT NULL COMMENT '園ID',
  `order_item` int(11) DEFAULT NULL COMMENT '表示順序',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '作成日',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='学園制服情報テーブル';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_garden_media`
--

CREATE TABLE `t_garden_media` (
  `media_id` bigint(20) UNSIGNED NOT NULL COMMENT '学園メディアID',
  `garden_id` bigint(20) NOT NULL COMMENT '学園ID',
  `media_type` int(11) NOT NULL COMMENT 'メディアの種類｜1：情報誌｜2：新聞｜3：ラジオ｜4：地上波TV｜5：CS｜6：BS｜7：ネット',
  `media_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'メディア名',
  `media_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'メディアタイトル',
  `public_type` int(11) DEFAULT '0' COMMENT '公開状態｜1：公開｜0：非公開',
  `public_time` datetime DEFAULT NULL COMMENT '公開時間',
  `public_date` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '公開日付',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '作成日',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='学園メディア';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_garden_media_content`
--

CREATE TABLE `t_garden_media_content` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT '学園メディア内容ID',
  `media_id` bigint(20) NOT NULL COMMENT '学園メディアID',
  `content` text COLLATE utf8mb4_unicode_ci COMMENT '内容',
  `order` int(11) DEFAULT NULL COMMENT '表示順序',
  `created` timestamp NULL DEFAULT NULL COMMENT '作成日',
  `updated` timestamp NULL DEFAULT NULL COMMENT '更新日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='学園メディア内容';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_garden_media_img`
--

CREATE TABLE `t_garden_media_img` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'メディアイメージID',
  `media_id` bigint(20) NOT NULL COMMENT '画像メディアID',
  `img_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '画像ID',
  `order` int(11) NOT NULL COMMENT '表示順序'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='メディアイメージ';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_garden_media_subtitle`
--

CREATE TABLE `t_garden_media_subtitle` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'メディアタイトルID',
  `media_id` bigint(20) NOT NULL COMMENT 'メディアID',
  `subtitle` text COLLATE utf8mb4_unicode_ci COMMENT '部分タイトル',
  `order` int(11) DEFAULT NULL COMMENT '表示順序'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='メディアタイトル';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_garden_media_youtube`
--

CREATE TABLE `t_garden_media_youtube` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'メディアYouTubeID',
  `media_id` bigint(20) NOT NULL COMMENT 'メディアID',
  `url` text COLLATE utf8mb4_unicode_ci COMMENT 'URL',
  `order` int(11) DEFAULT NULL COMMENT '表示順序'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='メディアYouTubeID';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_garden_notification`
--

CREATE TABLE `t_garden_notification` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT '緊急のお知らせID',
  `garden_id` bigint(20) NOT NULL COMMENT '園ID',
  `type` int(11) DEFAULT '1' COMMENT '表示状態｜0：非表示｜1：表示',
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '内容'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='緊急のお知らせ';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_garden_tag`
--

CREATE TABLE `t_garden_tag` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT '学園タグ（中間テーブル）ID',
  `garden_id` bigint(20) NOT NULL COMMENT '学園ID',
  `tag_id` bigint(20) NOT NULL COMMENT 'タグID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='学園タグ（中間）';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_garden_tag_content`
--

CREATE TABLE `t_garden_tag_content` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT '学園タグ内容ID',
  `garden_id` bigint(20) NOT NULL COMMENT '学園ID',
  `tag_type_id` bigint(20) NOT NULL COMMENT 'タグ種類ID',
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '内容'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='学園タグ内容';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_garden_time`
--

CREATE TABLE `t_garden_time` (
  `garden_time_id` bigint(20) NOT NULL,
  `garden_id` bigint(20) NOT NULL COMMENT '学園ID',
  `time_kind` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '項目',
  `detail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '詳細',
  `date_datail` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '日付詳細'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='預かり時間';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_garden_time_detail`
--

CREATE TABLE `t_garden_time_detail` (
  `garden_time_detail_id` bigint(20) NOT NULL COMMENT '預かり時間詳細ID',
  `garden_time_id` bigint(20) NOT NULL COMMENT '預かり時間ID',
  `time_kind_second` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '項目名',
  `start_hour` tinytext COLLATE utf8mb4_unicode_ci COMMENT '開始時刻（時）',
  `start_minute` tinytext COLLATE utf8mb4_unicode_ci COMMENT '開始時刻（分）',
  `end_hour` tinytext COLLATE utf8mb4_unicode_ci COMMENT '終了時刻（時）',
  `end_minute` tinytext COLLATE utf8mb4_unicode_ci COMMENT '終了時刻（分）',
  `all_day` tinyint(4) DEFAULT NULL COMMENT '24時間営業フラグ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='預かり時間詳細';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_garden_time_remark`
--

CREATE TABLE `t_garden_time_remark` (
  `garden_time_remark_id` bigint(20) NOT NULL COMMENT '預かり時間備考',
  `garden_id` bigint(20) NOT NULL COMMENT '学園ID',
  `display` tinyint(4) DEFAULT NULL COMMENT '表示フラグ0:非表示・1:表示',
  `remark` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '備考'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='預かり時間備考';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_garden_type`
--

CREATE TABLE `t_garden_type` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '学園種類（中間）ID',
  `type_id` int(11) DEFAULT NULL COMMENT '種類ID',
  `garden_id` int(11) DEFAULT NULL COMMENT '学園ID'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='学園種類（中間）';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_goods`
--

CREATE TABLE `t_goods` (
  `id` bigint(20) NOT NULL COMMENT '学園制服画像ID',
  `garden_id` bigint(20) DEFAULT NULL COMMENT '学園ID',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'タイトル',
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '画像ファイル名',
  `caption` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT '説明文',
  `img_source` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '提供元',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '作成日',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新日'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='学園制服画像テーブル';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_keyword`
--

CREATE TABLE `t_keyword` (
  `keyword_id` int(11) NOT NULL COMMENT 'キーワードID',
  `keyword_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'タイトル'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='キーワードマスタ';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_kind`
--

CREATE TABLE `t_kind` (
  `kind_id` int(10) UNSIGNED NOT NULL COMMENT '種類ID',
  `kind_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '種類名',
  `sort_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='私立・公立・国立';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_message`
--

CREATE TABLE `t_message` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'メール履歴ID',
  `user_id` int(11) DEFAULT NULL COMMENT 'ユーザーID',
  `email` varchar(255) DEFAULT NULL COMMENT 'メールアドレス',
  `type` varchar(255) DEFAULT NULL COMMENT 'メール形態｜parent: 保護者登録時確認メール| normal: 一般ユーザー登録時確認メール| forget: パスワードを忘れた時のメール| modify: ユーザー情報変更時のメール',
  `name` varchar(255) DEFAULT NULL COMMENT '名前',
  `token` varchar(255) DEFAULT NULL COMMENT '認証コード',
  `read_status` varchar(255) DEFAULT NULL COMMENT '既読状態｜0：未読｜1：既読',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '作成日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='メール履歴';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_meta`
--

CREATE TABLE `t_meta` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'メタID',
  `garden_id` int(11) DEFAULT NULL COMMENT '学園ID',
  `tag_1` varchar(255) DEFAULT NULL COMMENT 'タグ1',
  `tag_2` varchar(255) DEFAULT NULL COMMENT 'タグ2',
  `tag_3` varchar(255) DEFAULT NULL COMMENT 'タグ3',
  `tag_4` varchar(255) DEFAULT NULL COMMENT 'タグ4',
  `tag_5` varchar(255) DEFAULT NULL COMMENT 'タグ5',
  `tag_6` varchar(255) DEFAULT NULL COMMENT 'タグ6',
  `tag_7` varchar(255) DEFAULT NULL COMMENT 'タグ7',
  `meta_title` varchar(255) DEFAULT NULL COMMENT 'メタタイトル',
  `meta_description` varchar(255) DEFAULT NULL COMMENT 'メタ説明',
  `memo` mediumtext COMMENT 'メモ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='メタ設定';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_news`
--

CREATE TABLE `t_news` (
  `news_id` bigint(20) NOT NULL COMMENT 'ニュースID',
  `prefecture_id` int(11) DEFAULT NULL COMMENT '都道府県ID',
  `city_id` int(11) NOT NULL COMMENT '都市ID',
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'タイトル',
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT '説明',
  `img` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'イメージ',
  `peroid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '期間',
  `place` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '場所',
  `time` varchar(255) CHARACTER SET utf8mb4 DEFAULT NULL COMMENT '時間',
  `member` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'メンバー',
  `fee` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '金額',
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT 'URL',
  `mobile` varchar(255) DEFAULT NULL COMMENT '電話番号',
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci COMMENT '備考',
  `created_at` date DEFAULT NULL COMMENT '作成日'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='学園ニュース';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_news_comments`
--

CREATE TABLE `t_news_comments` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ニュースコメントID',
  `news_id` int(11) DEFAULT NULL COMMENT 'ニュースID',
  `user_id` int(11) DEFAULT NULL COMMENT 'ユーザID',
  `user_name` varchar(255) DEFAULT NULL COMMENT 'ユーザー名',
  `title` varchar(255) DEFAULT NULL COMMENT 'タイトル',
  `content` varchar(255) DEFAULT NULL COMMENT '記事内容',
  `user_group` int(11) DEFAULT NULL,
  `attention` int(11) DEFAULT '0',
  `help` int(11) DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新日',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '作成日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ニュースコメント';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_news_comments_follow`
--

CREATE TABLE `t_news_comments_follow` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID',
  `comment_id` int(11) DEFAULT NULL COMMENT 'ニュースコメントID',
  `user_id` int(11) DEFAULT NULL COMMENT 'ユーザID'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ニュースコメントに対するフォロー数';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_news_profile`
--

CREATE TABLE `t_news_profile` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID',
  `user_id` int(11) DEFAULT NULL COMMENT '投稿者ID',
  `post_name_setting` int(11) DEFAULT NULL COMMENT '表示名説明',
  `post_name` varchar(255) DEFAULT NULL COMMENT '表示名',
  `second_name_setting` int(11) DEFAULT NULL,
  `second_name` varchar(255) DEFAULT NULL COMMENT 'nickname',
  `profile_img` varchar(255) DEFAULT NULL COMMENT 'プロフィールイメージ'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ニュース投稿者';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_prefecture`
--

CREATE TABLE `t_prefecture` (
  `prefecture_id` bigint(20) UNSIGNED NOT NULL COMMENT '都道府県のid',
  `prefecture_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '都道府県名',
  `is_active` tinyint(4) NOT NULL COMMENT '0：園情報がない都道府県｜1：園情報がある都道府県'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='都道府県';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_price`
--

CREATE TABLE `t_price` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'ID',
  `garden_id` int(11) DEFAULT NULL COMMENT '学園ID',
  `type` varchar(255) DEFAULT '' COMMENT '費用形態| enter_price: 入園時にかかる費用| year_price: 年間費用| month_price: 月額費用| over_price: 時間外預かり費用| other_price: その他特別費用| uniform_price : 制服･オリジナルアイテム',
  `item_title` varchar(255) DEFAULT NULL COMMENT '学費タイトル',
  `sale` varchar(255) DEFAULT NULL COMMENT '金額',
  `sale_contain` varchar(255) DEFAULT NULL COMMENT '金額（税込み）',
  `public_status` varchar(255) DEFAULT NULL COMMENT '公開状態｜0:非表示｜1:表示',
  `add_info` mediumtext COMMENT '追加情報'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学費';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_review`
--

CREATE TABLE `t_review` (
  `id` int(10) UNSIGNED NOT NULL COMMENT 'レビューID',
  `garden_id` int(11) DEFAULT NULL COMMENT '学園ID',
  `user_id` int(11) DEFAULT NULL COMMENT 'レビュー投稿者ID',
  `post_name` varchar(255) DEFAULT NULL COMMENT '投稿者名',
  `nick_name` varchar(255) DEFAULT NULL COMMENT 'ニックネーム',
  `profile_img_setting` int(11) DEFAULT NULL COMMENT '0：非公開｜1：公開',
  `relation_type` int(11) DEFAULT NULL COMMENT 'レビュー提供ページで「投稿者とスクールの関係［公開表示されます］」 1:在園 / 保護者| 2:卒園 / 保護者| 3:卒園 / 本人| 4:在校 / 保護者| 5:卒業 / 保護者| 6:卒業 / 本人',
  `relation_value` varchar(255) DEFAULT NULL COMMENT '関連本文',
  `eval1_rate` float DEFAULT NULL COMMENT '評価１',
  `eval1_text` mediumtext COMMENT '評価解説1',
  `eval2_rate` float DEFAULT NULL COMMENT '評価２',
  `eval2_text` mediumtext COMMENT '評価解説2',
  `eval3_rate` float DEFAULT NULL COMMENT '評価３',
  `eval3_text` mediumtext COMMENT '評価解説３',
  `eval4_rate` float DEFAULT NULL COMMENT '評価４',
  `eval4_text` mediumtext COMMENT '評価解説4',
  `eval5_rate` float DEFAULT NULL COMMENT '評価５',
  `eval5_text` mediumtext COMMENT '評価解説５',
  `eval6_rate` float DEFAULT NULL COMMENT '評価６',
  `eval6_text` mediumtext COMMENT '評価解説６',
  `eval7_rate` float DEFAULT NULL COMMENT '評価７',
  `eval7_text` mediumtext COMMENT '評価解説７',
  `eval8_rate` float DEFAULT NULL COMMENT '評価８',
  `eval8_text` mediumtext COMMENT '評価解説８',
  `total_rate` float DEFAULT NULL COMMENT '総合評価',
  `total_text` varchar(255) DEFAULT NULL COMMENT '総合評価解説',
  `title` varchar(255) DEFAULT NULL COMMENT 'タイトル',
  `up_date` varchar(255) DEFAULT '' COMMENT '投稿日',
  `attention` int(11) DEFAULT '0' COMMENT '注目数',
  `help` int(11) DEFAULT '0' COMMENT '助け数'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学園レビュー';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_review_image`
--

CREATE TABLE `t_review_image` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '学園レビューイメージID',
  `img_id` int(11) DEFAULT NULL COMMENT '画像ID',
  `review_id` int(11) DEFAULT NULL COMMENT 'レビューID',
  `reflect_status` int(11) DEFAULT NULL COMMENT '1：反映｜2：反映しない'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学園レビューイメージ';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_review_reflect`
--

CREATE TABLE `t_review_reflect` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '学園レビュー対応内容ID',
  `review_id` int(11) DEFAULT NULL COMMENT 'レビューID',
  `post_user_id` int(11) DEFAULT NULL COMMENT '投稿者ID',
  `post_order` int(11) DEFAULT NULL COMMENT '順序',
  `content` varchar(255) DEFAULT NULL COMMENT '内容',
  `profile` int(11) DEFAULT NULL COMMENT 'プロフィール設定'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学園レビュー対応内容';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_series`
--

CREATE TABLE `t_series` (
  `series_id` bigint(20) NOT NULL COMMENT '系列園・学校ID',
  `garden_id` bigint(20) NOT NULL COMMENT '学園ID',
  `series_garden_school` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '系列園名称',
  `sort_no` int(11) NOT NULL COMMENT '表示順'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='系列園・学校';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_student`
--

CREATE TABLE `t_student` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT '学生ID',
  `user_id` int(11) NOT NULL COMMENT 'ユーザID',
  `type` int(11) DEFAULT NULL COMMENT '卒業状態｜1：卒業｜2：入学予定',
  `garden_id` int(11) DEFAULT NULL COMMENT '学園ID',
  `garden_detail` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '学園詳細'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='学生';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_tag`
--

CREATE TABLE `t_tag` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'タグID',
  `tag_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'タイトル',
  `type_id` int(11) DEFAULT NULL COMMENT '種類ID',
  `order_index` int(11) DEFAULT NULL COMMENT 'ソート順'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='タグ' ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_tag_type`
--

CREATE TABLE `t_tag_type` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT '種類のid',
  `type_title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'タイトル'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='タグ種類' ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_token`
--

CREATE TABLE `t_token` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT '設定用パスワードID',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'メールアドレス',
  `token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '設定用パスワード',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP COMMENT '追加日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='設定用パスワード';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_town`
--

CREATE TABLE `t_town` (
  `town_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) NOT NULL,
  `town_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- テーブルの構造 `t_town_city`
--

CREATE TABLE `t_town_city` (
  `town_id` bigint(20) UNSIGNED NOT NULL,
  `city_id` bigint(20) NOT NULL,
  `town_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='区マスタ';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_type`
--

CREATE TABLE `t_type` (
  `type_id` int(10) UNSIGNED NOT NULL COMMENT '種類ID',
  `type_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '種類名'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='学園種類マスタ';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_user_child`
--

CREATE TABLE `t_user_child` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'ユーザーの子供ID',
  `user_id` int(11) DEFAULT NULL COMMENT 'ユーザID',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '名前（姓）',
  `second_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '名前（名）',
  `first_name_huri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '名前（姓）フリガナ',
  `second_name_huri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '名前（名）フリガナ',
  `gender` int(11) DEFAULT NULL COMMENT '性別',
  `birthday` date DEFAULT NULL COMMENT '誕生日',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '作成日',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='ユーザの子ども';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_user_garden`
--

CREATE TABLE `t_user_garden` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT 'ユーザ学園ID',
  `user_id` int(11) NOT NULL COMMENT 'ユーザーID',
  `type` int(11) DEFAULT NULL COMMENT '種類※現在未使用とのこと',
  `facility_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '施設名',
  `facility_name_second` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '施設名フリガナ',
  `facility_post` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '施設郵便番号',
  `facility_prefecture` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '施設都道府県',
  `facility_city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '施設都市',
  `facility_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '施設住所',
  `facility_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '施設電話番号',
  `facility_url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '施設URL'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='ユーザ学園';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_user_normal`
--

CREATE TABLE `t_user_normal` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT '一般ユーザID',
  `account` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '' COMMENT 'アカウント',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'メールアドレス',
  `job` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '職業',
  `type` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'ユーザー種別｜ normal: その他ユーザー ｜parent: 保護者 ｜public: 学生本人｜ super: スーパー管理者',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '名前（姓）',
  `second_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '名前（名）',
  `first_name_huri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '名前（姓）フリガナ',
  `second_name_huri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '名前（名）フリガナ',
  `gender` int(11) DEFAULT NULL COMMENT '性別',
  `old` int(11) DEFAULT NULL COMMENT '年齢',
  `birthday` date DEFAULT NULL COMMENT '誕生日',
  `post_code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '郵便番号',
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '都市',
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '住所',
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '電話番号',
  `email_verified_at` timestamp NULL DEFAULT NULL COMMENT 'メールアドレス',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'パスワード',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '設定用パスワード',
  `status` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL COMMENT '作成日',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='一般ユーザー';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_user_republic`
--

CREATE TABLE `t_user_republic` (
  `id` bigint(20) UNSIGNED NOT NULL COMMENT '学園管理者ID',
  `garden_id` bigint(20) DEFAULT NULL COMMENT '学園ID',
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'メールアドレス',
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '名前（姓）',
  `second_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '名前（名）',
  `first_name_huri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '名前（姓）フリガナ',
  `second_name_huri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '名前（名）フリガナ',
  `contact_first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '担当者（姓）',
  `contact_second_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '担当者（名）',
  `contact_first_name_huri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '担当者（姓）フリガナ',
  `contact_second_name_huri` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '担当者（名）フリガナ',
  `contact_type` int(11) DEFAULT NULL COMMENT '担当者形態｜1:保育士| 2:幼稚園教諭| 3:管理栄養士| 4:看護師| 5:園長| 6:オーナー| 7:学校教員| 8:学校運営者| 9:学校広報| 10:塾･スクール講師| 11:塾･スクール運営者',
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '電話番号',
  `contact_mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT '担当者携帯電話番号',
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'パスワード',
  `user_id` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT '' COMMENT 'ユーザID',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '作成日',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT '更新日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='学園管理者';

-- --------------------------------------------------------

--
-- テーブルの構造 `t_visit_garden`
--

CREATE TABLE `t_visit_garden` (
  `id` int(10) UNSIGNED NOT NULL COMMENT '学園詳細情報保管履歴ID',
  `user_id` int(11) DEFAULT NULL COMMENT 'ユーザID',
  `garden_id` int(11) DEFAULT NULL COMMENT '学園ID',
  `created_at` timestamp NULL DEFAULT NULL COMMENT '作成日'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='学園詳細情報保管履歴';

--
-- ダンプしたテーブルのインデックス
--

--
-- テーブルのインデックス `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- テーブルのインデックス `t_age`
--
ALTER TABLE `t_age`
  ADD PRIMARY KEY (`age_id`);

--
-- テーブルのインデックス `t_area`
--
ALTER TABLE `t_area`
  ADD PRIMARY KEY (`area_id`);

--
-- テーブルのインデックス `t_articles`
--
ALTER TABLE `t_articles`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_articles_comments`
--
ALTER TABLE `t_articles_comments`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_articles_comments_follow`
--
ALTER TABLE `t_articles_comments_follow`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_articles_content`
--
ALTER TABLE `t_articles_content`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_articles_profile`
--
ALTER TABLE `t_articles_profile`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_child_garden`
--
ALTER TABLE `t_child_garden`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_city`
--
ALTER TABLE `t_city`
  ADD PRIMARY KEY (`city_id`);

--
-- テーブルのインデックス `t_city_area`
--
ALTER TABLE `t_city_area`
  ADD PRIMARY KEY (`city_id`);

--
-- テーブルのインデックス `t_close_day`
--
ALTER TABLE `t_close_day`
  ADD PRIMARY KEY (`close_day_id`);

--
-- テーブルのインデックス `t_close_day_detail`
--
ALTER TABLE `t_close_day_detail`
  ADD PRIMARY KEY (`close_day_detail_id`);

--
-- テーブルのインデックス `t_event`
--
ALTER TABLE `t_event`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_exit_history`
--
ALTER TABLE `t_exit_history`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_experience`
--
ALTER TABLE `t_experience`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_faq`
--
ALTER TABLE `t_faq`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_favourite`
--
ALTER TABLE `t_favourite`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_feature`
--
ALTER TABLE `t_feature`
  ADD PRIMARY KEY (`feature_id`);

--
-- テーブルのインデックス `t_garden`
--
ALTER TABLE `t_garden`
  ADD PRIMARY KEY (`garden_id`);

--
-- テーブルのインデックス `t_garden_age`
--
ALTER TABLE `t_garden_age`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_garden_direction`
--
ALTER TABLE `t_garden_direction`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_garden_event`
--
ALTER TABLE `t_garden_event`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_garden_experience`
--
ALTER TABLE `t_garden_experience`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_garden_favourite`
--
ALTER TABLE `t_garden_favourite`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_garden_img`
--
ALTER TABLE `t_garden_img`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_garden_keyword`
--
ALTER TABLE `t_garden_keyword`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_garden_main_uniform`
--
ALTER TABLE `t_garden_main_uniform`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_garden_media`
--
ALTER TABLE `t_garden_media`
  ADD PRIMARY KEY (`media_id`);

--
-- テーブルのインデックス `t_garden_media_content`
--
ALTER TABLE `t_garden_media_content`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_garden_media_img`
--
ALTER TABLE `t_garden_media_img`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_garden_media_subtitle`
--
ALTER TABLE `t_garden_media_subtitle`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_garden_media_youtube`
--
ALTER TABLE `t_garden_media_youtube`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_garden_notification`
--
ALTER TABLE `t_garden_notification`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_garden_tag`
--
ALTER TABLE `t_garden_tag`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_garden_tag_content`
--
ALTER TABLE `t_garden_tag_content`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_garden_time`
--
ALTER TABLE `t_garden_time`
  ADD PRIMARY KEY (`garden_time_id`);

--
-- テーブルのインデックス `t_garden_time_detail`
--
ALTER TABLE `t_garden_time_detail`
  ADD PRIMARY KEY (`garden_time_detail_id`);

--
-- テーブルのインデックス `t_garden_time_remark`
--
ALTER TABLE `t_garden_time_remark`
  ADD PRIMARY KEY (`garden_time_remark_id`);

--
-- テーブルのインデックス `t_garden_type`
--
ALTER TABLE `t_garden_type`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_goods`
--
ALTER TABLE `t_goods`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_keyword`
--
ALTER TABLE `t_keyword`
  ADD PRIMARY KEY (`keyword_id`);

--
-- テーブルのインデックス `t_kind`
--
ALTER TABLE `t_kind`
  ADD PRIMARY KEY (`kind_id`);

--
-- テーブルのインデックス `t_message`
--
ALTER TABLE `t_message`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_meta`
--
ALTER TABLE `t_meta`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_news`
--
ALTER TABLE `t_news`
  ADD PRIMARY KEY (`news_id`);

--
-- テーブルのインデックス `t_news_comments`
--
ALTER TABLE `t_news_comments`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_news_comments_follow`
--
ALTER TABLE `t_news_comments_follow`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_news_profile`
--
ALTER TABLE `t_news_profile`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_prefecture`
--
ALTER TABLE `t_prefecture`
  ADD PRIMARY KEY (`prefecture_id`);

--
-- テーブルのインデックス `t_price`
--
ALTER TABLE `t_price`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_review`
--
ALTER TABLE `t_review`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_review_image`
--
ALTER TABLE `t_review_image`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_review_reflect`
--
ALTER TABLE `t_review_reflect`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_series`
--
ALTER TABLE `t_series`
  ADD PRIMARY KEY (`series_id`);

--
-- テーブルのインデックス `t_student`
--
ALTER TABLE `t_student`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_tag`
--
ALTER TABLE `t_tag`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- テーブルのインデックス `t_tag_type`
--
ALTER TABLE `t_tag_type`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- テーブルのインデックス `t_token`
--
ALTER TABLE `t_token`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_town`
--
ALTER TABLE `t_town`
  ADD PRIMARY KEY (`town_id`);

--
-- テーブルのインデックス `t_town_city`
--
ALTER TABLE `t_town_city`
  ADD PRIMARY KEY (`town_id`);

--
-- テーブルのインデックス `t_type`
--
ALTER TABLE `t_type`
  ADD PRIMARY KEY (`type_id`);

--
-- テーブルのインデックス `t_user_child`
--
ALTER TABLE `t_user_child`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_user_garden`
--
ALTER TABLE `t_user_garden`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_user_normal`
--
ALTER TABLE `t_user_normal`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_user_republic`
--
ALTER TABLE `t_user_republic`
  ADD PRIMARY KEY (`id`);

--
-- テーブルのインデックス `t_visit_garden`
--
ALTER TABLE `t_visit_garden`
  ADD PRIMARY KEY (`id`);

--
-- ダンプしたテーブルのAUTO_INCREMENT
--

--
-- テーブルのAUTO_INCREMENT `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `t_age`
--
ALTER TABLE `t_age`
  MODIFY `age_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '年齢ID';

--
-- テーブルのAUTO_INCREMENT `t_area`
--
ALTER TABLE `t_area`
  MODIFY `area_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '地域ID';

--
-- テーブルのAUTO_INCREMENT `t_articles`
--
ALTER TABLE `t_articles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '記事ID';

--
-- テーブルのAUTO_INCREMENT `t_articles_comments`
--
ALTER TABLE `t_articles_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '記事コメントID';

--
-- テーブルのAUTO_INCREMENT `t_articles_comments_follow`
--
ALTER TABLE `t_articles_comments_follow`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- テーブルのAUTO_INCREMENT `t_articles_content`
--
ALTER TABLE `t_articles_content`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'コンテンツID';

--
-- テーブルのAUTO_INCREMENT `t_articles_profile`
--
ALTER TABLE `t_articles_profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- テーブルのAUTO_INCREMENT `t_child_garden`
--
ALTER TABLE `t_child_garden`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '基本ID';

--
-- テーブルのAUTO_INCREMENT `t_city`
--
ALTER TABLE `t_city`
  MODIFY `city_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '都市マスタID';

--
-- テーブルのAUTO_INCREMENT `t_city_area`
--
ALTER TABLE `t_city_area`
  MODIFY `city_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '都市ID';

--
-- テーブルのAUTO_INCREMENT `t_close_day`
--
ALTER TABLE `t_close_day`
  MODIFY `close_day_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `t_close_day_detail`
--
ALTER TABLE `t_close_day_detail`
  MODIFY `close_day_detail_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `t_event`
--
ALTER TABLE `t_event`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `t_exit_history`
--
ALTER TABLE `t_exit_history`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '退園履歴ID';

--
-- テーブルのAUTO_INCREMENT `t_experience`
--
ALTER TABLE `t_experience`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '体験ID';

--
-- テーブルのAUTO_INCREMENT `t_faq`
--
ALTER TABLE `t_faq`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'よくある質問ID';

--
-- テーブルのAUTO_INCREMENT `t_favourite`
--
ALTER TABLE `t_favourite`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'いいねID';

--
-- テーブルのAUTO_INCREMENT `t_feature`
--
ALTER TABLE `t_feature`
  MODIFY `feature_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '特徴ID';

--
-- テーブルのAUTO_INCREMENT `t_garden`
--
ALTER TABLE `t_garden`
  MODIFY `garden_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '学園ID';

--
-- テーブルのAUTO_INCREMENT `t_garden_age`
--
ALTER TABLE `t_garden_age`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '保育対象年齢ID';

--
-- テーブルのAUTO_INCREMENT `t_garden_direction`
--
ALTER TABLE `t_garden_direction`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '学園アクセスID';

--
-- テーブルのAUTO_INCREMENT `t_garden_event`
--
ALTER TABLE `t_garden_event`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `t_garden_experience`
--
ALTER TABLE `t_garden_experience`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '体験入園ID';

--
-- テーブルのAUTO_INCREMENT `t_garden_favourite`
--
ALTER TABLE `t_garden_favourite`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'いいねID';

--
-- テーブルのAUTO_INCREMENT `t_garden_img`
--
ALTER TABLE `t_garden_img`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '画像ID';

--
-- テーブルのAUTO_INCREMENT `t_garden_keyword`
--
ALTER TABLE `t_garden_keyword`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主キー';

--
-- テーブルのAUTO_INCREMENT `t_garden_main_uniform`
--
ALTER TABLE `t_garden_main_uniform`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '制服情報ID';

--
-- テーブルのAUTO_INCREMENT `t_garden_media`
--
ALTER TABLE `t_garden_media`
  MODIFY `media_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '学園メディアID';

--
-- テーブルのAUTO_INCREMENT `t_garden_media_content`
--
ALTER TABLE `t_garden_media_content`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '学園メディア内容ID';

--
-- テーブルのAUTO_INCREMENT `t_garden_media_img`
--
ALTER TABLE `t_garden_media_img`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'メディアイメージID';

--
-- テーブルのAUTO_INCREMENT `t_garden_media_subtitle`
--
ALTER TABLE `t_garden_media_subtitle`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'メディアタイトルID';

--
-- テーブルのAUTO_INCREMENT `t_garden_media_youtube`
--
ALTER TABLE `t_garden_media_youtube`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'メディアYouTubeID';

--
-- テーブルのAUTO_INCREMENT `t_garden_notification`
--
ALTER TABLE `t_garden_notification`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '緊急のお知らせID';

--
-- テーブルのAUTO_INCREMENT `t_garden_tag`
--
ALTER TABLE `t_garden_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '学園タグ（中間テーブル）ID';

--
-- テーブルのAUTO_INCREMENT `t_garden_tag_content`
--
ALTER TABLE `t_garden_tag_content`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '学園タグ内容ID';

--
-- テーブルのAUTO_INCREMENT `t_garden_time`
--
ALTER TABLE `t_garden_time`
  MODIFY `garden_time_id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `t_garden_time_detail`
--
ALTER TABLE `t_garden_time_detail`
  MODIFY `garden_time_detail_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '預かり時間詳細ID';

--
-- テーブルのAUTO_INCREMENT `t_garden_time_remark`
--
ALTER TABLE `t_garden_time_remark`
  MODIFY `garden_time_remark_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '預かり時間備考';

--
-- テーブルのAUTO_INCREMENT `t_garden_type`
--
ALTER TABLE `t_garden_type`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '学園種類（中間）ID';

--
-- テーブルのAUTO_INCREMENT `t_goods`
--
ALTER TABLE `t_goods`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '学園制服画像ID';

--
-- テーブルのAUTO_INCREMENT `t_keyword`
--
ALTER TABLE `t_keyword`
  MODIFY `keyword_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'キーワードID';

--
-- テーブルのAUTO_INCREMENT `t_kind`
--
ALTER TABLE `t_kind`
  MODIFY `kind_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '種類ID';

--
-- テーブルのAUTO_INCREMENT `t_message`
--
ALTER TABLE `t_message`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'メール履歴ID';

--
-- テーブルのAUTO_INCREMENT `t_meta`
--
ALTER TABLE `t_meta`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'メタID';

--
-- テーブルのAUTO_INCREMENT `t_news`
--
ALTER TABLE `t_news`
  MODIFY `news_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT 'ニュースID';

--
-- テーブルのAUTO_INCREMENT `t_news_comments`
--
ALTER TABLE `t_news_comments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ニュースコメントID';

--
-- テーブルのAUTO_INCREMENT `t_news_comments_follow`
--
ALTER TABLE `t_news_comments_follow`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- テーブルのAUTO_INCREMENT `t_news_profile`
--
ALTER TABLE `t_news_profile`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- テーブルのAUTO_INCREMENT `t_prefecture`
--
ALTER TABLE `t_prefecture`
  MODIFY `prefecture_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '都道府県のid';

--
-- テーブルのAUTO_INCREMENT `t_price`
--
ALTER TABLE `t_price`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ID';

--
-- テーブルのAUTO_INCREMENT `t_review`
--
ALTER TABLE `t_review`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'レビューID';

--
-- テーブルのAUTO_INCREMENT `t_review_image`
--
ALTER TABLE `t_review_image`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '学園レビューイメージID';

--
-- テーブルのAUTO_INCREMENT `t_review_reflect`
--
ALTER TABLE `t_review_reflect`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '学園レビュー対応内容ID';

--
-- テーブルのAUTO_INCREMENT `t_series`
--
ALTER TABLE `t_series`
  MODIFY `series_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '系列園・学校ID';

--
-- テーブルのAUTO_INCREMENT `t_student`
--
ALTER TABLE `t_student`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '学生ID';

--
-- テーブルのAUTO_INCREMENT `t_tag`
--
ALTER TABLE `t_tag`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'タグID';

--
-- テーブルのAUTO_INCREMENT `t_tag_type`
--
ALTER TABLE `t_tag_type`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '種類のid';

--
-- テーブルのAUTO_INCREMENT `t_token`
--
ALTER TABLE `t_token`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '設定用パスワードID';

--
-- テーブルのAUTO_INCREMENT `t_town`
--
ALTER TABLE `t_town`
  MODIFY `town_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `t_town_city`
--
ALTER TABLE `t_town_city`
  MODIFY `town_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- テーブルのAUTO_INCREMENT `t_type`
--
ALTER TABLE `t_type`
  MODIFY `type_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '種類ID';

--
-- テーブルのAUTO_INCREMENT `t_user_child`
--
ALTER TABLE `t_user_child`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ユーザーの子供ID';

--
-- テーブルのAUTO_INCREMENT `t_user_garden`
--
ALTER TABLE `t_user_garden`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'ユーザ学園ID';

--
-- テーブルのAUTO_INCREMENT `t_user_normal`
--
ALTER TABLE `t_user_normal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '一般ユーザID';

--
-- テーブルのAUTO_INCREMENT `t_user_republic`
--
ALTER TABLE `t_user_republic`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '学園管理者ID';

--
-- テーブルのAUTO_INCREMENT `t_visit_garden`
--
ALTER TABLE `t_visit_garden`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '学園詳細情報保管履歴ID';
COMMIT;
