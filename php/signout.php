<?php
    session_start();
    session_destroy();
    unset($_SESSION['username']);
  //  $_SESSION['message'] = "You are now logged out";
    echo 'You have Signed out!';
    header("location: ../index.php?sign-out=success");
?>
<body>
</body>