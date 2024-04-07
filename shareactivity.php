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

if ($user["admin"] == 1) {
    $admin = "addcontent.php";
}else {
    $admin = "educationalcontent.php";
}

if (isset($_GET["date"])) {
    $date = $_GET["date"];
}

// Prepare and execute the query
$query = "SELECT * FROM activity_responses WHERE activity_date = ? AND user_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $date, $user["id"]);
$stmt->execute();

// Fetch the result
$result = $stmt->get_result();
$activity = $result->fetch_assoc();

if (isset($_GET["friend"])) {
    $msg = "Transportation : ". $activity["rating1"] ."/5 \n" .
    "Energy Usage : ". $activity["rating2"] ."/5 \n" .
    "Diet : ". $activity["rating3"] ."/5 \n" .
    "Waste Management : ". $activity["rating4"] ."/5 \n" .
    "Misc : ". $activity["rating5"] ."/5";
    $query = "UPDATE messages SET msg = ? WHERE incoming_msg_id = ? AND outgoing_msg_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sii", $msg, $user["id"], $_GET["friend"]);
    $stmt->execute();

    $sql = "UPDATE messages SET last = 1 WHERE incoming_msg_id = ? AND outgoing_msg_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $user["id"], $_GET["friend"]);
    $stmt->execute();

    $sql = "UPDATE messages SET last = 0 WHERE incoming_msg_id = ? AND outgoing_msg_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $_GET["friend"], $user["id"]);
    $stmt->execute();
    
    echo "<script type='text/javascript'>
            alert('Daily Activity Shared!');
            window.location = 'chat.php?friend=". $_GET["friend"] ."';
        </script>";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Share Daily Activity</title>
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
                <a href="searchhistory.php">History</a>
                <a href="friends.php">Friends</a>
                <a href = "Recommendation.php">Recommendation</a>
                <a href = "<?php echo $admin; ?>">Education Content</a>
                    <!-- Add more links as needed -->
            </nav>
        

            <div class="col-md-8 pt-5">
                <h2>Share with your friend</h2>
                
                <div class="content" style="display:inline-block;" id="content">
                    <?php 
                        $sql = "SELECT * FROM friends WHERE userID = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $user["id"]);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_all();

                        if ($row) {
                            foreach ($row as $r) {
                                $id = $r[2];
                                $friend[] = $id;
                                $sql = "SELECT username FROM user WHERE id = $id";
                                $stmt = $conn->prepare($sql);
                                $stmt->execute();
                                $result = $stmt->get_result();
                                $user = $result->fetch_assoc();
                                $username =  $user["username"];
                                
                                echo"<div class=\"container\">
                                        <div class=\"card\">
                                        <div class=\"card-body\">
                                            <h5 class=\"card-title\"> $username </h5>
                                            <a type=\"button\" class=\"btn btn-sm btn-primary float-right\" href=\"shareactivity.php?friend=$id&date=$date\">Share with Friend</a>
                                        </div>
                                        </div>
                                    </div> <br>";
                            }
                        } else {
                            echo "No friends added.";
                        }

                    ?>
                
                </div>
                <?php 
                if (!isset($activity)) {
                    echo "<script>document.querySelector(\"#content\").setAttribute(\"style\", \"display:none\")</script>";
                    echo "<div class=\"col-md-8 pt-5\">";
                    echo "<h3>You did not update your activities today. Click the button below to do so!</h3>";
                    echo "<a id=\"addCDataBtn\" class=\"btn btn-primary\" style=\"background-color: #15790D;\" href=\"activityques.php\">Add Carbon Data</a>";
                    echo "</div>";
                }
                ?>      
                
            
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