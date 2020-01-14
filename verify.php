<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User Verification</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
  
</head>
<body>
<?php
    require 'config/database.php';
    
    if(isset($_GET['email']) && !empty($_GET['email']) AND isset($_GET['hash']) && !empty($_GET['hash'])){
        $email = $_GET['email'];
        $hash = $_GET['hash'];
        
        if ($search >= 0){
            
            echo "Your account has been activated, Sign In.<br>";
        }
        try{
            $handle = new PDO("mysql:host=".dbhost."; dbname=".camagru, root, password);
            $handle->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $search = "SELECT email, hash, active FROM users WHERE email='".$Email."' AND hash='".$hash."' AND active='0'";
            $act = "UPDATE users SET active='1' WHERE email='".$Email."' AND hash='".$hash."' AND active='0'";
            $stmt = $handle->exec($search, $act);
            $stmt = $handle->exec($act);
        }
        catch(PDOException $e){
            echo "Failed to connect: " . $e->getMessage() . " ";
        }
    }
    ?>
    <h1>Successful</h1>
    <p>Signin Page <a href = "../signin.html">here<a></p>
</body>
</html>