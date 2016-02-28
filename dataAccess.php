<?php
include 'connection.php';
header("Access-Control-Allow-Origin: *");


 switch ($_GET['op']) {   
    case 1:
    //traer el carro por la placa
       $sql="SELECT * FROM tbl_user WHERE tbl_user_username='".$_GET['user']."'";
 
		$result=$conn->query($sql);

			if ($result->num_rows > 0) {
    			// oupsut ssata of each row
    			while($row = $result->fetch_assoc()) {
        			if($row["tbl_user_password"]==$_GET['pass']){
        				echo $row["tbl_user_id"];
					//echo json_encode($row);
        			}else{
        				echo "passerror";
        			}
    			}
			} else {
    		echo "usererror";
			}
         break;
    case 2:
    //traer el carro por la placa
       $sql="INSERT INTO tbl_user VALUES (NULL, '".$_GET['user']."', '".$_GET['pass']."')";
 
		$result=$conn->query($sql);
			echo $result."/n";
			if ($result->num_rows > 0) {
    			// oupsut ssata of each row
    			while($row = $result->fetch_assoc()) {
        			echo json_encode($row);
        			
    			}
			} else {
    		echo "error";
			}
         break;
    default:
    //Mensaje default si no se ingresa OP
       echo "se necesita identificar la operacion";
        break;
    }

?>
