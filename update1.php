<?php

include 'config.php';

if (isset($_POST['update'])) {
  $ID = $_POST['Id'];
  $image = $_FILES['ulimage'];
  print_r($_FILES['ulimage']);
  $img_loc = $_FILES['ulimage']['tmp_name'];
  $img_name = $_FILES['ulimage']['name'];
  $img_des = "uploadimage/".$img_name;
  move_uploaded_file($img_loc,'uploadimage/'.$img_name);
  $ultitle = $_POST['ultitle'];
  $uldescription = $_POST['uldescription'];
  $ulurl = $_POST['ulurl'];
  $category = $_POST['category'];
}

  mysqli_query($con,"UPDATE `uploadcontent` SET `Image`='$img_des',`Title`='$ultitle',`Description`='$uldescription',`URL`='$ulurl',`Category`='$category' WHERE Id = $ID");
  header("location: addcontent.php");

  
?>