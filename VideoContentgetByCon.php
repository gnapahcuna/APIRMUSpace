<?php
	error_reporting(0);
	error_reporting(E_ERROR | E_PARSE);
    include "config.php";
	
	$LevelID = $_POST['LevelID'];
	$SubTopicID = $_POST['SubTopicID'];
	
    $sql = "SELECT vd.VideoID,vd.VideoName,lv.LevelID,lv.LevelName,vd.VideoName,vd.URL,vd.SubTopicID,stp.SubTopicName FROM (VideoContent vd LEFT JOIN SubTopicMaster stp on vd.SubTopicID=stp.SubTopicID) LEFT JOIN LevelMaster lv on vd.LevelID = lv.LevelID 
    WHERE lv.LevelID = '".$LevelID."' AND stp.SubTopicID = '".$SubTopicID."'";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
   
   	$myObj_body->Success = true;
	$emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
       array_push($emparray,$row);
    }
    $myObj_body->Response = $emparray;
	echo json_encode($myObj_body);

    mysqli_close($connection);
?>