<?php
include "../../include/session.php";
include "../db/conn.php";

try
{
	$data = array ( "title", "writer", "contents", "idx" );
	$update = $conn->prepare( "UPDATE board SET title = :title, writer = :writer, contents = :contents WHERE idx = :idx" );
	foreach($data as $k)
	{
		if ( !empty($_POST[$k]) )
		{
			$update->bindValue ( ':' .$k, $_POST[$k] );
		}
		else
		{
			echo "fail";
		}
	}
	$update->execute();
	echo "true";
}
catch ( PDOException $ex )
{
	echo "실패! : ".$ex->getMessage()."<br> error! : ".$ex->getCode()."<br> error! : ".$ex->getLine();
}
?>