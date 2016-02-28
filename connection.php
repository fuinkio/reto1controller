<?php
header("Access-Control-Allow-Origin: *");


$DBServer = 'localhost'; // e.g 'localhost' or '192.168.1.100'
$DBUser   = 'grupo1';
$DBPass   = 'grupo1db';
$DBName   = 'triqui';

$conn = new mysqli($DBServer, $DBUser, $DBPass, $DBName);
 
// check connection
if ($conn->connect_error) {
  trigger_error('Database connection failed: '  . $conn->connect_error, E_USER_ERROR);
}
$sql='SELECT * FROM tbl_user WHERE tbl_user_id = 0';
 
$rs=$conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["tbl_user_id"]. "<br>";
    }
} else {
    echo "0 results";
}



var_dump($rs);
?>