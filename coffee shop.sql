# Host: localhost  (Version 5.7.17-log)
# Date: 2017-04-10 15:57:25
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
# Structure for table "customer"
#

DROP TABLE IF EXISTS `customer`;
CREATE TABLE `customer` (
  `Email` varchar(255) NOT NULL DEFAULT 'noemail@available.com',
  `Password` varchar(255) NOT NULL DEFAULT '0000',
  `Name` varchar(255) NOT NULL DEFAULT 'No Name Nancy',
  `Birthday` date NOT NULL DEFAULT '0000-00-00',
  `Points_Balance` int(6) NOT NULL DEFAULT '0',
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
# Structure for table "locations"
#

DROP TABLE IF EXISTS `locations`;
CREATE TABLE `locations` (
  `Name` varchar(255) NOT NULL DEFAULT 'Crowfoot',
  `Address` varchar(255) NOT NULL DEFAULT 'No Address',
  PRIMARY KEY (`Name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

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
# Structure for table "redeemed_rewards"
#

DROP TABLE IF EXISTS `redeemed_rewards`;
CREATE TABLE `redeemed_rewards` (
  `RewardType` varchar(255) NOT NULL DEFAULT 'Unspecified Reward',
  `CustomerEmail` varchar(255) NOT NULL DEFAULT 'noemail@available.com',
  `RewardID` int(11) unsigned zerofill NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`RewardID`),
  KEY `Customer_Ref` (`CustomerEmail`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

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
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

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
# Structure for table "time_availability"
#

DROP TABLE IF EXISTS `time_availability`;
CREATE TABLE `time_availability` (
  `ESIN` int(9) unsigned zerofill NOT NULL DEFAULT '000000000',
  `Date` date NOT NULL DEFAULT '0000-00-00',
  `Start` time NOT NULL DEFAULT '00:00:00',
  `Finish` time NOT NULL DEFAULT '00:00:00',
  PRIMARY KEY (`ESIN`,`Date`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
