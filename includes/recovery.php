<?php 
include '../config/connection.php';

if (isset($_POST['recoverpassword-submit']))
{
	$email = $_POST['email'];
	$token =  bin2hex(random_bytes(8));

	try
	{
		$sql = "SELECT count(*) FROM users WHERE email=? AND verified = '1'";
		$stmt = $conn->prepare($sql);
		$stmt->bindParam(1, $email);
		$stmt->execute();
		$result = $stmt->fetchColumn();
		if($result > 0)
		{		
			$verificationLink = "http://localhost:8080/camagru/functions/recover.php?q=".$token;
			$htmlStr = "";
			$htmlStr .= "Hi " . $UserName . ",<br /><br />";
			$htmlStr .= "Please click the button below to verify your email and have access to the recover page.<br /><br /><br />";
			$htmlStr .= "<a href='{$verificationLink}' target='_blank' style='padding:1em; font-weight:bold; background-color:blue; color:#fff;'>VERIFY EMAIL</a><br /><br /><br />";
			$htmlStr .= "Kind regards,<br />";
			$htmlStr .= "<a href='http://localhost:8080/' target='_blank'>Welcome to Camagru</a><br />";
			$name = "Welcome to Camagru";
			$email_sender = "no-reply@Camagru.com";
			$subject = "Verification Link ";
			$recipient_email = $email;
			$headers  = "MIME-Version: 1.0\r\n";
			$headers .= "Content-type: text/html; charset=iso-8859-1\r\n";
			$headers .= "From: {$name} <{$email_sender}> \n";
			$body = $htmlStr;

			if(mail($recipient_email, $subject, $body, $headers))
			{
				echo "<div = 'successMessage'>A verification email was sent to <b>" . $email . "</b>, please click the link in you email to recover your password.</div>";

				$stm = $conn->prepare("UPDATE `users` SET token=:token WHERE email=:email" );
				$stm->bindParam(':email', $email);
				$stm->bindParam(':token', $token);
				$stm->execute();

				if($stm->execute())
				{
					
				}
				else
				{
					echo "<div>Email already in use.";
				}
				exit();
			}
			else
			{
				die("Sending failed.");
			}
		}
	} catch (PDOException $e)
	{
		header("location: ../functions/recover.php?error=sqlerror");
		exit();
	}
}
?>

