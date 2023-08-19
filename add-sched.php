<?php
    include("private/functions/config.php");
    include("public/shared/head.php");
?>

<head>
    <title>AMS - Add schedule</title> 
</head>

<body>
<!-- Header -->
<?php include("public/shared/header.php"); ?>

<main class="login-layout">

<div class="window">
    <div class="window-title">Add schedule</div>
    <div class="window-content">
        <form class="login-form" method="post" action="">
            <label for="id_num">ID Number</label>
            <input id="id_num" name="id_num" type="password" required>
            <input type="submit" name="login">
            <?php include("private/functions/login.php"); ?>
        </form>
        <span class='ct5' style="background-color: var(--clr-secondary)"></span>
    </div>
</div>

</main>


<!-- Footer -->
<?php include("public/shared/footer.php"); ?>
<script src="public/shared/scripts/timedate.js"></script>
</body>
</html>