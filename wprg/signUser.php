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
$login = $_POST["login"];
$passwd = $_POST["passwd"];

if($login!=NULL && $passwd!=NULL) {
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    //robimy query wstawiające rekord do tabeli
    $sql = "insert into accounts (uname, passwd, isactive) values ('{$login}', '{$passwd}', 1)";
//wysyłamy query
    if ($conn->query($sql) === TRUE) {
        echo "<script>window.location = 'main.php'</script>";


    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
else{
    echo "Title and contents cannot be empty";
}

?>