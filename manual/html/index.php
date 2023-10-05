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
					<div class="panel-heading"><h1>HTML 이란?</h1></div>
						<div class="panel-body">
							HTML (Hypertext Markup Language,하이퍼텍스트 마크업 언어)는 프로그래밍 언어는 아니고,
							우리가 보는 웹페이지가 어떻게 구조화되어 있는지 브라우저로 하여금 알 수 있도록 하는 마크업 언어입니다.
							이는 개발자로 하여금 복잡하게도 간단하게도 프로그래밍 할 수 있습니다. HTML은 elements로 구성되어 있으며,
							이들은 적절한 방법으로 나타내고 실행하기 위해 각 컨텐츠의 여러 부분들을 감싸고 마크업 합니다. tags 는 웹 상의
							다른 페이지로 이동하게 하는 하이퍼링크 내용들을 생성하거나, 단어를 강조하는 등의 역할을 합니다.
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>요소(Element)</h3></div>
						<div class="panel-body">
							<img src="/image/contents.png" width="50%" height="50%"><br>
							<p>HTML 요소는 시작 태그(start tag)와 종료 태그(end tag) 그리고 태그 사이에 위치한 content로 구성됩니다.
							HTML document는 요소(Element)들의 집합으로 이루어집니다.
							태그는 대소문자를 구별하지 않으나 W3C: World Wide Web Consortium에서는 HTML4의 경우 소문자를 추천하고 있으므로 HTML5에서도
							소문자를 사용하는 것이 일반적입니다.</p>
						 </div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>속성(attribut)</h3></div>
						<div class="panel-body">
							<img src="/image/attribut.png" width="50%" height="50%"><br>
							<p>속성은 시작 태그에 위치하며 한 태그에 여러 속성을 지정할 수 있습니다.
							아래에서 div,a,img는 태그이고 class,href,src,alt는 속성입니다.</p>
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>HTML5</h3></div>
						<div class="panel-body">
							<img src="/image/standard.png" width="50%" height="50%"><br>
							<p>HTML은 위에 사진파일과 같은 문법 구조를 가집니다
							더많은 정보가 필요하시면 <a href="https://poiemaweb.com/html5-syntax" target="_blank">여기</a>를 클릭해주세요</p>
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>DOCTYPE</h3></div>
						<div class="panel-body">
							<p>HTML 파일이라면 제일 첫 줄에 위치해야 하는 선언문
							모습은 태그와 비슷하지만 정확히는 HTML 태그는 아니다.
							해당 HTML파일이 무슨 버전을 사용했는지 브라우저에 알리는 역할 입니다</p>
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>html 태그</h3></div>
						<div class="panel-body">
							<p>html elements(요소)들은 html태그로 감싸져 있습니다.
							브라우저가 html태그를 만나면, html이 시작되었는지 인지하고 요소를 그릴 준비를 합니다.</p>
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>head 태그</h3></div>
						<div class="panel-body">
							<p>html태그 다음에는 항상 head태그가 위치합니다.
							body태그와 다르게 웹 브라우저에 보이지 않는 부분입니다.
							사이트의 제목, 설명, 부가정보, 기술적 내용( 이 사이트는 주로 모바일용인지 아닌지)이 들어가는 부분
							한글, 일본어, 중국어가 포함된 페이지라면 utf-8 이라는 값으로 문자 인코딩을 추가해줘야합니다.</p>
						</div>
				</div>

				<div class="panel panel-default" style="margin-bottom: 150px;">
					<div class="panel-heading"><h3>body 태그</h3></div>
						<div class="panel-body">
							<p>body 태그는 항상 head 태그 다음에 위치합니다.
							화면에 보여져야할 레이아웃대로 각종 태그들이 존재합니다</p>
						</div>
				</div>
			</div>
		</div>
		<?php include "../../include/footer.php"; ?>
	</body>
</html>