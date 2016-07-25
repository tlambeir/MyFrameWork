create database test;

use test;

CREATE TABLE `users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `age` int(3) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
);

CREATE TABLE `heroes` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `posX` varchar(100),
  `posY` varchar(100),
  `imagePath` varchar(100),
  PRIMARY KEY  (`id`)
);

CREATE TABLE `maps` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `imagePath` varchar(100),
  PRIMARY KEY  (`id`)
);