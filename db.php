<?php

// ob_start();

// $connection = mysqli_connect('localhost', 'root', '','ajax');    // Classic way
$connection = new mysqli("localhost", "root", "", "ajax");          // OOP way



// TESTING
// $search = $_POST['search'];
// echo $search;


// $conn = new mysqli('localhost', '', '', 'test');
// if ($conn->connect_error)
// {
//     die("Connection failed: " . $conn->connect_error);
// }   

?>