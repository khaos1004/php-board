<?php
include "../../include/session.php";
include "../db/conn.php";

try
{
	$idx = $_POST["idx"];
	$sql = $conn->prepare( "SELECT idx FROM board where idx = :idx and password = :password" );
	$sql->bindValue( ":idx", $idx );
	$sql->bindValue( ":password", $_POST["password"] );
	$sql->execute();
	$result = $sql->fetch();

	if ( !empty( $result ) )
	{
		$delete_view = $conn->prepare( "DELETE FROM view WHERE board_idx = :idx" );
		$delete_view->bindValue( ":idx",  $idx );
		$delete_view->execute();

		$delete_board = $conn->prepare( "DELETE FROM board WHERE idx = :idx" );
		$delete_board->bindValue( ":idx",  $idx );
		$delete_board->execute();
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