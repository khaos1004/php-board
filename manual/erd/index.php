<!DOCTYPE html>
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
			<h3><b> ERD 설명 입니다.</b></h3>
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
					<div class="panel-heading"><h1>ERD 란?</h1></div>
						<div class="panel-body">
							한국말로 직역하자면 개체-관계 모델이다. 쉽게 생각하면, 테이블간의 관계를 설명해주는 다이어그램이라고 볼 수 있으며,
							이를 통해 프로젝트에서 사용되는 DB 의 구조를 한눈에 파악할 수 있다. 즉, API를 효율적으로 뽑아내기 위한 모델 구조도라고 생각하면 된다
						</div>
				</div>

				<div class="panel panel-default">
					<div class="panel-heading"><h3> ERD의 표기방법 </h3></div>
						<div class="panel-body">
							ERD에는 여러 기호들로 관계를 표현할 수 있으나, 기호들만 숙지하여도 충분히 표현 가능하다.<br>
							<img src="/image/erds.png" width="50%" height="30%">
							<ol>
								<li>One</li>
								일대일 혹은 일대다 관계이다. 주로 하나의 외래키가 걸린 관계라고 보면 된다.
								<li>Many</li>
								다대다 관계이다. 중계 테이블을 통하여 여러개의 데이터를 바라보고 있을때 사용한다.
								<li>One (and only one)</li>
								위의 조건과 동일하게 일대일 관계이나, 하나의 row끼리만 연결된 데이터이다.
								<li>Zero or one</li>
								일대일 혹은 일대 다 관계를 가지고 있으나, 필수 조건이 아님을 의미한다. 비유를 하자면 개인정보 동의시, 필수값 구분과 선택값 구분이라고 보면 될 것 같다.
								<li>One or Many</li>
								일대일 혹은 다대다 관계를 가지고 있음을 의미한다. 관계를 가지고 있으나, 참조되는 row값들이 불명확함을 의미한다.
								<li>Zero or Many</li>
								참조하는 테이블과의 관계가 불명확한 경우이다. 장바구니처럼 row 생성값이 없을수도, 하나일수도, 여러개일 수도 있는 경우이다.
							</ol>
						</div>
				</div>

				<div class="panel panel-default" style="margin-bottom: 150px;">
					<div class="panel-heading"><h3> 도형, 선 설명</h3></div>
						<div class="panel-body">
							<p>보통 ERD 툴을 쓰면 약간씩의 차이는 있겠지만 보통 위와 같은 그림으로 관계를 표현합니다.
							위의 그림을 파악하기 위해서는 몇 가지 규칙만 알고 있으면 됩니다.</p>
							<img src="/image/erds3.png" width="50%" height="50%">
						</div>
				</div>
			</div>
		</div>
		<?php include "../../include/footer.php"; ?>
	</body>
</html>
