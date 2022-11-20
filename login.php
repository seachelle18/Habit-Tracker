



<?php
session_start();
$uname = $_POST['username'];
$pword = $_POST['password'];
?>

<?php

    $PATH_TO_SQLITE_FILE = ""; // PUT IN PROPER PATH AFTERWARDS

    $pdo = PDO("sqlite:" . $PATH_TO_SQLITE_FILE);
    $sql = "
        SELECT userid, password FROM login;
    ";
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $allAccounts = $statement->fetchAll();

    foreach($allAccounts as $Account) {
        if ($Account["userid"] == $uname && $Account["password"] == $pword) { // FIX LATER, INSERT DYNAMIC VARIABLE IN PLACE OF ""
            echo "WORKING";
            break;
        }
    }

?>





<html>
    <body>
        <?php echo $uname . $pword?>
    </body>
</html>