<?php
session_start();

if (isset($_POST['submit'])){
    $image = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
    $me = $_SESSION['userId'];
    $upload = "INSERT INTO posts (body, posted_at, user_id, likes) VALUES ('$image', 'THE DATE', '$me', '0')";



     $newFileName = $_POST['filename'];
     if (empty($newFileName)){
         $newFileName = "gallery";
     }else {
         $newFileName = strtolower(str_replace(" ", "-", $newFileName));
     }
     $imageTitle = $_POST['fileTitle'];
     $imageDesc = $_POST['filedesc'];

     $file = $_FILES['file'];

     $fileName = $file["name"];
     $fileType = $file["type"];
     $fileTempName = $file["tmp_name"];
     $fileError = $file["error"];
     $fileSize = $file["size"];

     $fileExt = explode(".", $fileName);
     $fileActualExt = strtolower(end($fileEXT));

     $allowed = $array("jpg", "jpeg", "png");

     if (in_array($fileActualExt, $allowed)){
         if ($fileError === 0) {
             if ($fileSize < 2000000) {
                 $imageFullName = $newFileName . "." . uniqid("", true) . "." . $fileActualExt;
                 $fileDestination = "../img/gallery/" . $imageFullName;

                 include 'config/database.php';
                if (empty($imageTitle) || empty($imageDesc)) {
                     header("Location: ../gallery.php?upload=empty");
                     exit();
                  }else {

                     $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
                     $stmt = $PDO->prepare($sql);
                     $stmt->execute($stmt, $sql);
                  }
             }else {
                 echo "File size is too large!";
                 exit();
             }
         }else {
             echo "There was an error!";
             exit();
         }
     }else {
         echo "Upload the correct file format";
         exit();
     }
}