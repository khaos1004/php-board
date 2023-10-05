<?php
include "../../include/session.php";
include "../../class/check.php";

if( $_GET["found"] == "idch" )
{
	$class = new Check ();
	$result = $class->idch(  $_POST  );
}
else if ( $_GET["found"] == "passch" )
{
	$class = new Check();
	$result = $class->passch(  $_POST  );
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