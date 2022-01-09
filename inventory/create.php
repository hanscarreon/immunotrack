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



$iv_userID = $_POST['iv_userID'];
$iv_count = $_POST['iv_count'];
$iv_name = $_POST['iv_name'];


if ($iv_userID == null) {
    echo 'anuthorized person';
    return;
} else if ($iv_count == null) {
    echo 'count is required!';
    return;
} else if ($iv_name == null) {
    echo 'name is required!';
    return;
}


$sql = "INSERT INTO iventory (iv_userID, iv_count, iv_name) VALUES ('" . $iv_userID . "', '" . $iv_count . "', '" . $iv_name . "')";

$save = $conn->query($sql);
if ($save === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
