<?php
$con = new mysqli("localhost", "root", "", "ecocarbon_database");

if ($con->connect_error) {
    die($con->connect_error);
} else {
    // echo "Connected";
}