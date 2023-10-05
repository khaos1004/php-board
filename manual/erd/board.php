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
			<h3><b> 게시판 ERD 설명 입니다.</b></h3>
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
					<img src="/image/board6477.png" width="60%" height="300%" class="img-responsive center-block">
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>게시판</h3></div>
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
								<td>INT(11)</td>
								<td>NOT NULL, AUTO_INCREMENT, PRIMARY KEY, UNIQUE INDEX</td>
								<td>고유번호</td>
							</tr>
							<tr>
								<td>account_id</td>
								<td>VARCHAR(20)</td>
								<td>NOT NULL</td>
								<td>account id</td>
							</tr>
							<tr >
								<td>title</td>
								<td>VARCHAR(20)</td>
								<td>NOT NULL</td>
								<td>제목</td>
							</tr>
							<tr>
								<td>writer</td>
								<td>CHAR(20)</td>
								<td>NOT NULL</td>
								<td>작성자</td>
							</tr>
							<tr>
								<td>contents</td>
								<td>VARCHAR(300)</td>
								<td>NOT NULL</td>
								<td>내용</td>
							</tr>
							<tr>
								<td>password</td>
								<td>CHAR(4)</td>
								<td>NOT NULL</td>
								<td>수정/삭제 패스워드</td>
							</tr>
							<tr>
								<td>ip</td>
								<td>VARCHAR(15)</td>
								<td>NOT NULL</td>
								<td>게시물 작성 IP</td>
							</tr>
							<tr>
								<td>comment</td>
								<td>INT(11)</td>
								<td>NOT NULL</td>
								<td>댓글 갯수</td>
							</tr>
							<tr>
								<td>date_insert</td>
								<td>DATETIME</td>
								<td>NOT NULL, CURRENT_TIMESTAMP</td>
								<td>작성 시간</td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>댓글 테이블</h3></div>
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
								<td>INT(11)</td>
								<td>NOT NULL, AUTO_INCREMENT, PRIMARY KEY, UNIQUE INDEX</td>
								<td>고유번호</td>
							</tr>
							<tr >
								<td>board_idx</td>
								<td>INT(11)</td>
								<td>NOT NULL</td>
								<td>제목</td>
							</tr>
							<tr >
								<td>name</td>
								<td>VARCHAR(20)</td>
								<td>NOT NULL</td>
								<td>댓글 생성자 이름</td>
							</tr>
							<tr >
								<td>password</td>
								<td>CHAR(4)</td>
								<td>NOT NULL</td>
								<td>댓글 패스워드</td>
							</tr>
							<tr >
								<td>contents</td>
								<td>VARCHAR(300)</td>
								<td>NOT NULL</td>
								<td>댓글 내용</td>
							</tr>
							<tr>
								<td>ip</td>
								<td>VARCHAR(15)</td>
								<td>NOT NULL</td>
								<td>댓글 생성자 IP</td>
							</tr>
							<tr>
								<td>date_insert</td>
								<td>DATETIME</td>
								<td>NOT NULL, CURRENT_TIMESTAMP</td>
								<td>댓글 생성 시간</td>
							</tr>
						</tbody>
					</table>
				</div>

				<div class="panel panel-default" style="margin-bottom: 150px;">
					<div class="panel-heading"><h3>조회수 테이블</h3></div>
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
								<td>INT(11)</td>
								<td>NOT NULL, AUTO_INCREMENT, PRIMARY KEY, UNIQUE INDEX</td>
								<td>고유번호</td>
							</tr>
							<tr >
								<td>board_idx</td>
								<td>INT(11)</td>
								<td>NOT NULL</td>
								<td>제목</td>
							</tr>
							<tr>
								<td>view</td>
								<td>INT(11)</td>
								<td>NOT NULL</td>
								<td>게시물 조회수</td>
							</tr>
							<tr>
								<td>ip</td>
								<td>VARCHAR(15)</td>
								<td>NOT NULL</td>
								<td>게시물 확인 IP</td>
							</tr>
							<tr>
								<td>date_insert</td>
								<td>DATETIME</td>
								<td>NOT NULL, CURRENT_TIMESTAMP</td>
								<td>조회수 증가한 시간</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<?php include "../../include/footer.php"; ?>
	</body>
</html>