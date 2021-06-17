<?php

$pdo= new PDO('mysql:host=0.0.0.0;dbname=eurovent, www-data, www-password, array(PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$query = $pdo->prepare("CREATE TABLE Product(id INT(255) PRIMARY AUTOINCREMENT, name VARCHAR (255), price INT(255))");
$query->execute();
$query = $pdo->prepare("INSERT INTO Product(name, price) VALUES(test, 50)");
$rs = $query->execute();
$query = $pdo->prepare("SELECT * FROM Product");
$rs = $query->execute();

