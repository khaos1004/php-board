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
			<h3><b> Jquery 매뉴얼 입니다.</b></h3>
		</div>
		<div class="row">
			<div class="col-sm-2">
				<div class="list-group">
					<a class="list-group-item disabled">	Jquery 목록</a>
					<a href="/manual/jquery" class="list-group-item">Jquery</a>
				</div>
			</div>

			<div class="col-sm-9">
				<div class="panel panel-default">
					<div class="panel-heading"><h1>제이쿼리 란?</h1></div>
						<div class="panel-body">
							제이쿼리(jQuery)는 오픈 소스 기반의 자바스크립트 라이브러리입니다.
							제이쿼리는 여러분의 웹 사이트에 자바스크립트를 더욱 손쉽게 활용할 수 있게 해줍니다.
							또한, 제이쿼리를 사용하면 짧고 단순한 코드로도 웹 페이지에 다양한 효과나 연출을 적용할 수 있습니다.
							이러한 제이쿼리는 오늘날 가장 인기 있는 자바스크립트 라이브러리 중 하나입니다.
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>제이쿼리의 장점</h3></div>
						<div class="panel-body">
							<p>현재 많이 사용되고 있는 자바스크립트 라이브러리는 다음과 같습니다.<p>
							<ul>
								<li> 프로토타입(Prototype)</li>
								<li>-도조(Dojo)</li>
								<li> GWT(Google Web Toolkit)</li>
								<li>MochiKit</li>
							</ul>
							<p>이렇게 수많은 자바스크립트 라이브러리 중에서도 제이쿼리가 특히 많이 사용되는 이유는 다음과 같습니다.</p>
							<ol>
								<li> 제이쿼리는 주요 웹 브라우저의 구버전을 포함한 대부분의 브라우저에서 지원됩니다.</li>
								<li>HTML DOM을 손쉽게 조작할 수 있으며, CSS 스타일도 간단히 적용할 수 있습니다.</li>
								<li>애니메이션 효과나 대화형 처리를 간단하게 적용해 줍니다.</li>
								<li>같은 동작을 하는 프로그램을 더욱 짧은 코드로 구현할 수 있습니다.</li>
								<li>다양한 플러그인과 참고할 수 있는 문서가 많이 존재합니다.</li>
								<li>오픈 라이선스를 적용하여 누구나 자유롭게 사용할 수 있습니다.</li>
							</ol>
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>제이쿼리 적용</h3></div>
						<div class="panel-body">
							<p>제이쿼리는 자바스크립트 라이브러리이므로, 제이쿼리 파일은 자바스크립트 파일(.js 파일) 형태로 존재합니다.
							따라서 웹 페이지에서 제이쿼리를 사용하기 위해서는 제이쿼리 파일을 먼저 웹 페이지에 로드(load)해야 합니다.
							웹 페이지에 제이쿼리 파일을 로드하는 방법은 다음과 같습니다.</p>
							<p>1. 제이쿼리 파일을 다운받아 로드하는 방법<br>
							2. CDN(Content Delivery Network)을 이용하여 로드하는 방법<br></p>
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>제이쿼리 파일을 다운받아 로드하는 방법</h3></div>
						<div class="panel-body">
							<p>최신 버전의 제이쿼리 파일은 <b>공식 사이트</b>에서 다운받을 수 있습니다.</p>
							<p>이렇게 다운받은 제이쿼리 파일을 서버에 저장하고, 다음 "script"태그를 웹 페이지의 "head"태그 내에 삽입하면 됩니다.</p>
							<img src="/image/jquery.png" width="50%" height="50%">
						</div>
				</div>

				<div class="panel panel-default" style="margin-bottom: 100px;">
					<div class="panel-heading"><h3>CDN을 이용하여 로드하는 방법</h3></div>
						<div class="panel-body">
							<p>CDN(Content Delivery Network)이란 웹 사이트의 접속자가 서버에서 콘텐츠를 다운받아야 할 때, 자동으로 가장 가까운 서버에서 다운받도록 하는 기술입니다.
							이 기술을 이용하면 특정 서버에 트래픽이 집중되지 않고, 콘텐츠 전송 시간이 매우 빨라지는 장점이 있습니다.
							이러한 CDN을 이용하면 제이쿼리 파일을 서버에 따로 저장하지 않아도 제이쿼리를 사용할 수 있습니다.
							현재 이용할 수 있는 제이쿼리 버전 1의 CDN은 다음과 같으며, 어떤 CDN을 이용하더라도 같은 동작을 합니다.</p>
							<img src="/image/jquery_cdn.png" width="50%" height="50%">
						</div>
				</div>
			</div>
		</div>
		<?php include "../../include/footer.php"; ?>
	</body>
</html>