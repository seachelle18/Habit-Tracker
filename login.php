<?php
session_start();
$uname = $_POST['username'];
$pword = $_POST['password'];
$_SESSION['username'] = $uname;


date_default_timezone_set("America/Edmonton");

?>


<?php 

function dateSwitch(){
    $hour = date("H");
    if ($hour >= 7 && $hour <= 14) {
        header('Location:day.php');
    }
    else {
        header('Location:night.php');
    }
}

?>




<?php

    $PATH_TO_SQLITE_FILE = "HackTheChange.db";

    $pdo = new PDO("sqlite:" . $PATH_TO_SQLITE_FILE);
    $sql = "
        SELECT userid, password FROM login;
    ";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $allAccounts = $statement->fetchAll();

    foreach($allAccounts as $Account) {
        if ($Account["userid"] == $uname && $Account["password"] == $pword) { // FIX LATER, INSERT DYNAMIC VARIABLE IN PLACE OF ""
            //header('Location:day.php');
            dateSwitch();
            break;
        }
    }

?>



<html>
    <body>
        <h1>
            Sorry your password was wrong! 
            <?php echo date("F j, Y, g:i a");?> <br>
            <?php echo date("H");?>
        </h1>
        <a href="index.php">Back to index!</a>
    </body>
</html>