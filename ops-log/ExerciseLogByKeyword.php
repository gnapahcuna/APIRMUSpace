<?php
	error_reporting(0);
    error_reporting(E_ERROR | E_PARSE);
    header('Content-Type: application/json; charset=utf-8');
    include "../config.php";

    $keyword = $_GET["keys"];
	
    $sql = "SELECT ex.UserID,ex.ExerciseID,ex.Answer,ex.Q
    FROM UserAnswerExerciseLog ex LEFT JOIN UserAccount acc on ex.UserID = acc.UserID 
    WHERE acc.UserName LIKE '%$keyword%' AND acc.AccountTypeID = 1";
    $result = mysqli_query($connection, $sql) or die("Error in Selecting " . mysqli_error($connection));
   
    $emparray = array();
    while($row =mysqli_fetch_assoc($result))
    {
       array_push($emparray,$row);
    }
    //$myObj_body->Response = $emparray;
	echo json_encode($emparray);

    //close the db connection
    mysqli_close($connection);
?>