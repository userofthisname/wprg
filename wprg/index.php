<html>
<?php include 'addPost.php';
session_start();
include 'logout.php';


?>
<head>
    <link rel="stylesheet" href="posts/style.css" type="text/css">

</head>
<body>
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
    <div class="uname" class="menuElement"></div>
</div>

    <div class="formDiv">
        <form action="addPost.php" method="post" name="postForm">
            wpisz tytuł posta:<br>
            <input type="text" name="PostTitle" id="title"><br>
            wpisz treść posta:<br>
            <input type="text" name="content" class="content"><br>
            <input type="submit" value="zapisz" name="add">
        </form>
    </div>

</body>
</html>