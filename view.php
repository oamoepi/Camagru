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
                        <li><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li class="current"><a href="view.php">Gallery</a></li>
                        <li><a href="services.php">Services</a></li>
                        <li><a href="signup.php">Register</a></li>
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
                    <td><img src="uploads/<?php echo $data['imgfullNameCam']; ?>" width="500" height="500"></td>
                <?php
                }?>
                </tr>
            </table>
        <footer>
            <p>amoepi@student.wethinkcode.co.za Copyright &copy; 2019</p>
        </footer>

    </body>
</html>