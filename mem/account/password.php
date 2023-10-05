<?php
include "../../include/session.php";

if ( empty($_SESSION["id"]) )
{
	echo "<script>alert( '로그인한 사용자만 수정 가능 합니다, 해당 창 닫습니다.' ); self.close();</script>";
}
?>

<!DOCTYPE html>
<html lang="ko">
	<head>
		<?php include "../../include/header.php"; ?>
		<title>Learn</title>
	</head>

	<body>
		<div class="main-cardsel">
			<h3><b> 패스워드 변경 페이지 입니다.</b></h3>
		</div>

		<form name="join" method="POST" action="../../control/account/password.php">
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
								<th class="text-center">기존 PASSWORD</th>
								<td><input type="password" class="form-control pwd_old" placeholder="기존 PASSWORD 확인 " name="password_old" required></td>
							</tr>
							<tr>
								<th class="text-center">변경할 PASSWORD</th>
								<td><input type="password" class="form-control pwd" placeholder="PASSWORD 변경" name="password" required></td>
							</tr>
							<tr>
								<th class="text-center">변경할 PASSWORD 확인</th>
								<td><input type="password" class="form-control pwdch" placeholder="PASSWORD 변경 확인" name="passwordch"  required></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class="row">
				<div class="col-sm-6 col-sm-offset-3 text-center">
					<div class="btn">
						<input type=submit value="확인" class="btn btn-default check ">
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


			var pw_check = RegExp ( /^[a-zA-Z0-9]{4,12}$/ );
			//각 항목 체크하는 정규식
			$( ".check" ).on( "click", function()
			{
				var password = $( ".pwd" ).val();
				if ( password == $( ".pwd_old]" ).val() )
				{
					alert ( "기존 패스워드랑 변경할 패스워드는 같을 수 없습니다, 다른 패스워드를 입력해주세요 " ) ;
					return false ;
				}
				else if ( password == "" || !pw_check.test( password ) )
				{
					alert ( "패스워드는 영문자 4자 이상 12자 이하 입니다. 다시 확인 하세요!" ) ;
					return false ;
				}
				else if ( password != $( ".pwdch]").val(); )
				{
					alert ( "패스워드가 같지 않습니다, 다시 확인 하세요!" ) ;
					return false ;
				}
			} );
		</script>
	</body>
</html>