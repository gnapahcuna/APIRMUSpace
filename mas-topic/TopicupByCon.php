<?php
header('Access-Control-Allow-Origin: http://kurupan.tech');
header('Content-Type: application/json; charset=utf-8');
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
include "../config.php";

//$data = json_decode(file_get_contents('php://input'), true);
$keyword = $_GET["keys"];
$TopicName = $_GET["TopicName"];
$IsActive = $_GET["IsActive"];

$sql = "UPDATE TopicMaster SET TopicName = '".$TopicName."', IsActive = '".$IsActive."' WHERE TopicID ='".$keyword."'";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
    if($result===true)
    {
       $myObj_body->IsSuccess = true;
    }else{
        $myObj_body->IsSuccess = false;
    }
	echo json_encode($myObj_body);

    //close the db connection
    mysqli_close($connection);
?>