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
                <a href="activityques.php">Add Activity</a>
                <a href="profile.php">Profile</a>
                <a  href="searchhistory.php">History</a>
                <a>Friends</a>
                <a href="recommendation.php">Recommendation</a>
                <a href="educationalcontent.php">Education content</a>

                    <!-- Add more links as needed -->
            </nav>

            <div class="col-md-8 pt-5">
                    
                      <form action="connect.php" method="post" enctype="multipart/form-data">
                        <h2>Add Education Content</h2>

                        <div class="mb-3">
                          <label for="ulimage" class="form-label">Upload Image</label>
                          <input type="file" class="form-control" id="ulimage" name="ulimage" accept="image/*">
                        </div>

                        <div class="mb-3">
                          <label for="ultitle" class="form-label">Title</label>
                          <input type="text" class="form-control" id="ultitle" name="ultitle" placeholder="What's the title?" required>
                        </div>

                        <div class="mb-3">
                          <label for="uldescription" class="form-label">Description</label>
                          <input type="text" class="form-control" id="uldescription" name="uldescription" placeholder="Some description?" required>
                        </div>

                        <div class="mb-3">
                          <label for="ulurl" class="form-label">Video URL</label>
                          <input type="url" class="form-control" id="ulurl" name="ulurl" placeholder="Please upload the link here" >
                        </div>

                        <button type="reset" class="btn btn-primary">Reset</button><br>

                        <button type="submit" class="btn btn-primary" name="upload">Upload</button>
                      </form>
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

