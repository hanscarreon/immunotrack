<?php
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


$sql = "SELECT * FROM iventory WHERE iv_status !='deleted'";


$result = $conn->query($sql);


if ($result->num_rows > 0) {
    // output data of each row
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    $myObj->children = $data;
    $myObj->NUMBER = count($data);
    $myJSON = json_encode($myObj);
      echo $myJSON;
  
} else {
    echo "0 results";
}

//
$conn->close();
