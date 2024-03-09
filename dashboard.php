<?php
require_once 'includes/config_session.inc.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>My Dashboard</title>
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
                <a>Profile</a>
                <a  href="searchhistory.php">History</a>
                <a>Friends</a>
                <a>Recommendation</a>
                <a>Education contents</a>
                    <!-- Add more links as needed -->
            </nav>

            <div class="col-md-8 pt-5">
                <h1>Dynamic dashboard</h1>
                <canvas id="myPieChart" width="50" height="50"></canvas>

                

                
                <script>

                

    

                // Get the canvas element
                var ctx = document.getElementById('myPieChart').getContext('2d');

                // Data for the pie chart (example)
                var data = {
                labels: ['Label 1', 'Label 2', 'Label 3', 'Label 4', 'Label 5'],
                datasets: [{
                data: [30, 20, 25, 15, 10], // Sample data
                backgroundColor: ['#ff6384', '#36a2eb', '#ffce56', '#cfc8b8', '#bc9e82'] // Colors for each slice
        }]
    };

    // Create the pie chart
    var myPieChart = new Chart(ctx, {
        type: 'pie',
        data: data,
        options: {
            aspectRatio: 2, // Control aspect ratio (e.g., 1 for a square chart)
            responsive: true // Make the chart responsive
        }
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