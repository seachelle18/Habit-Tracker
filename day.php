<?php 
session_start();
$username = $_SESSION['username'];
$date = date('Y-m-d');


include "./header.php";
include "./questionbank.php";
$question0 = $question1 = $question2 = 5;
$goal0 = $goal1 = $goal2 = '';

//Configure PDO
$pdo = new PDO ('sqlite:goals.db');


if (isset($_POST['submit'])) {
    $question0 = (int) $_POST['question0'];
    $question1 = (int) $_POST['question1'];
    $question2 = (int) $_POST['question2'];
    $goal0 = $_POST['goal0'];
    $goal1 = $_POST['goal1'];
    $goal2 = $_POST['goal2'];

    //write to SQL
    $sql = 'INSERT INTO goal (userid, date, question0, question1, question2, goal0, goal1, goal2) VALUES (?,?,?,?,?,?,?,?)';
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$username, $date, $question0, $question1, $question2, $goal0, $goal1, $goal2]);
    
}

?>
<body>
<div class="moving">
    <a></a>
</div>

<div class="block quote">
    <?php echo '"' . $quote . '"'; ?>
</div>
<div class="block">
    <form class="morning-entry" method="POST">
        <?php foreach ($questionBank as $question): ?>
            <div class="question container">
                <?php echo $question; ?>
            </div>
            <div class="slide-container">
                <input type="range" min="1" max="10" value="5" class="slider" name=<?php echo 'question' . array_search($question, $questionBank)?>>
            </div>
        <?php endforeach; ?>
        <p class="goal-question">What are your mental health goals for today?</p>
        <?php
        for ($numGoals = 0; $numGoals < 3; $numGoals++) {
            echo '<input type="text" class="goal-text" name="goal' . $numGoals . '">';
        }
        ?>
        <input type="submit" name="submit" value="Submit" class="form-button">
        <input type="reset" name="reset" value="Reset" class="form-button">
    </form>
</div>
<!-- <?php var_dump($question0); var_dump($question1); var_dump($question2); var_dump($goal0); var_dump($goal1); var_dump($goal2); ?> -->
</body>