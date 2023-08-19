<?php
    include("private/functions/config.php");
    include("public/shared/head.php");
?>

<head>
    <title>AMS - Dashboard</title>
    <script>
        $(document).ready(function(){
            $('.delete').click(function(){
                var id = $(this).attr("sched_id");
                $.ajax({
                    url : 'private/functions/deleteSched.php',
                    type : 'POST',
                    data: { delete_id: id }
                });
                $('.sched-grid').load("private/functions/displaySched.php");
            });
        });
    </script>
</head>

<body>
<!-- Header -->
<?php include("public/shared/header.php"); ?>


<main class="dashboard-layout">

    <div class="dash-header">
        <h1>Your schedules</h1>
        <nav class="nav-menu">
            <div class="btn-wrapper">
                <a href="add-sched.php" class="btn btn--blue fs-200"><i class="bi bi-plus"></i> Add schedule</a>
            </div>
        </nav>
    </div>

    <div class="sched-grid">
        <?php
            if($_SESSION["type"] == "Teacher") {
                include("private/functions/displaySched.php");
            } else if ($_SESSION["type"] == "Student"){
                echo "You are a student";;
            }
        ?>
    </div>

</main>

<!-- Footer -->
<?php include("public/shared/footer.php"); ?>
<script src="public/shared/scripts/timedate.js"></script>
</body>
</html>