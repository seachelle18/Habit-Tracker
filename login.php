<?php
session_start();
$uname = $_POST['username'];
$pword = $_POST['password'];
$_SESSION['username'] = $uname;

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
            header('Location:day.php');
            break;
        }
    }

?>



<html>
    <body>
        <h1>
            Sorry your password was wrong! 
        </h1>
        <a href="index.php">Back to index!</a>
    </body>
</html>