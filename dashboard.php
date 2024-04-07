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

// Fetch rating data from the database for pie chart
$sql = "SELECT SUM(rating1) AS total_rating1, SUM(rating2) AS total_rating2, SUM(rating3) AS total_rating3, SUM(rating4) AS total_rating4, SUM(rating5) AS total_rating5 FROM activity_responses";
$result = $conn->query($sql);

// Initialize an array to store the fetched data
$totalRatings = array();

// Check if there are any rows in the result set
if ($result->num_rows > 0) {
    // Fetch the total rating data
    $totalRatings = $result->fetch_assoc();
} else {
    echo "0 results";
}

// Fetch data from the database for the line chart
$sqlLine = "SELECT activity_date, rating1, rating2, rating3, rating4, rating5 FROM activity_responses";
$resultLine = $conn->query($sqlLine);

// Initialize arrays to store fetched data for the line chart
$datesLine = [];
$ratingsLine = [];

// Fetch data from the result set for the line chart
if ($resultLine->num_rows > 0) {
    while ($row = $resultLine->fetch_assoc()) {
        $datesLine[] = $row['activity_date'];
        $ratingsLine[] = [$row['rating1'], $row['rating2'], $row['rating3'], $row['rating4'], $row['rating5']];
    }
}

$date = date("Y-m-d");


// Close the database connection
$conn->close();

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
                <a href="searchhistory.php">History</a>
                <a href="friends.php">Friends</a>
                <a href = "Recommendation.php">Recommendation</a>
                <a>Education Content</a>
                    <!-- Add more links as needed -->
            </nav>
              
    
            
            

            <body>
                <div class="col p-5">
                    <h1>My dynamic dashboard</h1>               
                    <br><br>
                    <!-- Create a canvas element for the pie chart -->
                    <div id="chartContainer" style="width: 500px; height: 500px;">
                        <canvas id="dashPieChart"></canvas>
                    </div>
                    <br>
                    <a id="addCDataBtn" class="btn btn-primary" style="background-color: #15790D;" href="activityques.php">Add Carbon Data</a>
                    <a id="shareBtn" class="btn btn-primary" style="background-color: #15790D; margin-top: 5px;" href="shareactivity.php?date=<?php echo $date ?>">Share Daily Carbon Data</a>
                </div>
                <div class="col p-5">
                </div>
                <div class="col p-5">
                    <!-- Create a canvas element for the line chart -->
                    <div id="chartContainerBar" style="width: 900px; height: 600px;">
                    <canvas id="dashBarChart"></canvas>
                    </div>
                </div>
                <div class="col">
                </div>
            </body>
                
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                // Get the canvas element
                var ctx = document.getElementById('dashPieChart').getContext('2d');

                // Extract total rating data from PHP and format it for the chart
                var totalRatings = <?php echo json_encode($totalRatings); ?>;

                // Extract individual total rating values
                var labels = ['Transportation', 'Energy Usage', 'Diet', 'Waste Managment', 'Miscellaneous'];
                var values = Object.values(totalRatings);


                // Data for the pie chart
                var data = {
                    labels: labels,
                    datasets: [{
                        data: values,
                        backgroundColor: [
                    'rgba(255, 99, 132, 0.5)',
                    'rgba(54, 162, 235, 0.5)',
                    'rgba(255, 206, 86, 0.5)',
                    'rgba(75, 192, 192, 0.5)',
                    'rgba(153, 102, 255, 0.5)',
                ],
                        borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                ],
                borderWidth: 1
            }]
        };

    // Create the pie chart
    var dashPieChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: {
                responsive: true,
                aspectRatio: 1,
                // Add any other chart options here
            }
        });
        
    // Data for the bar chart
    var dataBar = {
                    labels: <?php echo json_encode($datesLine); ?>,
                    datasets: [
                        <?php for($i = 0; $i < count($ratingsLine[0]); $i++) { ?>
                        {
                            label: 'Rating <?php echo $i + 1; ?>',
                            data: <?php echo json_encode(array_column($ratingsLine, $i)); ?>,
                            backgroundColor: 'rgba(255, 99, 132, 0.5)',
                            borderColor: 'rgba(255, 99, 132, 1)',
                            borderWidth: 1
                        },
                        <?php } ?>
                    ]
                };
                // Create the bar chart
                var ctxBar = document.getElementById('dashBarChart').getContext('2d');
                var dashBarChart = new Chart(ctxBar, {
                    type: 'bar',
                    data: dataBar,
                    options: {
                        responsive: true,
                        aspectRatio: 1,
                        // Add any other chart options here
                    }
                });

                // Set the width and height of the div containers
                document.getElementById('chartContainerBar').style.width = '900px';
                document.getElementById('chartContainerBar').style.height = '600px';

                document.getElementById('chartContainerPie').style.width = '500px';
                document.getElementById('chartContainerPie').style.height = '500px';
    
                // Set the width and height of the div container
                document.getElementById('chartContainer').style.width = '900px';
                document.getElementById('chartContainer').style.height = '700px';

                // Function to redirect to another page
                function redirectToAnotherPage() {
                window.location.href = 'activityques.php'; 
}
    
    // Function to update chart data
    function updateCData() {
                    // Example: Update chart data for the pie chart
                    dashPieChart.data.datasets[0].data = [10, 20, 30, 40, 50];
                    // Example: Update chart data for the bar chart
                    dashBarChart.data.datasets.forEach((dataset) => {
                        dataset.data = [10, 20, 30, 40, 50];
                    });
                    // Update charts
                    dashPieChart.update();
                    dashBarChart.update();
                }

    // Add event listener to the button
    document.getElementById('addCDataBtn').addEventListener('click', function() {
    // Call the function to update chart data
    updateCData();
    redirectToAnotherPage();
    });

    
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