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
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        
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
                    
                    <form action="connect.php" method="POST" enctype="multipart/form-data">
                        <h2>Add Education Content</h2>

                        <div class="mb-3">
                          <label for="" >Upload Image</label>
                          <input type="file" class="form-control"  name="ulimage" accept="image/*,video/*" required>
                        </div>

                        <div class="mb-3">
                          <label for="" >Title</label>
                          <input type="text" class="form-control"  name="ultitle" placeholder="What's the title?" required>
                        </div>

                        <div class="mb-3">
                          <label for="" >Description</label>
                          <input type="text" class="form-control"  name="uldescription" placeholder="Some description?" required>
                        </div>

                        <div class="mb-3">
                          <label for="ulurl" >Video URL</label>
                          <input type="url" class="form-control"  name="ulurl" placeholder="Please upload the link here" >
                        </div>

                        <button type="reset" class="btn btn-primary">Reset</button><br>

                        <button type="submit" class="btn btn-primary" name="upload">Upload</button>
                    </form>

                    <!--fetch data-->

                    <div class="contaioner">

                      <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Image</th>
                            <th scope="col">Title</th>
                            <th scope="col">Describtion</th>
                            <th scope="col">URL</th>
                            <th scope="col">Delect</th>
                            <th scope="col">Update</th>
                          </tr>
                        </thead>
                        <tbody>
                        
                          <?php
                            include 'config.php';
                            $pic = mysqli_query($con,"SELECT * FROM `uploadcontent`");
                            while($row = mysqli_fetch_array($pic)){
                            echo "
                              <tr>
                                <td>$row[id]</td>
                                <td><img src='$row[Image]' width ='100px' height ='70px'></td>
                                <td>$row[Title]</td>
                                <td>$row[Description]</td>
                                <td>$row[URL]</td>
                                <td><a href='delete.php? Id= $row[id]' class = 'btn btn-danger'>Delect</a></td>
                                <td><a href='update.php? Id= $row[id]' class = 'btn btn-danger'>Update</a></td>
                              </tr>
                              ";
                            }

                          ?>

                        </tbody>
                      </table>
                    </div>
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

