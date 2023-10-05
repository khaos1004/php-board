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
			<h3><b> Less/Sass 매뉴얼 입니다.</b></h3>
		</div>
		<div class="row">
			<div class="col-sm-2">
				<div class="list-group">
					<a class="list-group-item disabled">	CSS 목록</a>
					<a href="/manual/css" class="list-group-item">CSS</a>
					<a href="preprocessor.php" class="list-group-item">PreProcessor (Less/Sass)</a>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="panel panel-default">
					<div class="panel-heading"><h1>Less, Sass 란?</h1></div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>Sass</h3></div>
						<div class="panel-body">
							<p>Sass(Syntactically Awesome StyleSheets)는 CSS pre-processor로서 CSS의 한계와 단점을 보완하여 보다 가독성이 높고
							코드의 재사용에 유리한 CSS를 생성하기 위한 CSS의 확장(extension)이다.</p>
							<p>Sass의 궁극적인 목적은 CSS의 결함을 보정하는 것입니다. 우리 모두 알듯이, CSS는 세계 최고의 언어는 못 됩니다[citation needed].
							배우기엔 매우 간단한 반면, 금세 아주 지저분해질 수 있습니다. 특히 큰 프로젝트에서 더 그렇습니다.
							Sass는 이런 상황에서, 초언어로서, 추가 기능과 유용한 도구를 제공하기 위해 CSS의 구문을 개선하는 역할을 합니다.
							한편, Sass는 CSS 언어에 대해 보수적인 입장을 취하려 합니다.</p>
							<p>핵심은 CSS를 완전한 기능을 갖춘 프로그래밍 언어로 바꾸지 않는 것입니다; Sass는 단지 CSS에게서 부족한 부분만을 돕길 원합니다.
							때문에, Sass를 시작하는 것은 CSS를 배우는 것보다 더 어려울 게 없습니다: CSS 위에 몇 가지의 추가 기능을 더할 뿐이니까요.
							이러한 CSS의 태생적 한계를 보완하기 위해 Sass는 다음과 같은 추가 기능과 유용한 도구들을 제공한다.</p>
							<b><p>변수의 사용</p></b><br>
							<ul>
								<li>조건문과 반복문</li>
								<li>Import</li>
								<li>Nesting</li>
								<li>Mixin</li>
								<li>Extend/Inheritance</li>
							</ul>

							<p>CSS와 비교하여 Sass는 아래와 같은 장점이 있다.
							CSS보다 심플한 표기법으로 CSS를 구조화하여 표현할 수 있다.
							스킬 레벨이 다른 팀원들과의 작업 시 발생할 수 있는 구문의 수준 차이를 평준화할 수 있다.
							CSS에는 존재하지 않는 Mixin 등의 강력한 기능을 활용하여 CSS 유지보수 편의성을 큰 폭으로 향상시킬 수 있다.
							Sass의 첫 번째 커밋은 8년 이상이 지난, 2006년 후반까지 거슬러 올라갑니다.</p>
							<p>말할 것도 없이 그 이후로 아주 먼 길을 왔습니다. Ruby로 처음에 개발되었고, 여기저기서 다양한 포트들이 튀어나왔죠.
							가장 성공적인, (C/C++로 쓰인) LibSass는 현재 원래의 Ruby 버전과의 완전한 호환에 근접해 있습니다.
							2014년, Ruby 사스와 LibSass 팀은 더 나아가기 전에 두 가지 버전의 동기화를 기다리기로 결정했습니다. </p>

							<p>그 이후로, LibSass는 형과의 기능 동기화를 위해 활발하게 버전들을 출시하고 있습니다. 남아있는 불일치들은 제가 Sass-Compatibility 프로젝트로 한데 모아 정리해두었습니다.
							열거되지 않은 불일치를 알고 계시다면, 이슈를 여는 친절을 베풀어주시기 바랍니다.
							여러분의 컴파일러를 선택하는 것으로 돌아가겠습니다. 사실, 이건 여러분의 프로젝트에 달려있습니다.</p>
							<p>Ruby on Rails 프로젝트라면, Ruby Sass를 사용하는 게 나을 겁니다. Ruby Sass가 이 경우에 완벽하게 적합하죠. 또한, Ruby Sass가 언제나 참조 구현이 될 것이며
							기능에 있어 LibSass를 선도할 것이라는 점을 알아두십시오.</p>

							<p>작업 흐름의 통합이 필요한 비(非)Ruby 프로젝트의 경우, 주로 감싸는 용도로 만들어져 있으므로 LibSass가 아마도 더 나은 생각일 것입니다.
							그러니까 만약 Node.js를 사용하고 싶으시다면, 선택은 node-sass입니다.
							Sass는 처음에 들여쓰기의 감지를 그 핵심 특성으로 갖는 구문을 가리켰습니다.</p>
							<p>얼마 지나지 않아, Sass를 유지하는 사람들은 Sassy CSS를 의미하는 SCSS라는 CSS 친화적인 구문을 제공함으로써 Sass와 CSS 사이의 차이를 좁히기로 결정했습니다.
							모토는 이렇습니다: 만약 유효한 CSS라면, 유효한 SCSS이다.</p>

							<p>그 이후로, Sass(전처리기)는 두 가지 다른 구문을 제공해 오고 있습니다:
							들여쓰기 구문으로도 알려진 Sass(전부 대문자가 아닙니다, 제발), 그리고 SCSS. 둘은 정확히 동등한 기능을 갖고 있기 때문에 어느 것을 사용할지는 여러분에게 달렸습니다.
							지금 시점에서는 이것은 순전히 미관상의 문제입니다.</p>

							<p>Sass의 공백에 반응하는 구문은 중괄호, 세미콜론 그리고 다른 구두점 기호들을 없애기 위해 들여쓰기에 의존하며,
							이는 간결하고 짧은 구문으로 이어집니다. 한편, SCSS는 주로 CSS에 올려진 작은 추가사항들이므로 배우기에 더 쉽습니다.</p>
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>Less</h3></div>
						<div class="panel-body">
							<p>LESS는 CSS에 Script의 능력(변수, 함수, 연산, 중첩, 스코프등등)을 덧붙여 확장한 언어이다. 클라이언트 또는 서버환경(node.js) 모두에서 실행된다.
							LESS는 CSS Preprocessor(전처리기)로서 CSS를 변수나 Nested Rules을 이용하여 쉽고 빠르고 체계적으로 프로그래밍 할 수 있게 만든 것을 말한다. 이때 전처리기란 다른 프로그램의 입력으로 사용되는 출력을 생성하기 위해 그 입력 데이터를 처리하는 프로그램을 의미한다.
							CSS 프리프로세서에는 LESS, SASS/SCSS, COMPASS 등이 있으며 그중에 LESS의 문법을 따라 프로그래밍 한 것을 LESS 라고 한다.
							LESS는 CSS의 확장버전으로 하위호환성이 뛰어나며 CSS의 기존 문법을 그대로 사용하기 때문에 익히기 쉽다는 장점이 있다.</p>
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3> Sass 전처리자 설명</h3></div>
						<div class="panel-body">
							<p>가장 오래되었고, 가장 활발히 개발되고 있으며, 가장 많은 사람들이 선택한 라이브러리라 이용할거리가 많습니다.
							막강한 내장 기능들을 갖고 있으며, Compass와 병용하면 리소스 경로를 직접 참조 가능해서, 특정 폴더 내 이미지를 모두 참조한다든가, 이미지 크기를 참조할 수도 있습니다.
							디펜던시로서 ruby를 요구합니다. (Libsass라는 대체재 덕분에 완화되고 있지만 아직 완전하지는 않습니다.)</p>
						</div>
				</div>

				<div class="panel panel-default" style="margin-bottom: 100px;">
					<div class="panel-heading"><h3>Less 전처리자 설명</h3></div>
						<div class="panel-body">
							<p style="margin-bottom: 100px;">브라우저에 내장된 JS 인터프리터만으로 컴파일 가능하므로 그만큼 디펜던시에서 자유롭습니다.
							Sass 다음으로 활발히 개척되고 있어서, 쓸만한 라이브러리나 mixin 구현물들을 제법 쉽게 찾을 수 있습니다.</p>
						</div>
				</div>
			</div>
		</div>
		<?php include "../../include/footer.php"; ?>
	</body>
</html>