<?php
include "../../include/session.php";
include "../db/conn.php";

if( $_SESSION["id"] != null )
{
	$logout = $conn -> prepare( "INSERT INTO logout SET account_idx = :idx" );
	$logout -> bindValue( ":idx", $_SESSION["idx"] );
	$logout -> execute();
	unset( $_SESSION["id"], $_SESSION["idx"] );
	echo "<script>alert( '로그아웃 완료' ); location.href='../../'; </script>";
}