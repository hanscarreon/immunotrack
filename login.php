<?php
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// $conn = mysqli_connect('localhost', 'u934258034_vaccsched', 'VaccSched091321','u934258034_vaccsched');                                //////////// COMMENT: DATABASE CONNECT //////////
$conn = mysqli_connect('localhost', 'u943769473_immunouser', 'xI4t#e^s@', 'u943769473_immuno');
$US = $_POST['Username'];
$PW = $_POST['Password'];

$login = mysqli_query($conn, "SELECT * FROM accounts WHERE USERNAME = '" . $_POST['Username'] . "' AND PASSWORD = '" . $_POST['Password'] . "'");

if ($login->num_rows > 0) {
    $data = [];
    while ($row = $login->fetch_assoc()) {
        $data[] = $row;
    }
    $myObj->children = $data;
    $myObj->NUMBER = count($data);
    $myJSON = json_encode($myObj);
    echo $myJSON;
    // echo "Logged in";
} else {
    echo "Not Found";
}
