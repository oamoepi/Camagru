<?php session_start();

if(isset($_SESSION['userUid']) && isset($_SESSION['userEmail'])) 
	header("Location: home.php");
?>
<!DOCTYPE html>
<html>
	<head>
	<title>Sign up</title>
	<link rel="stylesheet" href="css/signup.css">
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
						<li><a href="view.php">Gallery</a></li>
						<li><a href="services.php">services</a></li>
						<li class="current"><a href="signup.php">Register</a></li>
                       
                    </ul>
                </nav>
                
                </div>
        </header>


        <section id="newsletter">
                <div class="container">
                    <h1>Get The Best Social Media Experience</h1>
                </div>
        </section>
	
		<div class="form-wrap">
			<form method="POST" action="php/signup.processing.php">
				<h1>Sign Up</h1>
				<input type="text" placeholder="First Name" name="FirstName">
				<input type="text" placeholder="last Name" name="LastName" >
				<input type="text" placeholder="User Name" name="UserName">
				<!-- <input type="date" placeholder="Date Of Birth" name="DateOfBirth"> -->
						<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-downr"></i></span>
									<select class="form-control" name="Country">
										<option disabled>Select Your Country</option>
										<option>Algeria</option>
										<option>Angola</option>
										<option>Benin</option>
										<option>Botswana</option>
										<option>Burkina Faso</option>
										<option>Burundi</option>
										<option>Cabo Verde</option>
										<option>Cameroon</option>
										<option>Central African Republic</option>
										<option>Chad</option>
										<option>Comoros</option>
										<option>Congo DRC</option>
										<option>Congo RC d'Ivoire</option>
										<option>Djibouti</option>
										<option>Egypt</option>
										<option>Equatorial Guinea</option>
										<option>Eritrea</option>
										<option>Eswatini Swaziland</option>
										<option>Ethiopia</option>
										<option>Gabon</option>
										<option>Gambia</option>
										<option>Ghana</option>
										<option>Guinea</option>
										<option>Guinea-Bissau</option>
										<option>Kenya</option>
										<option>Lesotho</option>
										<option>Liberia</option>
										<option>Libya</option>
										<option>Madagascar</option>
										<option>Malawi</option>
										<option>Mali</option>
										<option>Mauritania</option>
										<option>Mauritius</option>
										<option>Morocco</option>
										<option>Mozambique</option>
										<option>Namibia</option>
										<option>Niger</option>
										<option>Nigeria</option>
										<option>Rwanda</option>
										<option>Sao Tome and Principe</option>
										<option>Senegal</option>
										<option>Seychelles</option>
										<option>Sierra Leone</option>
										<option>Somalia</option>
										<option>South Africa</option>
										<option>South Sudan</option>
										<option>Sudan</option>
										<option>Tanzania</option>
										<option>Togo</option>
										<option>Tunisia</option>
										<option>Uganda</option>
										<option>Zambia</option>
										<option>Zimbabwe</option>
									</select>
							</div><br>
							<div class="input-group">
								<span class="input-group-addon"><i class="glyphicon glyphicon-chevron-down"></i></span>
									<select class="form-control input-md" name="Gender">
										<option disabled>Select Your Gender</option>
										<option>Male</option>
										<option>Female</option>
										<option>Other</option>
									</select>
							</div><br>	
				<input type="email" placeholder="email" name="email" >
				<input type="password" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" name="Password">
				<input type="password" placeholder="Confirm Password" name="ConfirmPassword">
				<input type="submit" name="sign-up" value="Sign Up">
				<a href="index.php"><button class="button_1" type="button">Already Have An Account</button></a>
			</form>
			
		</div>
	</body>
</html>
