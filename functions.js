$(document).ready(function() {   
            
    /* SEARCHING cars in Cars Table */         
    $('#search').keyup(function() {
            
        var search = $('#search').val();
        
        $.ajax({   
            url: 'search.php',
            data: {search:search}, //2nd search refers to: var search = $('#search').val(); 1st search refers to: $search = $_POST['search'] in search.php ???;
            method: 'POST',
            success: function(data) {
                if(!data.error) {
                    $('#result').html(data);
                }
            }        
        });
    });
    
    

    /* ADDING cars to Cars Table (database cars) */       
    $("#add-car-form").submit(function(e) {
        e.preventDefault(); // to not throw you to another page!
        
        var data = $(this).serialize(); // now we have all the data from that form
        
        var url = $(this).attr('action'); // so we can send our data // url is add_cars.php
        
        $.post(url, data, function(php_table_data) {
            $("#car-result").html(php_table_data); // we don't need php_table_data though
            $("#add-car-form")[0].reset(); // it resets the form when we add a car
        }); 
    });


    /* UPDATING Cars Table */ 
        /* Updating table every 0.5s */    
    setInterval(function() {
        updateCars(); //calling the bellow function
    }, 500);
    
        /* Function */
    function updateCars() {
        $.ajax({
            url: 'display_cars.php',
            method: 'POST',
            success: function(show_cars) {
                if(!show_cars.error) {
                    $("#show-cars").html(show_cars);
                }
            }
        });    
    }
    // updateCars();



});