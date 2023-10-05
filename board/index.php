<?php
include "../include/session.php";
include "../control/db/conn.php";
include "../class/paging.php";

$class = new Paging ( $_GET["page"] );
$btn = $class->paging_btn();
$tr = $class->board_print();
$total_page = $class->total_page;

?>

<!DOCTYPE html>
<html lang="ko">
	<head>
		<?php include "../include/header.php"; ?>
		<title>Learn</title>
	</head>

	<body>
		<?php include "../include/nav.php"; ?>
		<div class="main-cardsel">
			<h3><b> 게시판 입니다.</b></h3>
		</div>
		<div class="row">
			<div class="col-sm-2">
				<div class="list-group">
					<a class="list-group-item disabled">게시판 목록</a>
					<a href="/board/" class="list-group-item">자유 게시판</a>
				</div>
			</div>
			<div class="col-sm-9">
				<table class="table table-striped table-bordered table-hover table-condensed text-center">
					<thead>
						<tr>
							<th class="text-center col-sm-1">번호</th>
							<th class="text-center col-sm-4">제목</th>
							<th class="text-center col-sm-2">작성자</th>
							<th class="text-center col-sm-2">작성일</th>
							<th class="text-center col-sm-1">조회수</th>
						</tr>
					</thead>
					<tbody>
						<?= $tr ?>
					</tbody>
				</table>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-2 col-sm-offset-9">
				<a href="create.php"><button type="button" class="btn btn-default btt-position">게시글 작성</button></a>
			</div>
		</div>

		<div class="row">
			<div class="col-sm-7 col-sm-offset-5">
				<div class="btn-group" role="group" >

					<?php if ( $class->page >= 2 ) : ?>
						<a href="<?=$PHP_SELF ?>?page=1" class="btn btn-default"><<</a>
						<a href="<?=$PHP_SELF ?>?page=<?= $class->page - 5 < 1 ? 1 : $class->page - 5 ?>" class="btn btn-default">이전</a>
					<?php else : ?>
						<a class="btn btn-default" disabled><<</a>
						<a class="btn btn-default" disabled>이전</a>
					<?php endif ?>

					<?php foreach ($btn as $key) :?>
						<?php if ( $_GET["page"] == $key +1 ) : ?>
						<a href="<?=$_SERVER['PHP_SELF'] ?>?page=<?= $key + 1  ?>" class="btn btn-default  btn-primary"><?= $key + 1 ?></a>
						<?php else : ?>
						<a href="<?=$_SERVER['PHP_SELF'] ?>?page=<?= $key + 1  ?>" class="btn btn-default"><?= $key + 1 ?></a>
						<?php endif ?>
					<?php endforeach ?>

					<?php if( $class->page !=  $total_page ) : ?>
						<a href="<?=$PHP_SELF ?>?page=<?= $class->page + 5  > $total_page ? $total_page : $class->page + 5 ?>" class="btn btn-default">다음</a>
						<a href="<?=$PHP_SELF ?>?page=<?=$total_page ?>" class="btn btn-default">>></a>
					<?php else : ?>
						<a class="btn btn-default" disabled>다음</a>
						<a class="btn btn-default" disabled>>></a>
					<?php endif ?>
				</div>
			</div>
		</div>
		<?php include "../include/footer.php"; ?>
	</body>
</html>