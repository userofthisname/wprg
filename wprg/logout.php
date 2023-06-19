<?php
session_start();
    $_SESSION['logout']=$_POST["logout"];
    if(isset($_SESSION['logout'])) {
        unset($_SESSION['logout']);
        $_SESSION['isLogged'] = NULL;
        $_SESSION['id'] = NULL;
        echo "<script>window.location = 'main.php'</script>";
    }
?>