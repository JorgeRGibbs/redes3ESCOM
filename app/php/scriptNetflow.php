<?php 
	include ('connection/dbconnection.php');
	// Create connection
$dbconn = OpenCon();
$fileHandle = fopen("r1.csv", "r");
$totalTime = array ();
$ipDest = array ();
$totalData = array ();

//Loop through the CSV rows.
$i=0;
while (($row = fgetcsv($fileHandle, 0, ",")) !== FALSE) {
    echo $totalTime [] = $row[2];
    echo $ipDest [] = $row[4];
    echo $totalData [] = $row[11];
	$sql = "INSERT INTO netflow(totalTime, ipDest, totalData)
 	values('$totalTime[$i]', '$ipDest[$i]', '$totalData[$i]')";
 	if ($dbconn->query($sql) === TRUE) {
    	echo "New record created successfully";
	} else {
  	 echo "Error: " . $sql . "<br>" . $dbconn->error;
	}
	$i=$i+1;
}

	array_multisort($totalTime, $ipDest, $totalData);
	//var_dump($totalTime);
	//var_dump($ipDest);
	//var_dump($totalData);



	

?>
