CREATE DATABASE LEAVE_APPLICATION;
USE LEAVE_APPLICATION;

CREATE TABLE `Admins` (
 `emp_id` varchar(256) NOT NULL,
 `name` varchar(256) NOT NULL,
 `webmail_id` varchar(256) NOT NULL,
 `password` varchar(256) NOT NULL,
 PRIMARY KEY (`emp_id`),
 UNIQUE KEY `webmail_id` (`webmail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='to store information of admins'

CREATE TABLE `Students` (
 `roll_number` varchar(256) NOT NULL,
 `name` varchar(256) NOT NULL,
 `dob` date NOT NULL,
 `department` varchar(256) NOT NULL,
 `webmail_id` varchar(256) NOT NULL,
 `hostel_block` varchar(256) NOT NULL,
 `room_number` varchar(256) NOT NULL,
 `edu_programme` varchar(256) NOT NULL,
 `year_of_study` smallint(6) NOT NULL,
 `password` varchar(256) NOT NULL,
 `mobile_number` varchar(10) NOT NULL,
 PRIMARY KEY (`roll_number`),
 UNIQUE KEY `roll_number` (`roll_number`),
 UNIQUE KEY `webmail_id` (`webmail_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1

CREATE TABLE `Leave_Record` (
 `id` int(11) NOT NULL AUTO_INCREMENT,
 `roll_number` varchar(256) NOT NULL,
 `start_date` date NOT NULL,
 `end_date` date NOT NULL,
 `reason` text NOT NULL,
 `approval_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 means not approved yet',
 PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1


