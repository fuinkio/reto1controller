<?php
include 'connection.php';
header("Access-Control-Allow-Origin: *");


 switch ($_GET['op']) {   
    case 1:
    //login
       $sql="SELECT * FROM tbl_user WHERE tbl_user_username='".$_GET['user']."'";
 
		$result=$conn->query($sql);

			if ($result->num_rows > 0) {
    			// oupsut ssata sf each row
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
    //nuevo usuario
       $sql="INSERT INTO tbl_user VALUES (NULL, '".$_GET['user']."', '".$_GET['pass']."')";
 
		$result=$conn->query($sql);
			if ($result!=1) {
    			// oupsuss ssata of each row
    				echo "error";
			} else {
    		        	echo "success";
			}
         break;
     case 3:
    //nuevo tablero
       $sql="INSERT INTO tbl_board  VALUES (NULL, '".$_GET['id']."', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL)";
 
		$result=$conn->query($sql);
			if ($result!=1) {
    			// oupsuss ssata of each row
    				echo "error";
			} else {
    		        	echo "success";
			}
         break;
    default:
    //Mensaje default si no se ingresa OP
       echo "se necesita identificar la operacion";
        break;
    }


?>
