<?php
include "../../include/session.php";
include "../../control/db/conn.php";

//관리자가 아니면 웹페이지 이동 불가
if ( $_SESSION["id"] != "admin" )
{
	echo "<script>alert( '관리자가 아닙니다! 메인페이지로 이동합니다.' ); location.href='../../';</script>";
}

//로그인 실패 기록 관리자가 볼수있게 최대 12개로 테이블형식으로 생성
$sql = "SELECT idx, id, password, ip, date_insert FROM login_fail LIMIT 12";
$sql = $conn -> query( $sql );
$sql_sel = $sql -> fetchall( PDO::FETCH_NUM );
$tr = "";
foreach ( $sql_sel as $k => $v )
{
	foreach ( $v as $k2 => $v2 )
	{
		switch( $k2 )
		{
			case 0:
				$tr .= "<tr><td>$v2</td>";
				break;
			case 1:
				$tr .= "<td>$v2</td>";
				break;
			case 2:
				$tr .= "<td>$v2</td>";
				break;
			case 3:
				$tr .= "<td>$v2</td>";
				break;
			case 4:
				$tr .= "<td>$v2</td></tr>";
				break;
		}
	}
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
			<h3><b> 로그인 실패 조회</b></h3>
		</div>
		<form name="fail" method="POST" action="../../control/login/fail.php">
			<div class="row">
				<div class="col-sm-4 col-sm-offset-4">
					<table class="table table-bordered">
						<tbody>
							<tr>
								<th class="text-center">복호화하기</th>
								<td><input type="text" class="form-control" placeholder="테이블에서 패스워드 부분 복사 붙여넣기" name="request"></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>

			<div class = "row">
				<div class = "col-sm-4 col-sm-offset-4 text-center">
					<div class = "btn" role = "group" aria-label = "">
						<input type = submit value = "복호화" class = "btn btn-default">
						<a href = "../../"> <button type = button class = "btn btn-default">취소</button></a>
					</div>
				</div>
			</div>
		</form>
		<div class="row">
			<div class="col-sm-8 col-sm-offset-2">
				<table class="table table-striped table-bordered table-hover table-condensed text-center">
					<thead>
						<tr>
							<th class="text-center">idx</th>
							<th class="text-center">아이디</th>
							<th class="text-center">패스워드</th>
							<th class="text-center">접속 IP</th>
							<th class="text-center">로그인 시도 시간</th>
						</tr>
					</thead>
					<tbody>
						<?= $tr ?>
					</tbody>
				</table>
			</div>
		</div>
		<?php include "../../include/footer.php"; ?>
	</body>
</html>