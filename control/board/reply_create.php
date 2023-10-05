<?php
include "../../include/session.php";
include "../../class/reply.php";

//if( count( $_POST ) == 4 )
//{
//	$class = new Reply ();
//	$result = $class->create(  $_POST  );
//}
//else if ( count( $_POST ) == 21 )
//{
//	$class = new Reply();
//	$result = $class->delete(  $_POST  );
//}
//else if ( count( $_POST ) == 3 )
//{
//	$class = new Reply();
//	$result = $class->update(  $_POST  );
//}
//else if ( count( $_POST ) == 41 )
//{
//	$class = new Reply();
//	$result = $class->passwordch(  $_POST  );
//}
//else
//{
//	echo "false";
//}


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


//try
//{	$password = $_POST["password"];
//	$reply = $conn->prepare( "INSERT INTO reply SET board_idx = :board_idx, name = :name, password = :password, contents = :contents, ip = :ip" );
//	$data = array ( "board_idx", "name", "password", "contents", "ip" );
//	if( is_numeric( $password ) && strlen( $password ) == 4  )
//	{
//		foreach ( $data as $k )
//		{
//			$reply->bindValue( ":".$k, $k == "ip" ? $_SERVER["REMOTE_ADDR"] : $_POST[$k] );
//		}
//		$reply->execute();
//		$comment_up = $conn->prepare( "UPDATE board SET comment = comment +1 WHERE idx = :idx" );
//		$comment_up->bindValue( ":idx", $_POST["board_idx"] );
//		$comment_up->execute();
//		echo "true";
//	}
//	else
//	{
//		echo "false";
//	}
//}
//catch ( PDOException $ex )
//{
//	echo "실패! : ".$ex->getMessage()."<br> error! : ".$ex->getCode()."<br> error! : ".$ex->getLine();
//}
?>