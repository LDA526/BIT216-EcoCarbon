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

// get needed variables
$query = "SELECT * FROM user WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s", $_SESSION["user_username"]);
$stmt->execute();

$result = $stmt->get_result();
$user = $result->fetch_assoc();

$friendID = $_GET["friend"];

$query = "SELECT username FROM user WHERE id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $friendID);
$stmt->execute();

$result = $stmt->get_result();
$friend_user = $result->fetch_assoc();
$friend_un = $friend_user["username"];

$query = "SELECT * FROM messages WHERE (incoming_msg_id = ? AND outgoing_msg_id = ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $friendID , $user["id"]);
$stmt->execute();

$result = $stmt->get_result();
$f = $result->fetch_assoc();

$query = "SELECT * FROM messages WHERE (incoming_msg_id = ? AND outgoing_msg_id = ?)";
$stmt = $conn->prepare($query);
$stmt->bind_param("ii", $user["id"], $friendID);
$stmt->execute();

$result = $stmt->get_result();
$f2 = $result->fetch_assoc();

if ($f) {
    $friend = $f;
}else  {
    $friend = $f2;
}

//Check field
if (isset($_GET["msg"])) {
    $msg = $_GET["msg"];
    $friendID = $_GET["friend"];
    $userID = $user["id"];

    if ($f["incoming_msg_id"] == $userID) {
        $sql = "UPDATE messages SET msg = ? WHERE incoming_msg_id = ? AND outgoing_msg_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sii", $msg, $friendID, $userID);
        $stmt->execute();

        $sql = "UPDATE messages SET last = 1 WHERE incoming_msg_id = ? AND outgoing_msg_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $friendID, $userID);
        $stmt->execute();

        $sql = "UPDATE messages SET last = 0 WHERE incoming_msg_id = ? AND outgoing_msg_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $userID, $friendID);
        $stmt->execute();
    }else {
        $sql = "UPDATE messages SET msg = ? WHERE incoming_msg_id = ? AND outgoing_msg_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sii", $msg, $userID, $friendID);
        $stmt->execute();

        $sql = "UPDATE messages SET last = 1 WHERE incoming_msg_id = ? AND outgoing_msg_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $userID, $friendID);
        $stmt->execute();

        $sql = "UPDATE messages SET last = 0 WHERE incoming_msg_id = ? AND outgoing_msg_id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ii", $friendID, $userID);
        $stmt->execute();
    }

    echo "<script type='text/javascript'>
            alert('Message Sent!');
            window.location = 'friends.php';
        </script>";
}

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Dashboard</title>
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
                <h2>Chat with <?php echo $friend_un ?> </h2>
                <style>
                .message-container {
                    width: 500px;
                    margin: 20px auto;
                    border: 1px solid #ccc;
                    border-radius: 5px;
                }

                .message {
                    padding: 10px;
                    margin: 10px;
                    border-radius: 5px;
                    background-color: #f0f0f0;
                }

                .user-message {
                    margin-left: auto;
                    background-color: #cfe6a8;
                }

                .message-content {
                    margin-bottom: 5px;
                }
                .auto-width-textarea {
                    width: auto;
                    min-width: 100px;
                    max-width: 100%;
                    overflow: hidden;
                    resize: none;
                    align-items: center;
                }
                </style>

                <div class="message-container">

                    <?php 
                    if($f["incoming_msg_id"] == $friendID) {
                        if($f["last"] > $f2["last"]) {
                            echo "
                            <div class=\"message user-message\">
                                <div class=\"message-content\">
                                <strong>You:</strong>
                                </div>
                                <div class=\"message-content\">
                                    {$f2["msg"]}
                                </div>
                            </div>

                            <div class=\"message\">
                                <div class=\"message-content\">
                                <strong>$friend_un</strong>
                                </div>
                                <div class=\"message-content\">
                                    {$f["msg"]}
                                </div>
                            </div>
                            ";
                        }
                        else {
                            echo "
                            <div class=\"message\">
                                <div class=\"message-content\">
                                <strong>$friend_un: </strong>
                                </div>
                                <div class=\"message-content\">
                                    {$f["msg"]}
                                </div>
                            </div>

                            <div class=\"message user-message\">
                                <div class=\"message-content\">
                                <strong>You:</strong>
                                </div>
                                <div class=\"message-content\">
                                    {$f2["msg"]}
                                </div>
                            </div>
                            ";
                        }
                    }else {
                        if($f["last"] > $f2["last"]) {
                            echo "
                            <div class=\"message user-message\">
                                <div class=\"message-content\">
                                <strong>You:</strong>
                                </div>
                                <div class=\"message-content\">
                                    {$f["msg"]}
                                </div>
                            </div>

                            <div class=\"message\">
                                <div class=\"message-content\">
                                <strong>$friend_un</strong>
                                </div>
                                <div class=\"message-content\">
                                    {$f2["msg"]}
                                </div>
                            </div>
                            ";
                        }
                        else {
                            echo "
                            <div class=\"message\">
                                <div class=\"message-content\">
                                <strong>$friend_un: </strong>
                                </div>
                                <div class=\"message-content\">
                                    {$f2["msg"]}
                                </div>
                            </div>

                            <div class=\"message user-message\">
                                <div class=\"message-content\">
                                <strong>You:</strong>
                                </div>
                                <div class=\"message-content\">
                                    {$f["msg"]}
                                </div>
                            </div>
                            ";
                        }
                    }
                        ?>
                    
                    <div class="message-container">
                        <form>
                        <input name="friend" value="<?php echo $friendID ?>" hidden>
                        <textarea rows="4" cols="100" class="auto-width-textarea" class="form-control form-control-lg" name="msg"></textarea>
                    </div>
                    <div class="message-container">
                        <button class="btn btn-success" href="chat.php"> Send Message</button>
                    </div>
                </div>
                

                <!-- Add more messages here -->

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
    
    </body>


</html>