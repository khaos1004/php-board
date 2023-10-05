<?php
include "../../include/session.php";
include "../db/conn.php";

try
{
	$sql = $conn->prepare( "SELECT idx, account_id FROM board WHERE idx = :idx" );
	$sql->bindValue( ":idx", $_POST["idx"] );
	$sql->execute();
	$result = $sql->fetch();

	if ( $result['account_id'] == $_SESSION['id'] )
	{
		echo "true";
	}
	else
	{
		echo "false";
	}
}
catch ( PDOException $ex )
{
	echo "실패! : ".$ex->getMessage()."<br> error! : ".$ex->getCode()."<br> error! : ".$ex->getLine();
}
?>