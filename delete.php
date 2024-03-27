<?php
include 'config.php';
echo $ID = $_GET['Id'];

mysqli_query($con,"DELETE FROM `uploadcontent` WHERE Id = $ID");

header('location:addcontent.php');

?>