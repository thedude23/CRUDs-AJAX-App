<?php

include("db.php");

$query = "SELECT * FROM cars";
$query_car_info = mysqli_query($connection, $query);

if(!$query_car_info) {
    die("Query Failed" . mysqli_error($connection));
}

// foreach($query_car_info as $row) { 
while($row = mysqli_fetch_array($query_car_info)) { // retrieve data from Cars table
    echo "<tr>";
        echo "<td>{$row['id']}</td>";
        echo "<td><a rel='".$row['id']."' class='name-link' href='javascript:void(0)'>{$row['name']}</a></td>"; // CLASS='name-link', not ID !!!
    echo "</tr>";
}

?>


<script>

$(document).ready(function() {
         
    $(".name-link").on('click', function() { // when we click on car name ... 
        
        $("#action-container").show();
    
        var id = $(this).attr("rel"); // !!! "rel" refers to: <a rel='".$row['id']."' in display_cars.php !!!
            
        $.post("process.php", {id: id}, function(data) { // 2nd id is: $row['id']
            
            $("#action-container").html(data);

        });     
    });
  });

</script>



