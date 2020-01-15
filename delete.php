<?php
session_start();
require 'config/database.php';

 if(isset($_POST['commentDelete']))
 {
    
     $delete_id = $_POST['delete_id'];
    // echo $image_id = $_SESSION['image_id'];
  
  try
  {  
    $sql3 = "DELETE FROM webcamimage WHERE imgfullNameCam='{$delete_id}' ";
    $result = $conn->prepare($sql3);
    $result->execute();
    header("location: home.php");
  }
  catch(PDOException $e)
  {
      echo $e->getMessage();
  }
    
}