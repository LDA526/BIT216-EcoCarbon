<?php

require_once 'includes/config_session.inc.php';

// Create connecton
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ecocarbon_database";
$conn = mysqli_connect ($servername,$username,$password,$dbname);

// Check connection 
if ($conn->connect_error){
  die("Connection failed: " . $conn->connect_error);
}

// Prepare and excute the query
$query = "SELECT * FROM user WHERE username = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("s",$_SESSION["user_username"]);
$stmt->execute();

// Fetch the result
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user["admin"] == 1) {
  $admin = "addcontent.php";
}else {
  $admin = "educationalcontent.php";
}

?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <title>Education Content</title>
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
        <style>
          .video-thumbnail {
              width: 200px;
              height: 150px;
              margin: 10px;
          }
        </style>
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
                <a href="searchhistory.php">History</a>
                <a href="friends.php">Friends</a>
                <a href = "Recommendation.php">Recommendation</a>
                <a href = "<?php echo $admin; ?>">Education Content</a>

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
                     -->
                    
              <div class="education-content-block">
                <h1>Education content about the Eco carbon</h1>

                <div clss="education-content-introduce">
                  <img  class="education-content-logo" src="assets/Education-content/logo.jpeg">
                  <span><p>What is carbon neutrality? Why reduce carbon emissions?</p>
                    <p class="education-content-words">
                      Reducing carbon emissions is an important challenge facing the world today, and education has a vital role to play in this regard. The following are some educational content about energy conservation and emission reduction, which may let us learn more knowledge.
                      <br>
                      1. Understanding the sources of carbon emissions: <br>industrial production, transportation, energy production, etc., are all sources of carbon emissions. Understanding these sources can help people better locate the problem and come up with solutions accordingly.<br>
                      2. Learn the method of carbon neutrality: <br>The concept of carbon neutrality is that in the face of the continuous rise of carbon emissions at present, in order to reduce the possible climate crisis in the future, the accumulated carbon reduction in a specific period of time is offset by its own carbon emissions. Carbon-neutral approaches include afforestation, renewable energy and energy efficiency. These methods can help people reduce their carbon emissions and help mitigate the effects of climate change.<br>
                      3. Encourage sustainable lifestyles: <br>Sustainable lifestyles can be promoted, including reducing energy consumption, reducing waste generation, and promoting environmentally friendly modes of transportation. These lifestyle changes can effectively reduce the carbon footprint of individuals and communities.<br>
                      4. Promote environmental awareness: <br>Cultivate people's environmental awareness, make them pay more attention to environmental issues, and take positive actions to reduce carbon emissions. This includes organizing environmental activities and promoting environmental knowledge in schools and communities.<br>
                      5. Guiding policy formulation and implementation: <br>It can cultivate citizens' sense of participation and make them pay more attention to the formulation and implementation of environmental policies. By voting, lobbying, and participating in community activities, people can push their governments to do more to reduce carbon emissions.<br>
                      6. Interdisciplinary education: <br>Interdisciplinary introduction of carbon emission issues, including science, technology, economy, society and other aspects. This leads to a fuller understanding of the problem and a more effective solution.<br>
                      <br>
                      Through education, people can better understand the issue of carbon emissions and take positive actions to reduce carbon emissions and contribute to the protection of the earth's environment.
                    </p>
                  </span>
                </div>

                <div class="education-content-webaddress">
                  <h5>More Infomation please click the picture</h5>
                  <div class="education-content-show">
                    <a href="https://www.economist.com/science-and-technology/2022/02/28/new-ipcc-report-over-3bn-people-face-rising-climate-change-threat/21807939"><img class="education-content-show-picture" src="assets/Education-content/ipcc.png"  ></a>
                    <a href="https://www.economist.com/science-and-technology/2022/02/28/new-ipcc-report-over-3bn-people-face-rising-climate-change-threat/21807939"><p class="education-content-show-words" >
                      Intergovernmental Panel on Climate Change (IPCC):<br>
                      The IPCC is the world's leading scientific body on climate change, and they have published a large number of reports and literature on climate change and carbon emissions, which have high educational value and can help people understand the issue more deeply.
                    </p></a>
                  </div>

                  <div class="education-content-show">
                    <a href="https://www.nationalgeographic.com/environment"><img  class="education-content-show-picture" src="assets/Education-content/national-geographic.png" ></a>
                    <a href="https://www.nationalgeographic.com/environment"><p class="education-content-show-words">
                      National Geographic: <br>
                      National Geographic provides a wealth of educational resources, including educational content on the environment and climate change. Their website has a lot of information and teaching resources about carbon emissions and sustainability.
                    </p></a>
                  </div>

                  <div class="education-content-show">
                    <a href="https://unfccc.int"><img class="education-content-show-picture" src="assets/Education-content/unfccc.png" >
                    <a href="https://unfccc.int"></a><p class="education-content-show-words">
                      United Nations Framework Convention on Climate Change (UNFCCC):<br>
                      The UNFCCC is the global intergovernmental organization on climate change, and their website provides a wealth of information and resources on climate change and carbon emissions that can help people better understand and address this challenge.
                    </p></a>
                  </div>
                  
                  <br>

                  <form method="post" action=""> 
                    <label for="category">Category</label>
                    <select id="category" name="category" class="form-control" required>
                      <option value="" disabled selected hidden>Please select one category here</option>
                      <option value="transportation">Transportation</option>
                      <option value="energy">Energy Usage</option>
                      <option value="diet">Diet</option>
                      <option value="waste">Waste Management</option>
                      <option value="miscellaneous">Miscellaneous</option>
                      
                    </select>
                    <br>
                    <button type="submit" class="btn btn-primary m-1" name="upload">Go</button><br>
                  </form>

                  <?php 
                    if ($user && $user["admin"] == 1) {
                      echo '<a class="btn btn-primary m-1" href="addcontent.php">Add Content</a><br>';
                    } 
                  ?>

                  <div id="contentContainer">
                    <?php
                      include 'config.php';
                      if(isset($_POST['upload'])) {
                        $category = $_POST['category'];
                        $pic = mysqli_query($con,"SELECT * FROM `uploadcontent` WHERE `Category`='$category'");
                      while($row = mysqli_fetch_array($pic)){
                        $cssClassecs = "education-content-show";
                        $cssClassecsp = "education-content-show-picture";
                        $cssClassecsw = "education-content-show-words";
                        echo "
                          <div class='$cssClassecs'>
                            <a href='$row[URL]'><img class='$cssClassecsp' src='$row[Image]' width ='400px' height ='150px' center></a>
                            <a href='$row[URL]'>
                              <p class='$cssClassecsw'>
                                <strong>$row[Title]</strong><br>
                                $row[Description]
                              </p>
                            </a>
                          </div>
                          ";
                        }
                      }
                    ?>
                  </div>


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