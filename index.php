

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
                        <li class="current"><a href="index.php">Home</a></li>
                        <li><a href="about.php">About</a></li>
                        <li><a href="services.php">Services</a></li>
                        <li><a href="signup.php">Register</a></li>
                       
                    </ul>
                </nav>
                
                </div>
        </header>

        <section id="newsletter">
                <div class="container">
                    <h1>Get The Best Social Media Experience</h1>
                </div>
        </section>

        <section id="main">
            <div class="container">
                <article id="main-col">
                        <ul>
                            <li>
                                <h3>Connect with friends</h3>
                                <p>
App’s users should be able to select an image in a list of superposable images (for instance a picture frame, or other “we don’t wanna know what you are using this for” objects), take a picture with his/her webcam and admire the result that should be mixing both pictures.
All captured images should be public, likeables and commentable.</p>
                                <p>expected effect !</p>
                            </li>
                            <li>
                                <h3>Make the most of your social life</h3>
                                <p>
App’s users should be able to select an image in a list of superposable images (for instance a picture frame, or other “we don’t wanna know what you are using this for” objects), take a picture with his/her webcam and admire the result that should be mixing both pictures.
All captured images should be public, likeables and commentable.</p>
                                <p>expected effect !</p>
                            </li>
                            <li>
                                <h3>We give the proper impressions</h3>
                                <p>
App’s users should be able to select an image in a list of superposable images (for instance a picture frame, or other “we don’t wanna know what you are using this for” objects), take a picture with his/her webcam and admire the result that should be mixing both pictures.
All captured images should be public, likeables and commentable.</p>
                                <p>expected effect !</p>
                            </li>
                        </ul>
                </article>

                <aside id="sidebar">
                    <div class="dark">
                    <?php
                        if(isset($_GET['sign-out']) == "success")
                        {
                            echo 'You have Signed out!';
                        }
                    ?>
                      <h3>Sign In</h3>
                      <form class="quote" action="sign.inc.php" method="POST" >
                        <div>
			        	<label>Username</label><br>
                            <input type="text" name="uid" placeholder="Username">
                        </div>
                        <div>
			        	<label>Password</label><br>
                            <input type="password" placeholder="Password" name="pwd">
                        </div>
                        <button class="button_1" type="submit" name="sign-in">Sign In</button><br><br>
                        <a href="functions/forgotpassword.php"><button class="button_1" type="button">Forgot Password</button></a><br><br>
                        <a href="signup.php"><button class="button_1" type="button">Register New Account</button></a>
                        
			        </form>
                    </div>
                </aside>
            </div>
        </section>

        <footer>
            <p>amoepi@student.wethinkcode.co.za Copyright &copy; 2019</p>
        </footer>

    </body>
</html>