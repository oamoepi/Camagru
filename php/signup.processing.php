<?php 

require '../config/database.php';
if (isset($_POST['sign-up']))
{
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $UserName = $_POST['UserName'];
    $Country = $_POST['Country'];
    $Gender = $_POST['Gender'];
    $email = $_POST['email'];
    $Password = $_POST['Password'];
    $resetpwd = $_POST['ConfirmPassword'];

    if(empty($UserName) || empty($email) || empty($Password) || empty($resetpwd))
    {
        header("location: ../signup.php?error=emptyfields&UserName=".$UserName."&Email=".$email);
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$\/", $UserName) )
    {
        header("location: ../signup.php?error=invalidEmail");
        exit();
    }
    else if(!filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        header("location: ../signup.php?error=invalidmail&UserName=".$UserName);
        exit();
    }
    else if(!preg_match("/^[a-zA-Z0-9]*$/", $UserName))
    {
        header("location: ../signup.php?error=invalidmail&UserName=".$email);
        exit();
    }
    else if ($Password !== $resetpwd)
    {
        header("location: ../signup.php?error=passwordcheck&UserName=".$UserName."&email=".$email);
        exit();
    }
    else
    {
        try
        {
             $sql = "SELECT count(*) FROM users WHERE UserName=? OR email=? AND verified = '0'";
             $stmt = $conn->prepare($sql);
             $stmt->bindParam(1, $UserName);
             $stmt->bindParam(2, $email);
             $stmt->execute();
             $result = $stmt->fetchColumn();
            if($result > 0)
            {
                
                $sql = "SELECT * FROM users WHERE UserName=? OR email=? AND verified = '0' ";               
                $stmt = $conn->prepare($sql);
                $stmt->bindParam(1, $UserName);
                $stmt->bindParam(2, $email);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if($result['UserName'] == "$UserName")
                {
                    header("location: ../signup.php?error=usertaken&Email=".$UserName);
                    exit();
                }
                else if($result['email'] == "$email")
                {
                    header("location: ../signup.php?error=emailtaken&Email=".$email);
                    exit();
                }
                else
                {
                    // you have to create a resend verification script
                    echo "<div>Your email is already in the system but not yet verified.</div>";
                }
            }
            else
            {
                $token =  bin2hex(random_bytes(8));
                $verificationLink = "http://localhost:8080/camagru/config/activate.php?code=".$token;
                $htmlStr = "";
                $htmlStr .= "Hi " . $UserName . ",<br /><br />";
                $htmlStr .= "Please click the button below to verify your email and have access to the Signin page.<br /><br /><br />";
                $htmlStr .= "<a href='{$verificationLink}' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>VERIFY EMAIL</a><br /><br /><br />";
                $htmlStr .= "Kind regards,<br />";
                $htmlStr .= "<a href='http://localhost:8080/' target='_blank'>Welcome to Camagru</a><br />";
                $name = "Welcome to Camagru";
                $email_sender = "no-reply@Camagru.com";
                $subject = "Verification Link ";
                $recipient_email = $email;
                $headers  = "MIME-Version: 1.0\r\n";
                $headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
                $headers .= "From: {$name} <{$email_sender}> \n";
                $body = $htmlStr;

                if(mail($recipient_email, $subject, $body, $headers))
               {
                   echo "<div = 'successMessage'>A verification email was sent to <b>" . $email . "</b>, please check your mailbox and follow the link to Signin.</div>";
                   try
                   {
                   $sql = "INSERT INTO `users` (`FirstName`, `LastName`, `UserName`, `Country`, `Gender`, `email`, `Password`, `token`) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
                   $stm = $conn->prepare($sql);
                   $hashpwd = password_hash($Password, PASSWORD_DEFAULT);
                   $stm->bindParam(1, $FirstName);
                   $stm->bindParam(2, $LastName);
                   $stm->bindParam(3, $UserName);
                   $stm->bindParam(4, $Country);
                   $stm->bindParam(5, $Gender);
                   $stm->bindParam(6, $email);
                   $stm->bindParam(7, $hashpwd);
                   $stm->bindParam(8, $token);
                   if($stm->execute())
                   {
                        echo "<div>Unverified email was saved to the database.</div>";
                   }
                   else
                   {
                       echo "<div>Email already in use.";
                       //print_r($stmt->errorInfo());
                   }
                   header("location: ../signup.php?signup=success");
                   exit();
                }
                catch (PDOException $e)
                {
                    
                   echo $e->getMessage();
                }
               }
               else
               {
                   die("Sending failed.");
               }
           }
       }
       catch (PDOException $e)
       {
           
          echo $e->getMessage();
       }
    }
}
else
    // header("Location: ../signup.php");

?>

