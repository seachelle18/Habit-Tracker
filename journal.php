<?php
session_start();
$uname = $_SESSION['username'];
?>

<?php include "./header.php";

//Configure PDO
$pdo = new PDO ('sqlite:goal (2).db');
$retrievedEntry = []; 

if (isset($_POST['submit'])) {
    $date = $_POST['journalDate'];
    $sql = 'SELECT * FROM goals WHERE date = ? and userid = ' . $uname;
    $statement = $pdo->prepare($sql);
    $statement->execute($date);
    $retrievedEntry = $statement->fetchAll();
}

$q1;
$q2;
$q3;

// Values for questions 1-10
if (count($retrievedEntry)>=1) {
    $q1 = $retrievedEntry[0]['question0'];
    $q2 = $retrievedEntry[0]['question1'];
    $q3 = $retrievedEntry[0]['question2'];
}








?>

<body>
    <div class="block">
        <form class="journal-retrieve"  method="POST">
            <label for="journalDate">Select the date</label>
            <input type="date" name="journalDate">
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
    <?php if (count($retrievedEntry) == 1): ?>
        <div class="block">
            <!-- display some stuff -->
            <input type="range" disabled min="0" max="10" value = $q1/>
        </div>
    <?php endif ?>

</body>