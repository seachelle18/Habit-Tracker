<?php
session_start();
$uname = $_SESSION['username'];
?>

<?php include "./header.php";

//Configure PDO
$pdo = new PDO ('sqlite:goals.db');
$retrievedEntry = []; 

if (isset($_POST['submit'])) {
    $date = $_POST['journalDate'];
    $sql = 'SELECT * FROM goal WHERE date ="' . $date . '" and userid = ' . $uname;
    $statement = $pdo->prepare($sql);
    $statement->execute();
    $retrievedEntry = $statement->fetchAll();
}

$q1;
$q2;
$q3;
//echo $uname;
//echo $date;
//echo count($retrievedEntry);

//var_dump($retrievedEntry);

// Values for questions 1-10
if (count($retrievedEntry)>=1) {
    $q1 = $retrievedEntry[0]['question0'];
    $q2 = $retrievedEntry[0]['question1'];
    $q3 = $retrievedEntry[0]['question2'];
}

$test = 10;






?>

<body>
    <?php if (count($retrievedEntry) == 0): ?>

        <div class="block">
            <form class="journal-retrieve"  method="POST">
                <label for="journalDate">Select the date</label>
                <input type="date" name="journalDate">
                <input type="submit" name="submit" value="Submit">
            </form>
        </div>
    <?php endif ?>

    <?php if (count($retrievedEntry) == 1): ?>
        <div class="block">
            <!-- display some stuff -->
            <h1>Question 1: Placeholder</h1>
            <input type="range"  min="0" max="10" value = <?=$q1?> disabled/>

            <h1>Question 2: Placeholder</h1>
            <input type="range"  min="0" max="10" value = <?=$q2?> disabled/>

            <h1>Question 3: Placeholder</h1>
            <input type="range"  min="0" max="10" value = <?=$q3?> disabled/>
        </div>
    <?php endif ?>

</body>