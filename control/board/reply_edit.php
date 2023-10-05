<?php
include "../../include/session.php";
include "../db/conn.php";

try
{
	$idx = $_POST["idx"];
	$sql = $conn->prepare( "SELECT idx FROM reply where board_idx = :board_idx and password = :password" );
	$sql->bindValue( ":board_idx", $_POST["board_idx"] );
	$sql->bindValue( ":password", $_POST["password"] );
	$sql->execute();
	$result = $sql->fetch();

	if ( !empty( $result ) )
	{
		$delete_reply = $conn->prepare( "DELETE FROM view WHERE board_idx = :idx" );
		$delete_reply->bindValue( ":idx",  $idx );
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