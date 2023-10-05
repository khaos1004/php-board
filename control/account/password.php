<?php
include "../../include/session.php";
include "../db/conn.php";

try
{
	$password = $_POST["password"];
	$alert = "location.href='../../mem/account/password.php'";

	//정규식 배열
	$regex = array
	(
		"password"=>"/^[a-zA-Z0-9]{4,20}$/"
	);

	// 기존비밀번호 확인
	$sql_old = $conn->prepare( "SELECT idx, password  FROM account WHERE id = :id and password = :password" );
	$sql_old->bindValue( ":id", $_SESSION["id"] );
	$sql_old->bindValue( ":password", hash( "sha256", $_POST["password_old"] ) );
	$sql_old->execute();
	$result_old = $sql->fetch();

	$sq_new = $conn->prepare( "SELECT idx, password  FROM account WHERE id = :id and password = :password" );
	$sql_new->bindValue( ":id", $_SESSION["id"] );
	$sql_new-> bindValue( ":password", hash( "sha256", $_POST["password"] ) );
	$sql_new->execute();
	$result_new = $sql->fetch();

	//기존 DB에 hash로 저장되어있던 기존 패스워드와 입력한 전 비밀번호 확인
	if ( $result_old["idx"] != $_SESSION["idx"] )
		echo "<script>alert( '기존패스워드가 일치하지 않습니다, 확인해주세요.' );".$alert."</script>";

	//  새로 변경할 패스워드가 기존 DB에 hash로 저장된 값과 같으면 에러 출력
	if ( $result_old["idx"] == $result_new["idx"] )
		echo "<script>alert( '기존 패스워드랑 변경할 패스워드는 같을수 없습니다, 확인해주세요.' );".$alert."</script>";

	//변경할 패스워드 입력값과 패스워드 체크 입력값이 같은지 체크
	if ( $_POST["password"] != $_POST["passwordch"] )
		echo "<script>alert( '변경할 패스워드가 같지 않습니다, 확인해주세요.' );".$alert."</script>";


	if ( empty( $password ) || !preg_match ( $regex["password"], $password ) )
	{
		echo "<script>alert( '입력하신 패스워드를 확인해 주세요!' );.$alert.</script>";
	}
	else
	{
	$pdoStatement = $conn->prepare( "UPDATE account SET password=:password WHERE id = :id" );
	$pdoStatement->bindValue( ":password", hash("sha256", $password) );
	$pdoStatement->bindValue( ":id", $_SESSION["id"] );
	$pdoStatement->execute();
	echo "<script>alert( '패스워드 변경 완료!' ); self.close()</script>";
	}
}
catch ( PDOException $ex )
{
	echo "실패! : " .$ex->getMessage()."<br> error! : ".$ex->getCode()."<br> error! : ".$ex->getLine();
}
?>