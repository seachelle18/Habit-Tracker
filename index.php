<?php
session_start();

?>


<?php include "header.html" ?>
<body>
    <div class="login-box">
        <form class="login-form" method="POST">
            <label for="username" class="form-label">Username:</label>
            <input type="text" id="username" name="username">
            <label for="password" class="form-label">Password:</label>
            <input type="password" id="password" name="password">
            <input type="submit" value="Submit">
        </form>

    </div>
</body>
