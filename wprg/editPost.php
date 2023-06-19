<link rel="stylesheet" href="posts/style.css" type="text/css">
<?php
session_start();
echo $_SESSION['lastPost'];
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

<div class="formDiv">
    <form method="post" name="postForm">
        wpisz tytuł posta:
        <input type="text" name="PostTitle" id="title">
        wpisz treść posta:<br>
        <input type="text" name="content" class="content"><br>
        <input type="submit" value="zapisz" name="add">
    </form>
</div>
<?php



$servername = "localhost";
//może to nie będzie root, ale to później
$username = "root";
$password = "";
$dbname = "blogdb";

$conn = new mysqli($servername, $username, $password, $dbname);

//żeby się komunikaty nie wyświetlały
error_reporting(E_ERROR | E_PARSE);
//sprawdzamy połączenie
$postTitle = $_POST["PostTitle"];
$postText = $_POST["content"];

    if ($postTitle != NULL && $postText != NULL) {
        //robimy query wstawiające rekord do tabeli

        $sqlEdit = "update posts set title='{$postTitle}', content='{$postText}' where id='{$_SESSION['lastPost']}' ";
        //wysyłamy query
        if ($conn->query($sqlEdit) === TRUE) {



        } else {
            echo "Error: " . $sqlEdit . "<br>" . $conn->error;
        }
    } elseif(isset($_POST["add"])) {
        echo "Title and contents cannot be empty";
    }

?>
