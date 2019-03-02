<?php  
    session_start();
    session_unset();
    session_destroy();
    if (isset($_COOKIE['id'])) {
        
        setcookie('id', '', time()-1000000);
    }
    mysqli_close($conn);
    header("Location: ../login.php");
    exit();