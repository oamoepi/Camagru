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
						<li class="current"><a href="recover.php">Settings</a></li>
						<li><a href="../signup.php">Register</a></li>
					   
					</ul>
				</nav>
				
				</div>
		</header>


		<section id="newsletter">
				<div class="container">
					<h1>Password Recovery Request</h1>
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
							</li>
						</ul>
				</article>

				<aside id="sidebar">
					<div class="dark">
						<h3>Complete Required Fields</h3>
						<form class="quote" action="../includes/reset-password.inc.php" method="POST">
						<div>
							<?php
								$token=($_GET["q"]);
								echo '<input type="hidden" name="token" value="'.$token.'">';
							?>
						</div>

							<div>
								<label>New Password</label><br>
								<input type="password" placeholder="Enter New Password" name="password">
							</div>
							<div>
								<label>Confirm Password</label><br>
								<input type="password" name="confirm" placeholder="Retype New Password">
							</div>
							<button class="button_1" type="submit" name="recoverpassword-submited">Reconnect</button>
						</form>


					<?php
						// $selector = $_GET["selector"];
						// $validator = $_GET["validator"];

						// if (empty($selector) || empty($validator)){
						// 	echo "Could not validate your request";
						// }else {
						// 	if (ctype_xdigit($selector) !== false && ctype_xdigit($validator) !== false){
						// 	}
						// }
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