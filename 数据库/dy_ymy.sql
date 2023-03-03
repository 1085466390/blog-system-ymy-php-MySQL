/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50726
 Source Host           : localhost:3306
 Source Schema         : dy_ymy

 Target Server Type    : MySQL
 Target Server Version : 50726
 File Encoding         : 65001

 Date: 14/01/2021 05:01:59
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for tb_tk_admin
-- ----------------------------
DROP TABLE IF EXISTS `tb_tk_admin`;
CREATE TABLE `tb_tk_admin`  (
  `admin_id` int(20) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `admin_pwd` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`admin_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_tk_admin
-- ----------------------------
INSERT INTO `tb_tk_admin` VALUES (1, '网络警察', '123456');

-- ----------------------------
-- Table structure for tb_tk_adtalkuser
-- ----------------------------
DROP TABLE IF EXISTS `tb_tk_adtalkuser`;
CREATE TABLE `tb_tk_adtalkuser`  (
  `adtalk_id` int(20) NOT NULL AUTO_INCREMENT,
  `adtalk_aid` int(20) NOT NULL,
  `adtalk_uid` int(20) NOT NULL,
  `adtalk_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `adtalk_con` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`adtalk_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 55 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_tk_adtalkuser
-- ----------------------------
INSERT INTO `tb_tk_adtalkuser` VALUES (4, 1, 8, '2020-06-06 11:09:17', '测试给你私信一下');
INSERT INTO `tb_tk_adtalkuser` VALUES (5, 1, 8, '2020-06-07 02:20:43', '管理员已审核您的申诉，申诉已通过，理由：用户密保问题：ask,用户密保答案：answer');
INSERT INTO `tb_tk_adtalkuser` VALUES (8, 1, 8, '2020-06-07 03:13:43', '您好67catl用户，您的账号被管理员解冻，现可正常使用！');
INSERT INTO `tb_tk_adtalkuser` VALUES (9, 1, 9, '2020-06-07 03:13:53', '您好test_user用户，您的账号被管理员解冻，现可正常使用！');
INSERT INTO `tb_tk_adtalkuser` VALUES (14, 1, 8, '2020-06-07 03:54:54', '您好67catl用户，您的账号被管理员解冻，现可正常使用！');
INSERT INTO `tb_tk_adtalkuser` VALUES (21, 1, 8, '2020-06-07 06:46:48', '您好，用户67catl，您的举报8号已被管理员受理！');
INSERT INTO `tb_tk_adtalkuser` VALUES (22, 1, 8, '2020-06-07 06:55:28', '您好用户，您的账号被管理员解冻，现可正常使用！');
INSERT INTO `tb_tk_adtalkuser` VALUES (23, 1, 8, '2020-06-07 16:59:09', '您好，用户67catl，您的举报9号已被管理员受理！');
INSERT INTO `tb_tk_adtalkuser` VALUES (24, 1, 8, '2020-06-13 08:38:28', '您好，用户67catl,您申请发布的话题36未被通过！');
INSERT INTO `tb_tk_adtalkuser` VALUES (25, 1, 8, '2020-06-13 08:38:43', '您好，用户67catl,您申请发布的话题测试发布话题1未被通过！');
INSERT INTO `tb_tk_adtalkuser` VALUES (26, 1, 8, '2020-06-13 08:39:34', '您好，用户67catl,您申请发布的话题今天你又胖了吗未被通过！');
INSERT INTO `tb_tk_adtalkuser` VALUES (27, 1, 8, '2020-06-13 08:39:43', '您好，用户67catl,您申请发布的话题今天你又胖了吗已通过！');
INSERT INTO `tb_tk_adtalkuser` VALUES (28, 1, 8, '2020-06-13 08:40:08', '您好，用户67catl,您申请发布的话题：今天你又胖了吗未被通过！');
INSERT INTO `tb_tk_adtalkuser` VALUES (29, 1, 8, '2020-06-13 08:40:27', '您好，用户67catl,您申请发布的话题：今天你又胖了吗 已通过！');
INSERT INTO `tb_tk_adtalkuser` VALUES (40, 1, 8, '2020-06-13 13:48:21', '您好，用户67catl，您发布的博文：今天的我，真的是活力满满呢！ 被冻结！');
INSERT INTO `tb_tk_adtalkuser` VALUES (41, 1, 8, '2020-06-13 13:48:29', '您好，用户67catl，您发布的博文：今天的我，真的是活力满满呢！ 被冻结！');
INSERT INTO `tb_tk_adtalkuser` VALUES (42, 1, 9, '2020-06-13 13:50:23', '您好，用户test_user，您发布的博文：我今天又来报告惹，我今天还是没有长胖哦 被冻结！');
INSERT INTO `tb_tk_adtalkuser` VALUES (43, 1, 8, '2020-06-13 13:52:34', '您好，用户67catl，您发布的博文：今天的我，真的是活力满满呢！ 被激活！');
INSERT INTO `tb_tk_adtalkuser` VALUES (44, 1, 9, '2020-06-13 13:53:31', '您好，用户test_user，您发布的博文：我今天又来报告惹，我今天还是没有长胖哦... 被激活！');
INSERT INTO `tb_tk_adtalkuser` VALUES (45, 1, 9, '2020-06-13 13:55:20', '您好，用户test_user，您发布的博文：我今天又来报告惹，我今天还是没有长胖哦... 被冻结！');
INSERT INTO `tb_tk_adtalkuser` VALUES (46, 1, 9, '2020-06-13 13:57:18', '我给你发一个消息看看');
INSERT INTO `tb_tk_adtalkuser` VALUES (47, 1, 9, '2020-06-13 13:57:35', '霍霍，真的还8错拉~');
INSERT INTO `tb_tk_adtalkuser` VALUES (48, 1, 8, '2020-06-14 06:26:04', '您好，用户67catl，您发布的博文：今天的我，真的是活力满满呢！... 被冻结！');
INSERT INTO `tb_tk_adtalkuser` VALUES (49, 1, 8, '2020-06-14 06:26:22', '您好，用户67catl,您申请发布的话题：1 未被通过！');
INSERT INTO `tb_tk_adtalkuser` VALUES (50, 1, 9, '2020-06-14 06:26:31', '您好，用户test_user,您申请发布的话题：测试发布话题2 已通过！');
INSERT INTO `tb_tk_adtalkuser` VALUES (51, 1, 8, '2020-06-14 06:26:37', '您好，用户67catl,您申请发布的话题：今天你又胖了吗 未被通过！');
INSERT INTO `tb_tk_adtalkuser` VALUES (52, 1, 8, '2020-06-14 06:27:10', '您好，用户67catl,您申请发布的话题：测试话题4 未被通过！');
INSERT INTO `tb_tk_adtalkuser` VALUES (53, 1, 8, '2020-06-14 06:28:10', '您好，用户67catl，您发布的博文：测试博文... 被冻结！');
INSERT INTO `tb_tk_adtalkuser` VALUES (54, 1, 8, '2020-06-14 06:28:42', '您好，用户67catl,您申请发布的话题：测试话题 未被通过！');

-- ----------------------------
-- Table structure for tb_tk_aduser
-- ----------------------------
DROP TABLE IF EXISTS `tb_tk_aduser`;
CREATE TABLE `tb_tk_aduser`  (
  `aduser_id` int(20) NOT NULL AUTO_INCREMENT,
  `aduser_uid` int(20) NOT NULL,
  `aduser_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `aduser_aid` int(20) NOT NULL,
  `aduser_con` int(20) NOT NULL,
  `aduser_long` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`aduser_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_tk_aduser
-- ----------------------------

-- ----------------------------
-- Table structure for tb_tk_applclass
-- ----------------------------
DROP TABLE IF EXISTS `tb_tk_applclass`;
CREATE TABLE `tb_tk_applclass`  (
  `appclass_id` int(20) NOT NULL AUTO_INCREMENT,
  `appclass_con` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`appclass_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_tk_applclass
-- ----------------------------
INSERT INTO `tb_tk_applclass` VALUES (1, '身份验证');
INSERT INTO `tb_tk_applclass` VALUES (2, '账号被盗');
INSERT INTO `tb_tk_applclass` VALUES (3, '账号冻结');
INSERT INTO `tb_tk_applclass` VALUES (4, '修改昵称');

-- ----------------------------
-- Table structure for tb_tk_comment
-- ----------------------------
DROP TABLE IF EXISTS `tb_tk_comment`;
CREATE TABLE `tb_tk_comment`  (
  `comt_id` int(20) NOT NULL AUTO_INCREMENT,
  `comt_logid` int(20) NOT NULL,
  `comt_logord` int(1) NOT NULL,
  `comt_uid` int(20) NOT NULL,
  `comt_content` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `comt_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`comt_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 20 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_tk_comment
-- ----------------------------
INSERT INTO `tb_tk_comment` VALUES (1, 40, 1, 8, 'test', '2020-04-13 13:51:49');
INSERT INTO `tb_tk_comment` VALUES (2, 40, 1, 8, '再评论一下看看', '2020-04-13 13:52:47');
INSERT INTO `tb_tk_comment` VALUES (3, 0, 1, 8, '', '2020-04-13 14:07:35');
INSERT INTO `tb_tk_comment` VALUES (4, 39, 1, 8, '报告，我现在去跑步惹！', '2020-04-13 14:24:46');
INSERT INTO `tb_tk_comment` VALUES (5, 36, 1, 9, 'hi', '2020-04-14 10:33:30');
INSERT INTO `tb_tk_comment` VALUES (6, 22, 2, 8, '转发的很好', '2020-04-19 22:10:54');
INSERT INTO `tb_tk_comment` VALUES (7, 22, 2, 8, '再试试评论也', '2020-04-19 22:20:06');
INSERT INTO `tb_tk_comment` VALUES (8, 27, 2, 8, '我来评论一下', '2020-04-19 22:51:12');
INSERT INTO `tb_tk_comment` VALUES (10, 23, 2, 9, '我试试', '2020-04-30 01:40:17');
INSERT INTO `tb_tk_comment` VALUES (11, 51, 1, 9, '评论', '2020-06-16 06:00:26');
INSERT INTO `tb_tk_comment` VALUES (12, 51, 1, 8, '11', '2020-06-17 03:39:07');
INSERT INTO `tb_tk_comment` VALUES (13, 48, 1, 8, '11', '2020-06-17 04:06:56');
INSERT INTO `tb_tk_comment` VALUES (14, 52, 1, 8, '11', '2020-06-17 04:08:06');
INSERT INTO `tb_tk_comment` VALUES (15, 49, 1, 8, '123', '2020-06-17 04:37:26');
INSERT INTO `tb_tk_comment` VALUES (16, 53, 1, 9, '123', '2020-06-17 07:59:51');
INSERT INTO `tb_tk_comment` VALUES (17, 31, 2, 9, '123', '2020-06-17 08:10:38');
INSERT INTO `tb_tk_comment` VALUES (18, 31, 2, 10, '123', '2020-06-17 08:12:36');
INSERT INTO `tb_tk_comment` VALUES (19, 53, 1, 10, '123', '2020-06-17 08:58:41');

-- ----------------------------
-- Table structure for tb_tk_comtadd
-- ----------------------------
DROP TABLE IF EXISTS `tb_tk_comtadd`;
CREATE TABLE `tb_tk_comtadd`  (
  `add_id` int(20) NOT NULL AUTO_INCREMENT,
  `add_comtid` int(20) NOT NULL,
  `add_uid` int(20) NOT NULL,
  `add_uid2` int(20) NOT NULL,
  `add_content` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `add_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`add_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 39 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_tk_comtadd
-- ----------------------------
INSERT INTO `tb_tk_comtadd` VALUES (1, 2, 8, 8, '2432', '2020-04-13 14:10:56');
INSERT INTO `tb_tk_comtadd` VALUES (2, 2, 8, 8, '追评追评', '2020-04-13 14:13:24');
INSERT INTO `tb_tk_comtadd` VALUES (3, 2, 8, 8, '追评3', '2020-04-13 14:13:39');
INSERT INTO `tb_tk_comtadd` VALUES (4, 1, 8, 8, '我再test一下下', '2020-04-13 14:20:53');
INSERT INTO `tb_tk_comtadd` VALUES (5, 4, 8, 8, '好嘞好嘞！', '2020-04-13 14:24:53');
INSERT INTO `tb_tk_comtadd` VALUES (6, 4, 8, 9, '那我也来监督你跑步惹！', '2020-04-13 14:26:49');
INSERT INTO `tb_tk_comtadd` VALUES (7, 4, 8, 9, '赶快去！（我现在开个小号来看看，你有没有去！）', '2020-04-13 14:27:05');
INSERT INTO `tb_tk_comtadd` VALUES (8, 5, 9, 9, '你好啊', '2020-04-14 10:33:36');
INSERT INTO `tb_tk_comtadd` VALUES (9, 5, 9, 9, '我就再来test以下，感觉有些逻辑问题', '2020-04-14 10:33:51');
INSERT INTO `tb_tk_comtadd` VALUES (10, 5, 9, 8, '嗨，我换了个号', '2020-04-14 10:34:28');
INSERT INTO `tb_tk_comtadd` VALUES (13, 6, 8, 8, '嘿嘿', '2020-04-19 22:18:56');
INSERT INTO `tb_tk_comtadd` VALUES (14, 6, 8, 8, '啥意思？', '2020-04-19 22:19:33');
INSERT INTO `tb_tk_comtadd` VALUES (15, 7, 8, 8, '我也追评一下试试', '2020-04-19 22:20:16');
INSERT INTO `tb_tk_comtadd` VALUES (16, 7, 8, 8, '还8错啦', '2020-04-19 22:20:25');
INSERT INTO `tb_tk_comtadd` VALUES (17, 9, 8, 8, 'halo', '2020-04-19 22:53:11');
INSERT INTO `tb_tk_comtadd` VALUES (19, 8, 8, 10, '还不错，我也试试', '2020-04-21 13:38:38');
INSERT INTO `tb_tk_comtadd` VALUES (20, 8, 8, 10, '哈哈哈哈哈哈，果然还可以', '2020-04-21 13:38:48');
INSERT INTO `tb_tk_comtadd` VALUES (21, 10, 9, 9, '评论一下', '2020-04-30 01:41:06');
INSERT INTO `tb_tk_comtadd` VALUES (26, 12, 8, 8, '123', '2020-06-17 04:05:43');
INSERT INTO `tb_tk_comtadd` VALUES (27, 13, 8, 8, '111', '2020-06-17 04:07:02');
INSERT INTO `tb_tk_comtadd` VALUES (28, 13, 8, 8, '123', '2020-06-17 04:07:09');
INSERT INTO `tb_tk_comtadd` VALUES (29, 14, 8, 8, '1234', '2020-06-17 04:08:10');
INSERT INTO `tb_tk_comtadd` VALUES (30, 14, 8, 8, '12345', '2020-06-17 04:08:27');
INSERT INTO `tb_tk_comtadd` VALUES (31, 15, 8, 8, '11', '2020-06-17 04:37:33');
INSERT INTO `tb_tk_comtadd` VALUES (32, 15, 8, 8, '123', '2020-06-17 04:37:43');
INSERT INTO `tb_tk_comtadd` VALUES (33, 16, 9, 9, 'qwqw', '2020-06-17 08:02:09');
INSERT INTO `tb_tk_comtadd` VALUES (34, 18, 10, 10, '123', '2020-06-17 08:15:11');
INSERT INTO `tb_tk_comtadd` VALUES (35, 18, 10, 10, '1234', '2020-06-17 08:15:34');
INSERT INTO `tb_tk_comtadd` VALUES (36, 18, 10, 10, '你好，我做不完了，呜呜呜呜', '2020-06-17 08:15:53');
INSERT INTO `tb_tk_comtadd` VALUES (37, 16, 9, 10, '123', '2020-06-17 08:58:36');
INSERT INTO `tb_tk_comtadd` VALUES (38, 11, 9, 10, '1234', '2020-06-17 08:59:12');

-- ----------------------------
-- Table structure for tb_tk_log
-- ----------------------------
DROP TABLE IF EXISTS `tb_tk_log`;
CREATE TABLE `tb_tk_log`  (
  `log_id` int(20) NOT NULL AUTO_INCREMENT,
  `log_uid` int(20) NOT NULL,
  `log_content` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `log_pic1` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `log_pic2` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `log_pic3` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `log_time` timestamp(0) NULL DEFAULT NULL,
  `log_topid` int(20) NULL DEFAULT NULL,
  `log_state` int(1) NULL DEFAULT NULL,
  `log_adminid` int(20) NULL DEFAULT NULL,
  `log_adtime` timestamp(0) NULL DEFAULT NULL,
  `log_adreid` int(20) NULL DEFAULT NULL,
  `log_tag` int(20) NOT NULL,
  `log_trans` int(20) NOT NULL,
  `log_com` int(20) NOT NULL,
  `log_store` int(20) NOT NULL,
  PRIMARY KEY (`log_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 69 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_tk_log
-- ----------------------------
INSERT INTO `tb_tk_log` VALUES (36, 9, '报告，今天我没有长胖胖哦', '', '', '', '2020-04-11 14:21:42', 8, 0, 1, '2020-06-13 06:38:17', NULL, 0, 0, 4, 0);
INSERT INTO `tb_tk_log` VALUES (38, 9, '这里也讨论以下test', '', '', '', '2020-04-11 14:25:43', 4, 0, 1, '2020-06-13 08:40:49', NULL, 1, 1, 0, 1);
INSERT INTO `tb_tk_log` VALUES (39, 9, '我今天又来报告惹，我今天还是没有长胖哦', 'upimages/7.jpg', '', '', '2020-04-11 14:47:02', 8, 0, 1, '2020-06-13 13:55:20', NULL, 0, 1, 4, 0);
INSERT INTO `tb_tk_log` VALUES (41, 8, '今天的我，真的是活力满满呢！', '', '', '', '2020-04-12 05:41:00', 4, 0, 1, '2020-06-14 06:26:04', NULL, 0, 0, 0, 0);
INSERT INTO `tb_tk_log` VALUES (47, 9, '12', '', '', '', '2020-04-18 09:42:25', 0, 1, 1, '2020-06-13 06:38:11', NULL, 0, 0, 0, 0);
INSERT INTO `tb_tk_log` VALUES (48, 10, '一起来测试', '', '', '', '2020-04-21 04:47:29', 10, 1, NULL, NULL, NULL, 0, 0, 3, 1);
INSERT INTO `tb_tk_log` VALUES (49, 8, '没有噢', '', '', '', '2020-06-14 04:07:34', 8, 1, NULL, NULL, NULL, 0, 0, 3, 0);
INSERT INTO `tb_tk_log` VALUES (50, 8, '1', '', '', '', '2020-06-16 05:21:56', 123, 1, NULL, NULL, NULL, 0, 0, 0, 1);
INSERT INTO `tb_tk_log` VALUES (51, 8, '测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试测试', '', '', '', '2020-06-16 05:22:41', 1, 1, NULL, NULL, NULL, 1, 3, 8, 2);
INSERT INTO `tb_tk_log` VALUES (52, 8, '来试一下', 'upimages/9.jpg', '', '', '2020-06-17 03:35:23', 0, 1, NULL, NULL, NULL, 0, 0, 3, 0);
INSERT INTO `tb_tk_log` VALUES (53, 8, 'helohelo', '', '', '', '2020-06-17 04:09:08', 9, 1, NULL, NULL, NULL, 1, 1, 4, 0);
INSERT INTO `tb_tk_log` VALUES (54, 10, '1233', '', '', '', '2020-06-17 08:59:47', 12, 1, NULL, NULL, NULL, 0, 0, 0, 0);
INSERT INTO `tb_tk_log` VALUES (56, 8, '测试测试', '', '', '', '2020-06-17 09:53:10', 9, 1, NULL, NULL, NULL, 0, 0, 0, 0);
INSERT INTO `tb_tk_log` VALUES (57, 8, '测试测试222', 'upimages/9.jpg', '', '', '2020-06-17 09:53:26', 9, 1, NULL, NULL, NULL, 0, 0, 0, 0);
INSERT INTO `tb_tk_log` VALUES (67, 8, '1', '', '', '', '2020-06-18 05:50:41', 0, 1, NULL, NULL, NULL, 0, 0, 0, 0);
INSERT INTO `tb_tk_log` VALUES (68, 8, '1', '', '', '', '2020-06-18 05:51:11', 9, 1, NULL, NULL, NULL, 0, 0, 0, 0);

-- ----------------------------
-- Table structure for tb_tk_logresult
-- ----------------------------
DROP TABLE IF EXISTS `tb_tk_logresult`;
CREATE TABLE `tb_tk_logresult`  (
  `lr_id` int(20) NOT NULL AUTO_INCREMENT,
  `lr_con` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`lr_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 10 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_tk_logresult
-- ----------------------------
INSERT INTO `tb_tk_logresult` VALUES (1, '反对宪法确定的基本原则');
INSERT INTO `tb_tk_logresult` VALUES (2, '危害国家统一、主权和领土完整');
INSERT INTO `tb_tk_logresult` VALUES (3, '泄露国家秘密、危害国家安全或者损害国家荣誉和利益');
INSERT INTO `tb_tk_logresult` VALUES (4, '煽动民族仇恨、民族歧视，破坏民族团结，或者侵害民族风俗、习惯');
INSERT INTO `tb_tk_logresult` VALUES (5, '破坏国家宗教政策，宣扬邪教、迷信');
INSERT INTO `tb_tk_logresult` VALUES (6, '散布谣言，扰乱社会秩序，破坏社会稳定的');
INSERT INTO `tb_tk_logresult` VALUES (7, '宣扬淫秽、赌博、暴力、色情、凶杀、恐怖或者教唆犯罪');
INSERT INTO `tb_tk_logresult` VALUES (8, '煽动非法集会、结社、游行、示威、聚众扰乱社会秩序');
INSERT INTO `tb_tk_logresult` VALUES (9, '有法律、行政法规和国家规定禁止的其他内容的');

-- ----------------------------
-- Table structure for tb_tk_logstore
-- ----------------------------
DROP TABLE IF EXISTS `tb_tk_logstore`;
CREATE TABLE `tb_tk_logstore`  (
  `store_id` int(20) NOT NULL AUTO_INCREMENT,
  `store_logid` int(20) NOT NULL,
  `store_uid` int(20) NOT NULL,
  `store_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`store_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_tk_logstore
-- ----------------------------
INSERT INTO `tb_tk_logstore` VALUES (4, 35, 9, '2020-04-11 15:43:02');
INSERT INTO `tb_tk_logstore` VALUES (5, 34, 9, '2020-04-11 15:46:54');
INSERT INTO `tb_tk_logstore` VALUES (7, 40, 8, '2020-04-12 03:13:56');
INSERT INTO `tb_tk_logstore` VALUES (8, 38, 8, '2020-06-13 04:37:56');
INSERT INTO `tb_tk_logstore` VALUES (10, 51, 9, '2020-06-16 06:26:58');
INSERT INTO `tb_tk_logstore` VALUES (11, 50, 9, '2020-06-16 06:27:05');
INSERT INTO `tb_tk_logstore` VALUES (12, 48, 8, '2020-06-17 04:14:28');
INSERT INTO `tb_tk_logstore` VALUES (16, 51, 10, '2020-06-17 08:59:31');

-- ----------------------------
-- Table structure for tb_tk_logtrans
-- ----------------------------
DROP TABLE IF EXISTS `tb_tk_logtrans`;
CREATE TABLE `tb_tk_logtrans`  (
  `trans_id` int(20) NOT NULL AUTO_INCREMENT,
  `trans_logid` int(20) NOT NULL,
  `trans_uid` int(20) NOT NULL,
  `trans_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `trans_content` varchar(300) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `trans_tag` int(20) NOT NULL,
  `trans_com` int(20) NOT NULL,
  PRIMARY KEY (`trans_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_tk_logtrans
-- ----------------------------
INSERT INTO `tb_tk_logtrans` VALUES (23, 39, 9, '2020-04-19 04:15:19', '今天的我吃了五谷杂粮，感觉又会瘦呢', 1, 2);
INSERT INTO `tb_tk_logtrans` VALUES (27, 46, 8, '2020-04-19 22:45:49', '转一个看看', 1, 5);
INSERT INTO `tb_tk_logtrans` VALUES (29, 51, 9, '2020-06-16 05:46:25', '测试转发', 0, 0);
INSERT INTO `tb_tk_logtrans` VALUES (30, 51, 8, '2020-06-17 03:39:32', '11', 0, 0);
INSERT INTO `tb_tk_logtrans` VALUES (31, 53, 9, '2020-06-17 08:01:50', '123', 1, 5);
INSERT INTO `tb_tk_logtrans` VALUES (32, 51, 10, '2020-06-17 08:58:07', '123', 0, 0);

-- ----------------------------
-- Table structure for tb_tk_tag
-- ----------------------------
DROP TABLE IF EXISTS `tb_tk_tag`;
CREATE TABLE `tb_tk_tag`  (
  `tag_id` int(20) NOT NULL AUTO_INCREMENT,
  `tag_logid` int(20) NOT NULL,
  `tag_logord` int(1) NOT NULL,
  `tag_uid` int(20) NOT NULL,
  `tag_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`tag_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_tk_tag
-- ----------------------------
INSERT INTO `tb_tk_tag` VALUES (3, 40, 1, 8, '2020-04-12 04:43:21');
INSERT INTO `tb_tk_tag` VALUES (4, 38, 1, 8, '2020-04-18 08:05:23');
INSERT INTO `tb_tk_tag` VALUES (6, 22, 2, 8, '2020-04-19 22:28:49');
INSERT INTO `tb_tk_tag` VALUES (7, 27, 2, 8, '2020-04-19 23:34:54');
INSERT INTO `tb_tk_tag` VALUES (8, 23, 2, 9, '2020-04-30 01:41:31');
INSERT INTO `tb_tk_tag` VALUES (9, 28, 2, 8, '2020-06-14 06:02:20');
INSERT INTO `tb_tk_tag` VALUES (10, 51, 1, 9, '2020-06-16 06:16:12');
INSERT INTO `tb_tk_tag` VALUES (11, 31, 2, 10, '2020-06-17 08:17:32');
INSERT INTO `tb_tk_tag` VALUES (12, 53, 1, 8, '2020-06-17 09:56:10');

-- ----------------------------
-- Table structure for tb_tk_topic
-- ----------------------------
DROP TABLE IF EXISTS `tb_tk_topic`;
CREATE TABLE `tb_tk_topic`  (
  `tp_id` int(20) NOT NULL AUTO_INCREMENT,
  `tp_uid` int(20) NOT NULL,
  `tp_top` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tp_content` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `tp_classid` int(20) NOT NULL,
  `tp_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `tp_state` int(1) NOT NULL,
  `tp_aid` int(20) NULL DEFAULT NULL,
  `tp_adtime` timestamp(0) NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP(0),
  `tp_follow` int(20) NOT NULL,
  `tp_log` int(20) NOT NULL,
  PRIMARY KEY (`tp_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_tk_topic
-- ----------------------------
INSERT INTO `tb_tk_topic` VALUES (8, 8, '今天你又胖了吗', 'aloha~对于近几年内关于肥胖的发生与流行越来越严重，人们应高度重视起来，所以我们打算做一项关于肥胖的社会调查，此次调查不需记名，所以希望您能根据自己的情况如实填写，另外对耽误您的宝贵的时间表示歉意', 3, '2020-06-14 12:26:37', 2, 1, '2020-06-14 06:26:37', 0, 3);
INSERT INTO `tb_tk_topic` VALUES (9, 8, 'test_topic', '我也来发一个康康', 1, '2020-06-18 11:51:11', 1, 1, '2020-06-18 11:51:11', 1, 4);
INSERT INTO `tb_tk_topic` VALUES (10, 10, 'test_话题', '测试微博', 3, '2020-06-14 10:04:43', 1, 1, '2020-06-14 10:04:43', 1, 1);
INSERT INTO `tb_tk_topic` VALUES (11, 8, '1', '1', 1, '2020-06-13 14:21:42', 1, 1, '2020-06-13 08:21:42', 0, 0);
INSERT INTO `tb_tk_topic` VALUES (12, 8, '1', '1', 2, '2020-06-17 14:59:47', 2, 1, '2020-06-17 14:59:47', 0, 1);
INSERT INTO `tb_tk_topic` VALUES (13, 8, '12', '1', 2, '2020-06-16 12:24:11', 1, 1, '2020-06-16 12:24:11', 1, 0);
INSERT INTO `tb_tk_topic` VALUES (14, 8, '36', '15426', 1, '2020-06-13 14:38:28', 2, 1, '2020-06-13 08:38:28', 0, 0);
INSERT INTO `tb_tk_topic` VALUES (15, 8, '测试发布话题1', '你好', 1, '2020-06-13 14:38:43', 2, 1, '2020-06-13 08:38:43', 0, 0);
INSERT INTO `tb_tk_topic` VALUES (16, 8, '测试话题4', '你好，再测试一下', 6, '2020-06-14 12:27:10', 2, 1, '2020-06-14 06:27:10', 0, 0);
INSERT INTO `tb_tk_topic` VALUES (17, 9, '测试发布话题2', '没有导语', 2, '2020-06-17 15:00:08', 1, 1, '2020-06-17 15:00:08', 0, 1);
INSERT INTO `tb_tk_topic` VALUES (18, 8, '测试话题', '1', 1, '2020-06-14 12:28:42', 2, 1, '2020-06-14 06:28:42', 0, 0);

-- ----------------------------
-- Table structure for tb_tk_topicclass
-- ----------------------------
DROP TABLE IF EXISTS `tb_tk_topicclass`;
CREATE TABLE `tb_tk_topicclass`  (
  `tpclass_id` int(20) NOT NULL AUTO_INCREMENT,
  `tpclass_con` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`tpclass_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_tk_topicclass
-- ----------------------------
INSERT INTO `tb_tk_topicclass` VALUES (1, '明星');
INSERT INTO `tb_tk_topicclass` VALUES (2, '搞笑');
INSERT INTO `tb_tk_topicclass` VALUES (3, '社会');
INSERT INTO `tb_tk_topicclass` VALUES (4, '科技');
INSERT INTO `tb_tk_topicclass` VALUES (5, '军事');
INSERT INTO `tb_tk_topicclass` VALUES (6, '时尚');
INSERT INTO `tb_tk_topicclass` VALUES (7, '电影');
INSERT INTO `tb_tk_topicclass` VALUES (8, '听歌');
INSERT INTO `tb_tk_topicclass` VALUES (9, '旅游');
INSERT INTO `tb_tk_topicclass` VALUES (10, '股票');
INSERT INTO `tb_tk_topicclass` VALUES (11, '新闻');
INSERT INTO `tb_tk_topicclass` VALUES (12, '更多');

-- ----------------------------
-- Table structure for tb_tk_topicfocus
-- ----------------------------
DROP TABLE IF EXISTS `tb_tk_topicfocus`;
CREATE TABLE `tb_tk_topicfocus`  (
  `tpfc_id` int(20) NOT NULL AUTO_INCREMENT,
  `tpfc_tpid` int(20) NOT NULL,
  `tpfc_uid` int(20) NOT NULL,
  `tpfc_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`tpfc_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 17 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_tk_topicfocus
-- ----------------------------
INSERT INTO `tb_tk_topicfocus` VALUES (13, 4, 9, '2020-04-14 10:23:57');
INSERT INTO `tb_tk_topicfocus` VALUES (14, 10, 8, '2020-06-14 04:04:43');
INSERT INTO `tb_tk_topicfocus` VALUES (15, 13, 9, '2020-06-16 06:24:11');
INSERT INTO `tb_tk_topicfocus` VALUES (16, 9, 10, '2020-06-17 09:01:31');

-- ----------------------------
-- Table structure for tb_tk_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_tk_user`;
CREATE TABLE `tb_tk_user`  (
  `user_uid` int(20) NOT NULL AUTO_INCREMENT,
  `user_uname` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_upic` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_ustate` int(1) NOT NULL,
  `user_utime` timestamp(0) NULL DEFAULT NULL,
  `user_uword` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_ucard` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_pwd` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_tname` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_phone` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_locate` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `user_sex` int(1) NULL DEFAULT NULL,
  `user_pwq` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_pwa` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `user_bgtime` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `user_follow` int(20) NOT NULL,
  `user_follower` int(20) NOT NULL,
  `user_friend` int(20) NOT NULL,
  `user_blog` int(20) NOT NULL,
  PRIMARY KEY (`user_uid`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 11 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_tk_user
-- ----------------------------
INSERT INTO `tb_tk_user` VALUES (8, '67catl', 'upimages/1.jpg', 1, '2020-06-08 03:55:06', 'To be a worse man.', '123456789', '123456', '刘紫琪', '2147483647', '3', 2, 'ask1', 'answer1', '2020-04-21 13:27:27', 2, 2, 2, 0);
INSERT INTO `tb_tk_user` VALUES (9, 'test_user', 'upimages/2.jpg', 1, '2020-07-06 05:08:11', '', '0', '123456', '', '0', '-1', 0, '11', '11', '2020-04-18 15:20:41', 1, 1, 1, 0);
INSERT INTO `tb_tk_user` VALUES (10, 'test_user2', 'upimages/8.jpg', 1, '2020-04-21 13:27:27', '', '0', '123456', '', '0', '-1', 0, '1', '1', '2020-04-21 13:27:27', 1, 1, 1, 0);

-- ----------------------------
-- Table structure for tb_tk_userappl
-- ----------------------------
DROP TABLE IF EXISTS `tb_tk_userappl`;
CREATE TABLE `tb_tk_userappl`  (
  `appl_id` int(20) NOT NULL AUTO_INCREMENT,
  `appl_classid` int(20) NOT NULL,
  `appl_uid` int(20) NOT NULL,
  `appl_aid` int(20) NULL DEFAULT NULL,
  `appl_con` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `appl_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `appl_atime` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`appl_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_tk_userappl
-- ----------------------------
INSERT INTO `tb_tk_userappl` VALUES (3, 1, 8, 1, '我忘记了验证密码', '2020-06-07 08:20:43', '2020-06-07 02:20:43');
INSERT INTO `tb_tk_userappl` VALUES (4, 3, 8, NULL, '我忘记了验证密码', '2020-06-07 08:23:10', '2020-06-07 02:20:43');
INSERT INTO `tb_tk_userappl` VALUES (5, 3, 8, NULL, '我忘记了验证密码', '2020-06-14 04:41:40', NULL);

-- ----------------------------
-- Table structure for tb_tk_usercom
-- ----------------------------
DROP TABLE IF EXISTS `tb_tk_usercom`;
CREATE TABLE `tb_tk_usercom`  (
  `ucom_id` int(20) NOT NULL AUTO_INCREMENT,
  `ucom_uid1` int(20) NOT NULL,
  `ucom_uid2` int(20) NOT NULL,
  `ucom_classid` int(20) NOT NULL,
  `ucom_content` varchar(20) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  `ucom_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0) ON UPDATE CURRENT_TIMESTAMP(0),
  `ucom_atime` timestamp(0) NULL DEFAULT NULL,
  `ucom_aid` int(20) NULL DEFAULT NULL,
  PRIMARY KEY (`ucom_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_tk_usercom
-- ----------------------------
INSERT INTO `tb_tk_usercom` VALUES (8, 8, 9, 3, '', '2020-06-07 06:08:19', '2020-06-07 06:46:48', 1);
INSERT INTO `tb_tk_usercom` VALUES (9, 8, 9, 5, '1', '2020-06-07 16:59:03', '2020-06-07 16:59:09', 1);
INSERT INTO `tb_tk_usercom` VALUES (10, 8, 9, 3, '', '2020-06-07 17:19:32', '2020-06-07 16:59:09', NULL);
INSERT INTO `tb_tk_usercom` VALUES (11, 9, 8, 1, '', '2020-06-14 04:46:13', '2020-06-07 16:59:09', NULL);
INSERT INTO `tb_tk_usercom` VALUES (12, 9, 8, 0, '', '2020-06-14 04:46:27', '2020-06-07 16:59:09', NULL);
INSERT INTO `tb_tk_usercom` VALUES (13, 9, 8, 0, '', '2020-06-14 04:46:32', '2020-06-07 16:59:09', NULL);

-- ----------------------------
-- Table structure for tb_tk_usercomclass
-- ----------------------------
DROP TABLE IF EXISTS `tb_tk_usercomclass`;
CREATE TABLE `tb_tk_usercomclass`  (
  `ucomcl_id` int(20) NOT NULL AUTO_INCREMENT,
  `ucomcl_con` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ucomcl_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_tk_usercomclass
-- ----------------------------
INSERT INTO `tb_tk_usercomclass` VALUES (1, '该账号发布色情/违法等不良信息');
INSERT INTO `tb_tk_usercomclass` VALUES (2, '该账号存在欺诈骗钱行为');
INSERT INTO `tb_tk_usercomclass` VALUES (3, '该账号对我进行骚扰');
INSERT INTO `tb_tk_usercomclass` VALUES (4, '侵犯未成年人权益');
INSERT INTO `tb_tk_usercomclass` VALUES (5, '该账号存在其他违规行为');

-- ----------------------------
-- Table structure for tb_tk_userfl
-- ----------------------------
DROP TABLE IF EXISTS `tb_tk_userfl`;
CREATE TABLE `tb_tk_userfl`  (
  `ufl_id` int(20) NOT NULL AUTO_INCREMENT,
  `ufl_uid1` int(20) NOT NULL,
  `ufl_uid2` int(20) NOT NULL,
  `ufl_state` int(1) NOT NULL,
  `ufl_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  PRIMARY KEY (`ufl_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 15 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_tk_userfl
-- ----------------------------
INSERT INTO `tb_tk_userfl` VALUES (13, 9, 8, 3, '2020-04-18 08:49:20');
INSERT INTO `tb_tk_userfl` VALUES (14, 10, 8, 3, '2020-04-21 04:48:00');

-- ----------------------------
-- Table structure for tb_tk_usertalk
-- ----------------------------
DROP TABLE IF EXISTS `tb_tk_usertalk`;
CREATE TABLE `tb_tk_usertalk`  (
  `utalk_id` int(20) NOT NULL AUTO_INCREMENT,
  `utalk_uid1` int(20) NOT NULL,
  `utalk_uid2` int(20) NOT NULL,
  `utalk_time` timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP(0),
  `utalk_con` varchar(100) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  PRIMARY KEY (`utalk_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 33 CHARACTER SET = utf8 COLLATE = utf8_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of tb_tk_usertalk
-- ----------------------------
INSERT INTO `tb_tk_usertalk` VALUES (17, 8, 9, '2020-04-21 13:07:10', '你好');
INSERT INTO `tb_tk_usertalk` VALUES (18, 10, 8, '2020-04-21 13:20:12', '你好，我是一个没有感情的测试机器');
INSERT INTO `tb_tk_usertalk` VALUES (19, 10, 8, '2020-04-21 13:21:43', '哎呀');
INSERT INTO `tb_tk_usertalk` VALUES (20, 10, 8, '2020-04-21 13:22:43', '我再发长一点点康康。。。。。');
INSERT INTO `tb_tk_usertalk` VALUES (21, 8, 10, '2020-04-21 13:24:10', '哈哈哈哈哈，你好啊，你是我的机器人~');
INSERT INTO `tb_tk_usertalk` VALUES (22, 10, 8, '2020-04-21 13:24:52', '是的呢~我来测试一下，她今天写的聊天对话框怎么样，看起来还不错吧~');
INSERT INTO `tb_tk_usertalk` VALUES (23, 8, 10, '2020-04-21 13:25:24', '还可以，就是这个滚动块还要再改一下下，不然的话，用户体验不是很好哦。。。。。。。。。。。。。。。。。。。。。。。。。。。');
INSERT INTO `tb_tk_usertalk` VALUES (24, 10, 8, '2020-04-21 13:25:50', '嗯嗯，还在尝试中。。希望下次可以更完善！');
INSERT INTO `tb_tk_usertalk` VALUES (25, 10, 9, '2020-04-21 13:27:30', '我的2号机器人~我也来和你聊聊天康康！');
INSERT INTO `tb_tk_usertalk` VALUES (26, 8, 9, '2020-04-27 16:18:15', '你好，我现在有点不想写这个了。。。好多啊');
INSERT INTO `tb_tk_usertalk` VALUES (27, 8, 9, '2020-04-27 16:18:31', '噢，原来是我给你发的消息。。');
INSERT INTO `tb_tk_usertalk` VALUES (28, 9, 8, '2020-04-30 01:10:57', '我来给你发一个消息了，很抱歉这么晚回你噢。。');
INSERT INTO `tb_tk_usertalk` VALUES (29, 8, 10, '2020-06-06 03:16:13', '我觉得还可以把');
INSERT INTO `tb_tk_usertalk` VALUES (30, 8, 9, '2020-06-07 16:39:38', '11');
INSERT INTO `tb_tk_usertalk` VALUES (31, 8, 10, '2020-06-15 09:35:40', '我这次发长一点点消息看看这个怎么样。。。。。刚才有点问题欸\r\n');
INSERT INTO `tb_tk_usertalk` VALUES (32, 9, 10, '2020-06-15 11:05:13', 'hello\r\n');

SET FOREIGN_KEY_CHECKS = 1;
