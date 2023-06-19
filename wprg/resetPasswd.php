<link rel="stylesheet" href="posts/style.css" type="text/css">

<?php
session_start();
echo '<div class="menuBar">
    <div class="menuElement"><a href="main.php">Main Page</a></div>

    <div class="menuElement"><a href="index.php">Create Post</a></div>
    <div class="menuElement"><a href="login.php">Log In</a></div>
    <div class="menuElement"><a href="signup.php">Sign In</a></div>

    <div class="menuElement">
        <form method="post" name="logoutForm">
            <input name="logout" class="logout" type="submit" value="log out"><br>
        </form>
    </div>
    
</div>';
echo"<h1>Reset Password</h1>";
    echo '
<form method = "post" >
        login: <input type = "text" name = "login" ><br >
        new password: <input type = "password" name = "new" ><br>
    <input type = "submit" value = "zaloguj" style = "margin-left: 42px;" >
</form >
';
error_reporting(E_ERROR | E_PARSE);
$login = $_POST["login"];
$passwd = $_POST["new"];
$servername = "localhost";
//może to nie będzie root, ale to później
$username = "root";
$password = "";
$dbname = "blogdb";

$conn = new mysqli($servername, $username, $password, $dbname);


$sql=$conn->prepare("select * from accounts where uname='{$login}'");

$sql->execute();

$result = $sql->get_result();
$user = $result->fetch_assoc();

$sql2=$conn->prepare("update accounts set passwd='{$passwd}' where uname='{$login}'");
$sql2->execute();
if($user ){
    session_start();

        echo "<script>window.location = 'login.php'</script>";


}






?>