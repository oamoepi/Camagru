<?php

try {
    
    $conn = new PDO("mysql:host=localhost;dbname=camagru", "root", "password");
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

}
catch(PDOException $e) {
    echo "Could not connect to the database.";
    echo $e->getMessage();
}


        
?>