/*
SQLyog Ultimate v11.27 (32 bit)
MySQL - 10.0.17-MariaDB : Database - invoice
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`invoice` /*!40100 DEFAULT CHARACTER SET utf8 */;

USE `invoice`;

/*Table structure for table `customer` */

DROP TABLE IF EXISTS `customer`;

CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '客户编码',
  `name` varchar(20) DEFAULT NULL COMMENT '客户名称',
  `address` varchar(50) DEFAULT NULL COMMENT '客户地址',
  `mobile` varchar(12) DEFAULT NULL COMMENT '客户电话',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `customer` */

/*Table structure for table `goods` */

DROP TABLE IF EXISTS `goods`;

CREATE TABLE `goods` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '货物编码',
  `name` varchar(20) NOT NULL COMMENT '货物名称',
  `type` varchar(20) DEFAULT NULL COMMENT '货物类型',
  `coast_price` int(11) DEFAULT NULL COMMENT '购入价格',
  `sale_price` int(11) DEFAULT NULL COMMENT '出售价格',
  `remarks` varchar(50) DEFAULT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `goods` */

insert  into `goods`(`id`,`name`,`type`,`coast_price`,`sale_price`,`remarks`) values (1,'iphone9','数码',6666,9999,'概念机');

/*Table structure for table `purchase_in` */

DROP TABLE IF EXISTS `purchase_in`;

CREATE TABLE `purchase_in` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '采购入库单编码',
  `supplier_id` int(11) DEFAULT NULL COMMENT '供应商ID',
  `warehouse_id` int(11) DEFAULT NULL COMMENT '入库仓库ID',
  `user_id` int(11) DEFAULT NULL COMMENT '操作员ID',
  `status` enum('wait_check','check_faile','wait_finish','finish_faile','finish') DEFAULT NULL COMMENT '订单状态',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `finished` timestamp NULL DEFAULT NULL COMMENT '完成时间',
  PRIMARY KEY (`id`),
  KEY `supplier_id` (`supplier_id`),
  KEY `warehouse_id` (`warehouse_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `purchase_in_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`),
  CONSTRAINT `purchase_in_ibfk_2` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`),
  CONSTRAINT `purchase_in_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `purchase_in` */

/*Table structure for table `purchase_in_details` */

DROP TABLE IF EXISTS `purchase_in_details`;

CREATE TABLE `purchase_in_details` (
  `id` int(11) NOT NULL COMMENT '采购入库明细ID',
  `parchase_in_id` int(11) DEFAULT NULL COMMENT '采购入库单ID',
  `goods_id` int(11) DEFAULT NULL COMMENT '商品ID',
  `number` int(11) DEFAULT NULL COMMENT '商品数量',
  `price` float(8,2) DEFAULT NULL COMMENT '商品价格',
  `count` float(8,2) DEFAULT NULL COMMENT '总价格',
  PRIMARY KEY (`id`),
  KEY `parchase_in_id` (`parchase_in_id`),
  KEY `goods_id` (`goods_id`),
  CONSTRAINT `purchase_in_details_ibfk_1` FOREIGN KEY (`parchase_in_id`) REFERENCES `purchase_in` (`id`),
  CONSTRAINT `purchase_in_details_ibfk_2` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `purchase_in_details` */

/*Table structure for table `purchase_return` */

DROP TABLE IF EXISTS `purchase_return`;

CREATE TABLE `purchase_return` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '采购退货单ID',
  `supplier_id` int(11) DEFAULT NULL COMMENT '供应商ID',
  `warehouse_id` int(11) DEFAULT NULL COMMENT '退货仓库ID',
  `user_id` int(11) DEFAULT NULL COMMENT '操作员ID',
  `status` enum('wait_check','check_faile','wait_finish','finish_faile','finish') DEFAULT NULL COMMENT '订单状态',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `finished` timestamp NULL DEFAULT NULL COMMENT '完成时间',
  PRIMARY KEY (`id`),
  KEY `supplier_id` (`supplier_id`),
  KEY `warehouse_id` (`warehouse_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `purchase_return_ibfk_1` FOREIGN KEY (`supplier_id`) REFERENCES `supplier` (`id`),
  CONSTRAINT `purchase_return_ibfk_2` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`),
  CONSTRAINT `purchase_return_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `purchase_return` */

/*Table structure for table `purchase_return_details` */

DROP TABLE IF EXISTS `purchase_return_details`;

CREATE TABLE `purchase_return_details` (
  `id` int(11) NOT NULL COMMENT '采购退货明细ID',
  `parchase_return_id` int(11) DEFAULT NULL COMMENT '采购退货单ID',
  `goods_id` int(11) DEFAULT NULL COMMENT '商品ID',
  `number` int(11) DEFAULT NULL COMMENT '商品数量',
  `price` float(8,2) DEFAULT NULL COMMENT '商品价格',
  `count` float(8,2) DEFAULT NULL COMMENT '总价格',
  PRIMARY KEY (`id`),
  KEY `parchase_return_id` (`parchase_return_id`),
  KEY `goods_id` (`goods_id`),
  CONSTRAINT `purchase_return_details_ibfk_1` FOREIGN KEY (`parchase_return_id`) REFERENCES `purchase_return` (`id`),
  CONSTRAINT `purchase_return_details_ibfk_2` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `purchase_return_details` */

/*Table structure for table `role` */

DROP TABLE IF EXISTS `role`;

CREATE TABLE `role` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '角色编码',
  `name` varchar(20) DEFAULT NULL COMMENT '角色名称',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

/*Data for the table `role` */

insert  into `role`(`id`,`name`) values (1,'管理员'),(2,'采购员'),(3,'销售员'),(4,'仓库管理员');

/*Table structure for table `sale_out` */

DROP TABLE IF EXISTS `sale_out`;

CREATE TABLE `sale_out` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '销售出库单编码',
  `customer_id` int(11) DEFAULT NULL COMMENT '客户ID',
  `warehouse_id` int(11) DEFAULT NULL COMMENT '出库仓库ID',
  `user_id` int(11) DEFAULT NULL COMMENT '操作员ID',
  `status` enum('wait_check','check_faile','wait_finish','finish_faile','finish') DEFAULT NULL COMMENT '订单状态',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `finished` timestamp NULL DEFAULT NULL COMMENT '完成时间',
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `warehouse_id` (`warehouse_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `sale_out_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  CONSTRAINT `sale_out_ibfk_2` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`),
  CONSTRAINT `sale_out_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sale_out` */

/*Table structure for table `sale_out_details` */

DROP TABLE IF EXISTS `sale_out_details`;

CREATE TABLE `sale_out_details` (
  `id` int(11) NOT NULL COMMENT '销售出库明细ID',
  `sale_out_id` int(11) DEFAULT NULL COMMENT '销售出库单ID',
  `goods_id` int(11) DEFAULT NULL COMMENT '商品ID',
  `number` int(11) DEFAULT NULL COMMENT '商品数量',
  `price` float(8,2) DEFAULT NULL COMMENT '商品价格',
  `count` float(8,2) DEFAULT NULL COMMENT '总价格',
  PRIMARY KEY (`id`),
  KEY `sale_out_id` (`sale_out_id`),
  KEY `goods_id` (`goods_id`),
  CONSTRAINT `sale_out_details_ibfk_1` FOREIGN KEY (`sale_out_id`) REFERENCES `sale_out` (`id`),
  CONSTRAINT `sale_out_details_ibfk_2` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sale_out_details` */

/*Table structure for table `sale_return` */

DROP TABLE IF EXISTS `sale_return`;

CREATE TABLE `sale_return` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '销售退货单编码',
  `customer_id` int(11) DEFAULT NULL COMMENT '客户ID',
  `warehouse_id` int(11) DEFAULT NULL COMMENT '入库仓库ID',
  `user_id` int(11) DEFAULT NULL COMMENT '操作员ID',
  `status` enum('wait_check','check_faile','wait_finish','finish_faile','finish') DEFAULT NULL COMMENT '订单状态',
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP COMMENT '创建时间',
  `finished` timestamp NULL DEFAULT NULL COMMENT '完成时间',
  PRIMARY KEY (`id`),
  KEY `customer_id` (`customer_id`),
  KEY `warehouse_id` (`warehouse_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `sale_return_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  CONSTRAINT `sale_return_ibfk_2` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`),
  CONSTRAINT `sale_return_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sale_return` */

/*Table structure for table `sale_return_details` */

DROP TABLE IF EXISTS `sale_return_details`;

CREATE TABLE `sale_return_details` (
  `id` int(11) NOT NULL COMMENT '销售退货明细ID',
  `sale_return_id` int(11) DEFAULT NULL COMMENT '销售退货单ID',
  `goods_id` int(11) DEFAULT NULL COMMENT '商品ID',
  `number` int(11) DEFAULT NULL COMMENT '商品数量',
  `price` float(8,2) DEFAULT NULL COMMENT '商品价格',
  `count` float(8,2) DEFAULT NULL COMMENT '总价格',
  PRIMARY KEY (`id`),
  KEY `sale_return_id` (`sale_return_id`),
  KEY `goods_id` (`goods_id`),
  CONSTRAINT `sale_return_details_ibfk_1` FOREIGN KEY (`sale_return_id`) REFERENCES `sale_return` (`id`),
  CONSTRAINT `sale_return_details_ibfk_2` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `sale_return_details` */

/*Table structure for table `stock` */

DROP TABLE IF EXISTS `stock`;

CREATE TABLE `stock` (
  `warehouse_id` int(11) DEFAULT NULL COMMENT '仓库编码',
  `goods_id` int(11) DEFAULT NULL COMMENT '商品编码',
  `number` int(11) DEFAULT NULL COMMENT '库存量',
  KEY `goods_id` (`goods_id`),
  KEY `warehouse_id` (`warehouse_id`),
  CONSTRAINT `stock_ibfk_2` FOREIGN KEY (`goods_id`) REFERENCES `goods` (`id`),
  CONSTRAINT `stock_ibfk_3` FOREIGN KEY (`warehouse_id`) REFERENCES `warehouse` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `stock` */

/*Table structure for table `supplier` */

DROP TABLE IF EXISTS `supplier`;

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '供应商编码',
  `name` varchar(20) NOT NULL COMMENT '供应商名称',
  `address` varchar(50) DEFAULT NULL COMMENT '供应商地址',
  `fixed_line` varchar(15) DEFAULT NULL COMMENT '供应商电话',
  `linkman` varchar(20) DEFAULT NULL COMMENT '供应商联系人',
  `linkman_mobile` varchar(12) DEFAULT NULL COMMENT '联系人号码',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `supplier` */

insert  into `supplier`(`id`,`name`,`address`,`fixed_line`,`linkman`,`linkman_mobile`) values (1,'实力派','广东肇庆','0755-12345677','大力','12345678901');

/*Table structure for table `transfer` */

DROP TABLE IF EXISTS `transfer`;

CREATE TABLE `transfer` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '仓库调拨单编码',
  `send_warehouse` varchar(20) DEFAULT NULL COMMENT '发货仓库',
  `receive_warehouse` varchar(20) DEFAULT NULL COMMENT '收货仓库',
  `goods` varchar(20) DEFAULT NULL COMMENT '商品名称',
  `number` int(11) DEFAULT NULL COMMENT '商品数量',
  `user_name` varchar(20) DEFAULT NULL COMMENT '操作员',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `transfer` */

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '用户编码',
  `name` varchar(20) DEFAULT NULL COMMENT '用户名称',
  `password` varchar(20) NOT NULL COMMENT '用户密码',
  `mobile` varchar(12) DEFAULT NULL COMMENT '用户电话',
  `role_id` int(11) NOT NULL COMMENT '角色编码',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `user_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

/*Data for the table `user` */

insert  into `user`(`id`,`name`,`password`,`mobile`,`role_id`) values (1,'admin','admin','12312342111',1),(2,'user1','user1','23423452345',2),(3,'user2','user2','34534563456',3),(4,'user3','user3','45645674456',4),(5,'user4','user4','11111111111',2),(6,'user5','user5','22222222222',2);

/*Table structure for table `warehouse` */

DROP TABLE IF EXISTS `warehouse`;

CREATE TABLE `warehouse` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '仓库编码',
  `name` varchar(20) DEFAULT NULL COMMENT '仓库名称',
  `address` varchar(50) DEFAULT NULL COMMENT '仓库地址',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `warehouse` */

insert  into `warehouse`(`id`,`name`,`address`) values (1,'仓库1号','广东深圳');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
