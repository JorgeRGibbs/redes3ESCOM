<?php  
	include ('php/connection/dbconnection.php');
	// Create connection
	if(isset($_POST['view'])){
		$dbconn = OpenCon();
		if($_POST["view"] != ''){
    		$update_query = "UPDATE Notificacion SET estado = 1 WHERE estado=0";
    		mysqli_query($dbconn, $update_query);
		}
		$sql = "select titulo, mensaje, lastUpdate from Notificacion ORDER BY lastUpdate DESC LIMIT 15"; //DESC LIMIT 5";
		$result = mysqli_query($dbconn, $sql);
		$output = '';
		if($result->num_rows>0){
	  	while($row=$result->fetch_assoc()){
	    	$output .= '
	   			<li>
			    <a href="#" class="dropdown-item">
			    <strong>'.$row["titulo"].'</strong><br />
			    <small><em>'.$row["mensaje"].'</em></small>
			    </a>
			    </li>
	   			';
	  	}
		}
		else{
	  		$output .= '
	     	<li><a href="#" class="dropdown-item"">Sin notificaciones</a></li>';
		}
		//echo $output;
		$status_query = "SELECT * FROM Notificacion WHERE estado=0";
		$result_query = mysqli_query($dbconn, $status_query);
		$count = mysqli_num_rows($result_query);
		$data = array(
	    'notification' => $output,
	    'unseen_notification'  => $count
		);

		echo json_encode($data);
	}
?>