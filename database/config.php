<?php
// Create database connection
define("dbServerName", "localhost");
define("dbUserName", "root");
define("dbPassword", "");
define("dbName", "optimal_nutrition_hub");

$con = mysqli_connect(dbServerName, dbUserName, dbPassword, dbName);

// Check connection
if (!$con){
    die(mysqli_connect_error($con));
}
