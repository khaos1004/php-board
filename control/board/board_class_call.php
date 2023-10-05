<?php
include "../../include/session.php";
include "../../class/board.php";

$class = new Board ();

if( $_GET["find"] == "create" )
{
	$result = $class->create(  $_POST  );
}
else if ( $_GET["found"] == "delete" )
{
	$result = $class->delete(  $_POST  );
}
else if ( $_GET["found"] == "update" )
{
	$result = $class->update(  $_POST  );
}
else
{
	echo "false";
}

if ( $result == true )
{
	echo "true";
}
else
{
	echo "false";
}

?>