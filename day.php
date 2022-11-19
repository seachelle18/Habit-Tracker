<?php 
include "./header.html";
include "./questionbank.php";
?>
<body>
<div class="block">
    <?php echo '"' . $quote . '"'; ?>
    <?php foreach ($questionBank as $question): ?>
        <div class="question-container">
            <?php echo $question; ?>
        </div>
        <div class="slide-container">
            <input type="range" min="1" max="10" value="5" class="slider">
        </div>
    <?php endforeach; ?>
</div>
<div class="block">

</div>
</body>