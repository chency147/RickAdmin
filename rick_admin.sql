-- --------------------------------------------------------
-- 主机:                           127.0.0.1
-- 服务器版本:                        10.1.21-MariaDB-1~xenial - mariadb.org binary distribution
-- 服务器操作系统:                      debian-linux-gnu
-- HeidiSQL 版本:                  9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- 导出 rick_admin 的数据库结构
CREATE DATABASE IF NOT EXISTS `rick_admin` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `rick_admin`;

-- 导出  表 rick_admin.ccy_admin 结构
CREATE TABLE IF NOT EXISTS `ccy_admin` (
  `admin_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '自增ID',
  `role_id` smallint(6) unsigned NOT NULL DEFAULT '0' COMMENT '角色ID',
  `username` varchar(32) NOT NULL COMMENT '用户名',
  `guid` char(36) NOT NULL COMMENT 'GUID',
  `nickname` varchar(20) NOT NULL COMMENT '昵称',
  `password` char(255) NOT NULL COMMENT '密码',
  `created_at` int(10) unsigned NOT NULL COMMENT '创建时间',
  `created_ip` int(10) unsigned NOT NULL COMMENT '创建IP',
  `updated_at` int(10) unsigned NOT NULL COMMENT '更新时间',
  `login_at` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上次登录时间',
  `login_ip` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上次登录IP',
  PRIMARY KEY (`admin_id`),
  UNIQUE KEY `username` (`username`),
  KEY `role_id` (`role_id`),
  KEY `guid` (`guid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COMMENT='管理员表';

-- 正在导出表  rick_admin.ccy_admin 的数据：~0 rows (大约)
DELETE FROM `ccy_admin`;
/*!40000 ALTER TABLE `ccy_admin` DISABLE KEYS */;
INSERT INTO `ccy_admin` (`admin_id`, `role_id`, `username`, `guid`, `nickname`, `password`, `created_at`, `created_ip`, `updated_at`, `login_at`, `login_ip`) VALUES
	(9, 0, 'chency147', 'BBD99338-4216-62C3-6991-78E82B2B979D', 'chency147', '$2y$10$zixqBdTDBZ9TTLnXBCPdmOBmioA.BPBh//eL2aufvvkrQzmCPZpqO', 1486448139, 2130706433, 1486448139, 0, 0);
/*!40000 ALTER TABLE `ccy_admin` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
