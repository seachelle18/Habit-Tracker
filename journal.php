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

// Storing all question responses as (INT)
$q1;
$q2;
$q3;

// Storing all goal responses as (String)
$g1;
$g2;
$g3;

// Storing all check-box responses as (INT) = {0,1}
$c1;
$c2;
$c3;

// Storing all reflections responses as (String)
$r1;
$r2;
$r3;

// Journal entry
$jEntry;

// Initializing above variables
if (count($retrievedEntry)>=1) {
    $q1 = $retrievedEntry[0]['question0'];
    $q2 = $retrievedEntry[0]['question1'];
    $q3 = $retrievedEntry[0]['question2'];

    $g1 = $retrievedEntry[0]['goal0'];
    $g2 = $retrievedEntry[0]['goal1'];
    $g3 = $retrievedEntry[0]['goal2'];

    $c1 = $retrievedEntry[0]['checkbox0'];
    $c2 = $retrievedEntry[0]['checkbox1'];
    $c3 = $retrievedEntry[0]['checkbox2'];

    $r1 = $retrievedEntry[0]['reflection0'];
    $r2 = $retrievedEntry[0]['reflection1'];
    $r3 = $retrievedEntry[0]['reflection2'];

    $jEntry = $retrievedEntry[0]['journal'];

    // Determines whether text below is green or grey; dependinng on checkbox value
    $colourArray = array();
    if ($c1 == 1) array_push($colourArray, "black");
    else array_push($colourArray, 'red');

    if ($c2 == 1) array_push($colourArray, "black");
    else array_push($colourArray, 'red');

    if ($c3 == 1) array_push($colourArray, "black");
    else array_push($colourArray, 'red');

}




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

    <?php if (count($retrievedEntry) >= 1): ?>
        <div class="block day-results">
            <!-- display some stuff -->
            <p>Question 1: How are you feeling right now?</p>
            <input type="range"  min="0" max="10" value = <?=$q1?> disabled/>

            <p>Question 2: How much energy do you have today?</p>
            <input type="range"  min="0" max="10" value = <?=$q2?> disabled/>

            <p>Question 3: How are your stress levels right now?</p>
            <input type="range"  min="0" max="10" value = <?=$q3?> disabled/>


            <?php // Reminder to coder: the color GREEN might be too ugly, fix as needed, probably change to black
                if ($g1 != NULL) echo '<p class = "goal-wish" style="color:'.$colourArray[0].';">'.$g1.'</p>  <br>'; //add styling later (based on checkmark)
                if ($r1 != NULL) echo '<p class = "goal-reflect">' . $r1 . '</p>    <br>';

                if ($g2 != NULL) echo '<p class = "goal-wish" style="color:'.$colourArray[1].';">'.$g2.'</p>  <br>';
                if ($r2 != NULL) echo '<p class = "goal-reflect">'.$r2.'</p>    <br>';

                if ($g3 != NULL) echo '<p class = "goal-wish" style="color:'.$colourArray[2].';">'.$g3.'</p>  <br>';
                if ($r3 != NULL) echo '<p class = "goal-reflect">'.$r3.'</p>    <br>';

                if ($jEntry != NULL) echo '<p class="journal-entry">'.$jEntry.'<p>';
            ?>


        </div>
    <?php endif ?>

</body>