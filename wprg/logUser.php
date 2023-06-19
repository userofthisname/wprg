<?php

$login = $_POST["login"];
$passwd = $_POST["passwd"];
$servername = "localhost";
//może to nie będzie root, ale to później
$username = "root";
$password = "";
$dbname = "blogdb";

$conn = new mysqli($servername, $username, $password, $dbname);

if($login!=NULL && $passwd!=NULL){
    //ustawiamy sobie usera który próbuje się zalogować
    $sql=$conn->prepare("select * from accounts where uname='{$login}'");

    $sql->execute();

    $result = $sql->get_result();
    $user = $result->fetch_assoc();
    if($user && $passwd == $user['passwd']){
        session_start();
        if($user['isActive']!=0) {
            $_SESSION['isLogged'] = 1;
            $_SESSION['user'] = $user['id'];
            $_SESSION['isAdmin'] = $user['isAdmin'];
            echo "<script>window.location = 'main.php'</script>";
        }
        else{echo "your account has been banned";}
    }
    else{echo "wrong password";}
}else{
    echo "fill out login and password";
}
?>
<?php
