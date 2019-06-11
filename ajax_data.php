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

$sql = "SELECT fieldname1, fieldname2, fieldname3 FROM table1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $i=0;
    while($row = $result->fetch_assoc()) {       
        $result_array[$i] = $row;
        $i++;
    }
}
/* send a JSON encded array to client */
echo json_encode($result_array);
$conn->close();

