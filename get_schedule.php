<?php
error_reporting(E_ERROR | E_PARSE);
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

// $conn = mysqli_connect('localhost', 'u934258034_vaccsched', 'VaccSched091321','u934258034_vaccsched');                                //////////// COMMENT: DATABASE CONNECT //////////
$conn = mysqli_connect('localhost', 'u943769473_immunouser', 'xI4t#e^s@', 'u943769473_immuno');


$from = $_GET["from"];
$to = $_GET["to"];
$sql;


/// return if from and to is null
if ($from == null && $to == null) {
    $from = 'all';
    $to = 'all';
}

if (($from == 'all' && $to == 'all') ||  ($from == '' && $to == '')) {
    $Q = "SELECT * FROM children ";
} else {
    $sql = "SELECT * FROM children WHERE  VACCINE_DATE >= '" . $from . "' AND VACCINE_DATE <= '" . $to . "'";
}

// if (isset($_POST['Vdate'])) {
//     $Q = "SELECT * FROM children WHERE VACCINE_DATE='" . $_POST['Vdate'] . "'";
// } else {
//     $Q = "SELECT * FROM children ";
// }
$sched = mysqli_query($conn, $Q);
$sched_r = array();
while ($row = $sched->fetch_assoc()) {
    $sched_r[] = $row;
}
$myObj->children = $sched_r;
$myObj->NUMBER = count($sched_r);
$myJSON = json_encode($myObj);
echo $myJSON;
$conn->close();
