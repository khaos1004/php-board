<?php
include "../../include/session.php";
include "../db/conn.php";

try
{
	$ch = array ("name", "contents", "idx");
	$sql = $conn->prepare( "UPDATE reply SET name = :name, contents = :contents WHERE idx =:idx" );
	if ( !empty( $_POST["name"]) && !empty( $_POST["contents"] ) )
	{
		foreach ( $ch as $v )
		{
			$sql->bindValue( ":".$v, $_POST[$v] );
		}
		$sql->execute();
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