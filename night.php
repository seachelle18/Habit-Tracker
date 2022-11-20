<?php 
include "./header.html";
include "./questionbank.php";

//get stuff from SQL database
$goalResponses = ["placeholder1", "placeholder2", "placeholder3"];
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
        <p class="goal-question">Reflect on your mental health goals from today. Do you feel that you were successful in each one?</p>
        <?php foreach($goalResponses as $goal): ?>
            <div class="response-container">
                <p class="goal-response-text"><?php echo $goal; ?></p>
                <input type="text" class="goal-text">
                <input type="checkbox" class="goal-checkbox">
            </div>
        <?php endforeach; ?>
        <label for="journal" class="form-label">Journal entry for today:</label>
        <input type="textarea" class="journal-entry" name="journal">
        <input type="submit" value="Submit" class="form-button">
        <input type="reset" value="Reset" class="form-button">
        </div>
</body>