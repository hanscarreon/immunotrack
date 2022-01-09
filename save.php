<?php
    
    date_default_timezone_set("Asia/Manila");
?>


<?php
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Cache-Control: post-check=0, pre-check=0", false);
	header("Pragma: no-cache");
	
    $time = time();
    $FIRST_NAME = $_POST['FIRST_NAME'];
    $LAST_NAME = $_POST['LAST_NAME'];
    $VACCINE = $_POST['VACCINE'];
    $VACCINE_DATE = $_POST['VACCINE_DATE'];
    $BIRTHDATE = $_POST['BIRTHDATE'];
    $FIRST_NAME2 = $_POST['FIRST_NAME2'];
    $LAST_NAME2 = $_POST['LAST_NAME2'];
    $CONTACT_NUMBER = $_POST['CONTACT_NUMBER'];
    $ADDRESS = $_POST['ADDRESS'];
    $BRGY = $_POST['BRGY'];
    $CITY = $_POST['CITY'];
    
    // $conn = mysqli_connect('localhost', 'u934258034_vaccsched', 'VaccSched091321','u934258034_vaccsched'); 
    $conn = mysqli_connect('localhost', 'u943769473_immunouser', 'xI4t#e^s@','u943769473_immuno'); 
    
    if (isset($_POST['FIRST_NAME'])) {
       
    	if (isset($_POST['update'])) {
    	    $Query = "UPDATE children SET FIRST_NAME='";
    	    $Query = $Query.$FIRST_NAME."',";
    	    $Query = $Query."LAST_NAME='".$LAST_NAME."',";
    	    $Query = $Query."VACCINE='".$VACCINE."',";
    	    $Query = $Query."VACCINE_DATE='".$VACCINE_DATE."',";
    	    $Query = $Query."BIRTHDATE='".$BIRTHDATE."',";
    	    $Query = $Query."FIRST_NAME2='".$FIRST_NAME2."',";
    	    $Query = $Query."LAST_NAME2='".$LAST_NAME2."',";
    	    $Query = $Query."CONTACT_NUMBER='".$CONTACT_NUMBER."',";
    	    $Query = $Query."ADDRESS='".$ADDRESS."',";
    	    $Query = $Query."BRGY='".$BRGY."',";
    	    $Query = $Query."CITY='".$CITY."' WHERE ID ='".$_POST['id']."'";
    	}
    	else {$Query = <<<'EOD'
                INSERT INTO children (TIME,ID,FIRST_NAME, LAST_NAME,VACCINE,VACCINE_DATE,BIRTHDATE,FIRST_NAME2,LAST_NAME2,CONTACT_NUMBER,ADDRESS,BRGY,CITY) VALUES ('
EOD;
        $Query = $Query.$time."', '";
        $Query = $Query.date("ymdHis", $time)."', '";
        $Query = $Query.$FIRST_NAME."', '";
        $Query = $Query.$LAST_NAME."', '";
        $Query = $Query.$VACCINE."', '";
        $Query = $Query.$VACCINE_DATE."', '";
        $Query = $Query.$BIRTHDATE."', '";
        $Query = $Query.$FIRST_NAME2."', '";
        $Query = $Query.$LAST_NAME2."', '";
        $Query = $Query.$CONTACT_NUMBER."', '";
        $Query = $Query.$ADDRESS."', '";
        $Query = $Query.$BRGY."', '";
        $Query = $Query.$CITY;
        $Query = $Query."')"; //ex
    	}
        echo $Query;
        mysqli_query($conn,$Query);    
    
    }
?>
