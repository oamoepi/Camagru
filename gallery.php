<?php
session_start();
    $_SESSION['username'] ="Admin,";
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
                    include "config/connection.php";
                    $select = $conn->prepare("SELECT * FROM images ");
                    $select->setFetchMode(PDO::FETCH_ASSOC);
                    $select->execute();
                    while($data=$select->fetch()){
                    ?>
                    <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><img src="uploads/<?php echo $data['image']; ?>" width="100" height="100"></td>
                <?php
                }?>
                </tr>
            </table>

                    <div class="gallery-container">


                    <?php
                        include("config/config.php");


                        if(isset($_POST['submit'])) 

                        { 

                        $folder ="uploads/"; 

                        $image = $_FILES['image']['name']; 

                        $path = $folder . $image ; 

                        $target_file=$folder.basename($_FILES["image"]["name"]);


                        $imageFileType=pathinfo($target_file,PATHINFO_EXTENSION);


                        $allowed=array('jpeg','png' ,'jpg'); $filename=$_FILES['image']['name']; 

                        $ext=pathinfo($filename, PATHINFO_EXTENSION); if(!in_array($ext,$allowed) ) 

                        { 

                        echo "Sorry, only JPG, JPEG, PNG & GIF  files are allowed.";

                        }

                        else{ 
                        move_uploaded_file( $_FILES['image'] ['tmp_name'], $path); 

                        $stmt=$conn->prepare("INSERT INTO `images` (`image`) VALUES (:image)"); 

                        $stmt->bindParam(':image',$image); 

                        $stmt->execute(); 

                        } 
                        header("location: home.php?upload=success");
                        } 

                        ?> 



                        <form method="POST" enctype="multipart/form-data"> 

                        <input type="file" name="image" /> 

                        <input type="submit" name="submit"/> 

                        </form>

                        <a href="profile.php">See Image</a>
        <footer>
            <p>amoepi@student.wethinkcode.co.za Copyright &copy; 2019</p>
        </footer>

    </body>
</html>