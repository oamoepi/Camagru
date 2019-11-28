<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="Most Amazing Way For a Social">
        <meta name="keywords" content="Camagru, Social media, camagru42">
        <title>Services</title>
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
                        <li class="current"><a href="profile.php">Profile</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <a href="php/signout.php"><button class="button_1" type="button">Signout</button></a>
                    </ul>
                </nav>  
                </div>
        </header>

        <section id="newsletter">
                <div class="container">
                    <h1>PROFILE</h1><br>
                    <a href="functions/forgotpassword.php"><button class="button_1" type="button">Update Password</button></a> 
                        <a href="php/signout.php"><button class="button_1" type="button">Update Email</button></a> 
                </div>
        </section>

            <table border="2">
                <tr>
                    <th>ID</th>
                    <th>Image</th>
                </tr>
                <?php
                    include "config/config.php";
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
                <a href="gallery.php">Add new image</a>
                

        <footer>
            <p>amoepi@student.wethinkcode.co.za Copyright &copy; 2019</p>
        </footer>

    </body>
</html>