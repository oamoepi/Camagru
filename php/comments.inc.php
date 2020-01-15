<?php

require '../config/database.php';


if(isset($_POST['commentSubmit']))
{  
    $uid = $_POST['uid'];
    $date = $_POST['date'];
    $message = htmlspecialchars($_POST['message']);
    
    session_start();
    $username = $_SESSION['userUid'];
    if(empty($message))
    {
        header("location: ../home.php?error=emptyfield");
        exit();
    }
    else
    {
        try
        {
            
            
            $sql = "INSERT INTO comments (uid, date, message, username, like_count) VALUES (:uid, :date, :message, :username, 0)";
            $result = $conn->prepare($sql);
            $result->bindParam(':uid', $uid);
            $result->bindParam(':date', $date);
            $result->bindParam(':message', $message);
            $result->bindParam(':username', $username);
            $result->execute();
            
            $_SESSION['image_id'] = $uid;
            
            
            $sql2 = "SELECT * FROM comments";
            $res = $conn->prepare($sql2);
            $res->execute();
            
            
            if($row = $res->fetch(PDO::FETCH_ASSOC))
            {
                $_SESSION['comment_id'] = $row['cid'];
            }
            
            header("location: ../home.php?insert=success");
            exit();
        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }
}


function editComments($conn) {
    if (isset($_POST['commentSubmit'])){
        $cid = $_POST['cid'];
        $uid = $_POST['uid'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        
        $sql = "UPDATE comments SET message='$message' WHERE cid='$cid'";
        $result = $conn->query($sql);
        header("location: ./home.php");
    }
}
?>