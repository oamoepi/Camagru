<?php
    include '../config/database.php';

    if (isset($_POST['recoverpassword-submited']))
    {
		$Password = $_POST['password'];
		$token = $_POST['token'];
        
        try 
        {
            $sql = "UPDATE `users` SET `Password`=? WHERE token=?";
            $stm = $conn->prepare($sql);
            $hashpwd = password_hash($Password, PASSWORD_DEFAULT);
            $stm->bindParam(1, $hashpwd);
            $stm->bindParam(2, $token);
            
            $stm->execute();
             header("Location: ../index.php?reset=success");           
        }
        catch (Exception $ex) 
        {
            echo $ex->getMessage();
            $msg = "Something went wrong. Plesae try again!";
            $msgType = "danger";
        }
    }
       
?>