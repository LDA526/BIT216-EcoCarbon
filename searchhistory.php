<?php
require_once 'includes/config_session.inc.php';

// Assuming you have PHP code to handle the date search, you can access the selected dates using $_POST['from_date'] and $_POST['to_date'].
// Modify this part according to your application's logic.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $from_date = $_POST['from_date'];
    $to_date = $_POST['to_date'];

    // Perform actions with the selected dates, such as searching data in your database.
    header("Location: displayhistory.php?from_date=$from_date&to_date=$to_date");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge"/>
    <title>Select history date</title>
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
                <a  href="searchhistory.php">History</a>
                <a>Friends</a>
                <a href = "Recommendation.php">Recommendation</a>
                <a>Education Content</a>
            <!-- Add more links as needed -->
        </nav>

        <div class="col-md-8 pt-5">
            <h1>Select your carbon data dates</h1>

            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <div class="form-group">
                    <label for="from_date">From Date:</label>
                    <input type="date" class="form-control" id="from_date" name="from_date" required>
                </div>
                <div class="form-group">
                    <label for="to_date">To Date:</label>
                    <input type="date" class="form-control" id="to_date" name="to_date" required>
                </div>
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
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