<?php
include "../../include/session.php";
include "../../control/db/conn.php";

if ( empty($_SESSION["id"]) )
{
	echo "<script>alert( '로그인한 사용자만 수정 가능 합니다, 해당 창 닫습니다.' ); self.close();</script>";
}

$sql = $conn -> prepare( "SELECT name, email FROM account WHERE id = :id" );
$sql -> bindValue ( ":id", $_SESSION["id"] );
$sql -> execute();
$result = $sql -> fetch();
$reid = $result['id'];
?>
<!DOCTYPE html>
<html lang="ko">
	<head>
		<?php include "../../include/header.php"; ?>
		<title>Learn</title>
	</head>

	<body>
		<div class="main-cardsel">
			<h3><b> 회원정보 수정 페이지 입니다.</b></h3>
		</div>
		<form name="join" method="POST" action="../../control/account/update.php">
			<div class="row">
				<div class="col-sm-2">
					<div class="list-group">
						<a class="list-group-item disabled">회원정보 수정</a>
						<a href="update.php" class="list-group-item">회원정보 변경</a>
						<a href="password.php" class="list-group-item">패스워드 변경</a>
					</div>
				</div>
				<div class="col-sm-4 col-sm-offset-2">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<th class="text-center">NAME</th>
								<td><input type="text" class="form-control namech" placeholder="변경할 이름" value=<?= $result["name"] ?> name="name" required></td>
							</tr>
							<tr>
								<th class="text-center">EMAIL</th>
								<td><input type="text" class="form-control emailch" placeholder="변경할 이메일" value=<?= $result["email"] ?> name="email"  required></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6 col-sm-offset-3 text-center">
					<div class="btn">
						<input type=submit value="확인" class="btn btn-default check">
						<button type=button class="btn btn-default close_pop">취소</button>
					</div>
				</div>
			</div>
		</form>
		<?php include "../../include/footer.php"; ?>

		<script src="https://code.jquery.com/jquery-3.3.1.min.js" language ="javascript"></script>
		<script type="text/javascript">

			$( ".close_pop" ).on( "click", function()
			{
				self.close();
			} );

			var email_check = RegExp ( /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i ),
			     name_check = RegExp ( /^[가-힣]{2,4}|[a-zA-Z]{2,10}\s[a-zA-Z]{2,10}$/ ) ;

			//각 항목 체크하는 정규식
			$( ".check" ).on( "click", function()
			{
				var name = $( ".namech" ).val(),
				     email = $( ".emailch" ).val();

				if ( name == "" || !name_check.test ( name ) )
				{
					alert ( "이름을 확인 하세요! 한글만 가능 합니다." ) ;
					return false ;
				}

				else if ( email == "" ||!email_check.test ( email ) )
				{
					alert ( "이메일의 예제 형식은 test@test.com 입니다, 확인 해주세요!" ) ;
					return false ;
				}
				return true ;
			} );
		</script>
	</body>
</html>