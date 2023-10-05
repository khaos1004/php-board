<?php
include "../../include/session.php";
include "../../control/db/conn.php";

if ( !empty($_SESSION["id"]) )
{
	echo "<script>alert( '로그인 상태 입니다! 메인페이지로 이동합니다.' ); location.href='../../'</script>";
}
?>
<!DOCTYPE html>
<html lang="ko">
	<head>
		<?php include "../../include/header.php"; ?>
		<title>Learn</title>
	</head>

	<body>
		<?php include "../../include/nav.php"; ?>
		<div class="main-cardsel">
			<h3><b> 환영합니다.</b></h3>
		</div>

		<form name="join" method="POST" action="../../control/account/create.php">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<th class="text-center">ID</th>
								<td><input type="text" class="form-control1 idch" placeholder="UserID" required >
								<button type="button" class="btn btn-default btt-position idck">중복검사</button></td>
							</tr>
							<tr>
								<th class="text-center">PASSWORD</th>
								<td><input type="password" class="form-control pwd" placeholder="UserPasswd" name="password" required></td>
							</tr>
							<tr>
								<th class="text-center">PASSWORD 확인</th>
								<td><input type="password" class="form-control pwdch" placeholder="UserPasswd Check" name="passwordch" required></td>
							</tr>
							<tr>
								<th class="text-center">NAME</th>
								<td><input type="text" class="form-control namech" placeholder="Username"  name="name" required></td>
							</tr>
							<tr>
								<th class="text-center">EMAIL</th>
								<td><input type="text" class="form-control emailch" placeholder="Email" name="email" required></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3 text-center">
					<div class="btn">
						<input type=submit value="회원가입" class="btn btn-default check">
						<a href="../../"> <button type=button class="btn btn-default">취소</button></a>
					</div>
				</div>
			</div>
		</form>
		<?php include "../../include/footer.php"; ?>

		<script src="https://code.jquery.com/jquery-3.3.1.min.js" language ="javascript"></script>
		<script type="text/javascript">

			var	idpw_check = RegExp ( /^[a-zA-Z0-9]{4,12}$/ ),
				email_check = RegExp ( /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i ),
				name_check = RegExp ( /^[가-힣]{2,4}|[a-zA-Z]{2,10}\s[a-zA-Z]{2,10}$/ ),
				idck = 0;

			$( function()
			{
				$( ".idck" ).on( "click", function()
				{
					var	id =  $( ".idch" ).val();
					if ( idpw_check.test( id ) )
					{
						// POST 방식으로 서버에 요청을 보냄.
						$.ajax
						( {
							url: "../../control/account/idcheck.php",
							type: "POST",
							data: { "id": id },
							success : function( data )
							{
								if ( data == "true" )
								{
									alert ( "아이디 사용 가능합니다." );
									return idck = 1;
								}
								else
								{
									alert ( "아이디가 중복됩니다, 아이디를 확인 해주세요." );
								}
							}
						} );
					}
					else
					{
						alert ( "아이디는 4자리이상 12자리 이하, 영문자 숫자로 입력 해주세요." );
					}
				} );


				//각 항목 체크하는 정규식
				$( ".check" ).on( "click", function()
				{
					var	password =  $( ".pwd" ).val() ,
						name = $( ".namech").val() ,
						email = $( ".emailch" ).val();

					if( idck == 0 )
					{
						alert ( "ID중복체크 해주세요!" ) ;
						return false ;
					}
					else if ( password == "" || !idpw_check.test ( password) )
					{
						alert ( "패스워드는 영문자 4자 이상 12자 이하 입니다. 다시 확인 하세요!" ) ;
						return false ;
					}

					else if ( password != $( ".pwdch" ).val() )
					{
						alert ( "패스워드가 같지 않습니다, 다시 확인 하세요!" ) ;
						return false ;
					}

					else if ( name == "" || !name_check.test ( name ) )
					{
						alert ( "이름을 확인 하세요! 한글만 허용 됩니다!" ) ;
						return false ;
					}

					else if ( email == "" || !email_check.test ( email ) )
					{
						alert ( "이메일의 예제 형식은 test@test.com 입니다, 확인 해주세요!" ) ;
						return false ;
					}
					return true ;
				} );
			} );
		</script>
	</body>
</html>