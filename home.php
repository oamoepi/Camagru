<?php
    session_start();
    
    
    require 'config/database.php';
    require 'function.php';
    date_default_timezone_set('Africa/Johannesburg');
    // include 'php/comments.inc.php';
    // include "function.php";
    // if(!(isset($_SESSION['userUid']) && isset($_SESSION['userEmail']))) 
    // header("Location: index.php");
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
        <!-- <link rel="stylesheet" href="css/main2.css"> -->
        <link rel="stylesheet" type="text/css" href="css/comments.css">
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
                    <div class="video-wrap">
                        <video id="video" autoplay></video>
                    </div>
                    <div class="controller">
                        <canvas id="canvas" width="300" height="300"></canvas>
                        <img id="photo" src="http://placekitten.com//300/300" alt="Captured Image"><br><br>
                        <button id="snap" class="booth-capture-button">Capture Image</button>
                        <form action="savecam.php" method="POST">
                                <input type="hidden" id="image" name="img"> <br>
                                <button onclick="save()" id="submit" name="upload">Save</button>
                                <ul>
                                    <li><label><img style="width: 100px;" onclick="merge(100,80,'./uploads/alphatest1.png')" src="uploads/alphatest1.png"></label></li>
                                    <li><label><img style="width: 100px;" onclick="merge(40,80,'./uploads/alphatest2.png')" src="uploads/alphatest2.png"></label></li>
                                    <li><label><img style="width: 100px;" onclick="merge(100,80,'./uploads/alphatest3.png')" src="uploads/alphatest3.png"></label></li>
                                </ul>
                            </form>
                    </div>
                    
            <script>

                            'use strict';
                                
                                const video = document.getElementById('video');
                                const canvas = document.getElementById('canvas');
                                const snap = document.getElementById('snap');
                                const erorrMsgElement = document.getElementById('span#ErrorMsg');

                                const constraints = {
                                    audio: false,
                                    video:{
                                        width: 300, height: 300
                                    }
                                };
                                
                                // Access webcam
                                async function init(){
                                    try{
                                        const stream = await navigator.mediaDevices.getUserMedia(constraints);
                                        handleSuccess(stream);
                                    }
                                    catch(e){
                                        erorrMsgElement.innerHTML = `navigator.getUserMedia.error:{$(e.toString())}`;
                                    }
                                }

                                // success
                                function handleSuccess(stream){
                                    window.stream = stream;
                                    video.srcObject = stream;
                                }

                                // load init
                                init();
                                // Draw image
                                var context = canvas.getContext('2d');
                                snap.addEventListener("click",function(){
                                    context.drawImage(video, 0, 0, 300, 300);
                                    console.log(photo.value);
                                });

                                const photo = document.getElementById('image');

                                function merge(x, y, img)
                                {
                                    var new_img = new Image();
                                    new_img.onload = function () {
                                        context.drawImage(new_img, x, y, 50, 50);
                                    }
                                    new_img.src = img;
                                }

                                function save() {
                                    photo.value = canvas.toDataURL();
                                }
            </script>
        </aside>

        <table border="0">
                <?php
                    $getcommlike = get_likescomment();


                    $select = $conn->prepare("SELECT * FROM webcamimage ORDER BY idCamImage DESC");
                    $select->setFetchMode(PDO::FETCH_ASSOC);
                    $select->execute();
                    while($data=$select->fetch()){
                         $_SESSION['image_id'] = $data['idCamImage']; 
                    ?>
                    <tr>
                    <td><?php echo $data['idCamImage']; ?></td>
                    <td><img src="uploads/<?php echo $data['imgfullNameCam']; ?>" width="600" height="400">
                        <form action='php/comments.inc.php' method='POST'>
                            <input type='hidden' name='uid' value="<?php echo $data['imgfullNameCam']; ?>">
                            <input type='hidden' name='date' value="<?php echo date('Y-m-d H:i:s'); ?>">
                            <textarea name='message'></textarea><br>
                            <button type='submit' name='commentSubmit'>Comment</button>
                        </form>
                        <form  action="delete.php" method="POST">
                            <input type="hidden" name="delete_id" value="<?php echo $data['imgfullNameCam']; ?>">
                            <button type='POST' name="commentDelete" >Delete Image</button>
                        </form>
                    <?php
                        if(isset($_GET['insert']) == "success")
                        {
                            $res = $data['imgfullNameCam'];
                            $sql = "SELECT * FROM comments WHERE `uid`='$res' ORDER BY cid DESC";
                            $result = $conn->prepare($sql);
                            $result->execute();
                            
                            
                             
                            while ($row = $result->fetch(PDO::FETCH_ASSOC)) 
                            { ?>
                                
                                <div class='comment-box'><p>
                                <?php
                                    echo $row['cid']."<br>";
                                    echo $row['username']."<br>";
                                    echo $row['message']."<br>";
                                    echo $row['date']."<br>";
                             
                                    $comment = htmlspecialchars($row['message']);
                                ?>
                                </p>
                                <form class='delete-form' method='POST'>
                                    <input type='hidden' name='cid_id' value='<?php echo $row['cid']?>'>
                                    <button type='submit' name='commentLike'>Like; <?PHP echo $row['like_count'] ?> </button>
                                </form>
                                </div>
                                <?php
                            }
                        }

                    ?>
                </td>
                <?php    
                }?>
                </tr>
        </table>
                <a href="gallery.php">Add new image</a>


<?php
                        if(isset($_POST['commentLike']))
                        { 
                            
                            $id_cid = $_POST['cid_id'];
                            try
                            {

                            $sql = "UPDATE comments set like_count = like_count + 1 WHERE cid='$id_cid'";
                            $result = $conn->prepare($sql);
                            $result->execute();
                            }
                            catch(PDOException $e)
                            {
                                echo $e->getMessage();
                            }
                                
                        }
                       
?>

 

        <footer>
            <p>amoepi@student.wethinkcode.co.za Copyright &copy; 2019</p>
        </footer>
    </body>
</html>