<!DOCTYPE html>
<html lang="en">
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

  <br>
  <br>
  <br>
  <br>


  <body>

    <?php
      include 'config.php';
      $ID = $_GET['Id'];
      $Record = mysqli_query($con,"SELECT * FROM `uploadcontent` WHERE Id = $ID");
      $data = mysqli_fetch_array($Record);

    ?>

    <div class="container-fluid pb-5">
  
      <form action="" method="POST" enctype="multipart/form-data">
                        <h2>Update Education Content</h2>

                        <div class="mb-3">
                          <label for="" >Upload Image</label>
                          <td><input type="file" class="form-control"  name="ulimage" accept="image/*,video/*" value="<?php echo $data['Image'] ?>" required><img src="<?php echo $data['Image'] ?>" width ='200px' height = '120px'></td>
                        </div>

                        <div class="mb-3">
                          <label for="" >Title</label>
                          <input type="text" class="form-control" value="<?php echo $data['Title'] ?>" name="ultitle" placeholder="What's the title?" required>
                        </div>

                        <div class="mb-3">
                          <label for="" >Description</label>
                          <input type="text" class="form-control" value="<?php echo $data['Description'] ?>" name="uldescription" placeholder="Some description?" required>
                        </div>

                        <div class="mb-3">
                          <label for="ulurl" >Video URL</label>
                          <input type="url" class="form-control" value="<?php echo $data['URL'] ?>" name="ulurl" placeholder="Please upload the link here" >
                        </div>

                        <button type="reset" class="btn btn-primary m-1">Reset</button><br>
                          <input type="hidden" name="Id" value="<?php echo $data['id'] ?>">
                        <button type="submit" class="btn btn-primary m-1" name="update">Update</button>
        </form>
    </div>

    <!--Update code-->



  </body>
</html>