/*
SQLyog Ultimate v12.4.3 (64 bit)
MySQL - 10.1.32-MariaDB : Database - mm_checklist
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`mm_checklist` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `mm_checklist`;

/*Table structure for table `category` */

DROP TABLE IF EXISTS `category`;

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `category_name` varchar(30) DEFAULT NULL,
  `dept_id` bigint(20) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `category` */

insert  into `category`(`id`,`category_name`,`dept_id`,`region_id`) values 
(1,'TAMPAK / IMAGE STORE',2,1000),
(2,'ADMINISTRASI',2,1000),
(3,'PRODUCT',2,1000),
(4,'PEOPLE',2,1000),
(5,'MAINTENANCE',2,1000);

/*Table structure for table `checklist_detail` */

DROP TABLE IF EXISTS `checklist_detail`;

CREATE TABLE `checklist_detail` (
  `checklist_id` bigint(20) NOT NULL,
  `item_id` int(11) NOT NULL,
  `choice` varchar(10) DEFAULT NULL,
  `information` varchar(200) DEFAULT NULL,
  `img` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`checklist_id`,`item_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `checklist_detail` */

insert  into `checklist_detail`(`checklist_id`,`item_id`,`choice`,`information`,`img`) values 
(2019031000024101287,1,'ok','','95c3107887f474ef59e19353e8b63a1b.jpg'),
(2019031000024101287,2,'no','',''),
(2019031000024101287,3,'ok','','95c71df5ec9ba6975c9045ad8a15cf9a.jpg'),
(2019031000024101287,4,'no','',''),
(2019031000024101287,5,'ok','',''),
(2019031000024101287,6,'ok','','');

/*Table structure for table `checklist_head` */

DROP TABLE IF EXISTS `checklist_head`;

CREATE TABLE `checklist_head` (
  `id` bigint(20) NOT NULL,
  `checklist_date` datetime DEFAULT NULL,
  `checklist_id` int(11) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `dept_id` int(11) DEFAULT NULL,
  `store` int(11) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `month` int(2) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `checklist_head` */

insert  into `checklist_head`(`id`,`checklist_date`,`checklist_id`,`region_id`,`dept_id`,`store`,`year`,`month`,`status`) values 
(2019031000024101287,'2019-03-06 09:41:00',219001287,1000,2,41,2019,4,'checked');

/*Table structure for table `item_checklist` */

DROP TABLE IF EXISTS `item_checklist`;

CREATE TABLE `item_checklist` (
  `id` int(11) NOT NULL,
  `item_name` varchar(100) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `dept_id` bigint(20) DEFAULT NULL,
  `status` char(2) DEFAULT NULL,
  `order` int(4) DEFAULT NULL,
  `region_id` int(11) DEFAULT NULL,
  `need_image` char(1) DEFAULT 'N',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `item_checklist` */

insert  into `item_checklist`(`id`,`item_name`,`category_id`,`dept_id`,`status`,`order`,`region_id`,`need_image`) values 
(1,'TAMPAK SIGN / NEON BOX 1 & 2 SISI',1,2,'A',1,1000,'Y'),
(2,'TAMPAK PACADE STORE',1,2,'A',2,1000,'N'),
(3,'KEBERSIHAN & KERPIAN HALAMAN PARKIR SISI DEPAN KANAN & KIRI',3,2,'A',3,1000,'Y'),
(4,'KEBERSIHAN KACA PINTU & SEMUA SISI STORE',1,2,'A',4,1000,'N'),
(5,'KEBERSIHAN & KERAPIAN LANTAI STORE',5,2,'A',5,1000,'N'),
(6,'asdasd',1,1,'A',1,1000,'N'),
(7,'qwerty',4,1,'A',1,1001,'N');

/*Table structure for table `matriks_app_detail` */

DROP TABLE IF EXISTS `matriks_app_detail`;

CREATE TABLE `matriks_app_detail` (
  `matriks_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `level_app` int(4) DEFAULT NULL,
  PRIMARY KEY (`matriks_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `matriks_app_detail` */

insert  into `matriks_app_detail`(`matriks_id`,`user_id`,`level_app`) values 
(10001,219204208,1),
(10001,219706090,2),
(10002,219205259,1),
(10002,219706090,2);

/*Table structure for table `matriks_app_head` */

DROP TABLE IF EXISTS `matriks_app_head`;

CREATE TABLE `matriks_app_head` (
  `id` int(11) NOT NULL,
  `region_id` int(11) DEFAULT NULL,
  `dept_id` bigint(20) DEFAULT NULL,
  `count_app` int(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `matriks_app_head` */

insert  into `matriks_app_head`(`id`,`region_id`,`dept_id`,`count_app`) values 
(10001,1000,1,2),
(10002,1000,2,2);

/*Table structure for table `menu` */

DROP TABLE IF EXISTS `menu`;

CREATE TABLE `menu` (
  `id` int(3) DEFAULT NULL,
  `menu` varchar(50) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `menu` */

insert  into `menu`(`id`,`menu`,`parent`) values 
(1,'home',0),
(2,'setting',0),
(3,'category',2),
(4,'item checklist',2),
(5,'user',2),
(6,'schedule',0),
(7,'report',0),
(8,'checklist AAM',7),
(9,'visit by schedule',7),
(10,'user menu',2),
(13,'schedule checklist',6),
(12,'schedule pending',6),
(11,'matriks approval',2);

/*Table structure for table `region` */

DROP TABLE IF EXISTS `region`;

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `region_name` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `region` */

insert  into `region`(`id`,`region_name`) values 
(1000,'Bali'),
(1001,'Lombok'),
(1002,'Makassar');

/*Table structure for table `schedule_app` */

DROP TABLE IF EXISTS `schedule_app`;

CREATE TABLE `schedule_app` (
  `schedule_id` bigint(20) NOT NULL,
  `app_id` varchar(20) NOT NULL,
  `app_date` datetime DEFAULT NULL,
  PRIMARY KEY (`schedule_id`,`app_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `schedule_app` */

insert  into `schedule_app`(`schedule_id`,`app_id`,`app_date`) values 
(20190410000201287,'219001287','2019-03-04 15:12:10'),
(20190410000201287,'219205259','2019-03-06 09:40:26'),
(20190410000201287,'219706090','2019-03-06 09:40:45');

/*Table structure for table `schedule_app_pending` */

DROP TABLE IF EXISTS `schedule_app_pending`;

CREATE TABLE `schedule_app_pending` (
  `schedule_id` bigint(20) NOT NULL,
  `user_id` int(11) NOT NULL,
  `level_app` int(11) DEFAULT NULL,
  PRIMARY KEY (`schedule_id`,`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `schedule_app_pending` */

/*Table structure for table `schedule_detail` */

DROP TABLE IF EXISTS `schedule_detail`;

CREATE TABLE `schedule_detail` (
  `schedule_id` bigint(20) NOT NULL,
  `store` int(4) NOT NULL,
  `checklist_date` date DEFAULT NULL,
  `status` int(2) DEFAULT NULL,
  `realization_date` date DEFAULT NULL,
  PRIMARY KEY (`schedule_id`,`store`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `schedule_detail` */

insert  into `schedule_detail`(`schedule_id`,`store`,`checklist_date`,`status`,`realization_date`) values 
(20190410000201287,41,'2019-03-06',NULL,NULL),
(20190410000201287,42,'2019-03-06',NULL,NULL);

/*Table structure for table `schedule_head` */

DROP TABLE IF EXISTS `schedule_head`;

CREATE TABLE `schedule_head` (
  `id` bigint(20) NOT NULL,
  `region_id` int(11) DEFAULT NULL,
  `dept_id` bigint(20) DEFAULT NULL,
  `month` int(2) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `created_id` varchar(20) DEFAULT NULL,
  `created_name` varchar(100) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `schedule_head` */

insert  into `schedule_head`(`id`,`region_id`,`dept_id`,`month`,`year`,`created_id`,`created_name`,`created_date`,`status`) values 
(20190410000201287,1000,2,4,2019,'219001287',NULL,'2019-03-04 15:12:06','approved');

/*Table structure for table `temp_schedule` */

DROP TABLE IF EXISTS `temp_schedule`;

CREATE TABLE `temp_schedule` (
  `region_id` int(11) DEFAULT NULL,
  `dept_id` bigint(20) DEFAULT NULL,
  `month` int(3) DEFAULT NULL,
  `year` int(4) DEFAULT NULL,
  `store` int(11) DEFAULT NULL,
  `schedule_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `temp_schedule` */

/*Table structure for table `user_menu` */

DROP TABLE IF EXISTS `user_menu`;

CREATE TABLE `user_menu` (
  `user_id` int(11) DEFAULT NULL,
  `menu_id` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `user_menu` */

insert  into `user_menu`(`user_id`,`menu_id`) values 
(219001287,'1,2,3,4,5,6,7,8,9,10,11,12,13'),
(218700130,'1,2,3,4'),
(219204208,'6,12'),
(219706090,'6,12'),
(219205259,'6,12');

/* Trigger structure for table `checklist_head` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `del_checklist` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `del_checklist` AFTER DELETE ON `checklist_head` FOR EACH ROW BEGIN
		delete from `mm_checklist`.`checklist_detail`
		where `mm_checklist`.`checklist_detail`.`checklist_id` = OLD.id;
    END */$$


DELIMITER ;

/* Trigger structure for table `matriks_app_head` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `del_matriksapp_head` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `del_matriksapp_head` AFTER DELETE ON `matriks_app_head` FOR EACH ROW BEGIN
		delete from `matriks_app_detail`
		where `matriks_app_detail`.`matriks_id` = old.id;
    END */$$


DELIMITER ;

/* Trigger structure for table `schedule_head` */

DELIMITER $$

/*!50003 DROP TRIGGER*//*!50032 IF EXISTS */ /*!50003 `del_schedule_head` */$$

/*!50003 CREATE */ /*!50017 DEFINER = 'root'@'localhost' */ /*!50003 TRIGGER `del_schedule_head` AFTER DELETE ON `schedule_head` FOR EACH ROW BEGIN
		delete from `mm_checklist`.`schedule_detail`
		where `mm_checklist`.`schedule_detail`.`schedule_id` = OLD.id;
		
		delete from `mm_checklist`.`schedule_app_pending`
		where `mm_checklist`.`schedule_app_pending`.`schedule_id` = OLD.id;
		
		delete from `mm_checklist`.`schedule_app`
		where `mm_checklist`.`schedule_app`.`schedule_id` = old.id;
    END */$$


DELIMITER ;

/* Function  structure for function  `count_app` */

/*!50003 DROP FUNCTION IF EXISTS `count_app` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `count_app`(_schedule_id bigint) RETURNS int(11)
BEGIN
    
    DECLARE _count_app INT DEFAULT 0;
    
    -- 	select count approve from schedule (approve with user)
	select count(`schedule_app`.`schedule_id`) into _count_app
	from `schedule_app`
	where `schedule_app`.`schedule_id` = _schedule_id;
	
	return _count_app;
    END */$$
DELIMITER ;

/* Function  structure for function  `max_app` */

/*!50003 DROP FUNCTION IF EXISTS `max_app` */;
DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` FUNCTION `max_app`(_region_id int, _dept_id int) RETURNS int(11)
BEGIN
    
    declare _max_app int default 0;
    
    -- 	select max approve from matriks schdule 
	select (`matriks_app_head`.`count_app` + 1) into _max_app
	from `matriks_app_head`
	where `matriks_app_head`.`region_id` = _region_id
	and `matriks_app_head`.`dept_id` = _dept_id;
	
	return _max_app;
    END */$$
DELIMITER ;

/* Procedure structure for procedure `ins_next_app_sched` */

/*!50003 DROP PROCEDURE IF EXISTS  `ins_next_app_sched` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `ins_next_app_sched`(in _schedule_id bigint)
BEGIN
	declare isMax boolean;
	declare _max_app int default 0;
	DECLARE _count_app INT DEFAULT 0;
	DECLARE _region_id int DEFAULT 0;
	DECLARE _dept_id INT DEFAULT 0;
	select region_id, dept_id
	into _region_id, _dept_id
	from `schedule_head`
	where `id` = _schedule_id;
	
	-- select select max app dari table matriks_app_head
	select max_app(_region_id, _dept_id) into _max_app;
	
	-- select jumlah app dari table schedule_app
	select count_app(_schedule_id) into _count_app;
	
	-- select _count_app, _max_app;
	
	if _count_app <= _max_app then
	-- 	delete list pending level sebelumnya
		DELETE FROM `schedule_app_pending`
		WHERE `schedule_app_pending`.`schedule_id` = _schedule_id
		AND `schedule_app_pending`.`level_app` = (_count_app - 1);
		
	--	insert into table schedule_app_pending untuk level selanjutnya
		INSERT INTO `schedule_app_pending`
		SELECT _schedule_id, b.`user_id`, b.level_app
		FROM `matriks_app_head` AS a
		INNER JOIN `matriks_app_detail` AS b ON a.`id` = b.`matriks_id`
		WHERE a.`region_id` = _region_id
		AND a.`dept_id` = _dept_id
		AND b.`level_app` = _count_app;

		if (_count_app + 1) = _max_app then
			update `schedule_head`
			set `schedule_head`.`status` = 'approved'
			where `schedule_head`.`id` = _schedule_id;
		end if;
	end if;
	END */$$
DELIMITER ;

/* Procedure structure for procedure `last_level_app` */

/*!50003 DROP PROCEDURE IF EXISTS  `last_level_app` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `last_level_app`(IN _schedule_id bigint, IN _user_id int)
BEGIN
	
	DECLARE _last_lvl_app INT;
	DECLARE _lvl_app INT;
	declare _app_id int;
	declare _last_app_id int;
	
	-- get lvl app
	SELECT level_app INTO _lvl_app
	FROM `matriks_app_head`
	INNER JOIN `matriks_app_detail` ON `matriks_app_head`.`id` = `matriks_app_detail`.`matriks_id`
	WHERE region_id = 1000
	AND dept_id = 1
	AND user_id = _user_id;
	
	-- get last level app
	SELECT `schedule_app`.`app_id`, `schedule_head`.`created_id`, `matriks_app_detail`.`level_app`
	into _last_app_id, _app_id, _last_lvl_app
	FROM `schedule_app`
	INNER JOIN (
		SELECT `schedule_app`.`schedule_id`, MAX(`schedule_app`.`app_date`) max_app_date
		FROM `schedule_app`
		WHERE `schedule_app`.`schedule_id` = _schedule_id
		GROUP BY `schedule_app`.`schedule_id` 
	) AS max_app ON `schedule_app`.`schedule_id` = max_app.schedule_id AND `schedule_app`.`app_date` = max_app.max_app_date
	INNER JOIN `schedule_head` ON schedule_app.`schedule_id` = `schedule_head`.`id`
	LEFT JOIN `matriks_app_head` ON `schedule_head`.`region_id` = `matriks_app_head`.`region_id` 
		AND `matriks_app_head`.`dept_id` = `schedule_head`.`dept_id`
	LEFT JOIN `matriks_app_detail` ON `matriks_app_head`.`id` = `matriks_app_detail`.`matriks_id` 
		AND `schedule_app`.`app_id` = `matriks_app_detail`.`user_id`;

	IF _lvl_app <= _last_lvl_app THEN
		SELECT _lvl_app, _last_lvl_app, '0' AS output;
	ELSEIF _lvl_app IS NULL AND _last_lvl_app IS NOT NULL THEN
		SELECT _lvl_app, _last_lvl_app, '0' AS output;
	ELSEIF _last_lvl_app IS NULL THEN
		IF _user_id = _last_app_id THEN
			SELECT _lvl_app, _last_lvl_app, '0' AS output;
		ELSE
			SELECT _lvl_app, _last_lvl_app, '1' AS output;
		END IF;
	ELSE
		SELECT _lvl_app, _last_lvl_app, '1' AS output;
	END IF;
	
END */$$
DELIMITER ;

/* Procedure structure for procedure `list_checklist` */

/*!50003 DROP PROCEDURE IF EXISTS  `list_checklist` */;

DELIMITER $$

/*!50003 CREATE DEFINER=`root`@`localhost` PROCEDURE `list_checklist`(IN _user_id int)
BEGIN
	
	SELECT `schedule_head`.`region_id`, `minimart`.`region`.`region_name`, `schedule_head`.`dept_id`, `minimart`.`department`.`dept_name`,
		`schedule_head`.`month`, `schedule_head`.`year`, `schedule_detail`.`store`, `checklist_head`.`id`, 
		`checklist_head`.`checklist_date`, `checklist_head`.`checklist_id`, `minimart`.`user`.`full_name`
	FROM `schedule_head`
	INNER JOIN `schedule_detail` ON `schedule_head`.`id` = `schedule_detail`.`schedule_id`
	LEFT JOIN `checklist_head` ON `schedule_head`.`month` = `checklist_head`.`month` 
		AND `schedule_head`.`year` = `checklist_head`.`year` 
		AND `schedule_detail`.`store` = `checklist_head`.`store` 
	INNER JOIN minimart.`region` ON `minimart`.`region`.`id` = `schedule_head`.`region_id`
	INNER JOIN minimart.`department` ON `minimart`.`department`.`id` = `schedule_head`.`dept_id`
	LEFT JOIN `minimart`.`user` ON `minimart`.`user`.`id` = `checklist_head`.`checklist_id`
	WHERE `schedule_detail`.`store` IN(
		SELECT minimart.`user_store`.`store_id` 
		FROM minimart.`user_store` 
		WHERE minimart.`user_store`.`user_id` = _user_id
	);

	END */$$
DELIMITER ;

/*Table structure for table `vw_checklist` */

DROP TABLE IF EXISTS `vw_checklist`;

/*!50001 DROP VIEW IF EXISTS `vw_checklist` */;
/*!50001 DROP TABLE IF EXISTS `vw_checklist` */;

/*!50001 CREATE TABLE  `vw_checklist`(
 `schedule_id` bigint(20) ,
 `region_id` int(11) ,
 `region_name` varchar(20) ,
 `dept_id` bigint(20) ,
 `dept_name` varchar(20) ,
 `month` int(2) ,
 `year` int(4) ,
 `id` bigint(20) ,
 `checklist_date` datetime ,
 `checklist_id` int(11) ,
 `full_name` varchar(100) ,
 `store` int(11) 
)*/;

/*Table structure for table `vw_item` */

DROP TABLE IF EXISTS `vw_item`;

/*!50001 DROP VIEW IF EXISTS `vw_item` */;
/*!50001 DROP TABLE IF EXISTS `vw_item` */;

/*!50001 CREATE TABLE  `vw_item`(
 `id` int(11) ,
 `category_id` int(11) ,
 `dept_id` bigint(20) ,
 `region_id` int(11) ,
 `category_name` varchar(30) ,
 `item_name` varchar(100) ,
 `order` int(4) ,
 `status` char(2) 
)*/;

/*View structure for view vw_checklist */

/*!50001 DROP TABLE IF EXISTS `vw_checklist` */;
/*!50001 DROP VIEW IF EXISTS `vw_checklist` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_checklist` AS select `mm_checklist`.`schedule_head`.`id` AS `schedule_id`,`mm_checklist`.`schedule_head`.`region_id` AS `region_id`,`minimart`.`region`.`region_name` AS `region_name`,`mm_checklist`.`schedule_head`.`dept_id` AS `dept_id`,`minimart`.`department`.`dept_name` AS `dept_name`,`mm_checklist`.`schedule_head`.`month` AS `month`,`mm_checklist`.`schedule_head`.`year` AS `year`,`mm_checklist`.`checklist_head`.`id` AS `id`,`mm_checklist`.`checklist_head`.`checklist_date` AS `checklist_date`,`mm_checklist`.`checklist_head`.`checklist_id` AS `checklist_id`,`minimart`.`user`.`full_name` AS `full_name`,`mm_checklist`.`checklist_head`.`store` AS `store` from (((((`mm_checklist`.`schedule_head` join `mm_checklist`.`schedule_detail` on((`mm_checklist`.`schedule_head`.`id` = `mm_checklist`.`schedule_detail`.`schedule_id`))) left join `mm_checklist`.`checklist_head` on(((`mm_checklist`.`schedule_head`.`month` = `mm_checklist`.`checklist_head`.`month`) and (`mm_checklist`.`schedule_head`.`year` = `mm_checklist`.`checklist_head`.`year`) and (`mm_checklist`.`schedule_detail`.`store` = `mm_checklist`.`checklist_head`.`store`)))) join `minimart`.`region` on((`minimart`.`region`.`id` = `mm_checklist`.`schedule_head`.`region_id`))) join `minimart`.`department` on((`minimart`.`department`.`id` = `mm_checklist`.`schedule_head`.`dept_id`))) left join `minimart`.`user` on((`minimart`.`user`.`id` = `mm_checklist`.`checklist_head`.`checklist_id`))) */;

/*View structure for view vw_item */

/*!50001 DROP TABLE IF EXISTS `vw_item` */;
/*!50001 DROP VIEW IF EXISTS `vw_item` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_item` AS select `a`.`id` AS `id`,`a`.`category_id` AS `category_id`,`a`.`dept_id` AS `dept_id`,`a`.`region_id` AS `region_id`,`b`.`category_name` AS `category_name`,`a`.`item_name` AS `item_name`,`a`.`order` AS `order`,`a`.`status` AS `status` from (`item_checklist` `a` join `category` `b` on((`a`.`category_id` = `b`.`id`))) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
