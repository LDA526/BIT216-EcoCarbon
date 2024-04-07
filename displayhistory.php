<?php
require_once 'includes/config_session.inc.php';


// Database configuration
$dbHost = 'localhost'; // Change this to your database host
$dbUsername = 'root'; // Change this to your database username
$dbPassword = ''; // Change this to your database password
$dbName = 'ecocarbon_database'; // Change this to your database name

// Create connection
$conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

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

// Function to retrieve carbon data from the database
function getCarbonDataFromDatabase($from_date, $to_date, $user_id, $conn) {

    
    // Prepare the SQL query to fetch data from the activity_responses table
    $sql = "SELECT * FROM activity_responses WHERE activity_date BETWEEN ? AND ? AND user_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $from_date, $to_date, $user_id);
    $stmt->execute();
    $result = $stmt->get_result();



    // Fetch data from the result set
    $carbonData = array();
    while ($row = $result->fetch_assoc()) {
        // Assuming your activity_responses table has 'description' and 'value' columns
        $carbonData[] = array(
            'activity_date' => htmlspecialchars($row['activity_date']),
            'rating1' => htmlspecialchars($row['rating1']),
            'rating2' => htmlspecialchars($row['rating2']),
            'rating3' => htmlspecialchars($row['rating3']),
            'rating4' => htmlspecialchars($row['rating4']),
            'rating5' => htmlspecialchars($row['rating5'])
        );
    }


        // Return the fetched carbon data
        return $carbonData;
}


// Retrieve dates from URL parameters
$from_date = $_GET['from_date'] ?? '';
$to_date = $_GET['to_date'] ?? '';

// Get user ID from session
$user_id = $user["id"] ?? '';



// Check if both from_date and to_date are provided
if (!empty($from_date) && !empty($to_date) && !empty($user_id)) {
    // Fetching carbon data from the database
    $carbonData = getCarbonDataFromDatabase($from_date, $to_date, $user_id, $conn);
   

} else {
    // If either from_date or to_date is missing, display an error message
    echo "Please provide valid date range and username.";
    exit();
}

    

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>History page</title>
    <link rel="icon" type="image/png" href="assets/logo.png"/>
    <meta name="description" content=""/>
    <meta name="viewport" content="width=device-width, initial-scale=1"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
          crossorigin="anonymous"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
    <link rel="stylesheet" href="style.css"/>
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
            <h1>This is your carbon data</h1>

            <div>
                <!-- Display carbon data in a table -->
    <table class="table">
        <thead>
            <tr>
                <th>Activity Date</th>
                <th>Transportation</th>
                <th>Energy Usage</th>
                <th>Diet</th>
                <th>Waste Management</th>
                <th>Miscellaneous</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($carbonData as $data): ?>
                <tr>
                    <td><a href="displayhistorydata.php?date=<?php echo urlencode($data['activity_date']); ?>"><?php echo $data['activity_date']; ?></a></td>
                    <td><?php echo $data['rating1']; ?></td>
                    <td><?php echo $data['rating2']; ?></td>
                    <td><?php echo $data['rating3']; ?></td>
                    <td><?php echo $data['rating4']; ?></td>
                    <td><?php echo $data['rating5']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <button>Recommendation</button>
</div>

<style>
    table {
        width: 100%;
        table-layout: fixed;
    }
</style>


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