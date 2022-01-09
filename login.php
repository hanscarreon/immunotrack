<?php
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");

    // $conn = mysqli_connect('localhost', 'u934258034_vaccsched', 'VaccSched091321','u934258034_vaccsched');                                //////////// COMMENT: DATABASE CONNECT //////////
    $conn = mysqli_connect('localhost', 'u943769473_immunouser', 'xI4t#e^s@','u943769473_immuno'); 
    $US = $_POST['Username'];
	$PW = $_POST['Password'];
    
    $login = mysqli_query($conn, "SELECT * FROM accounts WHERE USERNAME = '".$_POST['Username']."' AND PASSWORD = '".$_POST['Password']."'"); 
    $login_r = array();
    while($row = $login->fetch_assoc()) {$login_r[] = $row;}
    if ($login->num_rows > 0) {
        echo "Logged in";
    }
    else {
        echo "Not Found";
    }
?>