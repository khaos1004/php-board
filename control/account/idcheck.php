<?php
include "../../include/session.php";
include "../db/conn.php";

$idch = $conn->prepare( "SELECT id FROM account WHERE id = :id" );
$idch->bindValue( ":id", $_POST["id"] );
$idch->execute();
$result = $idch->fetch();

$regex = array
	(
		"id" => "/^[a-zA-Z0-9]{4,20}$/",
	);

foreach( $regex as $k => $v  )
{
	if ( strlen( $_POST[$k] ) >= 4 && preg_match ( $v, $_POST[$k] ) )
	{
	echo  ( empty ( $result ) ? "true" : "fail" );
	}
}
