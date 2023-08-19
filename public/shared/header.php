<header>

<?php if(basename($_SERVER['PHP_SELF']) == "index.php") { ?>
    <nav class="navbar" style="justify-content: center">
        <div>
            <span class="logo">Attendance Management System</span>
        </div>
    </nav>
<?php } ?>

<?php if(basename($_SERVER['PHP_SELF']) != "index.php") { ?>
    <nav class="navbar">
        <div class="navbar_user">
            <span class="static-info">
                <?php 
                    if(empty($_SESSION["middle_name"])) {
                        $middle_name = "";
                    } else {
                        $middle_name = $_SESSION["middle_name"][0]. ".";
                    }
                    echo $_SESSION["last_name"]. ", ". $_SESSION["first_name"]. " ". $middle_name
                ?>
            </span>
        </div>
        <div class="navbar_func">
            <p class="timedate ff-mono"></p>
            <div class="btn-wrapper">
                <a class="btn btn--red" href="private/functions/logout.php">Log out</a>
            </div>
        </div>
    </nav>
<?php } ?>

</header>