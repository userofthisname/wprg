<?php
$servername = "localhost";
//może to nie będzie root, ale to później
$username = "root";
$password = "";
$dbname = "blogdb";

$conn = new mysqli($servername, $username, $password, $dbname);
$sql=$conn->prepare("update accounts set isActive=0 where id='{$_POST['ban']}'");

$sql->execute();
echo "<script>window.location = 'admin.php'</script>";
?>