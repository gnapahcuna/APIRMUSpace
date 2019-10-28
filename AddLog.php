<?php
	error_reporting(0);
	error_reporting(E_ERROR | E_PARSE);
    include "config.php";
	
    $LevelName = $_POST['LevelName'];
    $SubTopicID = $_POST['SubTopicID'];
	$UserID = $_POST['UserID'];
	$I = $_POST['I'];
	$EF = $_POST['EF'];
	
	$sql = "insert into ops_logtest (UserID,SubTopicID,I,EF,LevelName)
	 		 	VALUES('".$UserID."', '".$SubTopicID."', '".$I."', '".$EF."', '".$LevelName."')";
	mysqli_query($connection, $sql);

    mysqli_close($connection);
?>