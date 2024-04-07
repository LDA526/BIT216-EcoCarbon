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

if (isset($_GET["newfriend"])) {
    $query = "SELECT * FROM user WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $_GET["newfriend"]);
    $stmt->execute();

    $result = $stmt->get_result();
    $newfriend = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Friends</title>
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
                <h2>Friends</h2>
                
                <div class="content" style="display:inline-block;">
                    <?php 
                        $sql = "SELECT * FROM friends WHERE userID = ?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param("s", $user["id"]);
                        $stmt->execute();
                        $result = $stmt->get_result();
                        $row = $result->fetch_all();
                        // var_dump($row);

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
                                            <a type=\"button\" class=\"btn btn-sm btn-primary float-right\" href=\"chat.php?friend=$id\">Chat with Friend</a>
                                        </div>
                                        </div>
                                    </div> <br>";
                            }
                        } else {
                            echo "<h4 style=\"padding:5px;\">No friends added.</h4>";
                        }


                    ?>
                
                </div>
                <hr>
                <h3>Add Friend</h3>
                
                <div class="content" style="display:inline-block;">
                    <form>
                    <div class="container">
                        <input type="text" class="form-control" id="exampleTextInput" placeholder="Enter username" name="newfriend">
                    </div>
                </div>

                <div class="col-md-8 p-4">
                <?php
                    if (isset($newfriend)) {
                        echo "<div class=\"container\">
                            <div class=\"card\">
                            <div class=\"card-body\">
                                <h5 class=\"card-title\"> {$newfriend["username"]} </h5>
                                <a type=\"button\" class=\"btn btn-sm btn-primary float-right\" href=\"addfriend.php?id={$newfriend["id"]}\"  onclick=\"showAlert()\">Add Friend</a>
                            </div>
                            </div>
                        </div> <br>";
                    }
                    else {
                        echo "<br><h4>No user with the matching username found</h4>";
                    }
                ?>
                </div>
            
                </div>
                </section>
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
    <script>
        function showAlert() {
            alert('Send a friend request to this user?');
        }
    </script>
    
    </body>


</html>