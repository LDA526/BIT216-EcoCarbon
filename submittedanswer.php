<?php
require_once 'includes/config_session.inc.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
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
    $stmt = $conn->prepare("INSERT INTO activity_responses (activity_date, rating1, rating2, rating3, rating4, rating5) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("siiiii", $activity_date, $rating1, $rating2, $rating3, $rating4, $rating5);

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