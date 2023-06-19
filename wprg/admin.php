<?php
session_start();
    if($_SESSION['isAdmin']!=1){
        echo "<script>window.location = 'main.php'</script>";
    }
    else{
        echo '<div class="formDiv">
        <form action="removeUser.php" method="post" name="postForm">
            ban user: <input name="ban"><br>
            <input type="submit">
        </form>
    </div>';
    }
?>