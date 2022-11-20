<?php include "./header.php";

//Configure PDO
$pdo = new PDO ('sqlite:goal (2).db');
$retrievedEntry = []; 

if (isset($_POST['submit'])) {
    $date = $_POST['journalDate'];
    $sql = 'SELECT * FROM goals WHERE date = ?';
    $statement = $pdo->prepare($sql);
    $statement->execute($date);
    $retrievedEntry = $statement->fetchAll();
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
        </div>
    <?php endif ?>

</body>