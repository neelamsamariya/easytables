<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>



<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Easy Tables</title>
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"  rel="stylesheet">
      <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css"  rel="stylesheet">
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      <link href="easyTable.css"  rel="stylesheet">
   </head>
   <body>

      <br>
      <div class="container">
         <div class="panel panel-default">
            <div class="panel-heading">
               <h3 class="panel-title">easyTables</h3>
            </div>
            <div class="panel-body">
               <table id="table">
                  <thead>
                  <th>Field1</th>
                  <th>Field2</th>
                  <th>Field3</th>
                  <th>Field4</th>
                  </thead>
                  <tbody>
                  </tbody>
               </table>

               <br><br>
               <button class="btn btn-primary" id="getSelected">Get Selected</button>
            </div>
         </div>
      </div>

      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
      <script src="easyTable.js"></script>
      <script>
          
            
                var foo = '';
                $.ajax({
                  method: "GET", url: "ajax_data.php"                  
                }).done(function(data) {
                     var resultPeople = $.parseJSON(data);
                     
                     //from result create a string of data and append to the div
                    $.each( resultPeople, function(key, value ) {
                      foo += "<tr><td>"+resultPeople[key].id + "</td><td> " +resultPeople[key].fieldname1 +' '+resultPeople[key].fieldname2+'</td><td> '+ resultPeople[key].fieldname3+"</td></tr>";
                     });  
                    
                     $("#table").find('tbody').append(foo);      
               });
         
         var table = $("#table").easyTable();
         $("#getSelected").click(function () {
            console.log(table.getSelected(0));
         }); 
         

      </script>
   </body>
</html>
