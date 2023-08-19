<?php
    include("config.php");
    
    
    $uuid = $_SESSION["uuid"];

    $sql = "SELECT ID, UUID, SubCode, Subject, Day, StartTime, EndTime FROM schedules WHERE UUID = ?";

    if($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $uuid);

        if($stmt->execute()) {
            $stmt->bind_result($id, $uuid, $sub_code, $subject, $day, $start_time, $end_time);

            while($stmt->fetch()) { ?>
                
                <a href="view-sched.php?q=<?= $id ?>" class="window" style="width: 100%">
                
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
                    
                </a>
            
            <?php }
            $stmt->close();
        }
    }
    $conn->close();
?>