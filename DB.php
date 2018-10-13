<?php

$host = "localhost";
$user = "root";
$passwd="123123";
function db_create($host, $user, $passwd) {
    try {
        $conn = new PDO("mysql:host=$host;", $user, $passwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE DATABASE IF NOT EXISTS camagru";
        $conn->exec($sql);
        return (true);
    }
    catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
        return (false);
    }
}

function users_create($host, $user, $passwd) {
    try {
        $conn = new PDO("mysql:host=$host;dbname=camagru", $user, $passwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
            name VARCHAR(100) UNIQUE NOT NULL,
            password VARCHAR(300) NOT NULL,
            email VARCHAR(100) UNIQUE NOT NULL,
            validate INT(1) UNSIGNED NOT NULL,
            to_mail INT(1) UNSIGNED NOT NULL,
            pin INT(5) unsigned NOT NULL
        );";
        $conn->exec($sql);
        return (true);
    }
    catch(PDOException $e) {
        echo $sql . "<br>test" . $e->getMessage();
        return (false);
    }
}

function photos_create($host, $user, $passwd) {
    try {
        $conn = new PDO("mysql:host=$host;dbname=camagru", $user, $passwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE IF NOT EXISTS photo (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id INT(6) UNSIGNED NOT NULL,
            likes INT(6) UNSIGNED NOT NULL,
            like_user VARCHAR(3000) NOT NULL,
            name VARCHAR(50) NOT NULL,
            description VARCHAR(300)
        );";
        $conn->exec($sql);
        return (true);
    }
    catch(PDOException $e) {
        echo $sql . "<br>test" . $e->getMessage();
        return (false);
    }
}


function comments_create($host, $user, $passwd) {
    try {
        $conn = new PDO("mysql:host=$host;dbname=camagru", $user, $passwd);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $sql = "CREATE TABLE IF NOT EXISTS comments (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            user_id INT(6) UNSIGNED NOT NULL,
            photos_create_id INT(6) UNSIGNED NOT NULL,
            comments VARCHAR(300) NOT NULL
        );";
        $conn->exec($sql);
        return (true);
    }
    catch(PDOException $e) {
        echo $sql . "<br>test" . $e->getMessage();
        return (false);
    }
}


db_create($host, $user, $passwd);
users_create($host, $user, $passwd);
photos_create($host, $user, $passwd);
comments_create($host, $user, $passwd);
?>