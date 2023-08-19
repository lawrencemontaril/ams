<?php
    include("config.php");
    $id = $_POST["delete_id"];

    mysqli_query($conn, "DELETE FROM schedules WHERE ID='$id'");
?>