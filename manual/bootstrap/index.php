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
			<h3><b> Bootstrap 매뉴얼 입니다.</b></h3>
		</div>
		<div class="row">
			<div class="col-sm-2">
				<div class="list-group">
					<a class="list-group-item disabled">Bootstrap 목록</a>
					<a href="/manual/bootstrap" class="list-group-item">Bootstrap</a>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="panel panel-default">
					<div class="panel-heading"><h1>Bootstrap 이란?</h1></div>
						<div class="panel-body">
							부트스트랩(Bootstrap)은 Twitter가 제공하는 웹 개발을 쉽고 빠르게 해주는 프레임워크(Framework)입니다.
							다양한 HTML, CSS 템플릿과 버튼, 글자, 아이콘, 표, 목록, 이미지, 네비게이션, 드롭다운, 리스트, 알림, 진행바,
							썸네일 등 다양한 위젯들을 제공합니다. 사용자는 일일이 코딩하지 않아도 아주 쉽게 위 요소들을 꺼내 쓸 수 있습니다.
							이를 사용하면 현재 상용화된 웹(페이스북, 트위터 등)이 어렵지 않게 뚝딱 만들어져서(기능 구현 X) 웹 개발계의 혁명이라고 불립니다.
						</div>
				</div>

				<div class="panel panel-default" style="margin-bottom: 100px;">
					 <div class="panel-heading"><h3>부트스트랩의 장점입니다.</h3></div>
						 <div class="panel-body">
							<ul>
								<li>HTML, CSS, JS의 기본적인 지식만 알아도 쉽게 사용할 수 있음</li>
								<li>PC용 뿐만 아니라 태블릿, 스마트폰용 디자인도 제공</li>
								<li>반응형 CSS를 포함한 단일코드로 모든 디바이스에 적용 가능</li>
								<li>최신 브라우저 모두와 호환</li>
							</ul>
							<img src="/image/bootstrap_ex.png" width="50%" height="50%">
							<p>버튼을 하나 만든다고 가정하겠습니다. 기존에는 위처럼 HTML 코드를 작성한 후에 온갖 속성들을 전부 스타일 또는 CSS에 직접 작성해야 했습니다.</p>
							<img src="/image/bootstrap_ex2.png" width="50%" height="50%">
							<p>부트스트랩을 사용하면 수 많은 이미 만들어진 버튼 중에 원하는 것 하나를 골라서 클래스명만 넣어준다면 끝입니다.
							위 예제는 버튼 하나지만, 부트스트랩을 사용하면 페이지를 가져다 쓸 수도있고, 메뉴바, 네비게이션바 등도 쉽고 편하게 꺼내서 쓸 수 있으니 개발자는
							개발 시간과 노력량을 줄이고도 퀄리티 있는 디자인을 사용해 웹 개발이 가능합니다.</p>
						 </div>
				 </div>
			</div>
		</div>
		<?php include "../../include/footer.php"; ?>
	</body>
</html>