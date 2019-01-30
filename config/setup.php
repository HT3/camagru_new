<?php

include_once("database.php");

try
{
    $conn->query('CREATE DATABASE IF NOT EXISTS db_camagru');
    $conn->query('USE db_camagru');

    $conn->query(
        'CREATE TABLE IF NOT EXISTS `comments` (
        `comment_id` int(11) NOT NULL AUTO_INCREMENT,
        `username` varchar(1000) NOT NULL,
        `picture_id` int(11) NOT NULL,
        `comment` varchar(1000) NOT NULL,
        PRIMARY KEY (`comment_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8');

    $conn->query(
        'CREATE TABLE IF NOT EXISTS `pictures` (
        `pic_id` int(8) NOT NULL AUTO_INCREMENT,
        `username` varchar(50) NOT NULL,
        `picture` longtext,
        `Likes` int(11) NOT NULL,
        PRIMARY KEY (`pic_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8');

    $conn->query(
        'CREATE TABLE IF NOT EXISTS `users` (
        `user_id` int(8) NOT NULL AUTO_INCREMENT,
        `username` varchar(50) NOT NULL UNIQUE,
        `email` varchar(100) NOT NULL UNIQUE,
        `password` varchar(150) NOT NULL,
        `conf` int(1) NOT NULL DEFAULT 0,
        `conf_code` varchar(150) NOT NULL,
        `comment_choice` int(1) NOT NULL DEFAULT 1,
        PRIMARY KEY (`user_id`)
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8');

    echo "Success";
}
catch (PDOException $e)
{
    echo "Connection Failure: " . $e->getMessage();
}
?>