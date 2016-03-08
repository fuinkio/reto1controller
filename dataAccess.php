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
 
     case 4:
    //asignar jugador dos
       $sql="UPDATE tbl_board SET tbl_board_player2 = '".$_GET['player']."' WHERE tbl_board.tbl_board_id = ".$_GET['board'];
 
        $result=$conn->query($sql);
            if ($result!=1) {
                // oupsuss ssata of each row
                    echo "error";
            } else {
                        $response = file_get_contents("http://10.131.137.200/reto1controller/dataAccess.php?op=8&board=".$_GET['board']);
                        $json= json_decode($response);
                        echo $json;
            }
         break;
     case 5:
    //asignar jugada
       $sql="UPDATE tbl_board SET tbl_board_last = '".$_GET['player']."', tbl_board_pos_".$_GET['position']." = '".$_GET['player']."' WHERE tbl_board.tbl_board_id = ".$_GET['board'];
 
        $result=$conn->query($sql);
            if ($result!=1) {
                // oupsuss ssata of each row
                    echo "error";
            } else {
                        $response = file_get_contents("http://10.131.137.200/reto1controller/dataAccess.php?op=8&board=".$_GET['board']);
                        $json= json_decode($response);
                        echo $json;
            }
         break;
    case 6:
    //asignar ganador
       $sql="UPDATE tbl_board SET tbl_board_winner = '".$_GET['player']."' WHERE tbl_board.tbl_board_id = ".$_GET['board'];
 
        $result=$conn->query($sql);
            if ($result!=1) {
                // oupsuss ssata of each row
                    echo "error";
            } else {
                        echo "success";
            }
         break;
    case 7:
    //buscar tableros sin segundo jugador y que no sean mios
       $sql="SELECT * FROM tbl_board WHERE tbl_board_player2 is NULL AND tbl_board_player1 != ".$_GET['player'];
 
        $result=$conn->query($sql);
            if ($result!=1) {
                // oupsuss ssata of each row
                    echo "error";
            } else {
			$rows= array();
			while( $row = $result->fetch_assoc()) {
				$rows[] = $row;
			}
                        echo json_encode($rows);
            }
         break;
    case 8:
    //buscar tablero
       $sql="SELECT * FROM tbl_board WHERE tbl_board_id = ".$_GET['board'] ;
 
        $result=$conn->query($sql);
            if ($result!=1) {
                // oupsuss ssata of each row
                    echo "error";
            } else {
                    echo json_encode($result->fetch_assoc());
            }
         break;
    default:
    //Mensaje default si no se ingresa OP
       echo "se necesita identificar la operacion";
        break;
    }
?>

