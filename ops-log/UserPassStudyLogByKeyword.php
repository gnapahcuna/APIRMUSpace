<?php
	error_reporting(0);
    error_reporting(E_ERROR | E_PARSE);
    header('Content-Type: application/json; charset=utf-8');
    include "../config.php";

    $keyword = $_GET["keys"];
	
    $sql = "SELECT p.UserID,p.SubTopicID,p.NumberOfRepeated,stp.SubTopicName
    FROM UserSubTopicPassStudy p LEFT JOIN UserAccount acc on p.UserID = acc.UserID
    LEFT JOIN SubTopicMaster stp on p.SubTopicID = stp.SubTopicID  
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