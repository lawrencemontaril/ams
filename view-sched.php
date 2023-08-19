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

    <div class="sched-grid">
        <?php
            $id = $_GET["q"];

            $sql = "SELECT ID, UUID, SubCode, Subject, Day, StartTime, EndTime FROM schedules WHERE ID = ?";

            if($stmt = $conn->prepare($sql)) {
                $stmt->bind_param("s", $id);

                if($stmt->execute()) {
                    $stmt->bind_result($id, $uuid, $sub_code, $subject, $day, $start_time, $end_time);
                    $stmt->fetch(); ?>
                        
                        <div class="window" style="width: 100%">
                        
                            <div class="window-titlebar">
                                <p class="window-title"><?= $sub_code ?></p>
                                <div class="window-func">
                                    <div class="window-delete btn-wrapper">
                                        <button class="delete btn btn--red" sched_id="<?= $id ?>"><i class="bi bi-x"></i></button>
                                    </div>
                                </div>
                            </div>
                            <div class="window-content">
                                <div class="item-box">
                                    <div class="item">
                                        <span class="key">Subject</span>
                                        <span class="value"><?= $subject ?></span>
                                    </div>
                                    <div class="item">
                                        <span class="key">Day</span>
                                        <span class="value"><?= $day ?></span>
                                    </div>
                                    <div class="item">
                                        <span class="key">Start time</span>
                                        <span class="value ff-mono"><?= $start_time ?></span>
                                    </div>
                                    <div class="item">
                                        <span class="key">End time</span>
                                        <span class="value ff-mono"><?= $end_time ?></span>
                                    </div>
                                </div>
                            </div>
                            
                    </div>
                    
                    <?php 
                }
                $stmt->close();
            }
            $conn->close();

        ?>
    </div>

</main>

<!-- Footer -->
<?php include("public/shared/footer.php"); ?>
<script src="public/shared/scripts/timedate.js"></script>
</body>
</html>