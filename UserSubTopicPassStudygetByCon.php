<?php
	error_reporting(0);
	error_reporting(E_ERROR | E_PARSE);
    include "config.php";
	
	$UserID = $_POST['UserID'];
	
	$sql_get = "SELECT * FROM UserSubTopicPassStudy WHERE UserID = '".$UserID."'";
    	$result_get = mysqli_query($connection, $sql_get) or die("Error in Selecting " . mysqli_error($connection));
        
		$emparray = array();
    	while($row =mysqli_fetch_assoc($result_get))
    	{
       		array_push($emparray,$row);
    	}
    	$myObj_body->Response = $emparray;
		echo json_encode($myObj_body);
    //close the db connection
    mysqli_close($connection);

?>