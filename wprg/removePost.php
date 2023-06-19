<link rel="stylesheet" href="posts/style.css" type="text/css">
<?php
session_start();
?>
<div class="menuBar">
    <div class="menuElement"><a href="main.php">Main Page</a></div>

    <div class="menuElement"><a href="index.php">Create Post</a></div>
    <div class="menuElement"><a href="login.php">Log In</a></div>
    <div class="menuElement"><a href="signup.php">Sign In</a></div>

    <div class="menuElement">
        <form method="post" name="logoutForm">
            <input name="logout" class="logout" type="submit" value="log out"><br>
        </form>
    </div>
    <div class="uname" class="menuElement"><?php  if($_SESSION['isLogged']==1){echo $_SESSION['user'];}  ?></div>
</div>

<?php



$servername = "localhost";
//może to nie będzie root, ale to później
$username = "root";
$password = "";
$dbname = "blogdb";

$conn = new mysqli($servername, $username, $password, $dbname);


    $sql=$conn->prepare("delete from  posts where id='{$_SESSION['lastPost']}'");
    $sql->execute();



?>
<?php
