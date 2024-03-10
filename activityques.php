<?php
require_once 'includes/config_session.inc.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Activity Questions</title>
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
                <a href="profile.php">Profile</a>
                <a  href="searchhistory.php">History</a>
                <a>Friends</a>
                <a>Recommendation</a>
                <a>Education contents</a>
                    <!-- Add more links as needed -->
            </nav>

            <div class="col-md-8 pt-5">
                <h1>Activity Questions</h1>
                
            <!-- Form for submitting questions and ratings -->
            <form method="post" action="submittedanswer.php">
                <div class="mb-3">
                    <label for="activity_date" class="form-label">Today's Date : </label>
                    <input type="date" id="activity_date" name="activity_date" required>

                    <script>
                        var dateInput = document.getElementById("activity_date");
                        var currentDate = new Date();
                        var formattedDate = currentDate.toISOString().substr(0, 10);
                        dateInput.value = formattedDate;
                    </script>

                </div>

                <div class="mb-3">
                    <label class="form-label">Rating: 1 = Rarely, 2 = Occasionally , 3 = Sometimes , 4 = Frequently , 5 = Very Frequently </label>
                </div>


                <!-- Question 1 -->
                <div class="mb-3">
                    <label for="question1" class="form-label"><strong>Question 1:</strong></label>
                    <div>
                        <label>Did you travel with a vehicle today?</label>
                    </div>
                </div>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="rating1">Select rating:</label>
                 <select name="rating1" id="rating1">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <br>
                <br>
                <!-- Question 2 -->
                <div class="mb-3">
                <label for="question2" class="form-label"><strong>Question 2:</strong></label>
                    <div>
                        <label>Did you use many electrical appliances today?</label>
                    </div>
                </div>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="rating2">Select rating:</label>
                 <select name="rating2" id="rating2">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <br>
                <br>

                <!-- Question 3 -->
                <div class="mb-3">
                <label for="question3" class="form-label"><strong>Question 3:</strong></label>
                    <div>
                    <label>Did you consume more meat than vegetables today?</label>
                    </div>
                </div>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="rating3">Select rating:</label>
                 <select name="rating3" id="rating3">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <br>
                <br>

                <!-- Question 4 -->
                <div class="mb-3">
                <label for="question4" class="form-label"><strong>Question 4:</strong></label>
                    <div>
                    <label>Rate your efforts in minimizing waste in your household</label>
                    </div>
                </div>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="rating4">Select rating:</label>
                 <select name="rating4" id="rating4">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <br>
                <br>

                <!-- Question 5 -->
                <div class="mb-3">
                <label for="question5" class="form-label"><strong>Question 5:</strong></label>
                    <div>
                    <label>How often do you purchase locally sourced, sustainably produced goods, and even energy-efficient goods?</label>
                    </div>
                </div>
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <label for="rating5">Select rating:</label>
                 <select name="rating5" id="rating5">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
                <br>
                <br>

                <button type="submit" class="btn btn-warning" style="background-color: #426B1F; color: #ffffff;">Submit</button>
          
            </div>
            </form>
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