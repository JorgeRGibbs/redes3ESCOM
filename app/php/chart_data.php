<?php
include ('connection/dbconnection.php');
// Create connection
$dbconn = OpenCon();

//address of the server where db is installed
header('Content-Type: application/json');
    $data_points = array();
    $result = mysqli_query($dbconn, "SELECT * FROM Registro order by temperatura"); 
    while ($row = mysqli_fetch_array($result)) {
        $point = array("valorx" => $row['Dispositivo_idDispositivo'], "valory" => $row['temperatura']);
        array_push($data_points, $point);
    }
    echo json_encode($data_points);
}
?>