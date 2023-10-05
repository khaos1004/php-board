<?php
include "../include/session.php";
include "../control/db/conn.php";
include "../class/read.php";

$page = $_GET["page"];
$idx= $_GET["idx"];

//class 호출
$class = new Read ( $_GET );
$result = $class->result;
$tr = $class->read_print();

function Masking ( $data , $type = NULL )
	{
		static $match = array
		(
			'filter_Var ( $data, FILTER_VALIDATE_EMAIL )' =>
			'preg_replace ( "/^(.{2})[^@]+/" , "$1****" , $data )' ,
			'strstr ( $data , "=" )' => '********************' ,
			'preg_match ( "/^([0-9]{3})-?([0-9]{2})-?([0-9]{5})$/" , $data )' =>
			'preg_replace ( "/([0-9]{3})-?([0-9]{2})-?([0-9]\d{2})/" , "$1-***-***" , $data )' ,
			'preg_match ( "/^[a-z]{1}[a-z0-9]{5,15}$/" , $data )' =>
			'preg_replace ( "/^(.{2}).+(.{2})$/" , "$1" . str_repeat ( "*" , strlen ( $data ) - 4 ) . "$2" , $data )' ,
			'preg_match ( "/^(?:\+[0-9]{1,3}\-)?(?:010|011|016|017|018|019)\-(?:[1-9]{1}[0-9]{2,4})\-(?:[0-9]{4})$/" , $data )' =>
			'preg_replace ( "^(\d{3})-?(\d{1,2})\d{2}-?(\d{1,2})\d{2}$^" , "$1-$2**-$3**" , $data )'
//			'isset ( $type )' => 'isset ( $type )'
		) ;
		foreach($match as $k => $v) {
			if( $k == NULL ){
				if ( $type == 'id' )
			    return preg_replace ( '/^(.{3})[^@]+/' , '$1****' , $data ) ;

				if ( $type == 'name' )
				{
					if ( mb_strlen ( $data , 'UTF-8' ) > 3 )
					{
						return preg_replace ( '/.(?!...)/u' , '*' , $data ) ;
					} else {
						return preg_replace ( '/.(?=.$)/u' , '*' , $data ) ;
					}
				}
			}
			if( $k ) return $v ;
		}

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
			<h3><b> <? echo Masking('010-7794-6488'); ?></b></h3>
		</div>

		<div class="row">
			<div class="col-sm-2">
				<div class="list-group">
					<a class="list-group-item disabled">게시판 목록</a>
					<a href="/board/" class="list-group-item">자유 게시판</a>
				</div>
			</div>
			<form method="POST">
				<div class="col-sm-6 col-sm-offset-1">
					 <table class ="table table-bordered">
						<tbody>
							<tr>
								<th class="text-center col-sm-2">글번호 </th>
								<td><input name="idx" class="form-control" value="<?= $idx ?>" readonly></td>
							</tr>

							<tr>
								<th class="text-center col-sm-2">제목</th>
								<td><input name="title" class="form-control" value="<?= $result["title"] ?>" readonly></td>
							</tr>

							<tr>
								<th class="text-center col-sm-2">작성자</th>
								<td><input name="writer" class="form-control" value="<?= $result["writer"] ?>" readonly></td>
							</tr>
							<tr>
								<th class="text-center col-sm-2">내용</th>
								<td><textarea row="30" name="contents" class="form-control" readonly><?= $result["contents"] ?></textarea></td>
							</tr>
							<tr  class="passwordch">
							</tr>
						</tbody>
					</table>
					<a href="index.php?<?= $page ?>" type="button" class="btn btn-default" style="margin-bottom:15px">목록</a>
					<a href="read.php?idx=<?= $idx ?>" type="button" class="btn btn-default btt-position" style="margin-bottom:15px">취소</a>
					<button type="button" name="edit" class="btn btn-default btt-position" style="margin-bottom:15px">수정</button>
				</div>
			</form>
		</div>
		<div class="row">
			<form name="replyform" method="POST">
				<div class="col-sm-6 col-sm-offset-3">
					<?= $tr ?>
				</div>
			</form>
		</div>

		<div class="row">
			<form name="replyform" method="POST">
				<div class="col-sm-6 col-sm-offset-3">
					<div class="card-body">
						<ul class="list-group list-group-flush">
							<li class="list-group-item">
							<div class="form-inline mb-2">
								<span class="glyphicon glyphicon-user"></span>
								<input type="text" name="replyid" class="form-control" placeholder="닉네임을 입력해주세요!">
								<span class="glyphicon glyphicon-ok"></span>
								<input type="password" name="replypwd" class="form-control" placeholder="숫자 4자리만 입력 하세요!">
								<button name="re" class="btn btn-default btt-position">댓글 저장</button>
							</div>
							<textarea class="form-control" name="replycontents" rows="2" style="margin-top:10px"></textarea>
							</li>
						</ul>
					</div>
				</div>
			</form>
		</div>
		<?php include "../../include/footer.php"; ?>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js" language ="javascript"></script>
		<script src="../js/board/read.js" language ="javascript"></script>
	</body>

</html>