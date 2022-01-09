<?php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");

    // $conn = mysqli_connect('localhost', 'u934258034_vaccsched', 'VaccSched091321','u934258034_vaccsched');                                //////////// COMMENT: DATABASE CONNECT //////////
    $conn = mysqli_connect('localhost', 'u943769473_immunouser', 'xI4t#e^s@','u943769473_immuno'); 
    $C = $_GET['Column'];
	$V = $_GET['Value'];
	$ID = $_GET['ID'];
    
    $login = mysqli_query($conn, "UPDATE children SET ".$C."='".$V."' WHERE ID = '".$ID."'"); 
    $login_r = array();
    
?>