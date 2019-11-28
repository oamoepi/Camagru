
<?php
    require 'database.php';
    
    
    try{
        $handle = new PDO("mysql:host=".localhost."; ", username, password);
        $handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $request = "CREATE DATABASE IF NOT EXISTS camagru";
        $handle->prepare($request)->execute();
        }
    
    catch(PDOException $e){
        echo "Could not connect to database: " . $e->getMessage() . " ";
    }
    try{
        $handle = new PDO("mysql:host=".localhost."; dbname=".camagru, username, password);
        $handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        echo "Successfully connected to database";
        $pdo = "CREATE TABLE `users` (
            `id` INT( 10 ) NOT NULL AUTO_INCREMENT PRIMARY KEY ,
            `FirstName` VARCHAR( 255 )UNIQUE NOT NULL ,
            `LastName` VARCHAR( 255 )UNIQUE NOT NULL ,
            `UserName` VARCHAR( 255 )UNIQUE NOT NULL ,
            `Country` VARCHAR( 255 ) NOT NULL ,
            `Gender` VARCHAR( 255 ) NOT NULL ,
            `email` VARCHAR(255) UNIQUE NOT NULL ,
            `Password` VARCHAR( 255 ) NOT NULL ,
            `token` VARCHAR( 255 ) NOT NULL ,
            `verified` INT( 1 ) NOT NULL DEFAULT '0'
            ) ENGINE = MYISAM ";
        $handle->prepare($pdo)->execute();
        }
        catch(PDOException $e){
            echo "Failed to connect: " . $e->getMessage() . " ";
        }
$handle->prepare($pdo)->execute();
    // echo ". Table successfuly created";
?>