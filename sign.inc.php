
<?php
session_start();
require 'config/database.php';

if(isset($_POST['sign-in']))
{
   
    

   $mailuid = $_POST['uid'];
   $password = $_POST['pwd'];

   if(empty($mailuid) || empty($password) )
   {
    
       header("location: index.php?error=emptyfields");
       exit();
   }
   else
   {
       try
       {
              
               $sql = "SELECT * FROM users WHERE UserName=? OR email=?;";
               $stmt = $conn->prepare($sql);
               $stmt->bindParam(1, $mailuid);
               $stmt->bindParam(2, $mailuid);
               $stmt->execute();
               if($row = $stmt->fetch(PDO::FETCH_ASSOC))
               { 
                   $pwdcheck = password_verify($password, $row['Password']);
                     
                   if($pwdcheck == true)
                   {
                       $_SESSION['userId'] = $row['id'];
                       $_SESSION['userUid'] = $row['UserName'];
                       $_SESSION['userEmail'] = $row['email'];

                       

                       if ($row['verified'] == '0')
                       {
                           header ('Location: index.php?Account=NotVerified');
                           exit();
                       }
                       else
                       {
                          
                         header('location: home.php?login=loginsuccess');
                         exit();
                       }
                   }
                   else if($pwdcheck == false)
                   {
                       header("location: index.php?error1=wrongpwd");
                       exit();
                   }
                   else
                   {
                       header("location: index.php?error1=wrongpwd");
                       exit();
                   }
               }
               else
               {
                   if($row['uidUsers'] !== $mailuid)
                   {
                       header("location: index.php?error2=nouser");
                       exit();
                   }
               }
       }
       catch (PDOException $e)
       {
          
           header("location: index.php?error=sqlerror");
           exit();
       }
   }
   $conn = null;
}
else
{
//    header("location: index.php");
//    exit(); 
 }