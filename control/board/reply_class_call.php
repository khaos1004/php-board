<?php
include "../../include/session.php";
include "../../class/reply.php";

if( $_GET["found"] == "create" )
{
	$class = new Reply ();
	$result = $class->create(  $_POST  );
}
else if ( $_GET["found"] == "delete" )
{
	$class = new Reply();
	$result = $class->delete(  $_POST  );
}
else if ( $_GET["found"] == "update" )
{
	$class = new Reply();
	$result = $class->update(  $_POST  );
}
else if ( $_GET["found"] == "passwordch" )
{
	$class = new Reply();
	$result = $class->passwordch(  $_POST  );
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