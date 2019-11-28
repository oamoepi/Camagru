<?php
// //Connect to MySQL database using PDO.
// include_once '../config/connection.php';
 
// //The user's id, which should be present in the GET variable "uid"
// $userId = isset($_['id']) ? trim($_GET['id']) : '';
// //The token for the request, which should be present in the GET variable "t"
// $token = isset($_GET['token']) ? trim($_GET['token']) : '';
// echo ($token);
// //The id for the request, which should be present in the GET variable "id"
// $passwordRequestId = isset($_POST['password']) ? trim($_GET['id']) : '';
// $passwordRequestId = isset($_POST['confirm']) ? trim($_GET['id']) : '';
 
// $stm = $conn->prepare("UPDATE `users` SET Password=:password WHERE token=:token" );
// $stm->bindParam(':pass', $Password);
// echo '5\n';
// $stm->bindParam(':token', $token);
// echo '6\n';
// $stm->execute();
// header("location: ../index.php?reset=success");


include_once '../config/connection.php';
// $msg="";

// if (isset($_POST['recoverpassword-submited'])) {
//   $id = intval(base64_decode($_GET["id"]));
//   $password = $_POST['Password'];
//   $token = $_POST['token'];
	
//   try {
//     $sql = "UPDATE users SET Password=? WHERE id=?";
//     $stmt = $conn->prepare($sql);
//     $stmt->bindParam(1, $password);
//     $stmt->bindParam(2, $id);
//     $stmt->bindParam(3, $token);
//     $stmt->execute();
// 	  $msg = "password changed successfully!";
//     $msgType = "success";
//     echo $msg;
//     header("location: ../index.php?reset=success");

//   } catch (Exception $ex) {
//     echo $ex->getMessage();
// 	  $msg = "Something went wrong. Plesae try again!";
//     $msgType = "danger";
//   }
// }
	if (isset($_POST['recoverpassword-submited'])) {
		$Password = $_POST['password'];
		$token = $_POST['token'];
		

try {
    $sql = "UPDATE `users` SET `Password`=? WHERE token=?";
    $stm = $conn->prepare($sql);
    echo "no1";
	$hashpwd = password_hash($Password, PASSWORD_DEFAULT);
    $stm->bindParam(1, $hashpwd);
    $stm->bindParam(2, $token);
	echo "no2";
	if($stm->execute())
	    echo "no3\n";
	
	echo $stm;
        $msg = "password changed successfully!";
        $msgType = "success";
        echo $msg;
		// header("location: ../index.php?reset=success");

      }catch (Exception $ex) {
        echo $ex->getMessage();
        $msg = "Something went wrong. Plesae try again!";
        $msgType = "danger";
      }
		}
?>