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
			<h3><b> JS 매뉴얼 입니다.</b></h3>
		</div>
		<div class="row">
			<div class="col-sm-2">
				<div class="list-group">
					<a class="list-group-item disabled">
						Java Script 목록
					</a>
					<a href="/manual/js" class="list-group-item">Java Script</a>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="panel panel-default">
					<div class="panel-heading"><h1>JS 란?</h1></div>
						<div class="panel-body">
							자바스크립트(JavaScript)는 객체(object) 기반의 스크립트 언어입니다.
							HTML로는 웹의 내용을 작성하고, CSS로는 웹을 디자인하며, 자바스크립트로는 웹의 동작을 구현할 수 있습니다.
							자바스크립트는 주로 웹 브라우저에서 사용되나, Node.js와 같은 프레임워크를 사용하면 서버 측 프로그래밍에서도 사용할 수 있습니다.
							현재 컴퓨터나 스마트폰 등에 포함된 대부분의 웹 브라우저에는 자바스크립트 인터프리터가 내장되어 있습니다
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>자바스크립트의 특징</h3></div>
						<div class="panel-body">
							<p>자바스크립트가 가지고 있는 언어적 특징은 다음과 같습니다.</p>
							<ol>
								<li>자바스크립트는 객체 기반의 스크립트 언어입니다.</li>
								<li>자바스크립트는 동적이며, 타입을 명시할 필요가 없는 인터프리터 언어입니다.</li>
								<li>자바스크립트는 객체 지향형 프로그래밍과 함수형 프로그래밍을 모두 표현할 수 있습니다.</li>
							</ol>
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>자바스크립트 문법</h3></div>
						<div class="panel-body">
							<p>자바스크립트의 실행문은 세미콜론(;)으로 구분됩니다.</p>
							<img src="/image/js_mun1.png" width="50%" height="50%" style="margin-bottom: 30px;">
							<p>자바스크립트는 대소문자를 구분합니다.
							자바스크립트에서 변수나 함수의 이름, 예약어 등을 작성하거나 사용할 때에는 대소문자를 정확히 구분해서 사용해야 합니다.</p>
							<img src="/image/js_mun2.png" width="50%" height="50%">
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>식별자</h3></div>
						<div class="panel-body">
							<p>식별자는 변수나 함수의 이름을 작성할 때 사용하는 이름을 의미합니다.
							자바스크립트에서 식별자는 영문자(대소문자), 숫자, 언더스코어(_) 또는 달러($)만을 사용할 수 있습니다.</p>
							<b><p>자바스크립트에서 식별자는 숫자와 식별자의 구별을 빠르게 할 수 있도록 숫자로는 시작할 수 없습니다.<br>
							자바스크립트는 유니코드(unicode) 문자셋을 사용합니다.</p></b>
							<p>식별자 작성 방식 자바스크립트에서는 식별자를 작성할 때 다음과 같은 작성 방식을 사용할 수 있습니다.</p>
							<p>1. Camel Case 방식<br>
							2. Underscore Case 방식<br>
							Camel Case 방식이란 식별자가 여러 단어로 이루어질 경우에 첫 번째 단어는 모두 소문자로 작성하고, 그다음 단어부터는 첫 문자만 대문자로 작성하는 방식입니다.
							Underscore Case 방식은 식별자를 이루는 단어들을 소문자로만 작성하고, 그 단어들은 언더스코어(_)로 연결하는 방식입니다.</p>
							<P>자바스크립트에서는 식별자를 작성할 때 관행적으로 Camel Case 방식을 많이 사용합니다.
							따라서 우리 수업에서도 코드의 가독성 및 통일성을 위해 Camel Case 방식만을 사용할 것입니다.</p>
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>식별자 작성 방식</h3></div>
						<div class="panel-body">
							<p>자바스크립트에서는 식별자를 작성할 때 다음과 같은 작성 방식을 사용할 수 있습니다.<br>
							1. Camel Case 방식<br>
							2. Underscore Case 방식<br>
							Camel Case 방식이란 식별자가 여러 단어로 이루어질 경우에 첫 번째 단어는 모두 소문자로 작성하고, 그다음 단어부터는 첫 문자만 대문자로 작성하는 방식입니다.
							Underscore Case 방식은 식별자를 이루는 단어들을 소문자로만 작성하고, 그 단어들은 언더스코어(_)로 연결하는 방식입니다.
							자바스크립트에서는 식별자를 작성할 때 관행적으로 Camel Case 방식을 많이 사용합니다.
							따라서 우리 수업에서도 코드의 가독성 및 통일성을 위해 Camel Case 방식만을 사용할 것입니다.</p>
							<img src="/image/js_case2.png" width="50%" height="50%">
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>자바스크립트를 적용하는 방법</h3></div>
						<div class="panel-body">
							<p>HTML 문서에 자바스크립트 코드를 적용하는 방법에는 다음과 같은 방법이 있습니다.<br>
							1. 내부 자바스크립트 코드로 적용<br>
							2. 외부 자바스크립트 파일로 적용<br></p>
							<h3>내부 자바스크립트 코드</h3>
							<p>자바스크립트 코드는 "script"태그를 사용하여 HTML 문서 안에 삽입할 수 있습니다.
							</p>
							<img src="/image/js_incode.png" width="50%" height="50%">
							<p>이렇게 삽입된 자바스크립트 코드는 HTML 문서의 <head>태그나 <body>태그, 또는 양쪽 모두에 위치할 수 있습니다.</p>
						</div>
				</div>

				<div class="panel panel-default" style="margin-bottom: 100px;">
					<div class="panel-heading"><h3>외부 자바스크립트 파일</h3></div>
						<div class="panel-body">
							<p>자바스크립트 코드는 HTML 문서의 내부뿐만 아니라 외부 파일로 생성하여 삽입할 수도 있습니다.
							외부에 작성된 자바스크립트 파일은 .js 확장자를 사용하여 저장합니다.
							해당 자바스크립트 파일을 적용하고 싶은 모든 웹 페이지에 "script"태그를 사용해 외부 자바스크립트 파일을 포함하면 됩니다.</p>
							<img src="/image/js_excode.png" width="50%" height="50%">
							<p>외부 자바스크립트 파일을 사용하면 웹의 내용을 담당하는 HTML 코드로부터 웹의 동작을 구현하는 자바스크립트 코드를 분리할 수 있습니다.
							이렇게 하면 HTML 코드와 자바스크립트 코드를 각각 읽기도 편해지고, 유지 보수도 쉬워집니다.
							또한, 외부 자바스크립트 파일은 웹 브라우저가 미리 읽어 올 수 있어 웹 페이지의 로딩 속도 또한 빨라집니다.</p>
						</div>
				</div>
			</div>
		</div>
		<?php include "../../include/footer.php"; ?>
	</body>
</html>