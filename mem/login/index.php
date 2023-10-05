<?php include "../../include/session.php"; ?>

<!DOCTYPE html>
<html lang="ko">
	<head>
		<?php include "../../include/header.php"; ?>
		<title>Learn</title>
	</head>

	<body>
		<?php include "../../include/nav.php"; ?>
		<div class="main-cardsel">
			<h3><b> 로그인 해주세요.</b></h3>
		</div>
		<form name="join" method="POST" action="/control/login/login.php">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<th class="text-center">ID</th>
								<td><input type="text" class="form-control id" placeholder="UserID"  name="id" required></td>
							</tr>
							<tr>
								<th class="text-center">PASSWORD</th>
								<td><input type="password" class="form-control password" placeholder="Userpasswd"  name="password" required></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="row">
				<div class="col-sm-6 col-sm-offset-3 text-center">
					<div class="btn" role="group" aria-label="">
						<input type=submit value="Login" class="btn btn-default check">
						<a href="../../"> <button type=button class="btn btn-default">취소</button></a>
					</div>
				</div>
			</div>
		</form>
		<?php include "../../include/footer.php"; ?>

		<script src="https://code.jquery.com/jquery-3.3.1.min.js" language ="javascript"></script>
		<script type="text/javascript">
		$( ".check" ).on( "click", function()
		{
			var idpw = RegExp( /^[a-zA-Z0-9]{4,20}$/ ),
			     id = $( ".id" ).val(),
			     passsword = $( ".password" ).val();

			if ( id == "" || !idpw.test( id ) )
			{
				alert ( "ID를 확인 하세요!" );
				return false ;
			}
			else if ( passsword == "" || !idpw.test( passsword ) )
			{
				alert ( "패스워드를 다시 확인 하세요!" );
				return false ;
			}
				return true ;
		} );
		</script>
	</body>
</html>
