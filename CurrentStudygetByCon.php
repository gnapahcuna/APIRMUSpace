<?php
	error_reporting(0);
	error_reporting(E_ERROR | E_PARSE);
    include "config.php";
    
    $userID = $_POST['UserID'];
    $sql = "SELECT * FROM UserCurrentStudy WHERE UserID=$userID";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
   
    $emparray = array();
    if($row =mysqli_fetch_assoc($result))
    {
		$myObj->UserID = $row['UserID'];
		$myObj->TopicReach = $row['TopicReach'];
		$myObj->TopicID = $row['TopicID'];
    }
    $myObj_body->Response = $myObj;
	echo json_encode($myObj_body);

    //close the db connection
    mysqli_close($connection);
?>