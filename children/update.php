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



$ch_first_name = $_POST['ch_first_name'];
$ch_last_name = $_POST['ch_last_name'];
$ch_vaccine = $_POST['ch_vaccine'];
$ch_vac_date = $_POST['ch_vac_date'];
$ch_bod = $_POST['ch_bod'];
$ch_guardian_fname = $_POST['ch_guardian_fname'];
$ch_guardian_lname = $_POST['ch_guardian_lname'];
$ch_street = $_POST['ch_street'];
$ch_brgy = $_POST['ch_brgy'];
$ch_city = $_POST['ch_city'];
$ch_number = $_POST['ch_number'];
$ch_id = $_POST['ch_id'];

if($ch_id == null){
    echo 'anuthorized person';
    return;
}
else if ($ch_first_name == null) {
    echo 'first name is required!';
    return;
} else if ($ch_last_name == null) {
    echo 'last name is required!';
    return;
} else if ($ch_vaccine == null) {
    echo 'vaccine name is required!';
    return;
} else if ($ch_bod == null) {
    echo 'birth date is required!';
    return;
} else if ($ch_vac_date == null) {
    echo 'vacinne date is required!';
    return;
} else if ($ch_guardian_fname == null) {
    echo 'guardian first name is required!';
    return;
} else if ($ch_guardian_lname == null) {
    echo 'guardian last name is required!';
    return;
} else if ($ch_street == null) {
    echo 'street name is required!';
    return;
} else if ($ch_brgy == null) {
    echo 'barangay name is required!';
    return;
} else if ($ch_city == null) {
    echo 'city name is required!';
    return;
} else if ($ch_number == null) {
    echo 'number is required!';
    return;
}





$sql = "UPDATE  children2 SET 
ch_number='".$ch_number."', 
ch_city='".$ch_city."', 
ch_brgy='".$ch_brgy."', 
ch_street='".$ch_street."', 
ch_guardian_lname='".$ch_guardian_lname."', 
ch_guardian_fname='".$ch_guardian_fname."', 
ch_vac_date='".$ch_vac_date."', 
ch_bod='".$ch_bod."', 
ch_vaccine='".$ch_vaccine."', 
ch_last_name='".$ch_last_name."', 
ch_first_name='".$ch_first_name."'
WHERE ch_id= ".$ch_id ." ";



$save = $conn->query($sql);
if ($save === TRUE) {
    echo "Record updated successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
