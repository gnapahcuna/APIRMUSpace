<?php
error_reporting(0);
error_reporting(E_ERROR | E_PARSE);
header('Content-Type: application/json; charset=utf-8');
include "../config.php";

//$data = json_decode(file_get_contents('php://input'), true);
$keyword = $_GET["keys"];
$UnitName = $_GET["UnitName"];
$UnitValue = $_GET["UnitValue"];
$IsActive = $_GET["IsActive"];

$sql = "UPDATE UnitMaster SET UnitName = '".$UnitName."', UnitValue = '".$UnitValue."', IsActive = '".$IsActive."' WHERE UnitID ='".$keyword."'";
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