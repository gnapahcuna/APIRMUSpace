<?php
	error_reporting(0);
	error_reporting(E_ERROR | E_PARSE);
    include "config.php";
    
    $UserID = $_POST['UserID'];
    $CF = $_POST['CF'];

	$sql = "SELECT * FROM UserAccount WHERE UserID= '".$UserID."'";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
    if($row =mysqli_fetch_assoc($result))
    {
        $sql_upd = "UPDATE UserAccount SET UserCF = '".$CF."' WHERE UserID ='".$UserID."'";
    	mysqli_query($connection, $sql_upd);
		
		
		$sql_get = "SELECT * FROM UserCurrentStudy WHERE UserID = '".$UserID."'";
    	$result_get = mysqli_query($connection, $sql_get) or die("Error in Selecting " . mysqli_error($connection));
        $emparray = array();
        $myObj_body->LoginPass = true;
		$myObj->UserID = $row['UserID'];
		$myObj->UserName = $row['UserName'];
		$myObj->Password = $row['Password'];
		$myObj->UserCF = $row['UserCF'];
		$myObj->LastLogin = $row['LastLogin'];
		$myObj_body->Response = $myObj;
		
		//return data when login success
        echo json_encode($myObj_body);
    }else{
        $myObj_body->LoginPass = false;
		$myObj_body->Response = $myObj;
		
		//return data when login not success
		echo json_encode($myObj_body);	
    }
    //close the db connection
    mysqli_close($connection);
?>