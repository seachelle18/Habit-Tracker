<?php
$quote = "This is a very inspirational quote. -Michelle Chow, 2022";
$questionBank = ["How are you feeling today?", "How much energy do you have today?"];

?>

<?php include "./header.html"?>
<body>
<div class="block">
    <?php echo '"' . $quote . '"'; ?>
    <?php foreach ($questionBank as $question): ?>
        <div class="question">
            <?php echo $question; ?>
        </div>
    <?php endforeach; ?>
</div>
<div class="block">

</div>
</body>