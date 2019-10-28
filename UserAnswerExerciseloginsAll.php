<?php
	error_reporting(0);
	error_reporting(E_ERROR | E_PARSE);
    include "config.php";
   
	$_POST = json_decode(file_get_contents('php://input'), true);
	foreach ( $_POST as $key => $value ) {
		$UserID = $value['UserID'];
		$ExerciseID = $value['ExerciseID'];
		$Answer = $value['Answer'];
		$q = $value['q'];
		$EF = $value['EF'];
		
		/*$sql = "SELECT * FROM UserAnswerExerciseLog WHERE UserID='".$UserID."' AND ExerciseID='".$ExerciseID."'";
    	$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
    	if($row =mysqli_fetch_assoc($result))
    	{
			$sql_up = "UPDATE UserAnswerExerciseLog SET Answer = '".$Answer."',Q = '".$q."',EF = '".$EF."'  WHERE UserID ='".$UserID."' AND ExerciseID='".$ExerciseID."'";
			mysqli_query($connection, $sql_up);
			
		}else{
			$sql_ins = "insert into UserAnswerExerciseLog (UserID,ExerciseID,Answer,Q,EF)
	 		 	VALUES('".$UserID."', '".$ExerciseID."', '".$Answer."', '".$q."', '".$EF."')";
			mysqli_query($connection, $sql_ins);
		}*/
		$sql_ins = "insert into UserAnswerExerciseLog (UserID,ExerciseID,Answer,Q,EF)
	 		 	VALUES('".$UserID."', '".$ExerciseID."', '".$Answer."', '".$q."', '".$EF."')";
		mysqli_query($connection, $sql_ins);
		
    }
	mysqli_close($connection);
	
?>