<?php
include "../../include/session.php";
include "../db/conn.php";

try
{
	$duplch = $conn->prepare( "SELECT id FROM account WHERE id = :id" );
	$duplch->bindValue( ":id", $_POST["id"] );
	$duplch->execute();
	$result = $duplch->fetch();

	//id 중복 검사
	if ( !empty( $result ) )
	{
		echo "<script>alert( '입력하신 아이디는 이미 있습니다, 다른아이디를 입력해주세요!' ); location.href='../../mem/account/create.php';</script>";
	}

	//정형화
	$regex = array
	(
		"id"=>"/^[a-zA-Z0-9]{4,20}$/",
		"password"=>"/^[a-zA-Z0-9]{4,20}$/",
		"name"=>"/^[가-힣]{2,4}|[a-zA-Z]{2,10}\s[a-zA-Z]{2,10}$/",
		"email"=>"/^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,6}$/i"
	);

	$pdoStatement = $conn->prepare( "INSERT INTO account SET id=:id, password=:password, name=:name, email=:email" );
	foreach ( $regex as $k=>$v )
	{
		if ( empty( $_POST[$k] ) || !preg_match ( $v, $_POST[$k] ) )
		{
			echo "<script>alert( '입력하신 내용을 확인해 주세요!' ); location.href='../../mem/account/create.php'</script>";
			break;
		}
		$pdoStatement->bindValue ( ":" . $k, $k === "password" ? hash( "sha256", $_POST[$k] ) : $_POST[$k] );
	}
	$pdoStatement->execute();
	echo "<script>alert( '환영합니다!' ); location.href='../../mem/login/'</script>";
}
catch ( PDOException $ex )
{
	echo "실패! : " .$ex->getMessage()."<br> error! : ".$ex->getCode()."<br> error! : ".$ex->getLine();
}
?>