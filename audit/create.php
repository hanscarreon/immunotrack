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



$al_userID = $_POST['al_userID'];
$al_details = $_POST['al_details'];


if($al_userID == null){
    echo 'anuthorized person';
    return;

}else if($al_details == null){
    echo 'details is required!';
    return;
}


$sql = "INSERT INTO audit_logs (al_userID, al_details) VALUES ('" . $al_userID . "', '" . $al_details . "')";

// $sql = "INSERT INTO MyGuests (firstname, lastname, email)
// VALUES ('John', 'Doe', 'john@example.com')";
$save = $conn->query($sql);
if ($save === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

// $conn->close();
