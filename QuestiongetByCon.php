<?php
	error_reporting(0);
	error_reporting(E_ERROR | E_PARSE);
    include "config.php";
	
    $LevelID = $_POST['LevelID'];
    $TopicID = $_POST['TopicID'];
	$sql = "SELECT qt.QuestionID,qt.Question,qt.CF,lv.LevelName,qt.EF,qt.Answer,qt.ChoiceA,qt.ChoiceB,qt.ChoiceC,qt.ChoiceD,tp.TopicID,tp.TopicName 
		FROM (QuestionMaster qt LEFT JOIN TopicMaster tp on qt.TopicID = tp.TopicID) LEFT JOIN LevelMaster lv on qt.LevelID = lv.LevelID WHERE qt.IsActive=1 
    	AND lv.LevelID='".$LevelID."' AND qt.TopicID='".$TopicID."' ORDER BY RAND() DESC LIMIT 3";
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