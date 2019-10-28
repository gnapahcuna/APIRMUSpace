<?php
	error_reporting(0);
	error_reporting(E_ERROR | E_PARSE);
    include "config.php";
	
    $TopicID = $_POST['TopicID'];
	$UserID = $_POST['UserID'];
	
	
	$sql_get = "SELECT * FROM UserPassStudy WHERE UserID = '".$UserID."' AND TopicID = '".$TopicID."'";
    	$result_get = mysqli_query($connection, $sql_get) or die("Error in Selecting " . mysqli_error($connection));
        $emparray = array();
        if($row =mysqli_fetch_assoc($result_get))
    	{
			$myObj->TopicPass = true;
    	}else{
			$myObj->TopicPass = false;
		}
   	 	$myObj_body->Response = $myObj;
		echo json_encode($myObj_body);
    //close the db connection
    mysqli_close($connection);

?>