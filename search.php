<?php
    error_reporting(E_ERROR | E_PARSE);
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");

    // $conn = mysqli_connect('localhost', 'u934258034_vaccsched', 'VaccSched091321','u934258034_vaccsched');                                //////////// COMMENT: DATABASE CONNECT //////////
    $conn = mysqli_connect('localhost', 'u943769473_immunouser', 'xI4t#e^s@','u943769473_immuno'); 
    $FIRST_NAME= $_POST['FIRST_NAME'];
    $LAST_NAME = $_POST['LAST_NAME'];
    $ID = $_POST['ID'];
	
    $Q = "SELECT * FROM children WHERE  FIRST_NAME = '".$FIRST_NAME."' OR LAST_NAME ='".$LAST_NAME."' OR ID ='".$ID."'";
    
    $sched = mysqli_query($conn, $Q);
    $sched_r = array();
    while($row = $sched->fetch_assoc()) {$sched_r[] = $row;}
     $myObj->children = $sched_r;
     $myObj->NUMBER = count($sched_r);
    $myJSON = json_encode($myObj);
    echo $myJSON;
