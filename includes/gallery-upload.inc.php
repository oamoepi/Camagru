<?php
session_start();

if (isset($_POST['submit'])){
    $image = base64_encode(file_get_contents($_FILES['file']['tmp_name']));
    $me = $_SESSION['userId'];
    $upload = "INSERT INTO posts (body, posted_at, user_id, likes) VALUES ('$image', 'THE DATE', '$me', '0')";

    /* STEPS
        make sure that the image gets uploaded.
        once you have data in the posts table try and print it.

        call me.











    */


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

                 include_once "config/config.php";
                if (empty($imageTitle) || empty($imageDesc)) {
                     header("Location: ../gallery.php?upload=empty");
                     exit();
                  }else {

                     $sql = "SELECT * FROM gallery ORDER BY orderGallery DESC";
                     $stmt = $PDO->prepare($sql);
                     $stmt->execute($stmt, $sql);
                  }
//                 //     $sql = "SELECT * FROM gallery;";
//                 //     $stmt = mysqli_stmt_init($conn);
//                 //     if (!mysqli_stmt_prepare($stmt, $sql)) {
//                 //         echo "SQL statement failed!";
//                 //     }else {
//                 //         mysqli_stmt_execute($stmt);
//                 //         $result = mysqli_stmt_get_result($stmt);
//                 //         $rowCount = mysqli_num_rows($result);
//                 //         $setImageOrder = $rowCount + 1;

//                 //         $sql = "INSERT INTO gallery (titleGallery, descGallery, imgFullNameGallery, orderGallery) VALUES (?, ?, ?, ?);";
//                 //         if (!mysqli_stmt_prepare($stmt, $sql)) {
//                 //             echo "SQL statement failed!";
//                 //         }else{
//                 //             mysqli_stmt_bind_param($stmt, "ssss", $imageTitle, $imageDesc, $imageFullName, $setImageOrder);
//                 //             mysqli_stmt_execute($stmt);

//                 //             move_uploaded_file($fileTempName, $fileDestination);

//                 //             header("Location: ../gallery.php?uploaded=success");
//                 //         }
                 //     }
                 // }
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