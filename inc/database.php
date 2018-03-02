<?php

require_once('db_creds.php');

function db_connect() {
    $connection = mysqli_connect(DB_SERVER, DB_USER, DB_PASS, DB_NAME);
    mysqli_set_charset($connection, 'utf8');
    return $connection;
}

function db_disconnect($connection) {
    if (isset($connection)) {
        mysqli_close($connection);
    }
}

/*
 *Run the following in your SQL instance to create table:
 *CREATE TABLE `imagedata` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `path` varchar(255) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;
 *
 * Run the following to insert table content, so that you can view files already in uploads directory:
 * INSERT INTO `imagedata` (`path`, `title`)
    VALUES
	('uploads/nightlife.jpg','Japan'),
	('uploads/nature.jpg','Tropical'),
	('uploads/abstract.jpg','Abstract');
 *
 *
 */


