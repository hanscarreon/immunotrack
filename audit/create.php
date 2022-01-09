<?php

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

$conn = mysqli_connect('localhost', 'u934258034_vaccsched', 'VaccSched091321', 'u934258034_vaccsched');


$tz_object = new \DateTimeZone('Asia/Manila');
$datetime = new \DateTime();
$datetime->setTimezone($tz_object);
$datetime->format('Y\-m\-d\ H:i:s');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$al_userID = $_POST['al_userID'];
$al_details = $_POST['al_details'];
$al_created_at = $datetime->format('Y\-m\-d\ H:i:s');

$sql = "INSERT INTO audit_logs (al_userID, al_details, al_created_at)
VALUES ( 
'" . $al_userID . "', 
'" . $al_details . "',
'" . $al_created_at . "'
)";

if (isset($_POST['save_logs'])) {
    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}




$conn->close();
