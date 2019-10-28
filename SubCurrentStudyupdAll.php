<?php
	error_reporting(0);
	error_reporting(E_ERROR | E_PARSE);
    include "config.php";
    
    $UserID = $_POST['UserID'];
    $subTopicID = $_POST['SubTopicID'];
	$subTopicReach = $_POST['SubTopicReach'];
	
	if($topicID=='0' && $topicReach=='null'){
		$sql = "SELECT * FROM SubTopicMaster LIMIT 1";
		$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
		$sub_topic_id = '';
		$sub_topic_name = '';
		if($row =mysqli_fetch_assoc($result)){
			$sub_topic_id = $row['SubTopicID'];
			$sub_topic_name = $row['SubTopicName'];

			$sql_getcurr = "SELECT * FROM UserSubCurrentStudy WHERE UserID= '".$UserID."'";
    		$result_getcurr = mysqli_query($connection, $sql_getcurr) or die("Error in Selecting " . mysqli_error($connection));
    		if($row_curr =mysqli_fetch_assoc($result_getcurr))
    		{
				$sql_upd = "UPDATE UserSubCurrentStudy SET SubTopicID = '".$sub_topic_id."',SubTopicReach = '".$sub_topic_name."' WHERE UserID ='".$row['UserID']."'";
				mysqli_query($connection, $sql_upd);
			}else{
				$sql_ins = "insert into UserSubCurrentStudy (UserID,SubTopicID,SubTopicReach)
				VALUES('".$UserID."', '".$sub_topic_id."', '".$sub_topic_name."')";
		 		mysqli_query($connection, $sql_ins);
			}
	
			$sql_get = "SELECT * FROM UserSubCurrentStudy WHERE UserID = '".$UserID."'";
    		$result_get = mysqli_query($connection, $sql_get) or die("Error in Selecting " . mysqli_error($connection));
        	$emparray = array();
        	if($row =mysqli_fetch_assoc($result_get))
    		{
				$myObj->UserID = $row['UserID'];
				$myObj->SubTopicReach = $row['SubTopicReach'];
				$myObj->SubTopicID = $row['SubTopicID'];
    		}
   	 		$myObj_body->Response = $myObj;
			echo json_encode($myObj_body);
		}
	}else{
		$sql = "SELECT * FROM UserSubCurrentStudy WHERE UserID= '".$UserID."'";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
    if($row =mysqli_fetch_assoc($result))
    {
        $sql_upd = "UPDATE UserSubCurrentStudy SET SubTopicID = '".$subTopicID."',SubTopicReach = '".$subTopicReach."' WHERE UserID ='".$row['UserID']."'";
        mysqli_query($connection, $sql_upd);
		
		
		$sql_get = "SELECT * FROM UserSubCurrentStudy WHERE UserID = '".$UserID."'";
    	$result_get = mysqli_query($connection, $sql_get) or die("Error in Selecting " . mysqli_error($connection));
        $emparray = array();
        if($row =mysqli_fetch_assoc($result_get))
    	{
			$myObj->UserID = $row['UserID'];
			$myObj->SubTopicReach = $row['SubTopicReach'];
			$myObj->SubTopicID = $row['SubTopicID'];
    	}
   	 	$myObj_body->Response = $myObj;
		echo json_encode($myObj_body);
		
    }else{
		$sql_ins = "insert into UserSubCurrentStudy (UserID,SubTopicID,SubTopicReach)
	 		 	VALUES('".$UserID."', '".$subTopicID."', '".$subTopicReach."')";
		mysqli_query($connection, $sql_ins);
	
		$sql_get = "SELECT * FROM UserSubCurrentStudy WHERE UserID = '".$UserID."'";
    	$result_get = mysqli_query($connection, $sql_get) or die("Error in Selecting " . mysqli_error($connection));
        $emparray = array();
        if($row =mysqli_fetch_assoc($result_get))
    	{
			$myObj->UserID = $row['UserID'];
			$myObj->SubTopicReach = $row['SubTopicReach'];
			$myObj->SubTopicID = $row['SubTopicID'];
    	}
   	 	$myObj_body->Response = $myObj;
		echo json_encode($myObj_body);
	}
    //close the db connection
    mysqli_close($connection);
}
?>