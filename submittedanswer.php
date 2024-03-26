<?php
require_once 'includes/config_session.inc.php';
require_once 'includes/dbh.inc.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $query = "SELECT id FROM user WHERE username = ?";
    $stmt = $mysqli->prepare($query);
    $stmt->bind_param("s", $_SESSION["user_username"]);
    $stmt->execute();
    
    $result = $stmt->get_result();
    $result = $result->fetch_assoc();
    $id = $result["id"];
    
    $activity_date = $_POST['activity_date'];
    $rating1 = $_POST['rating1'];
    $rating2 = $_POST['rating2'];
    $rating3 = $_POST['rating3'];
    $rating4 = $_POST['rating4'];
    $rating5 = $_POST['rating5'];
    

    // Database connection
    //$servername = "localhost"; // Change this to your database server
    //$username = "root";
    //$password = "";
    //$database = "ecocarbon_database"; // Change this to your database name
    

    // Database configuration
    define('DB_SERVER', 'localhost'); // Change this to your database server
    define('DB_USERNAME', 'root'); // Change this to your database username
    define('DB_PASSWORD', ''); // No password set, leave it empty
    define('DB_NAME', 'ecocarbon_database'); // Change this to your database name

    // Attempt to connect to the database
    $conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    // Create connection
    //$conn = new mysqli($servername,$username,$password,$database);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO activity_responses (user_id, activity_date, rating1, rating2, rating3, rating4, rating5) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isiiiii", $id, $activity_date, $rating1, $rating2, $rating3, $rating4, $rating5);

    // Execute the SQL statement
    if ($stmt->execute() === TRUE) {
        // Display pop-up message
        echo "<script>alert('New record inserted successfully'); window.location='dashboard.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and database connection
    $stmt->close();
    $conn->close();
}
?>