<?php
/*require_once 'includes/config_session.inc.php';*/

include 'config.php';

if (isset($_POST['upload'])) {
    $image = $_FILES['ulimage'];
    print_r($_FILES['ulimage']);
    $img_loc = $_FILES['ulimage']["tmp_name"];
    $img_name = $_FILES['ulimage']["name"];
    $img_des = "uploadimage/".$img_name;
    move_uploaded_file($img_loc,'uploadimage/'.$img_name);
    $ultitle = $_POST['ultitle'];
    $uldescription = $_POST['uldescription'];
    $ulurl = $_POST['ulurl'];
    }

    //inseret data
    mysqli_query ($con,"INSERT INTO `uploadcontent`(`Image`, `Title`, `Description`, `URL`) VALUES ('$img_des','$ultitle','$uldescription','$ulurl')");

    // Using a prepared statement to prevent SQL injection
    /*$sql = "INSERT INTO uploadcontent (Image, Title, Description, URL) VALUES (?, ?, ?, ?)";
    $stmt = mysqli_prepare($conn, $sql);*/
    

    /*if (move_uploaded_file($img_loc, 'C:\xampp\htdocs\BIT216-EcoCarbon\uploadimage' . $img_name)) {
        echo "File moved successfully";
    } else {
        echo "Error moving file";
    }

    mysqli_close($conn);
    }



/*if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['upload'])) {
    $conn = mysqli_connect('localhost', 'root', '', 'ecocarbon_database') or die("Connection Failed: " . mysqli_connect_error());
    if (isset($_FILES['ulimage']) && isset($_POST['ultitle']) && isset($_POST['uldescription']) && isset($_POST['ulurl'])) {
        $image = $_FILES['ulimage'];
        print_r($_FILES['ulimage']);
        $img_loc = $_FILES['ulimage']['tmp_name'];
        $img_name = $_FILES['ulimage']['name'];
        move_uploaded_file($img_loc,'C:\xampp\htdocs\BIT216-EcoCarbon\uploadimage'.$img_name);
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
}*/


?>
  
