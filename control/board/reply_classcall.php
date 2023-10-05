<?php
include "../../include/session.php";
include "../../class/reply.php";

if( $_POST["found"] == "create" )
{
	$class = new Reply ();
	$result = $class->create(  $_POST  );
}
else if ( $_POST["found"] == "delete" )
{
	$class = new Reply();
	$result = $class->delete(  $_POST  );
}
else if ( $_POST["found"] == "update" )
{
	$class = new Reply();
	$result = $class->update(  $_POST  );
}
else if ( $_POST["found"] == "passwordch" )
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