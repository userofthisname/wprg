<br><br><br><br><br>
<h2>Comments</h2>
Create comment <br><form method="get"><input type = "text" name = "commContent" style="width: 500px;"><input type="submit" value="add comment"></form><br ><br ><br ><br >

<?php
$servername = "localhost";
//może to nie będzie root, ale to później
$username = "root";
$password = "";
$dbname = "blogdb";

$conn = new mysqli($servername, $username, $password, $dbname);
$commentor='gosc';
//if($_SESSION['isLogged']==1){}
//$sql=$conn->prepare("insert into comments (creator, postid, content) values ('{$commentor}', {$_POST['postNumber']}, {$_GET["commContent"]})");
//
//$sql->execute();
?>