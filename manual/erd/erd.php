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
			<h3><b> 회원 ERD 설명 입니다.</b></h3>
		</div>
		<div class="row">
			<div class="col-sm-2">
				<div class="list-group">
					<a class="list-group-item disabled">
						ERD 목록
					</a>
					<a href="/manual/erd" class="list-group-item">ERD</a>
					<a href="erd.php" class="list-group-item">회원 ERD</a>
					<a href="board.php" class="list-group-item">게시판 ERD</a>
				</div>
			</div>

			<div class="col-sm-9">
				<div class="panel panel-default">
					<div class="panel-heading"><h1>ERD 설명<br></h1></div>
					<img src="/image/erd20210719.png" width="60%" height="300%" class="img-responsive center-block" style="margin-bottom: 100px;">
				</div>

					<div class="panel panel-default">
						<div class="panel-heading"><h3> 회원가입</h3></div>
						<table class="table table-striped table-bordered table-hover table-condensed text-center">
							<thead>
								<tr>
									<th class="text-center">Columm Name</th>
									<th class="text-center">DataType</th>
									<th class="text-center">Constraint</th>
									<th class="text-center">설명</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>idx</td>
									<td>int(11)</td>
									<td>NOT NULL, AUTO_INCREMENT, PRIMARY KEY, UNIQUE INDEX</td>
									<td>회원 고유번호</td>
								</tr>
								<tr >
									<td>id</td>
									<td>VARCHAR(20)</td>
									<td>NOT NULL, UNIQUE INDEX</td>
									<td>회원 ID</td>
								</tr>
								<tr>
									<td>password</td>
									<td>CHAR(64)</td>
									<td>NOT NULL</td>
									<td>회원 패스워드, sha256 으로 패스워드 암호화</td>
								</tr>
								<tr>
									<td>name</td>
									<td>VARCHAR(20)</td>
									<td>NOT NULL</td>
									<td>회원 이름</td>
								</tr>
								<tr>
									<td>email</td>
									<td>VARCHAR(30)</td>
									<td>NOT NULL</td>
									<td>회원 이메일</td>
								</tr>
								<tr>
									<td>date_insert</td>
									<td>DATETIME</td>
									<td>NOT NULL, CURRENT_TIMESTAMP</td>
									<td>회원가입 시간</td>
								</tr>
							</tbody>
						</table>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading"><h3> 로그인</h3></div>
							<table class="table table-striped table-bordered table-hover table-condensed text-center"">
								<thead align ="left">
									<tr align ="left">
										<th class="text-center">Columm Name</th>
										<th class="text-center">DataType</th>
										<th class="text-center">Constraint</th>
										<th class="text-center">설명</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>idx</td>
										<td>int(11)</td>
										<td>NOT NULL, AUTO_INCREMENT, PRIMARY KEY, UNIQUE INDEX</td>
										<td>로그인 고유번호</td>
									</tr>
									<tr>
										<td>account_idx</td>
										<td>int(11)</td>
										<td>NOT NULL</td>
										<td>회원 고유번호</td>
									</tr>
									<tr>
										<td>ip</td>
										<td>VARCHAR(15)</td>
										<td>NOT NULL</td>
										<td>로그인 IP 정보</td>
									</tr>
									<tr>
										<td>date_insert</td>
										<td>DATETIME</td>
										<td>NOT NULL, CURRENT_TIMESTAMP</td>
										<td>로그인 시간</td>
									</tr>
								</tbody>
							</table>
					</div>

					<div class="panel panel-default">
						<div class="panel-heading"><h3> 로그아웃</h3></div>
							<table class="table table-striped table-bordered table-hover table-condensed text-center"">
								<thead align ="left">
									<tr align ="left">
										<th class="text-center">Columm Name</th>
										<th class="text-center">DataType</th>
										<th class="text-center">Constraint</th>
										<th class="text-center">설명</th>
									</tr>
								</thead>
								<tbody>
									<tr>
										<td>idx</td>
										<td>int(11)</td>
										<td>NOT NULL, AUTO_INCREMENT, PRIMARY KEY, UNIQUE INDEX</td>
										<td>로그아웃  고유번호</td>
									</tr>
									<tr>
										<td>account_idx</td>
										<td>int(11)</td>
										<td>NOT NULL</td>
										<td>회원 고유번호</td>
									</tr>
									<tr>
										<td>date_insert</td>
										<td>DATETIME</td>
										<td>NOT NULL, CURRENT_TIMESTAMP</td>
										<td>로그아웃 시간</td>
									</tr>
								</tbody>
							</table>
					</div>

					<div class="panel panel-default" style="margin-bottom: 150px;">
						<div class="panel-heading"><h3> 로그인 실패</h3></div>
						<table class="table table-striped table-bordered table-hover table-condensed text-center">
							<thead align ="left">
								<tr align ="left">
									<th class="text-center">Columm Name</th>
									<th class="text-center">DataType</th>
									<th class="text-center">Constraint</th>
									<th class="text-center">설명</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>idx</td>
									<td>int(11)</td>
									<td>NOT NULL, AUTO_INCREMENT, PRIMARY KEY, UNIQUE INDEX</td>
									<td>로그인 실패 고유번호</td>
								</tr>
								<tr>
									<td>id</td>
									<td>VARCHAR(20)</td>
									<td>NOT NULL</td>
									<td>로그인 실패 ID</td>
								</tr>
								<tr>
									<td>password</td>
									<td>VARCHAR(64)</td>
									<td>NOT NULL</td>
									<td>로그인 실패 PASSWORD, AES-256-CBC 양방향 암호화</td>
								</tr>
								<tr>
									<td>ip</td>
									<td>VARCHAR(15)</td>
									<td>NOT NULL</td>
									<td>로그인 실패 IP 정보 </td>
								</tr>
								<tr>
									<td>date_insert</td>
									<td>DATETIME</td>
									<td>NOT NULL, CURRENT_TIMESTAMP</td>
									<td>로그인 실패 시간</td>
								</tr>
							</tbody>
						</table>
					</div>
			</div>
		</div>
		<?php include "../../include/footer.php"; ?>
	</body>
</html>