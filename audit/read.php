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


$from = $_GET["from"];
$to = $_GET["to"];
$sql; 


/// return if from and to is null
if($from == null && $to == null){
    $from = 'all';
    $to = 'all';
}

// query for sql db 
// SELECT * FROM audit_logs JOIN accounts ON accounts.ID=audit_logs.al_userID 
//     WHERE audit_logs.al_status !='deleted' AND audit_logs.al_created_at >= '2021-01-01' AND audit_logs.al_created_at <= '2022-01-30'

if( ($from == 'all' && $to == 'all') ||  ($from == '' && $to == '') ){
    $sql = "SELECT * FROM audit_logs JOIN accounts ON accounts.ID=audit_logs.al_userID WHERE audit_logs.al_status !='deleted'";
}else{
    $sql = "SELECT * FROM audit_logs JOIN accounts ON accounts.ID=audit_logs.al_userID 
    WHERE audit_logs.al_status !='deleted' AND audit_logs.al_created_at >= '".$from."' AND audit_logs.al_created_at <= '".$to."'";
}
// sql query for getting the auditlogs with joint table of accounts
// query result
$result = $conn->query($sql);
// from and to dates variable


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
