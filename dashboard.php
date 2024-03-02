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

    <body>
    <div class="container-fluid pb-5">
        <div class="row">
            <nav class="col-md-2 d-md-block side-menu p-5" style="text-align:center">
                <h5 class="text-center"><?php echo $_SESSION["user_username"] ?>'s Dashboard</h5>
                <hr class="my-3">
                <a>Add Activity</a>
                <a>Profile</a>
                <a>History</a>
                <a>Friends</a>
                <a>Recommendation</a>
                    <!-- Add more links as needed -->
            </nav>

            <div class="col-md-8 pt-5">
                <!-- <div class="h3 pb-4 pt-3"> My Products</div> -->
                    <!-- <table class="table">
                        <thead>
                        <tr>
                            <th style='text-align: center; font-weight: 600;'>Product Image</th>
                            <th style='text-align: center; font-weight: 600;'>Product Name</th>
                            <th style='text-align: center; font-weight: 600;'>Category</th>
                            <th style='text-align: center; font-weight: 600;'>Location</th>
                            <th style='text-align: center; font-weight: 600;'>Price</th>
                            <th style='text-align: center; font-weight: 600;'>Description</th>
                            <th style='text-align: center; font-weight: 600;'>Actions</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            include 'includes/merchantDash/merchantDash.inc.php';
                            ?>
                        </tbody>
                    </table>
                    <a href="addProducts.php" class="btn btn-primary">Add New Product</a> -->
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