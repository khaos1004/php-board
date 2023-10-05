$( function()
{
	//로그인한 사용자가 작성자면 바로 수정 가능 아니면 패스워드 체크
	$( "button[name='edit']" ).one( "click", function()
	{
		var now_button = $ ( this );
		$.ajax
		( {
			url: "../../control/board/check_class_call.php",
			type: "POST",
			data: { "idx": $( "input[name='idx']" ).val(), "found": "idch" },
			success : function( ch )
			{
				if ( ch == "true" )
				{
					now_button.parents("div").find("input[name='title']").attr( "readonly", false );
					now_button.parents("div").find("input[name='writer']").attr( "readonly", false );
					now_button.parents("div").find("textarea[name='contents']").attr( "readonly", false );
				}
				else
				{
					var password = "<th name='hidename' class='text-center col-sm-2'>패스워드 체크</th><td name='td'><input type='password' name='password' class='form-control1'><button type='button' name='pwdch' class='btn btn-default btt-position'>패스워드 체크</button></td>";
					$( '.passwordch' ).append( password );
				}
			}
			, error : function( error )
			{
				alert( "오류가 발생하였습니다." );
			}
		} );
	} );

	//게시글 패시워드 체크
	$( document ).one( "click", "button[name='pwdch']", function()
	{
		var now_button = $ ( this );
		$.ajax
		( {
			url: "../../control/board/check_class_call.php?found=passch",
			type: "POST",
			data: { "idx": $( "input[name='idx']" ).val(), "password": $( "input[name='password']" ).val() },
			success : function( suc )
			{
				if ( suc == "true" )
				{
					now_button.parents("div").find("th[name='hidename']").hide();
					now_button.parents("div").find("td[name='td']").hide();
					now_button.parents("div").find("input[name='password']").hide();
					now_button.parents("div").find("button[name='pwdch']").hide();
					now_button.parents("div").find("input[name='title']").attr( "readonly", false );
					now_button.parents("div").find("input[name='writer']").attr( "readonly", false );
					now_button.parents("div").find("textarea[name='contents']").attr( "readonly", false );
					var re_ch = now_button.parents("div").find("button[name='edit']");
					var btnch = "<button type='button' name='delete' class='btn btn-default btt-position' style='margin-bottom:15px'>삭제</button>\n\
							  <button type='button' name='store' class='btn btn-default btt-position' style='margin-bottom:15px'>변경사항 저장</button>";
					re_ch.replaceWith( btnch );
				}
				else
				{
					alert ( "패스워드가 맞지않거나 패스워드를 입력해주세요!" );
					location.href="read.php?idx=<?= $idx ?>";
				}
			}
			, error : function( error )
			{
				alert( "오류가 발생하였습니다." );
			}
		} );
	} );

	$( document ).on("click", "button[name='delete']", function()
	{
		if ( confirm( "삭제하시겠습니까?") )
		{
			$.ajax
			( {
				url: "../../control/board/board_class_call.php?found=delete",
				type: "POST",
				data: { "idx": $( "input[name='idx']" ).val(), "password": $( "input[name='password']" ).val() } ,
				success : function( ch )
				{
					if ( ch == "true" )
					{
						alert ( "삭제 완료" );
						location.href="index.php";
					}
					else
					{
						alert ( "입력정보를 다시확인해 주세요" );
					}
				}
				, error : function( error )
				{
					alert( "오류가 발생하였습니다." );
				}
			} );
		}
		else
		{
			alert ( "삭제 하지 않습니다" );
		}
	} );

				   $( document ).on( "click", "button[name='store']", function()
	{
		if ( $( "input[name='title']" ).val() != "" && $( "input[name='writer']" ).val() != "" && $( "textarea[name='contents']" ).val() != "" )
		{
			if ( confirm( "수정하시겠습니까?" ) )
			{
				$.ajax
				( {
					url: "../../control/board/board_class_call.php?found=update",
					type: "POST",
					data: { "idx": $("input[name='idx']").val(), "title": $( "input[name='title']" ).val(), "writer": $( "input[name='writer']" ).val(), "contents": $( "textarea[name='contents']" ).val() },
					success : function( suc )
					{
						if ( suc == "true" )
						{
							alert ( "수정완료" );
							location.href="read.php?idx=<?= $idx ?>";
						}
						else
						{
							alert ( "에러 발생" );
						}
					}
					, error : function( error )
					{
						alert( "오류가 발생하였습니다." );
					}
				} );
			}
			else
			{
				alert( "변경사항 없습니다." );
			}
		}
		else
		{
			alert( "내용을 입력해 주세요!." );
		}
	} );

	//댓글 생성
	$( "button[name='re']" ).on( "click", function()
	{
		if ( /^[0-9]{4}$/.test ( $( "input[name='replypwd']" ).val() ) )
		{
			$.ajax
			( {
				url: "../../control/board/reply_class_call.php?found=create",
				type: "POST",
				data: { "board_idx": $( "input[name='idx']" ).val(), "name": $( "input[name='replyid']" ).val(), "password": $( "input[name='replypwd']" ).val(), "contents": $( "textarea[name='replycontents']" ).val() },
				success : function( ch )
				{
					console.log(ch);
					if ( ch == "true" )
					{
						alert( "댓글저장 완료" );
					}
					else
					{
						alert( "댓글을 확인해 주세요" );
					}
				}
				, error : function( error )
				{
					alert( "오류가 발생하였습니다." );
				}
			} );
		}
		else
		{
			alert( "숫자 4자리만 입력가능 합니다" );
		}
	} );

	//댓글 패스워드 입력창 생성
	$( "button[name='re_read']" ).one( "click",  function()
	{
		var re_ch = $( "button[name='re_read']" ).index( this );
		var password = "<span class='glyphicon glyphicon-ok'></span><input type='password' name='reply_editch' class='form-control'>\n\
						<button type='button' name='replypwdch' class='btn btn-default btt-position'>체크</button>";
		$( "button[name='re_read']" ).eq( re_ch ).replaceWith( password );
	} );

	//댓글 패스워드 확인
	$( document).on( "click", "button[name='replypwdch']", function()
	{
		var now_button = $ ( this );
		$.ajax
		( {
			url: "../../control/board/reply_class_call.php?found=passwordch",
			type: "POST",
			data: { "idx": now_button.parents("div").attr("idx"), "password": now_button.prev("input[name='reply_editch']").val() },
			success : function( ch )
			{
				if ( ch == "true" )
				{
					var replyidx = now_button.prevAll("input[name='replyid_read']").attr('idx');
					now_button.prevAll(".glyphicon").hide();
					now_button.prev("input[name='reply_editch']").hide();
					now_button.prevAll("input[idx="+replyidx+"]").attr( "readonly", false );
					now_button.parents("div").find("textarea[idx="+replyidx+"]").attr( "readonly", false );
					now_button.replaceWith( "<button type='button' name='replydel' class='btn btn-default btt-position'>삭제</button>\n\
										  <button type='button' name='editdone' class='btn btn-default btt-position'>수정완료</button>" );
					alert ( "패스워드 확인 완료" );
				}
				else
				{
					alert( "패스워드를 확인해 주세요" );
				}
			}
			, error : function( error )
			{
				alert( "오류가 발생하였습니다." );
			}
		} );
	} );

	//댓글 수정
	$( document).on( "click", "button[name='editdone']", function()
	{
		var now_button = $ ( this );
		$.ajax
		( {
			url: "../../control/board/reply_class_call.php?found=update",
			type: "POST",
			data: { "idx":now_button.parents("div").attr("idx"), "name": now_button.prevAll("input[name='replyid_read']").val(), "contents": now_button.parents("div").find("textarea[name='replycontents_read']").val() },
			success : function( ch )
			{
				if ( ch == "true" )
				{
					alert( "수정완료" );
					location.href="read.php?idx=<?= $idx ?>";
				}
				else
				{
					alert( "수정실패 했습니다." );
				}
			}
			, error : function( error )
			{
				alert( "오류가 발생하였습니다." );
			}
		} );
	} );

	//댓글 삭제
	$( document).on( "click", "button[name='replydel']", function()
	{
		var now_button = $ ( this );
		$.ajax
		( {
			url: "../../control/board/reply_class_call.php?found=delete",
			type: "POST",
			data: { "idx":now_button.parents("div").attr("idx"), "password": now_button.prevAll("input[name='reply_editch']").val() },
			success : function( ch )
			{
				if ( ch == "true" )
				{
					alert( "삭제" );
					location.href="read.php?idx=<?= $idx ?>";
				}
				else
				{
					alert( "삭제 실패 했습니다." );
				}
			}
			, error : function( error )
			{
				alert( "오류가 발생하였습니다." );
			}
		} );
	} );
} ) ;