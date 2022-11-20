<?php 
include "./header.php";
include "./questionbank.php";

session_start();
$username = $_SESSION['username'];
$date = date('Y-m-d');
$count = [0,1,2];

$question0 = $question1 = $question2 = 0;
$reflection0 = $reflection1 = $reflection2 = '';
$checkbox0 = $checkbox1 = $checkbox2 = 0;
$journal = '';

    $pdo = new PDO ('sqlite:goals.db');
    $sql_pull = 'SELECT goal0, goal1, goal2 FROM goal WHERE userid = ? AND date = ?;';
    $stmt_pull = $pdo->prepare($sql_pull);
    $stmt_pull->execute([$username, $date]);
    $goalResponses = $stmt_pull->fetchAll(PDO::FETCH_ASSOC);
    var_dump($goalResponses);


if (isset($_POST['submit'])) {
    $question0 = (int) $_POST['question0'];
    $question1 = (int) $_POST['question1'];
    $question2 = (int) $_POST['question2'];
    $reflection0 = $_POST['reflection0'];
    $reflection1 = $_POST['reflection1'];
    $reflection2 = $_POST['reflection2'];

    if ($_POST['checkbox0'] === "on") {
        $checkbox0 = 1; }
    if ($_POST['checkbox1'] === "on") {
        $checkbox1 = 1; }
    if ($_POST['checkbox2'] === "on") {
        $checkbox2 = 1; }
    
    $journal = $_POST['journal'];


    $sql_insert = 'INSERT INTO goal (userid, date, question0, question1, question2, reflection0, reflection1, reflection2, checkbox0, checkbox1, checkbox2) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
    $stmt_insert = $pdo->prepare($sql_insert);
    $stmt_insert->execute([$username, $date, $question0, $question1, $question2, $reflection0, $reflection1, $reflection2, $checkbox0, $checkbox1, $checkbox2]);


}


?>

<body>
    <div class="block">
    <form class="night-entry" method="POST">
        <?php foreach ($questionBank as $question): ?>
            <div class="question container">
                <?php echo $question; ?>
            </div>
            <div class="slide-container">
                <input type="range" min="1" max="10" value="5" class="slider" name=<?php echo 'question' . array_search($question, $questionBank)?>>
            </div>
        <?php endforeach; ?>
        <p class="goal-question">Reflect on your mental health goals from today.<br>Do you feel that you were successful in each one?</p>
        <?php foreach($goalResponses[0] as $goal): ?>
            <div class="response-container">
                <p class="goal-response-text"><?php echo $goal; ?></p>
                <div class="response-check">
                    <input type="checkbox" class="goal-checkbox" name=<?php echo 'checkbox' . array_search($goal, $goalResponses[0])?>>
                    <input type="text" class="goal-text" name=<?php echo 'reflection' . array_search($goal, $goalResponses[0])?>>
                </div>
            </div>
        <?php endforeach; ?>
        <label for="journal" class="form-label">Journal entry for today:</label>
        <textarea cols="50" rows="7" class="journal-entry" name="journal"></textarea>
        <input type="submit" name="submit" value="Submit" class="form-button">
        <input type="reset" name="reset" value="Reset" class="form-button">
        </form>
        </div>
        <?php var_dump($reflection0); var_dump($reflection1); var_dump($reflection2);
        var_dump($question0); var_dump($question1); var_dump($question2); 
        var_dump($checkbox0); var_dump($checkbox1); var_dump($checkbox2);
        var_dump($journal);  
        ?>
</body>