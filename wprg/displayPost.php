<head><link rel="stylesheet" href="posts/style.css" type="text/css"></head>
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

    <div class="menuElement">
        <form method="post">
            <input name="prevPost" type="submit" value="previous"><br>
        </form>
    </div>

    <div class="menuElement">
        <form method="post">
            <input name="nextPost" type="submit" value="next"><br>
        </form>
    </div>


</div>
<?php
$servername = "localhost";
//może to nie będzie root, ale to później
$username = "root";
$password = "";
$dbname = "blogdb";
session_start();
$_SESSION['lastPost']=$_POST["postNumber"];
$conn = new mysqli($servername, $username, $password, $dbname);
//if(isset($_POST["prevPost"])){}



if($_SESSION['isAdmin']==1){echo "<a href='removePost.php'><form><input type='button' value='remove'></a>";}

elseif($_SESSION['user']==$_POST["postCreator"]){
    echo "<a href='removePost.php'><form><input type='button' value='remove'></a><a href='editPost.php'><input type='button' value='edit'></form></a>";
}


echo "<h1>" . $_POST["postTitle"] . "</h1><br>";
echo "created by " . $_POST["creatorName"] . " on " . $_POST["date"] . "<br>";
echo "<h4>" . $_POST["postContent"] . "</h4><br>";
?>

<?php
include 'addComment.php';

?>
