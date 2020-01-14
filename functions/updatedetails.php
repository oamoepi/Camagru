<?php  
session_start();
 include "../config/database.php";


if (isset($_POST['updatesent']))
{
    $UserName = $_POST['UserName'];
    $email = $_POST['email'];
    
    try
    {
        $sql = "SELECT * FROM users WHERE id = '{$_SESSION['userId']}' ";
        $stmt = $conn->prepare($sql);
        $stmt->execute();

        if ($UserName && $email)
        {
            $sql = "UPDATE users SET UserName=?, email=? WHERE id = '{$_SESSION['userId']}' ";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $UserName);
            $stmt->bindParam(2, $email);
            $stmt->execute();
        }

        else if($UserName)
        {
            $sql = "UPDATE users SET UserName=? WHERE id = '{$_SESSION['userId']}' ";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $UserName);
            $stmt->execute();
        }
        else if($email)
        {
            $sql = "UPDATE users SET email=? WHERE id = '{$_SESSION['userId']}' ";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $email);
            $stmt->execute();
        }    
        header("Location: ../index.php");
    }
    catch (PDOException $e)
    {
           echo $e->getMessage();  
    }
    
}
else
    header("Location: ../profile.php");

?>