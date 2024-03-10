<?php
require_once 'includes/config_session.inc.php';

// Assuming you have established a database connection
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


// Close the database connection
$conn->close();

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Profile</title>
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
                <a href="activityques.php">Add Activity</a>
                <a href="profile.php">Profile</a>
                <a  href="searchhistory.php">History</a>
                <a>Friends</a>
                <a href = "Recommendation.php">Recommendation</a>
                <a>Education Content</a>
                    <!-- Add more links as needed -->
            </nav>
    
            
            

            <div class="col-md-8 pt-5">
                <div class="row g-0">
                    <div class="col-md-6 col-lg-10 p-1 d-md-flex d-md-block">
                        <h1>My Profile</h1>
                    </div>
                    <div class="row col-md-6 col-lg-2 d-flex align-items-center">
                        <a class="btn btn-primary" href="changepassword.php">Change Password</a>
                    </div>
                </div>
                <br>
                <div class="row g-0">
                    <div class="row g-0">
                        <h3 style="letter-spacing: 1px">
                            Username:
                        </h3>
                        <div class="col-md-6 col-lg-9 p-1 d-md-flex d-md-block" style="margin-left: 25px;">
                            <h4 class="fw-normal pb-3" style="letter-spacing: 1px; margin-right: 100px;">
                                <?php echo $user["username"]; ?>
                            </h4>
                        </div>
                    </div>
                    <div class="row g-0">
                        <h3 style="letter-spacing: 1px">
                            Email:
                        </h3>
                        <div class="col-md-6 col-lg-9 p-1 d-md-flex d-md-block" style="margin-left: 25px;">
                            <h4 class="fw-normal pb-3" style="letter-spacing: 1px; margin-right: 100px;">
                                <?php echo $user["email"]; ?>
                            </h4>
                        </div>
                    </div>
                    <div class="row g-0">
                        <h3 style="letter-spacing: 1px">
                            Contact No:
                        </h3>
                        <div class="col-md-6 col-lg-9 p-1 d-md-flex d-md-block" style="margin-left: 25px;">
                            <h4 class="fw-normal pb-3" style="letter-spacing: 1px; margin-right: 100px;">
                                <?php echo $user["contactno"]; ?>
                            </h4>
                        </div>
                    </div>
                    <div class="row g-0">
                        <h4 style="letter-spacing: 1px">
                            Commute Preferences: 
                        </h4>
                        <div class="col-md-6 col-lg-9 p-1 d-md-flex d-md-block" style="margin-left: 25px;">
                            <h5 class="fw-normal pb-3" style="letter-spacing: 1px; margin-right: 100px;">
                                <?php 
                                    if ($user["commute"] == "personal") echo "Personal Vehicle";
                                    else if (user["commute"] == "public") echo "Public Transport";
                                    else echo "Walking"; 
                                ?>
                            </h5>
                        </div>
                    </div>
                    <div class="row g-0">
                        <h4 style="letter-spacing: 1px">
                            Energy Usage: 
                        </h4>
                        <div class="col-md-6 col-lg-9 p-1 d-md-flex d-md-block" style="margin-left: 25px;">
                            <h5 class="fw-normal pb-3" style="letter-spacing: 1px; margin-right: 100px;">
                                <?php 
                                    if ($user["energy"] == "electricity") echo "Electricity";
                                    else echo "Solar"; 
                                ?>
                            </h5>
                        </div>
                    </div>
                    <div class="row g-0">
                        <h4 style="letter-spacing: 1px">
                            Dietary Preferences
                        </h4>
                        <div class="col-md-6 col-lg-9 p-1 d-md-flex d-md-block" style="margin-left: 25px;">
                            <h5 class="fw-normal pb-3" style="letter-spacing: 1px; margin-right: 100px;">
                                <?php 
                                    if ($user["diet"] == "mixed") echo "Mixed Diet";
                                    else if ($user["diet"] == "vegetarain") echo "Vegetarain";
                                    else echo "Vegan"; 
                                ?>
                            </h5>
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