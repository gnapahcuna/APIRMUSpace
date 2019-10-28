<?php
	error_reporting(0);
	error_reporting(E_ERROR | E_PARSE);
    include "config.php";
    
    $UserID = $_POST['UserID'];
    $topicID = $_POST['TopicID'];
	$topicReach = $_POST['TopicReach'];
	
	if($topicID=='0' && $topicReach=='null'){
		$sql = "SELECT * FROM TopicMaster LIMIT 1";
		$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
		$topic_id = '';
		$topic_name = '';
		if($row =mysqli_fetch_assoc($result)){
			$topic_id = $row['TopicID'];
			$topic_name = $row['TopicName'];

			$sql_getcurr = "SELECT * FROM UserCurrentStudy WHERE UserID= '".$UserID."'";
    		$result_getcurr = mysqli_query($connection, $sql_getcurr) or die("Error in Selecting " . mysqli_error($connection));
    		if($row_curr =mysqli_fetch_assoc($result_getcurr))
    		{
				$sql_upd = "UPDATE UserCurrentStudy SET TopicID = '".$topic_id."',TopicReach = '".$topic_name."' WHERE UserID ='".$row['UserID']."'";
				mysqli_query($connection, $sql_upd);
			}else{
				$sql_ins = "insert into UserCurrentStudy (UserID,TopicID,TopicReach)
				VALUES('".$UserID."', '".$topic_id."', '".$topic_name."')";
		 		mysqli_query($connection, $sql_ins);
			}
	
			$sql_get = "SELECT * FROM UserCurrentStudy WHERE UserID = '".$UserID."'";
    		$result_get = mysqli_query($connection, $sql_get) or die("Error in Selecting " . mysqli_error($connection));
        	$emparray = array();
        	if($row =mysqli_fetch_assoc($result_get))
    		{
				$myObj->UserID = $row['UserID'];
				$myObj->TopicReach = $row['TopicReach'];
				$myObj->TopicID = $row['TopicID'];
    		}
   	 		$myObj_body->Response = $myObj;
			echo json_encode($myObj_body);
		}
	}else{
		$sql = "SELECT * FROM UserCurrentStudy WHERE UserID= '".$UserID."'";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
    if($row =mysqli_fetch_assoc($result))
    {
        $sql_upd = "UPDATE UserCurrentStudy SET TopicID = '".$topicID."',TopicReach = '".$topicReach."' WHERE UserID ='".$row['UserID']."'";
        mysqli_query($connection, $sql_upd);
		
		
		$sql_get = "SELECT * FROM UserCurrentStudy WHERE UserID = '".$UserID."'";
    	$result_get = mysqli_query($connection, $sql_get) or die("Error in Selecting " . mysqli_error($connection));
        $emparray = array();
        if($row =mysqli_fetch_assoc($result_get))
    	{
			$myObj->UserID = $row['UserID'];
			$myObj->TopicReach = $row['TopicReach'];
			$myObj->TopicID = $row['TopicID'];
    	}
   	 	$myObj_body->Response = $myObj;
		echo json_encode($myObj_body);
		
    }else{
		$sql_ins = "insert into UserCurrentStudy (UserID,TopicID,TopicReach)
	 		 	VALUES('".$UserID."', '".$topicID."', '".$topicReach."')";
		mysqli_query($connection, $sql_ins);
	
		$sql_get = "SELECT * FROM UserCurrentStudy WHERE UserID = '".$UserID."'";
    	$result_get = mysqli_query($connection, $sql_get) or die("Error in Selecting " . mysqli_error($connection));
        $emparray = array();
        if($row =mysqli_fetch_assoc($result_get))
    	{
			$myObj->UserID = $row['UserID'];
			$myObj->TopicReach = $row['TopicReach'];
			$myObj->TopicID = $row['TopicID'];
    	}
   	 	$myObj_body->Response = $myObj;
		echo json_encode($myObj_body);
	}
    //close the db connection
    mysqli_close($connection);
}
?>