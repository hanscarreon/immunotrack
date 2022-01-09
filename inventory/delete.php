<?php


header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");


$servername = "localhost";
$username = "u943769473_immunouser";
$password = "xI4t#e^s@";
$dbname = "u943769473_immuno";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}



$iv_id = $_GET['iv_id'];

if ($iv_id == null) {
    echo 'anuthorized person';
    return;
} 

$sql = "UPDATE iventory SET iv_status='deleted' WHERE iv_id= ".$iv_id." ";

$save = $conn->query($sql);
if ($save === TRUE) {
    echo "Record deleted successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
