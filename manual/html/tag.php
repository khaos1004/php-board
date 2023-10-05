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
			<h3><b> HTML 매뉴얼 입니다.</b></h3>
		</div>

		<div class="row">
			<div class="col-sm-2">
				<div class="list-group">
					<a class="list-group-item disabled">	HTML 목록</a>
					<a href="/manual/html" class="list-group-item">HTML</a>
					<a href="tag.php" class="list-group-item">HTML Tag</a>
				</div>
			</div>

			<div class="col-sm-9">
				<div class="panel panel-default">
					<div class="panel-heading"><h1> 태그의 종류</h1></div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3> HEAD 부분 관련 태그</h3></div>
						<div class="panel-body">
							<img src="/image/head.png" width="50%" height="25%" class="ele">
						</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading"><h3> 문단 관련 태그</h3></div>
						<div class="panel-body">
							<img src="/image/mun.png" width="50%" height="50%" class="ele">
						</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading"><h3> 목록 관련 태그</h3></div>
						<div class="panel-body">
							<img src="/image/head.png" width="50%" height="50%" class="ele">
						</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading"><h3> 글자 관련 태그</h3></div>
						<div class="panel-body">
							<img src="/image/font.png" width="50%" height="50%" class="ele">
						</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading"><h3> 멀티미디어 삽입 관련 태그</h3></div>
						<div class="panel-body">
							<img src="/image/multi.png" width="50%" height="50%" class="ele">
						</div>
				</div>
				<div class="panel panel-default">
					<div class="panel-heading"><h3> 표 관련 태그</h3></div>
						<div class="panel-body">
							<img src="/image/line.png" width="50%" height="50%" class="ele">
						</div>
				</div>
				<div class="panel panel-default" style="margin-bottom: 100px;">
					<div class="panel-heading"><h3> 문서 양식 태그</h3></div>
						<div class="panel-body">
							<img src="/image/paper.png" width="50%" height="50%" class="ele" style="margin-bottom: 100px;">
						</div>
				</div>
			</div>
		</div>
		<?php include "../../include/footer.php"; ?>
	</body>
</html>