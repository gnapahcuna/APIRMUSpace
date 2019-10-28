<?php
	error_reporting(0);
	error_reporting(E_ERROR | E_PARSE);
    include "config.php";
   
	$_POST = json_decode(file_get_contents('php://input'), true);
	foreach ( $_POST as $key => $value ) {
		$UserID = $value['UserID'];
		$QuestionID = $value['QuestionID'];
		$Answer = $value['Answer'];
		
		/*$sql = "SELECT * FROM UserAnswerQuestionLog WHERE UserID='".$UserID."' AND QuestionID='".$QuestionID."'";
    	$result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
    	if($row =mysqli_fetch_assoc($result))
    	{
			$sql_up = "UPDATE UserAnswerQuestionLog SET Answer = '".$Answer."',Q = '".$q."',EF = '".$EF."'  WHERE UserID ='".$UserID."' AND QuestionID='".$QuestionID."'";
			mysqli_query($connection, $sql_up);
			
		}else{
			$sql_ins = "insert into UserAnswerQuestionLog (UserID,QuestionID,Answer,Q,EF)
	 		 	VALUES('".$UserID."', '".$QuestionID."', '".$Answer."', '".$q."', '".$EF."')";
			mysqli_query($connection, $sql_ins);
		}*/
		$sql_ins = "insert into UserAnswerQuestionLog (UserID,QuestionID,Answer)
	 		 	VALUES('".$UserID."', '".$QuestionID."', '".$Answer."')";
		mysqli_query($connection, $sql_ins);
		
    }
	mysqli_close($connection);
	
?>