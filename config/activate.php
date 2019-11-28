<?php
   include '../config/connection.php';

   
   $sql = "SELECT id FROM users WHERE token = ? AND verified = '0' ";
   echo "4";
   $stmt = $conn->prepare($sql);
    echo "4";
   $stmt->bindParam(1, $_GET['code']);
   echo "4";
   $stmt->execute();
   echo "4";
   $num = $stmt->rowCount();
   print_r($num);
   if($num > 0)
   {
    echo "4";
       $sql = " UPDATE users SET verified = '1' WHERE token = :token";
       $stmt = $conn->prepare($sql);
       $stmt->bindParam(':token', $_GET['code']);
       echo "8";
       if($stmt->execute())
       {
           header("location: ../index.php?activate=success");
           exit();
       }
       else
       {
           echo "<div>Unable to update verification code.</div>";
           //print_r($stmt->errorInfo());
       }
   }
   else
   {
       // tell the user he should not be in this page
       echo "<div>We can't find your verification code.</div>";
   }
?>