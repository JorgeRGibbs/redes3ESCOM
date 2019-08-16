<?php
  include ('connection/dbconnection.php');
    //address of the server where db is installed
header('Content-Type: application/json');
  // Create connection
  $dbconn = OpenCon();
    $data_points = array();
    $result = mysqli_query($dbconn, "SELECT * FROM Netflow"); 
    while ($row = mysqli_fetch_array($result)) {
        $point = array("valorx" => $row['ip_destino'], "valory" => $row['tiempo']);
        array_push($data_points, $point);
    }
    echo json_encode($data_points);

mysqli_close($dbconn);
?>