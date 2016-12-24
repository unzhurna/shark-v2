/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 100113
Source Host           : localhost:3306
Source Database       : dev_shark

Target Server Type    : MYSQL
Target Server Version : 100113
File Encoding         : 65001

Date: 2016-11-28 22:40:59
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for applicants
-- ----------------------------
DROP TABLE IF EXISTS `applicants`;
CREATE TABLE `applicants` (
  `applicant_id` int(11) NOT NULL AUTO_INCREMENT,
  `career_id` int(11) NOT NULL,
  `applicant_name` varchar(150) NOT NULL,
  `applicant_phone` varchar(15) NOT NULL,
  `applicant_email` varchar(150) NOT NULL,
  `apply_date` date DEFAULT NULL,
  `applicant_cv` text NOT NULL,
  PRIMARY KEY (`applicant_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of applicants
-- ----------------------------

-- ----------------------------
-- Table structure for careers
-- ----------------------------
DROP TABLE IF EXISTS `careers`;
CREATE TABLE `careers` (
  `career_id` int(11) NOT NULL AUTO_INCREMENT,
  `career_title` varchar(255) DEFAULT NULL,
  `career_slug` varchar(255) DEFAULT NULL,
  `career_qualifications` text,
  `career_skills` text,
  `date_open` date DEFAULT NULL,
  `date_close` date DEFAULT NULL,
  `is_open` tinyint(4) DEFAULT '1',
  `_create_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `_create_by` int(11) DEFAULT NULL,
  `_update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `_update_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`career_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of careers
-- ----------------------------

-- ----------------------------
-- Table structure for categories
-- ----------------------------
DROP TABLE IF EXISTS `categories`;
CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(200) DEFAULT NULL,
  `category_slug` varchar(200) DEFAULT NULL,
  `category_desc` varchar(255) DEFAULT NULL,
  `category_img` varchar(255) DEFAULT NULL,
  `category_term` varchar(100) DEFAULT NULL,
  `is_show` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of categories
-- ----------------------------

-- ----------------------------
-- Table structure for clients
-- ----------------------------
DROP TABLE IF EXISTS `clients`;
CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL AUTO_INCREMENT,
  `client_name` varchar(100) DEFAULT NULL,
  `client_phone` varchar(15) DEFAULT NULL,
  `client_email` varchar(100) DEFAULT NULL,
  `client_addr` varchar(255) DEFAULT NULL,
  `client_logo` varchar(100) DEFAULT NULL,
  `_create_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `_create_by` int(11) DEFAULT NULL,
  `_update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `_update_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of clients
-- ----------------------------

-- ----------------------------
-- Table structure for contact_addr
-- ----------------------------
DROP TABLE IF EXISTS `contact_addr`;
CREATE TABLE `contact_addr` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `fax` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `is_primary` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of contact_addr
-- ----------------------------
INSERT INTO `contact_addr` VALUES ('1', 'Head Office', '6221 5903411', '6221 5903411', 'mail@shark.co.id', 'Alam Sutera, Tangerang Selatan', '1');
INSERT INTO `contact_addr` VALUES ('2', 'Manufacture Office', '6221 5903411', '6221 5903411', 'mail@shark.co.id', 'Alam Sutera, Tangerang Selatan', null);

-- ----------------------------
-- Table structure for groups
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of groups
-- ----------------------------
INSERT INTO `groups` VALUES ('1', 'admin', 'Administrator');
INSERT INTO `groups` VALUES ('2', 'member', 'General User');

-- ----------------------------
-- Table structure for login_attempts
-- ----------------------------
DROP TABLE IF EXISTS `login_attempts`;
CREATE TABLE `login_attempts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(15) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of login_attempts
-- ----------------------------

-- ----------------------------
-- Table structure for options
-- ----------------------------
DROP TABLE IF EXISTS `options`;
CREATE TABLE `options` (
  `option_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `option_name` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `option_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`option_id`),
  UNIQUE KEY `option_name` (`option_name`)
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of options
-- ----------------------------
INSERT INTO `options` VALUES ('40', 'opt_logo ', 'http://localhost/shark/uploads/site/logo.png');
INSERT INTO `options` VALUES ('41', 'opt_title ', 'Shark');
INSERT INTO `options` VALUES ('42', 'opt_tagline ', 'Hardware and Tools');
INSERT INTO `options` VALUES ('43', 'opt_about', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsaquae ab illo invent ore veritatis et quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsaquae ab illo invent ore veritatis et quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>');
INSERT INTO `options` VALUES ('44', 'opt_vision ', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsaquae ab illo invent ore veritatis et quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsaquae ab illo invent ore veritatis et quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>');
INSERT INTO `options` VALUES ('45', 'opt_mission ', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsaquae ab illo invent ore veritatis et quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsaquae ab illo invent ore veritatis et quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>');
INSERT INTO `options` VALUES ('46', 'opt_value ', '<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsaquae ab illo invent ore veritatis et quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>\r\n<p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium dolore mque laudantium, totam rem aperiam, eaque ipsaquae ab illo invent ore veritatis et quasi architecto beatae vitae dict eaque ipsa quae ab illo inventore veritatis et quasi architecto.</p>');
INSERT INTO `options` VALUES ('47', 'opt_contact_name ', '');
INSERT INTO `options` VALUES ('48', 'opt_contact_phone ', '+6221 5903411');
INSERT INTO `options` VALUES ('49', 'opt_contact_email ', 'r.unzhurna@gmail.com');
INSERT INTO `options` VALUES ('50', 'opt_contact_addr ', 'Alam Sutera, Tangerang Selatan');
INSERT INTO `options` VALUES ('51', 'opt_contact_name2 ', '');
INSERT INTO `options` VALUES ('52', 'opt_contact_phone2 ', '+6221 5903411');
INSERT INTO `options` VALUES ('53', 'opt_contact_email2', 'mail@shark.co.id');
INSERT INTO `options` VALUES ('54', 'opt_contact_addr2', 'Jl. Industri Keroncong No. 06 Jatiuwung, Tangerang');
INSERT INTO `options` VALUES ('55', 'opt_contact_name3', '');
INSERT INTO `options` VALUES ('56', 'opt_contact_phone3 ', '');
INSERT INTO `options` VALUES ('57', 'opt_contact_email3', '');
INSERT INTO `options` VALUES ('58', 'opt_contact_addr3', '');
INSERT INTO `options` VALUES ('59', 'opt_facebook_url', '#');
INSERT INTO `options` VALUES ('60', 'opt_twitter_url', '#');
INSERT INTO `options` VALUES ('61', 'opt_instagram_url', '#');
INSERT INTO `options` VALUES ('62', 'opt_gplus_url', '#');
INSERT INTO `options` VALUES ('63', 'opt_linkedin_url', '#');
INSERT INTO `options` VALUES ('64', 'opt_youtube_url', '#');
INSERT INTO `options` VALUES ('65', 'opt_meta_title ', 'title');
INSERT INTO `options` VALUES ('66', 'opt_meta_keyword ', 'keyword');
INSERT INTO `options` VALUES ('67', 'opt_meta_description ', 'dfrfwfwf');
INSERT INTO `options` VALUES ('68', 'opt_tracking_id ', 'idsdfd897897');
INSERT INTO `options` VALUES ('69', 'opt_profile_pdf', 'http://localhost/shark/uploads/download/Optimizely-Features.pdf');
INSERT INTO `options` VALUES ('70', 'opt_brocure_pdf', 'http://localhost/shark/uploads/download/Optimizely-Features.pdf');
INSERT INTO `options` VALUES ('71', 'opt_email_protocol', 'smtp');
INSERT INTO `options` VALUES ('72', 'opt_smtp_host', 'ssl://smtp.gmail.com');
INSERT INTO `options` VALUES ('73', 'opt_smtp_port', '465');
INSERT INTO `options` VALUES ('74', 'opt_smtp_user', 'r.unzhurna@gmail.com');
INSERT INTO `options` VALUES ('75', 'opt_smtp_pass', '1Sampa!9');

-- ----------------------------
-- Table structure for pages
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `page_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `page_author` int(11) unsigned NOT NULL DEFAULT '0',
  `page_create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `page_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `page_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `page_status` tinyint(4) NOT NULL DEFAULT '1',
  `page_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `page_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  PRIMARY KEY (`page_id`),
  KEY `type_status_date` (`page_image`(191),`page_status`,`page_create`,`page_id`),
  KEY `post_author` (`page_author`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of pages
-- ----------------------------
INSERT INTO `pages` VALUES ('1', '1', '2016-11-12 11:51:21', '2016-11-12 11:55:20', 'sdfdfdfaad', 'New Product Development', '1', 'new-product-development', 'npd.jpg');
INSERT INTO `pages` VALUES ('2', '1', '2016-11-12 11:56:16', null, 'Divisi riset dan pengembangan selalu berusaha untuk mengembangkan produk setiap waktu, dengan ide dari kebutuhan pelanggan akan peralatan Hardware and Tools.\r\n\r\nKomitmen ini menjadikan Shark sebagai salah satu produsen peralatan Hardware and Tools terkuat di Indonesia. Komitmen ini juga membawa produk Shark menembus pasar Internasional seperti Asia Tenggara, Jepang dan Eropa. ', 'After Sales Service', '1', 'after-sales-service', 'npd.jpg');

-- ----------------------------
-- Table structure for partners
-- ----------------------------
DROP TABLE IF EXISTS `partners`;
CREATE TABLE `partners` (
  `partner_id` int(11) NOT NULL AUTO_INCREMENT,
  `partner_name` varchar(100) DEFAULT NULL,
  `partner_phone` varchar(15) DEFAULT NULL,
  `partner_email` varchar(100) DEFAULT NULL,
  `partner_addr` varchar(255) DEFAULT NULL,
  `_create_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `_create_by` int(11) DEFAULT NULL,
  `_update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `_update_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`partner_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of partners
-- ----------------------------

-- ----------------------------
-- Table structure for posts
-- ----------------------------
DROP TABLE IF EXISTS `posts`;
CREATE TABLE `posts` (
  `post_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `post_author` int(11) unsigned NOT NULL DEFAULT '0',
  `post_create` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `post_update` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `post_content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `post_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `category_id` int(11) DEFAULT NULL,
  `post_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'post',
  PRIMARY KEY (`post_id`),
  KEY `type_status_date` (`post_image`(191),`post_status`,`post_create`,`post_id`),
  KEY `post_author` (`post_author`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of posts
-- ----------------------------

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `prod_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `prod_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  `prod_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `prod_fiture` text COLLATE utf8mb4_unicode_ci,
  `prod_spec` text COLLATE utf8mb4_unicode_ci,
  `prod_video` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `prod_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'no_image.jpg',
  `prod_manual` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `prod_status` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'publish',
  `_create_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `_create_by` int(11) DEFAULT NULL,
  `_update_at` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `_update_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`prod_id`),
  KEY `type_status_date` (`prod_image`(191),`prod_status`,`prod_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- ----------------------------
-- Records of products
-- ----------------------------

-- ----------------------------
-- Table structure for products_parts
-- ----------------------------
DROP TABLE IF EXISTS `products_parts`;
CREATE TABLE `products_parts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `part_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products_parts
-- ----------------------------

-- ----------------------------
-- Table structure for projects
-- ----------------------------
DROP TABLE IF EXISTS `projects`;
CREATE TABLE `projects` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_name` varchar(100) DEFAULT NULL,
  `project_img` varchar(100) DEFAULT 'no_image.jpg',
  `_create_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `_create_by` int(11) DEFAULT NULL,
  `_update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `_update_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of projects
-- ----------------------------

-- ----------------------------
-- Table structure for sales
-- ----------------------------
DROP TABLE IF EXISTS `sales`;
CREATE TABLE `sales` (
  `sales_id` int(11) NOT NULL AUTO_INCREMENT,
  `sales_name` varchar(100) DEFAULT NULL,
  `sales_phone` varchar(15) DEFAULT NULL,
  `sales_email` varchar(100) DEFAULT NULL,
  `sales_website` varchar(100) DEFAULT NULL,
  `sales_address` varchar(100) DEFAULT NULL,
  `sales_img` varchar(100) DEFAULT 'no_image.jpg',
  PRIMARY KEY (`sales_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of sales
-- ----------------------------

-- ----------------------------
-- Table structure for spareparts
-- ----------------------------
DROP TABLE IF EXISTS `spareparts`;
CREATE TABLE `spareparts` (
  `part_id` bigint(20) NOT NULL AUTO_INCREMENT,
  `part_name` varchar(200) DEFAULT NULL,
  `part_code` varchar(100) DEFAULT NULL,
  `part_desc` varchar(255) DEFAULT NULL,
  `part_img` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`part_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of spareparts
-- ----------------------------

-- ----------------------------
-- Table structure for testimony
-- ----------------------------
DROP TABLE IF EXISTS `testimony`;
CREATE TABLE `testimony` (
  `testi_id` int(11) NOT NULL AUTO_INCREMENT,
  `testi_name` varchar(100) DEFAULT NULL,
  `testi_title` varchar(255) DEFAULT NULL,
  `testi_content` text,
  `_create_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `_create_by` int(11) DEFAULT NULL,
  `_update_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `_update_by` int(11) DEFAULT NULL,
  PRIMARY KEY (`testi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of testimony
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `activation_code` varchar(40) DEFAULT NULL,
  `forgotten_password_code` varchar(40) DEFAULT NULL,
  `forgotten_password_time` int(11) unsigned DEFAULT NULL,
  `remember_code` varchar(40) DEFAULT NULL,
  `created_on` int(11) unsigned NOT NULL,
  `last_login` int(11) unsigned DEFAULT NULL,
  `active` tinyint(1) unsigned DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT 'no_image.jpg',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', '127.0.0.1', 'superadmin', '$2y$08$pkj2JuUUQu5638W1bF1JYOocZZwq5f7qtEGM0tMKYVjIZR9gy5f0i', '', 'admin@admin.com', '', null, null, 'RFaNNWMgprdiCqsERipmtO', '1268889823', '1480341101', '1', 'Super', 'Admin', '087728723455', 'cerpenesia.xyz xxxxxxxxxxxxxxxxxx', 'sdfdsfds', 'logo-small.png');
INSERT INTO `users` VALUES ('3', '127.0.0.1', null, '$2y$08$2rpCc89fKGYsdcxWAdZOAuASpQS2Ewn1OTDlx8N1lOTnbI8w3ys7q', null, 'r.unzhurna@gmail.com', null, null, null, null, '1476981903', null, '1', 'Raina', 'Unzhurna', '087728723455', 'cerpenesia.xyz', 'Jakarta', 'no_image.jpg');
INSERT INTO `users` VALUES ('4', '127.0.0.1', null, '$2y$08$GE.PyrL3yRkkCzpzC6ZvFe3ujULtaBQWOmPjcvw/Xp8Z4fjboHsMa', null, 'kjoijo@jiojoij.com', null, null, null, null, '1476982033', null, '1', 'acascasc', 'ouiouoiuoi', '980983094832493209', 'ioiudoiuqwoi', 'joisajdioasjd', '14650209_10207505766554743_7621512262634102086_n.jpg');

-- ----------------------------
-- Table structure for users_groups
-- ----------------------------
DROP TABLE IF EXISTS `users_groups`;
CREATE TABLE `users_groups` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(11) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  KEY `fk_users_groups_users1_idx` (`user_id`),
  KEY `fk_users_groups_groups1_idx` (`group_id`),
  CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of users_groups
-- ----------------------------
INSERT INTO `users_groups` VALUES ('26', '1', '1');
INSERT INTO `users_groups` VALUES ('4', '3', '2');
INSERT INTO `users_groups` VALUES ('21', '4', '1');

-- ----------------------------
-- View structure for applications
-- ----------------------------
DROP VIEW IF EXISTS `applications`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `applications` AS select `A`.`applicant_id` AS `applicant_id`,`B`.`career_title` AS `career_title`,`A`.`applicant_name` AS `applicant_name`,`A`.`applicant_phone` AS `applicant_phone`,`A`.`applicant_email` AS `applicant_email`,`A`.`apply_date` AS `apply_date`,`A`.`applicant_cv` AS `applicant_cv` from (`applicants` `A` join `careers` `B` on((`B`.`career_id` = `A`.`career_id`))) ;

-- ----------------------------
-- View structure for articles
-- ----------------------------
DROP VIEW IF EXISTS `articles`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `articles` AS select `posts`.`post_id` AS `post_id`,concat(`users`.`first_name`,' ',`users`.`last_name`) AS `post_author`,`posts`.`post_create` AS `post_create`,`posts`.`post_title` AS `post_title`,`categories`.`category_name` AS `post_category`,`posts`.`post_slug` AS `post_slug`,`categories`.`category_slug` AS `category_slug`,`posts`.`post_status` AS `post_status`,`posts`.`post_content` AS `post_content`,`posts`.`post_excerpt` AS `post_excerpt`,`posts`.`post_image` AS `post_image` from ((`posts` join `users` on((`users`.`id` = `posts`.`post_author`))) join `categories` on((`categories`.`category_id` = `posts`.`category_id`))) ;

-- ----------------------------
-- View structure for view_pages
-- ----------------------------
DROP VIEW IF EXISTS `view_pages`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pages` AS select `A`.`page_id` AS `page_id`,`A`.`page_create` AS `page_create`,`A`.`page_update` AS `page_update`,`A`.`page_content` AS `page_content`,`A`.`page_title` AS `page_title`,`A`.`page_status` AS `page_status`,`A`.`page_slug` AS `page_slug`,`A`.`page_image` AS `page_image`,concat(`B`.`first_name`,' ',`B`.`last_name`) AS `page_author` from (`pages` `A` join `users` `B` on((`B`.`id` = `A`.`page_author`))) ;

-- ----------------------------
-- View structure for view_part
-- ----------------------------
DROP VIEW IF EXISTS `view_part`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_part` AS select `products_parts`.`id` AS `id`,`spareparts`.`part_name` AS `part_name`,`spareparts`.`part_code` AS `part_code`,`spareparts`.`part_img` AS `part_img`,`products_parts`.`product_id` AS `product_id` from (`products_parts` join `spareparts` on((`spareparts`.`part_id` = `products_parts`.`part_id`))) ;

-- ----------------------------
-- View structure for view_product
-- ----------------------------
DROP VIEW IF EXISTS `view_product`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_product` AS select `products`.`prod_id` AS `prod_id`,`products`.`prod_image` AS `prod_image`,`products`.`prod_name` AS `prod_name`,`categories`.`category_name` AS `category_name`,`products`.`prod_slug` AS `prod_slug`,`products`.`prod_desc` AS `prod_desc`,`products`.`prod_fiture` AS `prod_fiture`,`products`.`prod_spec` AS `prod_spec`,`products`.`prod_video` AS `prod_video`,`categories`.`category_slug` AS `category_slug`,`products`.`prod_status` AS `prod_status`,`products`.`prod_manual` AS `prod_manual` from (`products` join `categories` on((`categories`.`category_id` = `products`.`category_id`))) ;
SET FOREIGN_KEY_CHECKS=1;
