<?php
include "../../include/session.php";
include "../db/conn.php";

try
{
	$sql = $conn->prepare( "SELECT idx FROM reply WHERE idx = :idx and password = :password" );
	$sql->bindValue( ":idx", $_POST["idx"] );
	$sql->bindValue( ":password", $_POST["password"] );
	$sql->execute();
	$result = $sql->fetch();

	if ( !empty( $result ) )
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