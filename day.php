<?php 
include "./header.html";
include "./questionbank.php";
?>
<body>
<div class="block">
    <?php echo '"' . $quote . '"'; ?>
</div>
<div class="block">
    <form class="morning-entry" method="POST">
        <?php foreach ($questionBank as $question): ?>
            <div class="question-container">
                <?php echo $question; ?>
            </div>
            <div class="slide-container">
                <input type="range" min="1" max="10" value="5" class="slider">
            </div>
        <?php endforeach; ?>
        <p class="goal-question">What are your mental health goals for today?</p>
        <?php
        for ($numGoals = 0; $numGoals < 3; $numGoals++) {
            echo '<input type="text" class="goal-text" name="goalQuestion' . $numGoals . '">';
        }
        ?>
        <input type="submit" value="Submit">
    </form>
</div>
</body>