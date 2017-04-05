# Host: localhost  (Version 5.7.17-log)
# Date: 2017-04-05 12:04:38
# Generator: MySQL-Front 6.0  (Build 1.62)


#
# Structure for table "condiments"
#

DROP TABLE IF EXISTS `condiments`;
CREATE TABLE `condiments` (
  `InvenName` varchar(255) NOT NULL DEFAULT 'No Name',
  `Company` varchar(255) NOT NULL DEFAULT 'No Company',
  `Amount` int(2) unsigned NOT NULL DEFAULT '0',
  `Best Before` date NOT NULL DEFAULT '0000-00-00',
  PRIMARY KEY (`InvenName`,`Company`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "condiments"
#


#
# Structure for table "customer"
#

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `Email` varchar(255) NOT NULL DEFAULT 'noemail@available.com',
  `Password` varchar(255) NOT NULL DEFAULT '0000',
  `Name` varchar(255) NOT NULL DEFAULT 'No Name Nancy',
  `Birthday` date NOT NULL DEFAULT '0000-00-00',
  `Points_Balance` int(6) unsigned NOT NULL DEFAULT '0',
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "customer"
#

INSERT INTO `customer` VALUES ('eayuban@gmail.com','VGAMP8371','Edraelan Ayuban','1996-10-30',0);

#
# Structure for table "drink"
#

DROP TABLE IF EXISTS `drink`;
CREATE TABLE `drink` (
  `Name` varchar(255) NOT NULL DEFAULT 'Bad Beverage',
  `Recipe` varchar(5000) DEFAULT NULL,
  `Type` varchar(255) DEFAULT NULL,
  `Price` decimal(4,2) unsigned NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "drink"
#


#
# Structure for table "employee"
#

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `SIN` int(9) unsigned zerofill NOT NULL DEFAULT '000000000',
  `Name` varchar(255) DEFAULT NULL,
  `ManagerSIN` int(9) unsigned zerofill DEFAULT NULL,
  `Password` varchar(255) NOT NULL DEFAULT '0000',
  PRIMARY KEY (`SIN`),
  KEY `Manager_Ref` (`ManagerSIN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "employee"
#


#
# Structure for table "machinery"
#

DROP TABLE IF EXISTS `machinery`;
CREATE TABLE `machinery` (
  `Type` varchar(255) NOT NULL DEFAULT 'No Type',
  `Manufacture Year` year(4) NOT NULL DEFAULT '0000',
  PRIMARY KEY (`Type`,`Manufacture Year`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "machinery"
#


#
# Structure for table "rewards"
#

DROP TABLE IF EXISTS `rewards`;
CREATE TABLE `rewards` (
  `Type` varchar(255) NOT NULL DEFAULT 'Reward not specified',
  `Point Cost` int(6) unsigned NOT NULL DEFAULT '100',
  PRIMARY KEY (`Type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "rewards"
#


#
# Structure for table "redeemed_rewards"
#

DROP TABLE IF EXISTS `redeemed_rewards`;
CREATE TABLE `redeemed_rewards` (
  `Reward Type` varchar(255) NOT NULL DEFAULT 'Unspecified Reward',
  `Customer Email` varchar(255) NOT NULL DEFAULT 'noemail@available.com',
  PRIMARY KEY (`Reward Type`,`Customer Email`),
  KEY `Customer_Ref` (`Customer Email`),
  CONSTRAINT `Reward_Ref` FOREIGN KEY (`Reward Type`) REFERENCES `rewards` (`Type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "redeemed_rewards"
#


#
# Structure for table "sales"
#

DROP TABLE IF EXISTS `sales`;
CREATE TABLE `sales` (
  `Sales ID` int(10) unsigned zerofill NOT NULL AUTO_INCREMENT,
  `Drink` varchar(255) DEFAULT NULL,
  `Date` date DEFAULT NULL,
  `Customer Info` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Sales ID`),
  KEY `Customer_Reference` (`Customer Info`),
  CONSTRAINT `Customer_Reference` FOREIGN KEY (`Customer Info`) REFERENCES `customer` (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "sales"
#


#
# Structure for table "purchase_history"
#

DROP TABLE IF EXISTS `purchase_history`;
CREATE TABLE `purchase_history` (
  `Sale ID` int(10) unsigned zerofill NOT NULL DEFAULT '0000000000',
  `Customer Email` varchar(255) NOT NULL DEFAULT 'noemail@available.com',
  PRIMARY KEY (`Sale ID`,`Customer Email`),
  KEY `Cust_Ref` (`Customer Email`),
  CONSTRAINT `Sale_Ref` FOREIGN KEY (`Sale ID`) REFERENCES `sales` (`Sales ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "purchase_history"
#


#
# Structure for table "tea_leaves_coffee_beans"
#

DROP TABLE IF EXISTS `tea_leaves_coffee_beans`;
CREATE TABLE `tea_leaves_coffee_beans` (
  `InvenName` varchar(255) NOT NULL DEFAULT 'No Name Inventory',
  `Company` varchar(255) NOT NULL DEFAULT 'No Company',
  `Amount` int(3) unsigned NOT NULL DEFAULT '0',
  `Import Location` varchar(255) DEFAULT NULL,
  `Date of Manufacture` date DEFAULT NULL,
  PRIMARY KEY (`InvenName`,`Company`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "tea_leaves_coffee_beans"
#


#
# Structure for table "time_availability"
#

DROP TABLE IF EXISTS `time_availability`;
CREATE TABLE `time_availability` (
  `ESIN` int(9) unsigned zerofill NOT NULL DEFAULT '000000000',
  `Date` date NOT NULL DEFAULT '0000-00-00',
  `Start` time NOT NULL DEFAULT '00:00:00',
  `Finish` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`ESIN`),
  CONSTRAINT `Emp_Ref` FOREIGN KEY (`ESIN`) REFERENCES `employee` (`SIN`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "time_availability"
#

