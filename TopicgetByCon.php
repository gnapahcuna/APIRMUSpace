<?php
	error_reporting(0);
    error_reporting(E_ERROR | E_PARSE);
    include "config.php";
	
    $sql = "SELECT * FROM TopicMaster  where IsActive=1 ORDER BY TopicID";
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