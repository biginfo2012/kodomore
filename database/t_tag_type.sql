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

 Date: 16/12/2020 10:59:54
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for t_tag_type
-- ----------------------------
DROP TABLE IF EXISTS `t_tag_type`;
CREATE TABLE `t_tag_type`  (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `type_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 54 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of t_tag_type
-- ----------------------------
INSERT INTO `t_tag_type` VALUES (2, '保育の種類');
INSERT INTO `t_tag_type` VALUES (3, '登園と食事');
INSERT INTO `t_tag_type` VALUES (4, '園内指導と課外クラス');
INSERT INTO `t_tag_type` VALUES (5, '上部学校連携･園の形態･宗教');

SET FOREIGN_KEY_CHECKS = 1;
