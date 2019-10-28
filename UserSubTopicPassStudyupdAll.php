<?php
	error_reporting(0);
	error_reporting(E_ERROR | E_PARSE);
    include "config.php";
	
	$TopicID = $_POST['TopicID'];
    $SubTopicID = $_POST['SubTopicID'];
	$UserID = $_POST['UserID'];
	$I = $_POST['I'];
	
	
	$sql = "SELECT * FROM UserSubTopicPassStudy WHERE UserID= '".$UserID."' AND TopicID='".$TopicID."' AND SubTopicID='".$SubTopicID."'";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
    if($row =mysqli_fetch_assoc($result))
    {
		$_count = $row['NumberOfRepeated']+$i;
        $sql_upd = "UPDATE UserSubTopicPassStudy SET NumberOfRepeated = '".$_count."' 
		WHERE UserID ='".$row['UserID']."' AND TopicID = '".$row['TopicID']."' AND SubTopicID = '".$row['SubTopicID']."'";
        mysqli_query($connection, $sql_upd);
		
		
		$sql_get = "SELECT * FROM UserSubTopicPassStudy WHERE UserID = '".$UserID."'";
    	$result_get = mysqli_query($connection, $sql_get) or die("Error in Selecting " . mysqli_error($connection));
        
		$emparray = array();
    	while($row =mysqli_fetch_assoc($result_get))
    	{
       		array_push($emparray,$row);
    	}
    	$myObj_body->Response = $emparray;
		echo json_encode($myObj_body);
		
    }else{
		$sql = "insert into UserSubTopicPassStudy (UserID,TopicID,SubTopicID,NumberOfRepeated)
	 		 	VALUES('".$UserID."', '".$TopicID."', '".$SubTopicID."', '".$I."')";
		mysqli_query($connection, $sql);
	
		$sql_get = "SELECT * FROM UserSubTopicPassStudy WHERE UserID = '".$UserID."'";
    	$result_get = mysqli_query($connection, $sql_get) or die("Error in Selecting " . mysqli_error($connection));
        
		$emparray = array();
    	while($row =mysqli_fetch_assoc($result_get))
    	{
       		array_push($emparray,$row);
    	}
    	$myObj_body->Response = $emparray;
		echo json_encode($myObj_body);
	}
    //close the db connection
    mysqli_close($connection);

?>