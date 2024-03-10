<?php
require_once 'includes/config_session.inc.php';

// Replace these with your actual database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecocarbon_database";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and execute the query
$query = "SELECT * FROM user WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $_SESSION["user_username"]);
$stmt->execute();

// Fetch the result
$result = $stmt->get_result();
$user = $result->fetch_assoc();

//Check field
if (isset($_GET) && !empty($_GET)) {
    $pwd = $_GET["newpwd"];

    $sql = "UPDATE user SET pwd = ? WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $pwd, $_SESSION["user_username"]);
    $stmt->execute();

    echo "<script type='text/javascript'>
            alert('Password updated!');
            window.location = 'profile.php';
        </script>";
}

// Close the database connection
$conn->close();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Change Password</title>
        <link rel="icon" type="image/png" href="assets/logo.png" />
        <meta name="description" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
        crossorigin="anonymous"
        />
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"
        />
        <link
        rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        />
        <link rel="stylesheet" href="style.css" />
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet"/>
        

        
    </head>

    <?php
    include 'includes/headers/header_merchant.inc.php';
    ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <body>
    <div class="container-fluid pb-5">
        <div class="row">
            <nav class="col-md-2 d-md-block side-menu p-5" style="text-align:center">
                <h5 class="text-center"><?php echo $_SESSION["user_username"] ?>'s Dashboard</h5>
                <hr class="my-3">
                <a href="addactivity.php">Add Activity</a>
                <a href="profile.php">Profile</a>
                <a  href="searchhistory.php">History</a>
                <a>Friends</a>
                <a>Recommendation</a>
                <a>Education contents</a>
                    <!-- Add more links as needed -->
            </nav>
    
            
            

            <div class="col-md-8 pt-5">
                <div class="row g-0">
                    <div class="col-md-6 col-lg-10 p-1 d-md-flex d-md-block">
                        <h1>My Profile</h1>
                    </div>
                </div>
                <br>
                <div class="row g-0">
                    <div class="row g-0">
                        <h3 style="letter-spacing: 1px">
                            New Password:
                        </h3>
                        <h4 class="fw-normal pb-3" style="letter-spacing: 1px; margin-right: 100px;">
                            <form>
                            <input
                            type="password"
                            class="form-control form-control-lg"
                            name="newpwd"
                            >
                            </input>
                        </h4>

                        <div class="align-items-center">
                            <button class="btn btn-danger" href="changepassword.php">Change Password</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm"
        crossorigin="anonymous"
    >
    </script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="script.js"></script>
    
    </body>


</html>