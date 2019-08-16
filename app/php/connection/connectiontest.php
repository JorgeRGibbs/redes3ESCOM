<?php
include ('dbconnection.php');
$conn = OpenCon();
echo "Conexión Exitosa";
//phpinfo(); 
CloseCon($conn);
?>