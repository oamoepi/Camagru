<?php 
    if(!isset($_SESSION['userUid']) && !isset($_SESSION['userEmail'])) 
        header("Location: index.php");
?>