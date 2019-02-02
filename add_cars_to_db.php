<?php

include("db.php");

if(isset($_POST['car_name'])) { // $_POST['car_name'] refers to name="car_name" in index.html

    $car_name = $_POST['car_name'];
    $query = "INSERT INTO cars(name) VALUES('$car_name')";
    $add_car_name = mysqli_query($connection, $query);
    
    if(!$add_car_name) {
        die("QUERY FAILED");
    }

    header("Location: index.html");

}

?>