<?php


define('DB_Host','localhost');
define('DB_UserName','root');
define('DB_Password','mysql');
define('DB_Name','crud');


try {
    $connection = new PDO('mysql:host=' .DB_Host .';dbname='.DB_Name,DB_UserName,DB_Password);
    $connection->exec('SET NAMES utf8');// if you have persian words in your DB use this statement
    $connection->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch (PDOException $e){
    echo $e->getMessage();
}
