<?php
    // session_destroy();
    // unset($_SESSION['username']);
    // unset($_SESSION['user_id']);
    // unset($_SESSION['email']);
    session_unset();
    session_destroy();
    session_write_close();
    setcookie("PHPSESSID","",time()-3600,"/");
    header("location: index.php");
 ?>
