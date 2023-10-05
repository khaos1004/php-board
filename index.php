<?php
include "include/session.php"; ?>

<!DOCTYPE html>
<html lang="ko">
	<head>
		<?php include "include/header.php"; ?>
		<title>Learn</title>
	</head>

	<body>
		<?php include "include/nav.php"; ?>
		<div class="main-cardsel">
			<h3><b> 아래 카드를 선택해주세요.</b></h3>
		</div>

		<div class="row">
			<div class="col-sm-2 col-sm-offset-3 text-center">
				<div class="thumbnail">
					<div class="caption">
						<h3>HTML</h3>
							<p>웹페이지 뼈대가 되는 마크업 언어 입니다.</p>
							<a href="manual/html/" class="btn btn-default" role="button">더 알아보기</a>
					</div>
				</div>
			</div>

			<div class="col-sm-2 text-center">
				<div class="thumbnail">
					<div class="caption">
						<h3>CSS</h3>
							<p>HTML 언어를 꾸며 줍니다.</p>
							<a href="manual/css/" class="btn btn-default" role="button">더 알아보기</a></p>
					</div>
				</div>
			</div>

			<div class="col-sm-2 text-center">
				<div class="thumbnail">
					<div class="caption">
						<h3>Java Script</h3>
							<p>웹페이지를 동적으로 만들어 줍니다.</p>
							<a href="manual/js/" class="btn btn-default" role="button">더 알아보기</a></p>
					</div>
				</div>
			</div>
			</div>

		<div class="row">
			<div class="col-sm-offset-3 col-sm-2 text-center">
				<div class="thumbnail">
					<div class="caption">
						<h3>Lib, Framework</h3>
							<p>기능 모음입니다.</p>
							<a href="manual/lib/" class="btn btn-default" role="button">더 알아보기</a>
					</div>
				</div>
			</div>

			<div class="col-sm-2 text-center">
				<div class="thumbnail">
					<div class="caption">
						<h3>Jquery</h3>
							<p>JS 라이브러리 입니다.</p>
							<a href="manual/jquery/" class="btn btn-default" role="button">더 알아보기</a>
					</div>
				</div>
			</div>

			<div class="col-sm-2 text-center">
				<div class="thumbnail">
					<div class="caption">
						<h3>Bootstrap</h3>
							<p>HTML, CSS, JS 프레임워크입니다.</p>
							<a href="manual/bootstrap/" class="btn btn-default" role="button">더 알아보기</a>
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-2 col-sm-offset-4 text-center">
				<div class="thumbnail">
					<div class="caption">
						<h3>게시판 ERD 설명</h3>
							<p>ERD 설명 페이지 입니다.</p>
							<a href="manual/erd/" class="btn btn-default" role="button">더 알아보기</a>
					</div>
				</div>
			</div>

			<div class="col-sm-2 text-center">
				<div class="thumbnail">
					<div class="caption">
						<h3>참조사이트</h3>
							<p>모질라 사이트 입니다.</p>
							<a href="https://developer.mozilla.org/ko/" target="_blank" class="btn btn-default" role="button">더 알아보기</a>
					</div>
				</div>
			</div>
		</div>
		<?php include "include/footer.php"; ?>
	</body>
</html>