<?php
include "../../include/session.php";
include "../../class/board.php";

$class = new Board();
$result = $class->create(  $_POST  );

if ( $result == true )
{
	echo "true";
}
else
{
	echo "false";
}

?>


