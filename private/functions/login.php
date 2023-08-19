<?php
if(isset($_POST["login"])) {
    $uuid = $conn->real_escape_string($_POST["id_num"]);
    $uuid = trim($uuid);

    $sql = "SELECT UUID, Type, Designation, LastName, FirstName, MiddleName FROM records WHERE UUID = ?";
    if($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $uuid);

        if($stmt->execute()) {
            $stmt->store_result();

            if($stmt->num_rows == 1) {
                $stmt->bind_result($uuid, $type, $designation, $last_name, $first_name, $middle_name);

                if($stmt->fetch()) {
                    session_start();
                    $_SESSION["uuid"] = $uuid;
                    $_SESSION["type"] = $type;
                    $_SESSION["designation"] = $designation;
                    $_SESSION["last_name"] = $last_name;
                    $_SESSION["first_name"] = $first_name;
                    $_SESSION["middle_name"] = $middle_name;

                    header("Location: dashboard.php");
                }
            } else {
                echo "This ID number does not exist.";
            }
        } else {
            echo "An error occured, we could not process your request.";
        }
    } else {
        echo "An error occured, we could not process your request.";
    }

    $stmt->close();
    $conn->close();
}

?>