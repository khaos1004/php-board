<header class="header"><h4 class="titlewith">Learn</h4>
	<?php if ( !empty( $_SESSION["id"]) && $_SESSION["id"] == "admin" ): ?>
		<a href="../../control/login/logout.php"><button type="button" class="btn btn-default btt-position">로그아웃</button></a>
		<a href="../../mem/login/fail.php"><button type="button" class="btn btn-default btt-position">로그인 실패 체크</button></a>
		<p type="text" class="btn btt-position update"><?= $_SESSION["id"]; ?> 님 환영합니다</p>
		<?php elseif ( !empty($_SESSION["id"] ) ): ?>
			<a href="../../control/login/logout.php"><button type="button" class="btn btn-default btt-position">로그아웃</button></a>
			<p type="text" class="btn btt-position update"><?= $_SESSION["id"]; ?> 님 환영합니다</p>
		<?php else : ?>
			<a href="/mem/login"><button type="button" class="btn btn-default btt-position">로그인</button></a>
			<a href="/mem/account/create.php"><button type="button" class="btn btn-default btt-position">회원 가입</button></a>
		<?php endif ?>
</header>

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
			<a class="navbar-brand" href="/">메인 페이지</a>
		</div>

		<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			<ul class="nav navbar-nav">
				<li class=""><a href="/manual/html">HTML <span class="sr-only">(current)</span></a></li>
				<li><a href="/manual/css">CSS</a></li>
				<li><a href="/manual/js">Java Script</a></li>
				<li><a href="/manual/lib">Lib, FrameWork</a></li>
				<li><a href="/manual/jquery">Jquery</a></li>
				<li><a href="/manual/bootstrap">Bootstrap</a></li>
				<li><a href="/manual/erd">Mysql ERD</a></li>
				<li><a href="/board">Board</a></li>
				<li><a href="/board/second">Second Board</a></li>
				<?php if ( !empty( $_SESSION["id"] ) ): ?>
				<li><a href="" class="update">회원정보 수정</a></li>
				<?php endif ?>
			</ul>

			<form class="navbar-form navbar-right">
				<div class="form-group">
					<input type="text" class="form-control" placeholder="Search">
				</div>
					<button type="submit" class="btn btn-default">Submit</button>
			</form>
		</div>
	</div>
</nav>

<script src="https://code.jquery.com/jquery-3.3.1.min.js" language ="javascript"></script>
<script language="javascript">

$( ".update" ).on( "click", function()
{
	window.open( "../../mem/account/update.php" , "_blank" , "width=850, height=550, left=100, top=50" ) ;
} );

</script>