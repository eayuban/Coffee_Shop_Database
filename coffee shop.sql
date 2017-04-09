# Host: localhost  (Version 5.7.17-log)
# Date: 2017-04-09 15:27:23
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
  `Location` varchar(255) NOT NULL DEFAULT 'NO LOCATION',
  PRIMARY KEY (`InvenName`,`Company`,`Location`),
  KEY `Location` (`Location`)
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

INSERT INTO `customer` VALUES ('brandongob@gmail.com','dickSLedge','Brandon Goberdhansingh','1996-04-19',0),('eayuban@gmail.com','VGAMP8371','Edraelan Ayuban','1996-10-30',250),('gogo@msn.com','kpopisthegreatest','Koaml','1999-09-22',1000000);

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

INSERT INTO `drink` VALUES ('Americano','- 1 shot espresso coffee<br>\r\n- Boiling water<br>\r\n- Steamed milk<br>\r\n- Raw sugar cube<br>\r\nMake a shot of espresso coffee and pour it into a 6-ounce cup.<br>\r\nAdd boiling water into the cup until the coffee reaches the top.<br>\r\nHave steamed milk on the side to add, along with a sugar cube.','Coffee',3.00);

#
# Structure for table "employee"
#

DROP TABLE IF EXISTS `employee`;
CREATE TABLE `employee` (
  `SIN` int(9) unsigned zerofill NOT NULL DEFAULT '000000000',
  `Name` varchar(255) DEFAULT NULL,
  `ManagerSIN` int(9) unsigned zerofill DEFAULT NULL,
  `Password` varchar(255) NOT NULL DEFAULT '0000',
  `Location` varchar(255) NOT NULL DEFAULT 'NO LOCATION',
  PRIMARY KEY (`SIN`),
  KEY `Manager_Ref` (`ManagerSIN`),
  KEY `Location_Ref` (`Location`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "employee"
#

INSERT INTO `employee` VALUES (100000000,'Ed',NULL,'VGAMP8371','Crowfoot'),(100000001,'Aerjay',100000000,'ok','Crowfoot'),(100000003,'Eddy',100000000,'hello','Crowfoot');

#
# Structure for table "locations"
#

DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `Name` varchar(255) NOT NULL DEFAULT 'Crowfoot',
  `Address` varchar(255) NOT NULL DEFAULT 'No Address',
  PRIMARY KEY (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "locations"
#

INSERT INTO `locations` VALUES ('Crowfoot','Crowfoot Ave. NW');

#
# Structure for table "machinery"
#

DROP TABLE IF EXISTS `machinery`;
CREATE TABLE `machinery` (
  `Type` varchar(255) NOT NULL DEFAULT 'No Type',
  `ManufactureYear` year(4) NOT NULL DEFAULT '0000',
  `Location` varchar(255) NOT NULL DEFAULT 'NO LOCATION',
  `Name` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`Type`,`ManufactureYear`,`Location`),
  KEY `Loc_Ref` (`Location`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "machinery"
#

INSERT INTO `machinery` VALUES ('Coffee Machine',2017,'Crowfoot','Jura - Impressa Z9 Automatic Coffee Machine Aluminum - 13752');

#
# Structure for table "rewards"
#

DROP TABLE IF EXISTS `rewards`;
CREATE TABLE `rewards` (
  `Type` varchar(255) NOT NULL DEFAULT 'Reward not specified',
  `PointCost` int(6) unsigned NOT NULL DEFAULT '100',
  PRIMARY KEY (`Type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "rewards"
#

INSERT INTO `rewards` VALUES ('Free Bag of Coffee Beans',500),('Free Large Drink',150),('Free Medium Drink',100),('Free Small Drink',50);

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
  `CustomerInfo` varchar(255) DEFAULT NULL,
  `Location` varchar(255) NOT NULL DEFAULT 'NO LOCATION',
  PRIMARY KEY (`Sales ID`),
  KEY `Customer_Reference` (`CustomerInfo`),
  KEY `Locat_Ref` (`Location`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

#
# Data for table "sales"
#

INSERT INTO `sales` VALUES (0000000001,'Americano','2017-04-07','eayuban@gmail.com','Crowfoot'),(0000000002,'Latte','2017-04-08','eayuban@gmail.com','Crowfoot'),(0000000003,'Green Tea Latte','2017-04-07','eayuban@gmail.com','Crowfoot');

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
  `InvenLocation` varchar(255) NOT NULL DEFAULT 'NO LOCATION',
  `Company` varchar(255) NOT NULL DEFAULT 'No Company',
  `Amount` int(3) unsigned NOT NULL DEFAULT '0',
  `ImportLocation` varchar(255) DEFAULT NULL,
  `DateOfManufacture` date DEFAULT NULL,
  PRIMARY KEY (`InvenName`,`Company`,`InvenLocation`),
  KEY `Location_Reference` (`InvenLocation`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# Data for table "tea_leaves_coffee_beans"
#

INSERT INTO `tea_leaves_coffee_beans` VALUES ('Harenna Whole Bean Coffee 1 lb','Crowfoot','Harenna',5,'Ethiopia','2017-04-08'),('Starbucks Coffee Beans','Crowfoot','Starbucks',10,'USA','2016-03-28');

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

