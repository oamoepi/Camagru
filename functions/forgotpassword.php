<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width">
        <meta name="description" content="Most Amazing Way For a Social">
        <meta name="keywords" content="Camagru, Social media, camagru42">
        <title>Services</title>
        <link rel="stylesheet" href="../css/main.css">
    </head>
    <body>
        <header>
            <div class="container">
                <div id="branding">
                    <h1><span class="highlight">Welcome</span> Camagru</h1>
                </div>
                <nav>
                    <ul>
                        <li><a href="../index.php">Home</a></li>
                        <li><a href="../about.php">About</a></li>
                        <li class="current"><a href="forgotpassword.php">Settings</a></li>
                        <li><a href="../signup.php">Register</a></li>
                       
                    </ul>
                </nav>
                
                </div>
        </header>
        <section id="newsletter">
                <div class="container">
                    <h1>Please type your username and email into the form fields below on the right</h1>
                </div>
        </section>
        <section id="main">
            <div class="container">
                <article id="main-col">
                    <h1 class="page-title">IMPORTANT!!!</h1>
                        <ul>
                            <li>
                                <h3>Stay Alert!</h3>
                                <p>
When creating a password, make sure its a strong but easy to remember password. Do not share your password with anyone and make sure to write it down to prevent future loss. Always update your password to avoid portential scammers.</p>
                            </li>
                            <li>
                                <h3>An Email will Be Sent To You With Instruction On How To Reset Your Password.</h3>
                                <h3>Check your email after clicking the Send button and follow the link provided.</h3>
                            </li>
                        </ul>
                </article>
                <aside id="sidebar">
                    <div class="dark">
                      <h3>Complete Required Fields</h3>
                      <form class="quote" action="../includes/recovery.php" method="POST">
                        <div>
			        	<label>Username</label><br>
                            <input type="text" placeholder="Username">
                        </div>
                        <div>
			        	<label>Email</label><br>
                            <input type="text" name="email" placeholder="Enter Email address">
                        </div>
                        <button class="button_1" type="submit" name="recoverpassword-submit">Send</button>
			        </form>

                    <?php
                        if (isset($_GET["reset"])){
                            if ($_GET["reset"] == "success") {
                                echo '<p class="signupsuccess"> Check your email!</p>';
                            }
                        }
                    ?>

                    </div>
                </aside>
            </div>
        </section>

        <footer>
            <p>amoepi@student.wethinkcode.co.za Copyright &copy; 2019</p>
        </footer>

    </body>
</html>