<?php
include "../../include/session.php";
include "../db/conn.php";

try
{
	//정규식 배열
	$regex = array
	(
		"name" => "/^[가-힣]{2,4}|[a-zA-Z]{2,10}\s[a-zA-Z]{2,10}$/",
		"email" => "/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i"
	);

	$pdoStatement = $conn -> prepare( "UPDATE account SET name=:name, email=:email WHERE id = :id" );
	$pdoStatement -> bindValue( ":id", $_SESSION["id"] );
	foreach ( $regex as $k => $v )
	{
		if ( empty( $_POST[$k] ) || !preg_match ( $v, $_POST[$k] ) )
		{
			echo "<script>alert( '입력하신 이름과 이메일을 확인해 주세요!' ); location.href='../../mem/account/password_change.php';</script>";
			break;
		}
		$pdoStatement -> bindValue( ":" . $k, $k === "password" ? hash( "sha256", $_POST[$k] ) : $_POST[$k] );
	}

	$pdoStatement -> execute();
	echo "<script>alert( '회원정보 수정 완료!' ); self.close(); </script>";
}
catch ( PDOException $ex )
{
	echo "실패! : " .$ex -> getMessage()."<br> error! : ".$ex -> getCode()."<br> error! : ".$ex -> getLine();
}
?>