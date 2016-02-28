<?php
include 'connection.php';
header("Access-Control-Allow-Origin: *");



$sql='SELECT * FROM tbl_user';
 
$result=$conn->query($sql);

if ($result->num_rows > 0) {
    // oupsut data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["tbl_user_id"]. "<br>";
    }
} else {
    echo "0 results";
}

?>