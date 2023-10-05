<?php
include "../include/session.php"; ?>

<!DOCTYPE html>
<html lang="ko">
	<head>
		<?php include "../include/header.php"; ?>
		<title>Learn</title>
	</head>

	<body>
		<?php include "../include/nav.php"; ?>
		<div class="main-cardsel">
			<h3><b> 게시글 작성 페이지 입니다.</b></h3>
		</div>
		<div class="row">
			<div class="col-sm-2">
				<div class="list-group">
					<a class="list-group-item disabled">게시판 목록</a>
					<a href="/board/" class="list-group-item">자유 게시판</a>
				</div>
			</div>
			<div class="col-sm-6 col-sm-offset-1">
				<form name="writer" method="POST">
					 <table class ="table table-bordered">
						<tbody>
							<tr>
								<th class="text-center">제목</th>
								<td><input type ="text" name="title" class="form-control" placeholder="제목을 입력 해 주세요"></td>
							</tr>
							<tr>
								<th class="text-center">작성자</th>
								<td><input type ="text" name="writer" class="form-control" placeholder="작성자를 입력 해 주세요"></td>
							</tr>
							<tr>
								<th class="text-center">내용</th>
								<td><textarea cols="30" name="contents" class="form-control" placeholder="내용을 입력해주세요"></textarea></td>
							</tr>
							<tr>
								<th class="text-center">수정 비밀번호</th>
								<td><input type="password" name="password" class="form-control" placeholder="4자리 숫자를 입력 해주세요"></td>
							</tr>
						</tbody>
					</table>
					<a href="/board"> <button type=button class="btn btn-default btt-position">취소</button></a>
					<input type="button" name="check" class="btn btn-default btt-position" value="저장">
				</form>
			</div>
		</div>
		<?php include "../include/footer.php"; ?>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" language ="javascript"></script>
		<script src="../js/board/create.js" type="text/javascript"></script>
	</body>
</html>
