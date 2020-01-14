<?php session_start();
    require 'config/database.php';
    require_once('includes/auth.inc.php');
   

    if(isset($_POST['submit']) && isset($_SESSION['userUid']) && isset($_SESSION['userEmail'])) 
    { 
        $user = $_SESSION['userUid'];
        $tt = $_SESSION['userEmail'];

        $folder ="uploads/"; 

        $image = $_FILES['image']['name']; 

        $path = $folder . $image ; 

        $target_file=$folder.basename($_FILES["image"]["name"]);


        $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);
        $allowed=array('jpeg','png' ,'jpg'); $filename=$_FILES['image']['name']; 
        $ext =pathinfo($filename, PATHINFO_EXTENSION); 

        if(!in_array($ext,$allowed) ) 
        { 

            echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";

        }
        else
        { 
            move_uploaded_file( $_FILES['image'] ['tmp_name'], $path); 

            try
            {
                $sql = " SELECT * FROM webcamimage";
                $stmt = $conn->prepare($sql);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                $setImageOrder = $result + 1;

                $sql = "INSERT INTO `webcamimage` (imgfullNameCam, username, userEmail, likes_count, orderCamImage)  VALUES ('{$image}', '{$user}', '{$tt}', 0, '{$setImageOrder}')"; 
                $stmt = $conn->prepare($sql);
                var_dump($stmt->execute());

                header("location: home.php?upload=success");
                exit();
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }

        } 
    } 

    ?> 


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="Most Amazing Way For a Social">
        <meta name="keywords" content="Camagru, Social media, camagru42">
        <title>Gallery</title>
        <link rel="stylesheet" href="css/main.css">
    </head>
    <body>
        <header>
            <div class="container">
                <div id="branding">
                    <h1><span class="highlight">Welcome</span> Camagru</h1>
                </div>
                <nav>
                    <ul>
                        <li><a href="home.php">Home</a></li>
                        <li><a href="profile.php">Profile</a></li>
                        <li class="current"><a href="gallery.php">Gallery</a></li>
                        <a href="php/signout.php"><button class="button_1" type="button">Signout</button></a>            
                    </ul>
                </nav>  
                </div>
        </header>

        <section id="newsletter">
                <div class="container">
                    <h1>Organize Your Gallery</h1>
                </div>
        </section>

         <main>

         
            <section class="gallery-links">
                <div class="wrapper">
                    <h2>Gallery</h2>

                    <table border="2">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                </tr>
                <?php
                    include 'config/database.php';
                    $select = $conn->prepare("SELECT * FROM webcamimage");
                    $select->setFetchMode(PDO::FETCH_ASSOC);
                    $select->execute();
                    while($data=$select->fetch()){
                    ?>
                    <tr>
                    <td><?php echo $data['idCamImage']; ?></td>
                    <td><img src="uploads/<?php echo $data['imgfullNameCam']; ?>" width="100" height="100"></td>
                <?php
                }?>
                </tr>
            </table>

                    <div class="gallery-container">




                        <form method="POST" enctype="multipart/form-data"> 

                        <input type="file" name="image" /> 
                        <input type="hidden" name="username" /> 
                        <input type="hidden" name="useremail" /> 
                        <button type="submit" name="submit"> Upload</button>
                        </form>
                        <a href="profile.php">See Image</a>
        <footer>
            <p>amoepi@student.wethinkcode.co.za Copyright &copy; 2019</p>
        </footer>

    </body>
</html>