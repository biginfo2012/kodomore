/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100316
 Source Host           : localhost:3306
 Source Schema         : laravel_kodomore

 Target Server Type    : MySQL
 Target Server Version : 100316
 File Encoding         : 65001

 Date: 16/12/2020 10:59:47
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for t_tag
-- ----------------------------
DROP TABLE IF EXISTS `t_tag`;
CREATE TABLE `t_tag`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `tag_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `type_id` int(11) NULL DEFAULT NULL,
  `order_index` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 111 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of t_tag
-- ----------------------------
INSERT INTO `t_tag` VALUES (2, '延長保育', 2, 1);
INSERT INTO `t_tag` VALUES (3, '早朝保育', 2, 2);
INSERT INTO `t_tag` VALUES (4, '土曜日保育', 2, 3);
INSERT INTO `t_tag` VALUES (5, '日曜日保育', 2, 4);
INSERT INTO `t_tag` VALUES (6, '夜間保育', 2, 5);
INSERT INTO `t_tag` VALUES (7, '休日保育', 2, 6);
INSERT INTO `t_tag` VALUES (8, '24時間預かり', 2, 7);
INSERT INTO `t_tag` VALUES (9, '一時預かり', 2, 8);
INSERT INTO `t_tag` VALUES (10, 'プレスクール', 2, 9);
INSERT INTO `t_tag` VALUES (11, '未満児保育', 2, 10);
INSERT INTO `t_tag` VALUES (12, '0歳児保育', 2, 11);
INSERT INTO `t_tag` VALUES (13, '1歳児保育', 2, 12);
INSERT INTO `t_tag` VALUES (14, '2歳児保育', 2, 13);
INSERT INTO `t_tag` VALUES (15, '満3歳児保育', 2, 14);
INSERT INTO `t_tag` VALUES (16, '障がい児支援', 2, 15);
INSERT INTO `t_tag` VALUES (17, '送迎バス', 3, 1);
INSERT INTO `t_tag` VALUES (18, '早朝おやつ', 3, 2);
INSERT INTO `t_tag` VALUES (19, '給食', 3, 3);
INSERT INTO `t_tag` VALUES (20, 'アレルギー食', 3, 4);
INSERT INTO `t_tag` VALUES (21, '延長おやつ', 3, 5);
INSERT INTO `t_tag` VALUES (22, '延長夕食', 3, 6);
INSERT INTO `t_tag` VALUES (23, 'インターナショナル', 4, 1);
INSERT INTO `t_tag` VALUES (24, '外国語(英語)教育', 4, 2);
INSERT INTO `t_tag` VALUES (25, 'プログラミング教育', 4, 3);
INSERT INTO `t_tag` VALUES (26, 'パソコン・タブレット', 4, 4);
INSERT INTO `t_tag` VALUES (27, 'オンラインレッスン', 4, 5);
INSERT INTO `t_tag` VALUES (28, 'サイエンス実習', 4, 6);
INSERT INTO `t_tag` VALUES (29, '音楽リトミック', 4, 7);
INSERT INTO `t_tag` VALUES (30, '遊具充実', 4, 8);
INSERT INTO `t_tag` VALUES (31, '絵画', 4, 9);
INSERT INTO `t_tag` VALUES (32, 'アート', 4, 10);
INSERT INTO `t_tag` VALUES (33, '体操', 4, 11);
INSERT INTO `t_tag` VALUES (34, 'そろばん', 4, 12);
INSERT INTO `t_tag` VALUES (35, '習字', 4, 13);
INSERT INTO `t_tag` VALUES (36, '華道', 4, 14);
INSERT INTO `t_tag` VALUES (37, '茶道', 4, 15);
INSERT INTO `t_tag` VALUES (38, 'ピアノ・オルガン', 4, 16);
INSERT INTO `t_tag` VALUES (39, 'バイオリン', 4, 17);
INSERT INTO `t_tag` VALUES (40, 'バレエ', 4, 18);
INSERT INTO `t_tag` VALUES (41, 'ダンス', 4, 19);
INSERT INTO `t_tag` VALUES (42, '鼓笛隊', 4, 20);
INSERT INTO `t_tag` VALUES (43, 'プール', 4, 21);
INSERT INTO `t_tag` VALUES (44, '水泳教室', 4, 22);
INSERT INTO `t_tag` VALUES (45, '食育', 4, 23);
INSERT INTO `t_tag` VALUES (46, 'クッキング', 4, 24);
INSERT INTO `t_tag` VALUES (47, '栽培と収穫', 4, 25);
INSERT INTO `t_tag` VALUES (48, '生き物との触れ合い', 4, 26);
INSERT INTO `t_tag` VALUES (49, '英検', 4, 27);
INSERT INTO `t_tag` VALUES (50, '数検', 4, 28);
INSERT INTO `t_tag` VALUES (51, '漢検', 4, 29);
INSERT INTO `t_tag` VALUES (52, '文字', 4, 30);
INSERT INTO `t_tag` VALUES (53, '知恵', 4, 31);
INSERT INTO `t_tag` VALUES (54, '小学校受験対策', 4, 32);
INSERT INTO `t_tag` VALUES (55, '野外学習', 4, 33);
INSERT INTO `t_tag` VALUES (56, '課外(アフター)クラス', 4, 34);
INSERT INTO `t_tag` VALUES (57, 'モンテッソーリ教育', 4, 35);
INSERT INTO `t_tag` VALUES (63, 'シュタイナー教育', 4, 36);
INSERT INTO `t_tag` VALUES (64, '幼小一貫校', 5, 1);
INSERT INTO `t_tag` VALUES (65, '幼小中一貫校', 5, 2);
INSERT INTO `t_tag` VALUES (66, '幼小中高一貫校', 5, 3);
INSERT INTO `t_tag` VALUES (67, '幼小中高大一貫校', 5, 4);
INSERT INTO `t_tag` VALUES (68, 'キリスト教系', 5, 7);
INSERT INTO `t_tag` VALUES (69, '仏教系', 5, 8);
INSERT INTO `t_tag` VALUES (109, '女子園', 5, 5);
INSERT INTO `t_tag` VALUES (110, '男子園', 5, 6);

SET FOREIGN_KEY_CHECKS = 1;
