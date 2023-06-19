<link rel="stylesheet" href="posts/style.css" type="text/css">

<?php
if(isset($_POST["add"])){
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
}
$servername = "localhost";
//może to nie będzie root, ale to później
$username = "root";
$password = "";
$dbname = "blogdb";
session_start();
$conn = new mysqli($servername, $username, $password, $dbname);

//żeby się komunikaty nie wyświetlały
error_reporting(E_ERROR | E_PARSE);
//sprawdzamy połączenie
$postTitle = $_POST["PostTitle"];
$postText = $_POST["content"];
if($_SESSION['isLogged']!=Null) {
    if ($postTitle != NULL && $postText != NULL) {
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
        //robimy query wstawiające rekord do tabeli
        $time = date("j/m/Y");
        $sql = "insert into posts (creator, title, content, date) values ({$_SESSION['user']}, '{$postTitle}', '{$postText}', '{$time}')";
        //wysyłamy query
        if ($conn->query($sql) === TRUE) {
            echo "your post " . $postTitle . " has been added<br><br><br><br><br>" . $postText;


        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } elseif(isset($_POST["add"])) {
        echo "Title and contents cannot be empty";
    }
}elseif(isset($_POST["add"])){
    echo "log in if you want to add a post";
}
?>
