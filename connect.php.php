<?php
require_once 'includes/config_session.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upload'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'ecocarbon_database') or die("Connection Failed: " . mysqli_connect_error());
    if (isset($_POST['ulimage']) && isset($_POST['ultitle']) && isset($_POST['uldescription']) && isset($_POST['ulurl'])) {
        $ulimage = $_POST['ulimage'];
        $ultitle = $_POST['ultitle'];
        $uldescription = $_POST['uldescription'];
        $ulurl = $_POST['ulurl'];

        // Using a prepared statement to prevent SQL injection
        $sql = "INSERT INTO uploadcontent (Image, Title, Description, URL) VALUES (?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $sql);

        if ($stmt) {
            mysqli_stmt_bind_param($stmt, 'ssss', $ulimage, $ultitle, $uldescription, $ulurl);
            $result = mysqli_stmt_execute($stmt);

            if ($result) {
                echo 'Upload successful';
            } else {
                echo 'Error Occurred: ' . mysqli_error($conn);
            }

            mysqli_stmt_close($stmt);
        } else {
            echo 'Error in preparing the statement: ' . mysqli_error($conn);
        }
    }

    mysqli_close($conn);
}
?>