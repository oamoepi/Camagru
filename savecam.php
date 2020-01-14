<?php

if(isset($_POST['upload']))
{
    
    $upload_dir = 'uploads/';
    
    session_start();
    $user = $_SESSION['userUid'];
    $tt = $_SESSION['userEmail'];

    
    if(empty($_POST['img']))
    {
        header("location: HomePage.php?error=emptyimage");
        exit();
    }
    else
    {
       
        $img = $_POST['img']; // Your data 'data:image/png;base64,AAAFBfj42Pj4';
        $img = str_replace('data:image/png;base64,', '', $img);
        $img = str_replace(' ', '+', $img);
        $data = base64_decode($img);
        $newdata = mktime().'.jpeg';
        $file = $upload_dir.mktime().'.jpeg';
        file_put_contents($file, $data);

        require "config/database.php";

        try
        {    
            
            $sql = " SELECT * FROM webcamimage";
            $stmt = $conn->prepare($sql);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            $setImageOrder = $result + 1;
            


            
            $sql = "INSERT INTO webcamimage (imgfullNameCam, username, userEmail, likes_count, orderCamImage) VALUES ('{$newdata}', '{$user}', '{$tt}', 0, '{$setImageOrder}')";
            $stmt = $conn->prepare($sql);
            $stmt->execute();
            file_put_contents($file, $data);

            $sql1 = "SELECT * FROM webcamimage ";
            $stmt1 = $conn->prepare($sql1);
            $stmt1->execute();
            if($row = $stmt1->fetch(PDO::FETCH_ASSOC))
            {
                $_SESSION['id_image'] = $row['idCamImage'];
                $image_id = $_SESSION['id_image'];
            }

            $sql2 = "SELECT * FROM webcamimage WHERE idCamImage = '$image_id' ";
            $stmt2 = $conn->prepare($sql2);
            $stmt2->execute();
            if($row = $stmt2->fetch(PDO::FETCH_ASSOC))
            {
                
                $_SESSION['image_usr'] = $row['username']; //image username
                $_SESSION['image_name'] = $row['imgfullNameCam']; //image ID name
                $_SESSION['image_email'] = $row['userEmail']; // image email
                // echo $_SESSION['image_email'];
                // exit();
            }
            
             header("location: gallery.php?upload=success");
         }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
        $conn = null;
    }
}
else 
{
    echo "You have an error";
}