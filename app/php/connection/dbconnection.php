<?php
function OpenCon()
 {
 $dbhost = "10.100.74.42";
 $dbuser = "netuser";
 $dbpass = "123"; // CREATE USER 'nuevousuario'@'localhost' IDENTIFIED BY 'H4x0r!1234';
 $db = "redes3proj";
 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);
 
 return $conn;
 }
 
function CloseCon($conn)
 {
 $conn -> close();
 }


//CREATE USER 'netuser'@'%' IDENTIFIED BY '123'; 
//GRANT ALL PRIVILEGES ON redes3proj.* TO 'netuser'@'%';   
?>
