<?php
include "../../include/session.php";
include "../db/conn.php";

try
{
	$idx = $_POST["idx"];
	$sql = $conn->prepare( "SELECT idx FROM reply where idx = :idx and password = :password" );
	$sql->bindValue( ":idx", $_POST["idx"] );
	$sql->bindValue( ":password", $_POST["password"] );
	$sql->execute();
	$result = $sql->fetch();

	if ( !empty( $result ) )
	{
		$delete_reply = $conn->prepare( "DELETE FROM reply WHERE idx = :idx" );
		$delete_reply->bindValue( ":idx",  $_POST["idx"] );
		$delete_reply->execute();
		$comment_up = $conn->prepare( "UPDATE board SET comment = comment -1 WHERE idx = :idx" );
		$comment_up->bindValue( ":idx", $_POST["board_idx"] );
		$comment_up->execute();
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