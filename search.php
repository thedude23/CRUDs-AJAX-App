<?php 

include("db.php");

$search = $_POST['search']; // refers to: name='search' ???    OR: data: {search: ... in functions.js ????

if(!empty($search)) {

  $query = " SELECT * FROM cars WHERE name LIKE '$search%' ";
  $search_query = mysqli_query($connection, $query);
  $count = mysqli_num_rows($search_query);    
  
  if(!$search_query) { // if no connection
    die('QUERY FAILED' . mysqli_error($connection));
  }
  
  if($count <= 0) { // if no result is found
    echo "Sorry, no such car in a table! :(";
  } else {
    // foreach($search_query as $row) { 
    while($row = mysqli_fetch_array($search_query)) { // the alternative to foreach method
      $car = $row['name'];

?> 

    <ul> <!-- returning/echoing all found cars -->
      <?php echo "<li>{$car}</li>";?>
    </ul>
        
    
<?php  
    } // closing while statement
  } // closing else statement

} // closing 1st if statement (on line 7)
?>