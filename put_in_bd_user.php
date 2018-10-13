<?php
$host = "localhost";
$user = "root";
$passwd = "123123";
$dbname = "camagru";

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $user, $passwd);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "INSERT INTO users (name, password, email, validate, to_mail)
    VALUES ( 'Do4e',123123, 'john@exa4mple.com', 0, 0)";
    // use exec() because no results are returned
    $conn->exec($sql);
    echo "New record created successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }

$conn = null;
?>