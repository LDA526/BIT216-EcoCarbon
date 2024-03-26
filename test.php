<?php
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Successful</title>

  <style>
    .upload-wrap {
      background-color: lightskyblue;
      margin-top: 0;
      margin-bottom: 0;
    }

    .upload-block {
      background-color: white;
      width: 800px;
      height: 300px;
      border-radius: 10px;
      padding-top: 50px;
      padding-bottom: 20px;
      padding-left: 12px;
      padding-right: 12px;
      margin-left: 500px;
      margin-top: 250px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    }

    .upload-message {
      font-weight: bold;
      font-size: 24px;
      margin-left: 40px;
      margin-right: 20px;
      vertical-align: center;
    }

    .upload-icon {
      font-size: 40pxpx;
      vertical-align: middle;
      margin-right: 10px;
      color: green;
    }

    .upload-btn {
      width: 150px;
      height: 70px;
      cursor: pointer;
      display: inline-block;
      background-color: rgb(94, 119, 224);
      color: white;
      font-size: 20px;
      border-width: 1px;
      border-color: grey;
      border-style: solid;
      border-radius: 10px;
      margin-top: 50px;
      margin-left: 140px;
      padding-top: 20px;
      padding-bottom: 20px;
      padding-left: 12px;
      padding-right: 12px;
    }
  </style>
</head>
<body class="upload-wrap">
  <div class="upload-block">
    <h2 class="upload-message">
      <i class="upload-icon" fas fa-check-circle></i> Congratulations, you have submitted the document successfully!
    </h2>
    <a href="http://localhost/BIT216-EcoCarbon/AddContent.php"><button class="upload-btn" >Go Back</button></a>
    <a href="http://localhost/BIT216-EcoCarbon/dashboard.php"><button class="upload-btn" >Home</button></a>
  </div>

</body>
</html>