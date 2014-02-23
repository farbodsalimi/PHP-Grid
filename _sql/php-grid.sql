/*
Source Host           : localhost
Source Database       : php-grid

Target Server Type    : MYSQL
Target Server Version : 50612
File Encoding         : 65001

Farbod Salimi <info@farbod-salimi.com>
Date: 2014-02-23 13:16:56
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for emails
-- ----------------------------
DROP TABLE IF EXISTS `emails`;
CREATE TABLE `emails` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT,
  `e_email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of emails
-- ----------------------------
INSERT INTO `emails` VALUES ('1', 'sagittis@magna.org');
INSERT INTO `emails` VALUES ('2', 'purus@urnaVivamus.org');
INSERT INTO `emails` VALUES ('3', 'Sed.neque@dictumplacerat.edu');
INSERT INTO `emails` VALUES ('4', 'Aliquam@adipiscing.com');
INSERT INTO `emails` VALUES ('5', 'ipsum@lectusNullamsuscipit.org');
INSERT INTO `emails` VALUES ('6', 'sit.amet@imperdietnec.org');
INSERT INTO `emails` VALUES ('7', 'enim.Suspendisse.aliquet@gmail.com');
INSERT INTO `emails` VALUES ('8', 'adipiscing.non.luctus@yahoo.com');
INSERT INTO `emails` VALUES ('9', 'Cum.sociis@egestasnunc.net');
INSERT INTO `emails` VALUES ('10', 'adipiscing@laoreetliberoet.net');
INSERT INTO `emails` VALUES ('11', 'auctor.quis.tristique@massarutrum.com');
INSERT INTO `emails` VALUES ('12', 'pharetra@nonsapien.co.uk');
INSERT INTO `emails` VALUES ('13', 'adipiscing.elit.Curabitur@idenimCurabitur.ca');
INSERT INTO `emails` VALUES ('14', 'odio.semper@quam.net');
INSERT INTO `emails` VALUES ('15', 'et@Quisque.ca');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `u_id` int(11) NOT NULL,
  `u_first_name` varchar(255) DEFAULT NULL,
  `u_last_name` varchar(255) DEFAULT NULL,
  `u_email` varchar(255) DEFAULT NULL,
  `u_phone` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`u_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Hedda', 'Lang', '1', '(349) 134-5655');
INSERT INTO `users` VALUES ('2', 'Rylee', 'Mccoy', '2', '(595) 471-8749');
INSERT INTO `users` VALUES ('3', 'Maggy', 'Carson', '3', '(246) 393-8853');
INSERT INTO `users` VALUES ('4', 'Clare', 'Burch', '4', '(901) 390-9227');
INSERT INTO `users` VALUES ('5', 'Hector', 'Cooke', '5', '(845) 807-9354');
INSERT INTO `users` VALUES ('6', 'Claire', 'Byers', '6', '(567) 725-5295');
INSERT INTO `users` VALUES ('7', 'Vivian', 'Norton', '7', '(298) 234-1151');
INSERT INTO `users` VALUES ('8', 'Megan', 'Sims', '8', '(626) 743-1913');
INSERT INTO `users` VALUES ('9', 'Dexter', 'Bates', '9', '(576) 845-8496');
INSERT INTO `users` VALUES ('10', 'Natalie', 'Solis', '10', '(636) 724-3483');
INSERT INTO `users` VALUES ('11', 'Dana', 'Ellison', '11', '(289) 106-5410');
INSERT INTO `users` VALUES ('12', 'Lael', 'Washington', '12', '(521) 800-7939');
INSERT INTO `users` VALUES ('13', 'Lois', 'Lawson', '13', '(603) 746-4031');
INSERT INTO `users` VALUES ('14', 'Audrey', 'Conway', '14', '(733) 933-2092');
INSERT INTO `users` VALUES ('15', 'Rahim', 'Trevino', '15', '(122) 770-1400');
