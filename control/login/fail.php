<?php
include "../../include/session.php";
include "../../include/key.php";

$encrypted = $_POST["request"];

//최대 문자열길이 체크
if ( strlen( $encrypted ) < 15 )
{
	echo "<script>alert( '암호화 길이가 맞지 않습니다 다시 확인해 주세요' ); location.href='../../mem/login/fail.php'</script>";
}
//복호화 기능
$decrypted = openssl_decrypt( base64_decode( $encrypted ), "aes-256-cbc", $key );
	echo "<script>alert( '로그인 실패 암호는 ' . $decrypted . ' 입니다, 확인해 주세요' ); location.href='../../mem/login/fail.php'</script>";
?>