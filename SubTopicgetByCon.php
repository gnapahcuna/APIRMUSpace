<?php
	error_reporting(0);
    error_reporting(E_ERROR | E_PARSE);
    include "config.php";
	$topicID = $_POST['TopicID'];
    $sql = "SELECT * FROM SubTopicMaster  where IsActive=1 AND TopicID = $topicID ORDER BY SubTopicID";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
   
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
       array_push($emparray,$row);
    }
    $myObj_body->Response = $emparray;
	echo json_encode($myObj_body);

    //close the db connection
    mysqli_close($connection);
?>