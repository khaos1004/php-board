$( function()
{
	$( "input[name='check']" ).on( "click", function()
	{
		if ( $( "input[name='title']" ).val() == "" || $( "input[name='title']" ).val().indexOf( "<script>" ) != -1 )
		{
			alert ( "제목을 확인 해주세요" ) ;
			return false ;
		}
		else if ( $( "input[name='writer']" ).val() == "" || $( "input[name='writer']" ).val().indexOf( "<script>" ) != -1 )
		{
			alert ( "작성자를 확인 해주세요" ) ;
			return false ;
		}
		else if ( $( "textarea[name='contents']" ).val() == "" || $( "textarea[name='contents']" ).val().indexOf( "<script>" ) != -1 )
		{
			alert ( "내용을 확인 해주세요" ) ;
			return false ;
		}
		else if ( ! /^[0-9]{4}$/.test ( $( "input[name='password']" ).val() ) )
		{
			alert ( "password는 숫자 4자리 입니다" ) ;
			return false ;
		}
		else
		{
			$.ajax
			( {
				url: "../../control/board/board_class_call.php?found=create",
				type: "POST",
				data: { "title": $( "input[name='title']" ).val(), "writer": $( "input[name='writer']" ).val(), "contents": $( "textarea[name='contents']" ).val(), "password": $( "input[name='password']" ).val() },
				success : function( ch )
				{
					if ( ch === "true" )
					{
						alert( "게시글 저장 완료" );
						location.href="index.php";
					}
					else
					{
						alert( "게시글 입력을 확인 해주세요" );
					}
				}
				, error : function( request, status, error )
				{
					alert( "code = "+ request.status +"\n" + "message = " + request.responseText +"\n" + "error" + error );
				}
			} );
		}
	} );
} );