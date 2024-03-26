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

// Retrieve date from URL parameter
    $date = $_GET['date'] ?? '';

// Function to retrieve carbon data from the database
if (!empty($date)) {

    
    // Prepare the SQL query to fetch data for the specific date
    $sql = "SELECT * FROM activity_responses WHERE activity_date = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $date);
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

}

// Calculate total rating
$totalRating = $carbonData[0]['rating1'] + $carbonData[0]['rating2'] + $carbonData[0]['rating3'] + $carbonData[0]['rating4'] + $carbonData[0]['rating5'];


   
?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>History for <?php echo $date; ?></title>
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

    <?php
    $date = $_GET['date'] ?? '';

    // Check if a date is provided
        if (!empty($date)) {
    // Use $date to fetch data for the selected date from the database
    // Display the fetched data here
    echo "<h1>Data for $date</h1>";
            } else {
    // If no date is provided, display an error message
        echo "Error: No date specified.";}
    ?>

<div>
                

    <!-- Display message based on total rating -->
    <?php if ($totalRating > 10): ?>
                    <h2>Your carbon footprints are way too high !</h2>
                <?php else: ?>
                    <p>Your carbon footprints are average !</p>
                <?php endif; ?>

     <!-- Display Bar chart -->
     <div>
        <canvas id="myChart"></canvas>
                </div>
    
    <!-- Message for rating1 -->
    <?php if ($carbonData[0]['rating1'] <= 2): ?>
        <div class="message">For your "Question 1 : Transportation" your rating is below average. Well done also you can pratice to use more public transport for travel to anywhere.</div>
    <?php elseif ($carbonData[0]['rating1'] >= 3): ?>
        <div class="message">For your "Question 1 : Transportation" your rating is above average. You should take public transport for travel purpose! In order to decrease your carboon footprints.</div>
    <?php endif; ?>

    <!-- Message for rating2 -->
    <?php if ($carbonData[0]['rating2'] <= 2): ?>
        <div class="message">For your "Question 2 : Energy usage" your rating is below average. Well done and use less air-conditioner to lower the burden of Earth!.</div>
    <?php elseif ($carbonData[0]['rating2'] >= 3): ?>
        <div class="message">For your "Question 2 : Energy usage" your rating is above average. Instead of air-conditioner you can use fan or going to a public space that already had air-conditioner opened.</div>
    <?php endif; ?>

<!-- Message for rating3 -->
<?php if ($carbonData[0]['rating3'] <= 2): ?>
        <div class="message">For your "Question 3 : Diet" your rating is below average. Well done and cook more for yourself it can be a more healthier and fun choice!</div>
    <?php elseif ($carbonData[0]['rating3'] >= 3): ?>
        <div class="message">For your "Question 3 : Diet" your rating is above average. You can try to look up for cooking videos on YouTube and cook for yourself to decrease your carbon footprints.</div>
    <?php endif; ?>

<!-- Message for rating4 -->
<?php if ($carbonData[0]['rating4'] <= 2): ?>
        <div class="message">For your "Question 4 : Waste Managment" your rating is below average. Well done and compost more for a better environment!</div>
    <?php elseif ($carbonData[0]['rating4'] >= 3): ?>
        <div class="message">For your "Question 4 : Waste Managment" your rating is above average. You can try to order or cook lesser food to decrease food waste in your household!</div>
    <?php endif; ?>

<!-- Message for rating5 -->
<?php if ($carbonData[0]['rating5'] <= 2): ?>
        <div class="message">For your "Question 5 : Miscellaneous" your rating is below average. Well done for supporting local farmers and energy-efficient goods to make Earth a better place.</div>
    <?php elseif ($carbonData[0]['rating5'] >= 3): ?>
        <div class="message">For your "Question 5 : Miscellaneous" your rating is above average. You can try out fresh local produce by local farmers and purchase energy-efficient goods!</div>
    <?php endif; ?>

    <style>
    .message {
        margin-bottom: 50px; /* Adjust the margin-bottom value to set the desired space */
    }
</style>

<script>
    // Prepare data for the chart
    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['Transportation', 'Energy Usage', 'Diet', 'Waste Managment', 'Miscellaneous'],
            datasets: [{
                label: 'Rating',
                data: [
                    <?php echo $carbonData[0]['rating1']; ?>,
                    <?php echo $carbonData[0]['rating2']; ?>,
                    <?php echo $carbonData[0]['rating3']; ?>,
                    <?php echo $carbonData[0]['rating4']; ?>,
                    <?php echo $carbonData[0]['rating5']; ?>,
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                ],
                borderWidth: 1.8
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
            
        }
    }

    
    
    

    );

    

</script>
</div>
</div>
</div>
</div>
                




    
</script>



    

                
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