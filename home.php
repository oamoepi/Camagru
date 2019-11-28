<?php
    session_start();
    include_once 'config/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="Most Amazing Way For a Social">
        <meta name="keywords" content="Camagru, Social media, camagru42">
        <title>Services</title>
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="css/main2.css">
    </head>
    <body>
        <header>
            <div class="container">
                <div id="branding">
                    <h1><span class="highlight">Welcome</span> Camagru</h1>
                </div>
                <nav>
                    <ul>
                        <li class="current"><a href="home.php">Home</a></li>
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <a href="php/signout.php"><button class="button_1" type="button">Signout</button></a>            
                    </ul>
                </nav>  
                </div>
        </header>

        <section id="newsletter">
                <div class="container">
                    <h1>Get The Best Social Media Experience</h1>
                    <form action="search.php" method="POST">
                        <input type="text" name="search" placeholder="Search Friends">
                        <button class="button_1" type="submit" name="submit-search">Search</button>
                    </form>

                    <?php
                    $user = $_SESSION['userId'];
                    $get_user = "SELECT * FROM users WHERE id='$user'";
                    $run_get_user = $conn->prepare($get_user);
                    $run_get_user->execute();
                    $data = $run_get_user->fetch();
                    $username = $data['UserName'];
                    $firstname = $data['FirstName'];
                    $surname = $data['LastName'];
                    ?>
                </div>
        </section>

        <aside id="sidebar">
                    <div class="booth">
                        <video id="video" width="300" height="300"></video>
                        <button id="capture" class="booth-capture-button" name="capture-image">Capture Image</button>
                        <canvas id="canvas" width="300" height="300"></canvas>
                        <img id="photo" src="http://placekitten.com//300/300" alt="Captured Image">


                    </div>
                    <script src="js/photo.js"></script>
                </aside>

        <table border="0">
                <!-- <tr>
                    <th>ID</th>
                    <th>Image</th>
                </tr> -->
                <?php
                    $select = $conn->prepare("SELECT * FROM images ");
                    $select->setFetchMode(PDO::FETCH_ASSOC);
                    $select->execute();
                    while($data=$select->fetch()){
                    ?>
                    <tr>
                    <td><?php echo $data['id']; ?></td>
                    <td><img src="uploads/<?php echo $data['image']; ?>" width="600" height="400">
                    <input type="textbox" placeholder="Add Comments">
                    <button class="button_1" type="submit" name="commented">Post</button>
                    <a href="jquery/likes.jquery.php"><button class="button_1" type="submit" name="liked">Like</button></a>
                </td>
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