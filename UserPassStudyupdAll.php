<?php
	error_reporting(0);
	error_reporting(E_ERROR | E_PARSE);
    include "config.php";
	
    $TopicID = $_POST['TopicID'];
	$UserID = $_POST['UserID'];
	$I = $_POST['I'];
	
	
	/*$sql = "SELECT * FROM UserPassStudy WHERE UserID= '".$UserID."'";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
    if($row =mysqli_fetch_assoc($result))
    {
        $sql_upd = "UPDATE UserCurrentStudy SET TopicID = '".$TopicID."',NumberOfRepeated = '".$I."' WHERE UserID ='".$row['UserID']."'";
        mysqli_query($connection, $sql_upd);
		
		
		$sql_get = "SELECT * FROM UserPassStudy WHERE UserID = '".$UserID."'";
    	$result_get = mysqli_query($connection, $sql_get) or die("Error in Selecting " . mysqli_error($connection));
        $emparray = array();
        if($row =mysqli_fetch_assoc($result_get))
    	{
			$myObj->UserID = $row['UserID'];
			$myObj->NumberOfRepeated = $row['NumberOfRepeated'];
			$myObj->TopicID = $row['TopicID'];
    	}
   	 	$myObj_body->Response = $myObj;
		echo json_encode($myObj_body);
		
    }else{*/
		$sql = "insert into UserPassStudy (UserID,TopicID,NumberOfRepeated)
	 		 	VALUES('".$UserID."', '".$TopicID."', '".$I."')";
		mysqli_query($connection, $sql);
	
		$sql_get = "SELECT * FROM UserPassStudy WHERE UserID = '".$UserID."'";
    	$result_get = mysqli_query($connection, $sql_get) or die("Error in Selecting " . mysqli_error($connection));
        /*$emparray = array();
        while($row =mysqli_fetch_assoc($result_get))
    	{
			$myObj->UserID = $row['UserID'];
			$myObj->NumberOfRepeated = $row['NumberOfRepeated'];
			$myObj->TopicID = $row['TopicID'];
    	}
		$myObj_body->Response = $myObj;*/
		$emparray = array();
    	while($row =mysqli_fetch_assoc($result_get))
    	{
       		array_push($emparray,$row);
    	}
    	$myObj_body->Response = $emparray;
		echo json_encode($myObj_body);
	//}
    //close the db connection
    mysqli_close($connection);

?>