<?php
$host_name="localhost";
$host_username="root";
$host_password="";
$host_database="uom";

$my_connect = new mysqli($host_name, $host_username, $host_password, $host_database);
// Check connection
if ($my_connect->connect_error) {
  die("Connection failed: " . $my_connect->connect_error);
}
mysqli_query($my_connect,
	"
	SET character_set_results = 'utf8',
	character_set_client = 'utf8',
	character_set_connection = 'utf8',
	character_set_database = 'utf8',
	character_set_server = 'utf8'");
?>