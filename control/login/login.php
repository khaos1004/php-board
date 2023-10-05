<?php
include "../../include/session.php";
include "../../include/key.php";
include "../db/conn.php";

try
{
	$ip = $_SERVER["REMOTE_ADDR"];
	$id = $_POST["id"];
	$password = $_POST["password"];

	if ( empty( $_POST["id"] ) )
	{
		echo "<script>alert( '아이디 또는 패스워드를 확인해 주세요.' ); location.href='../../mem/login/'</script>";
	}
	else
	{
		$login = $conn->prepare( "SELECT idx FROM account WHERE id = :id and password = :password" );
		$login->bindValue( ":id", $id);
		$login->bindValue( ":password", hash("sha256", $password));
		$login->execute();
		$result = $login->fetch( PDO::FETCH_ASSOC );
	}

	if ( $result["idx"] != null )
	{
		$_SESSION["id"] = $id;
		$_SESSION["idx"] = $result["idx"];
		$statement = $conn->prepare( "INSERT INTO login SET account_idx = :idx, ip=:ip" );
		$statement -> bindValue( ":ip", $ip );
		$statement -> bindValue( ":idx", $result["idx"] );
		$statement -> execute();
		echo "<script>alert( '환영합니다 " . $_SESSION['id'] . " 님' ); location.href='../../'</script>";
	}
	else
	{
		$encrypted = base64_encode(openssl_encrypt( $password, "aes-256-cbc", $key ) );
		$statement = $conn -> prepare( "INSERT INTO login_fail SET id = :id, password = :password, ip = :ip" );
		$statement -> bindValue( ":id", $id );
		$statement -> bindValue( ":password", $encrypted );
		$statement -> bindValue( ":ip", $ip );
		$result = $statement->execute();
		echo "<script>alert( 'ID가 없거나 Password가 일치하지 않습니다.' ); location.href='../../'</script>";
	}
}

catch ( PDOException $ex )
{
	echo "실패! : " .$ex -> getMessage()."<br> error! : ".$ex -> getCode()."<br> error! : ".$ex -> getLine();
}
?>