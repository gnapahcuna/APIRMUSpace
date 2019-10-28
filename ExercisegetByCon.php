<?php
	error_reporting(0);
	error_reporting(E_ERROR | E_PARSE);
    include "config.php";
	
    $SubTopicID = $_POST['SubTopicID'];
	$IsFirst = $_POST['IsFirst'];
	if($IsFirst==1){
    	$sql = "SELECT ex.ExerciseID,ex.Question,ex.EF,ex.Answer,ex.ChoiceA,ex.ChoiceB,ex.ChoiceC,ex.ChoiceD,stp.SubTopicID,stp.SubTopicName 
		FROM ExerciseMaster ex LEFT JOIN SubTopicMaster stp on ex.SubTopicID = stp.SubTopicID WHERE ex.IsActive=1 
    	AND ex.SubTopicID='".$SubTopicID."' ORDER BY RAND() DESC LIMIT 1";
	}else{
		$sql = "SELECT ex.ExerciseID,ex.Question,ex.EF,ex.Answer,ex.ChoiceA,ex.ChoiceB,ex.ChoiceC,ex.ChoiceD,stp.SubTopicID,stp.SubTopicName 
		FROM ExerciseMaster ex LEFT JOIN SubTopicMaster stp on ex.SubTopicID = stp.SubTopicID WHERE ex.IsActive=1 
    	AND ex.SubTopicID='".$SubTopicID."' ORDER BY RAND() DESC LIMIT 1";
	}
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