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
			<h3><b> CSS 매뉴얼 입니다.</b></h3>
		</div>
		<div class="row">
			<div class="col-sm-2">
				<div class="list-group">
					<a class="list-group-item disabled">	CSS 목록</a>
					<a href="index.php" class="list-group-item">CSS</a>
					<a href="preprocessor.php" class="list-group-item">PreProcessor (Less/Sass)</a>
				</div>
			</div>
			<div class="col-sm-9">
				<div class="panel panel-default">
					<div class="panel-heading"><h1>CSS 란?</h1></div>
						<div class="panel-body">
							Cascading Style Sheets 의 줄임말로 documents가 사용자에게 어떻게 보여질까를 기술하는 언어이고 보통 HTML 문서를 시각적으로 꾸미는 용도로 사용한다.
							css는 선택자, 선언, 속성 이렇게 세 가지로 이루어져 있다
							선택자는 html 문서상에서 각 태그들을 식별할 수 있게 붙여놓은 이름을 선택자로 활용할 수 있다.<br>
							<img src="/image/css_standard.png" width="50%" height="50%"><br>
							ex) sematic tags, class("."), id("#")
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>반드시 알아야 하는 CSS 속성들</h3></div>
						<div class="panel-body">
							<p>"head" 안에서 style 태그를 정의하고 그 안에 문서 내다 다른 태그들을 선언하고 꾸민다고 가정해보자.
							만약 태그와 속성내용이 많아지면 html 문서 길이는 기하급수적으로 길어지게 될 것이다.
							외부에 별도의 css 파일을 만들고 거기에 style을 정의한 후 해당 css 파일을 link 태그로 html 문서에 import 해서 style을 적용시킬 수 있다.
							보통 css나 js, image 파일들을 정적 파일들이라고 하는데 별도의 폴더를 만들어서 관리하게 된다.
							"head" 부분에 다음과 같이 파일의 경로를 추가하면된다.</p>
							<p>"link rel="stylesheet" type="text/css" href="css/index.css"</p>
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>Font</h3></div>
						<div class="panel-body">
							<p>페이지에서 사용할 폰트의 종류를 외부에서 받아올 수 있다. 부분마다 폰트를 사용할 수 있고 body 전체에 걸쳐서
							특정 폰트를 사용하게 설정할 수 있다. 구글 폰트 페이지에서 import 하는 link를 가져와서 body에 적용시키면 쉽게 적용할 수 있다.
							font 관련된 속성으로는 font-size, font-weight, text-style 등이 있습니다.</p>
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>box-model</h3></div>
						<div class="panel-body">
							<p>HTML 요소는 박스 모델로 되어 있다. 태그를 통해 요소를 만들 때마다 새로운 box가 생기고 그 박스에 style을 주어서 문서를 꾸밀 수 있게 되는 것이다.</p>
							<p>내용을 표시하는 영역(Content Area)부터 바깥 영역 여백(Margin)까지를 한 박스 모델의 영역이라고 보면 된다.</p>
							<img src="/image/css_boxmodel.png" width="50%" height="50%">
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>width</h3></div>
						<div class="panel-body">
							<p>내용을 표시하는 영역에서 가로 길이를 나타낸다.</p>
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>height</h3></div>
						<div class="panel-body">
							<p>내용을 표시하는 영역에서 세로 길이를 나타낸다.
							width와 height 을 구하는 기준은 기본이 위 그림이지만, box-sizing 속성을 통해서 border-box를 지정하면 테두리를 width와 height를 계산하는
							기준으로 변경할 수 있다.</p>
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>padding</h3></div>
						<div class="panel-body">
							<p>내용과 border 사이의 영역을 나타내고 안쪽 여백 역할을 담당한다.</p>
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>border</h3></div>
						<div class="panel-body">
							   <p>내용에 패딩을 더한 영역의 경계를 나타내며 margin과 padding의 경계가 되기도 한다. 테두리 역할을 한다.</p>
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>margin</h3></div>
						<div class="panel-body">
							   <p>border 부터 box model의 maximum 범위 까지를 나타내는 영역이다. 바깥 여백 영역 역할을 한다.
							   외부 요소와의 거리를 조절하는 용도로 많이 사용된다.</p>
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>display</h3></div>
						<div class="panel-body">
							<p>display 속성은 요소를 어떻게 보여줄지를 결정한다. 주로 4가지 값이 쓰이는데 none, block, inline, inline-block이 쓰인다.
							none은 아예 요소를 아예 보여주지 않고 지워버린다.
							block은 기본적으로 가로영역을 전부다 차지하는 놈이다. 대표적으로 div, p, h, li 태그들이 그러한 때문에 요소 다음에 오는 요소는 개행이 된 것 처럼 보여진다.
							width, height을 지정할 수 있지만 여전히 다음 요소는 개행되어 나타난다.
							inline 은 block 과 달리 줄 바꿈이 되지 않고, width와 height를 지정할 수 없다는게 그 특징이다. 대표적으로 span b strong i 태그가 있다.
							inline-block 은 block과 inline의 중간 단계다. 즉, width와 height는 지정할 수 있지만 개행은 되지 않는 놈이다.</p>
							<img src="/image/css_block.png" width="50%" height="50%">
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>flex</h3></div>
						<div class="panel-body">
							<p>flexible-box를 사용할 수 있는 display 속성이다. 각각의 요소들을 item으로 보고 item들을 효과적을 정렬하고 배치할 수 있도록 도와주기 때문에
							flex를 잘 이해하고 습득하신다면 아주 효과적인 웹 페이지를 만드실 수 있을 것이다.
							flex는 두 가지 관점에서 볼 수 있는데 하나는 부모 역할을 하는 container 입장이고, 두 번째는 각각의 container 안에서 자식 역할을 하는 item 입장 이다.</p>
							<img src="/image/css_flex.png" width="50%" height="50%">
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>text-align</h3></div>
						<div class="panel-body">
							<p>block 요소 안에 있는 inline 요소를 정렬 한다. 여기서 inline 요소란 span,p, img 등이 포함된다.
							정의는 block요소에 해야 한다. center, left, right, 등 사용 가능하다.</p>
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>margin</h3></div>
						<div class="panel-body">
							<p>정렬하고하자하는 요소의 width가 지정되어있다면 margin: 0 auto; 를 사용해서 중앙 정렬이 가능하다.
							width 를 지정할 수 없는 inline 요소는 쓸 수 없다.</p>
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3>float</h3></div>
						<div class="panel-body">
							<p>요소를 띄우는 속성으로서 원래 웹페이지에서 이미지를 어떻게 띄워서 텍스트와 함께 배치할 것인가에 대한 속성이다.</p>
							<img src="/image/css_float.png" width="50%" height="50%">
							<p>또한 한 라인에 요소들을 각각 오른쪽과 왼쪽에 배치할 때도 유용하게 쓰일 수 있다.
							float을 사용할 때 주의할 점은, 자식요소의 높이 값을 부모가 전혀 인식할 수 없다는 것이다. 이를 해결 하기 위해서 .clearfix라는 가상 선택자를
							만들어서 부모 요소에 클래스를 추가해주면 된다. 의미없는 빈 엘리먼트를 사용하지 않으면서도 flaot을 클리어 할 수 있다.
							::after란 가상 선택자로 css를 통해서 가상으로 요소를 만들어 낼 수 있다.</p>
						</div>
				</div>

				<div class="panel panel-default" style="margin-bottom: 100px;">
					<div class="panel-heading"><h3>background</h3></div>
						<div class="panel-body">
							<p>background-image, background-color, background-size, background-position, background-repeat 있습니다.</p>
							<img src="/image/css_back.png" width="50%" height="50%" style="margin-bottom: 100px;">
						</div>
				</div>
			</div>
		</div>
		<?php include "../../include/footer.php"; ?>
	</body>
</html>