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



$iv_id = $_POST['iv_id'];
$iv_count = $_POST['iv_count'];
$iv_name = $_POST['iv_name'];


if ($iv_id == null) {
    echo 'anuthorized person';
    return;
} else if ($iv_count == null) {
    echo 'count is required!';
    return;
} else if ($iv_name == null) {
    echo 'name is required!';
    return;
}else if($iv_count < 0){
    echo 'count must be greater than or equal to 0!';
    return;
}


$sql = "UPDATE iventory SET iv_name='".$iv_name."', iv_count='".$iv_count."'  WHERE iv_id= ".$iv_id." ";

$save = $conn->query($sql);
if ($save === TRUE) {
    echo "Record updated successfully!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
