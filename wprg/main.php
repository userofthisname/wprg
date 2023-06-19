<head><link rel="stylesheet" href="posts/style.css" type="text/css"></head>

<div class="menuBar">
    <div class="menuElement"><a href="main.php">Main Page</a></div>

    <div class="menuElement"><a href="index.php">Create Post</a></div>
    <div class="menuElement"><a href="login.php">Log In</a></div>
    <div class="menuElement"><a href="signup.php">Sign In</a></div>
    <div class="menuElement"><a href="resetPasswd.php">Reset Password</a></div>
    <div class="menuElement">
        <form method="post" name="logoutForm">
            <input name="logout" class="logout" type="submit" value="log out"><br>
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

$conn = new mysqli($servername, $username, $password, $dbname);
echo "<h1> Posts:</h1>";

$sql=$conn->prepare("select * from posts order by date asc");

$sql->execute();

$result = $sql->get_result();
$post = $result->fetch_assoc();
$rowCount= mysqli_num_rows($result);



$sql2=$conn->prepare("select uname from accounts, posts where creator=accounts.id;");
$sql2->execute();
$result2 = $sql2->get_result();
$a=$result2->fetch_assoc();

if ($rowCount > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<form method='POST' action='displayPost.php'>
                <input type='hidden' value='{$row['date']}' name='date'>
                <input type='hidden' value='{$row['id']}' name='postNumber'>
                <input type='hidden' value='{$row['title']}' name='postTitle'>
                <input type='hidden' value='{$row['content']}' name='postContent'>
                <input type='hidden' value='{$row['creator']}' name='postCreator'>
                <input type='hidden' value='{$a['uname']}' name='creatorName'>
                <input type='submit' value='{$row['title']} created on  {$row['date']}'>
              </form>";




  }
}


?>