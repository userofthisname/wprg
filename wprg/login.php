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
    if($_SESSION['isLogged']==1) {
        echo '
<form action = "logUser.php" method = "post" >
            login: <input type = "text" name = "login" ><br >
        hasło: <input type = "password" name = "passwd" ><br >
    <input type = "submit" value = "zaloguj" style = "margin-left: 42px;" >
</form >
';}
    else{

        echo 'you are logged in already';}


?>