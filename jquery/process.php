<?php 

include("db.php");


/* Displaying Action Box Data in Cars table */
if(isset($_POST['id'])) { // ******* to what refers this 'id'???!!! *********
    
    $id = mysqli_real_escape_string($connection, $_POST['id']);

    $query = "SELECT * FROM cars WHERE id = {$id}";
    $query_car_info = mysqli_query($connection, $query);

    if(!$query_car_info) {
        die("Query Failed" . mysqli_error($connection));
    }

    while($row = mysqli_fetch_array($query_car_info)) {
        echo '<p id="feedback" class="bg-success"></p>'; // feedback for successfully updating data
        echo "<input rel='". $row['id']."' type='text' class='form-control     name-input'   value='".$row['name']."'>";
        echo "<input type='button' class='btn btn-success                      update'       value='Update'>";
        echo "<input type='button' class='btn btn-danger                       delete'       value='Delete'>";
        echo "<input type='button' class='btn btn-close'                                     value='Close'>";
    }
}


/* Updating Data in DB */
if(isset($_POST['updatethis'])) { // updatethis refers to: line 92 *****

    $id = mysqli_real_escape_string($connection, $_POST['id']);
    $name = mysqli_real_escape_string($connection, $_POST['name']);

    $id = $_POST['id'];
    $name = $_POST['name'];

    $query = "UPDATE cars SET name = '$name' WHERE id = '$id'";

    $result_set = mysqli_query($connection, $query);

    if(!$result_set) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}


/* Deleting Data from DB */
if(isset($_POST['deletethis'])) { // deletethis refers to: line 108 *****
    
    $id = mysqli_real_escape_string($connection, $_POST['id']);
    // we don't need name

    $id = $_POST['id'];

    $query = "DELETE FROM cars WHERE id = '$id'";
    
    $result_set = mysqli_query($connection, $query);
    
    if(!$result_set) {
        die("QUERY FAILED" . mysqli_error($connection));
    }
}


?>




<script>

$(document).ready(function() {

    var id; 
    var name;
    var updatethis = "update"; // "update" refers to: line 21
    var deletethis = "delete"; // "delete" refers to: line 22
    
    
    /* Extracting id and name */
    $(".name-input").on('input', function() { // .on('input')???? *****
        
        id = $(this).attr('rel');
        name = $(this).val();

    });
        
        
    /* Update Button Function */ 
    $(".update").on('click', function() {
        
        $.post("process.php", 
            {id: id, 
             name: name, 
             updatethis: updatethis}, //1st updatethis DOES NOT REFER to anything; it's just a keyword for line 29 *****
             function(data) {
            
            // $("#feedback").text("Record updated successfully!"); 

            alert("Record updated successfully!");
        
        })
    });
    

    /* Delete Button Function **/ 
    $(".delete").on('click', function() {
        
        if(confirm('Are you sure you want to delete this?')) {
        
            id = $(".name-input").attr('rel');
        
            $.post("process.php", {id: id, deletethis: deletethis}, function(data) { 
                                           //1st deletethis DOES NOT REFER to anything; it's just a keyword for line 48 *****
                
                alert("Record deleted successfully!");
                $("#action-container").hide();
                
            });
               
        }
    });
    
    /* Close Button Function */        
    $(".btn-close").on('click', function() {
        
        $("#action-container").hide();
        
    });



}); 

</script>






