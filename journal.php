<?php include "./header.php";

//Configure PDO
$pdo = new PDO ('sqlite:C:\Users\michellec\xampp\htdocs\habit-tracker\Habit-Tracker\goal (2).db');
$retrieve 

if (isset($_POST['submit'])) {
    $date = $_POST['journalDate'];
    $sql = 'SELECT * FROM goals WHERE date = ?';
    $statement = $pdo->prepare($sql);
    $statement->execute($date);


};
?>

<body>
    <div class="block">
        <form class="journal-retrieve"  method="POST">
            <label for="journalDate">Select the date</label>
            <input type="date" name="journalDate">
            <input type="submit" name="submit" value="Submit">
        </form>
    </div>
</body>