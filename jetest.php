<?php
/**
	 * 문자열의 일부를 숨기기 위해 다른 문자열로 대체한다.
	 * @param type $string 문자열
	 * @param type $start 시작 위치(실수: 퍼센트, 정수: offset, 기본값: 0.2)
	 * @param type $end 종료 위치(실수: 퍼센트, 정수: offset, 기본값: 0.8)
	 * @param type $hidden 숨김 문자(기본값: ●)
	 * @return mixed 처리 결과(string: 숨김 문자로 치환된 문자열, FALSE: 실패)
	 */
public static function hide ( $string , $start = 0.2 , $end = 0.8 , $hidden = '●' )
	{
		$length = mb_strlen ( $string , CHASET ) ; // mb_strlen 문자열 길이 구하는 함수

		if ( is_float ( $start ) )
			$start = ceil ( $length * $start ) ;
		if ( is_float ( $end ) )
			$end = ceil ( $length * $end ) ;
		if ( empty ( $end ) || $end > $length )
			$end = $length ;

		if ( $start >= $end )
			return Debug::error ( '시작(' . $start . ')과 종료(' . $end . ') 값이 같아서 숨겨지는 문자열이 없습니다.' ) ;

		return ( $start ? mb_substr ( $string , 0 , $start , CHARSET ) : '' ) . str_repeat ( $hidden , $end - $start ) . ( $end < $length ? mb_substr ( $string , $end , $length - $start , CHARSET ) : '' ) ;
	}
//	public static function hide ( $string , $start = 0.2 , $end = 0.8 , $hidden = '●' )
//	{
//		$length = mb_strlen ( $string , CHASET ) ; // mb_strlen 문자열 길이 구하는 함수
//
//		if ( is_float ( $start ) )
//			$start = ceil ( $length * $start ) ;
//		if ( is_float ( $end ) )
//			$end = ceil ( $length * $end ) ;
//		if ( empty ( $end ) || $end > $length )
//			$end = $length ;
//
//		if ( $start >= $end )
//			return Debug::error ( '시작(' . $start . ')과 종료(' . $end . ') 값이 같아서 숨겨지는 문자열이 없습니다.' ) ;
//
//		return ( $start ? mb_substr ( $string , 0 , $start , CHARSET ) : '' ) . str_repeat ( $hidden , $end - $start ) . ( $end < $length ? mb_substr ( $string , $end , $length - $start , CHARSET ) : '' ) ;
//	}


/*
 * Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
 * Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHP.php to edit this template
 */

/**
	 * 이메일주소 , 휴대폰번호, 사업자 번호 등을 마스킹(**) 처리한다.
	 * @param string $data 마스킹할 문자열
	 * @return string $maskingVal 마스킹 처리후 문자열 반환
	 */
	public static function Masking ( $data , $type = NULL )
	{
		// Email 처리 : 앞 2자리**  마스킹
		if ( filter_Var ( $data, FILTER_VALIDATE_EMAIL ) )
			return preg_replace ( '/^(.{2})[^@]+/' , '$1****' , $data ) ;

		// nice_ci 및 nice_di : 전체마스킹
		if ( strstr ( $data , '=' ) )
			return '********************' ;

		// 사업자 번호 처리 : 123-**-**345
		if ( preg_match ( '/^([0-9]{3})-?([0-9]{2})-?([0-9]{5})$/' , $data ) )
			return preg_replace ( '/([0-9]{3})-?([0-9]{2})-?([0-9]\d{2})/' , '$1-***-***' , $data ) ;

		// 아이디 : ab***fg
		if ( preg_match ( '/^[a-z]{1}[a-z0-9]{5,15}$/' , $data ) )
			return preg_replace ( '/^(.{2}).+(.{2})$/' , '$1' . str_repeat ( '*' , strlen ( $data ) - 4 ) . '$2' , $data ) ;

		// 휴대전화 번호
		if ( preg_match ( '/^(?:\+[0-9]{1,3}\-)?(?:010|011|016|017|018|019)\-(?:[1-9]{1}[0-9]{2,4})\-(?:[0-9]{4})$/' , $data ) )
		{
			$strlen = mb_strlen ( str_replace ( '-' , '' , $data ) ) ;

			// 휴대폰 국번 3자리 : 010-1**-**34
			if ( $strlen == 10 )
				return preg_replace ( '^(\d{3})-?(\d{1})\d{2}-?(\d{1,2})\d{2}$^' , '$1-$2**-$3**' , $data ) ;

			// 휴대폰 국번 4자리 : 010-12**-**34
			if ( $strlen == 11 )
				return preg_replace ( '^(\d{3})-?(\d{1,2})\d{2}-?(\d{1,2})\d{2}$^' , '$1-$2**-$3**' , $data ) ;
		}

		// id , name 추가 작업

		if ( isset ( $type ) )
		{
			if ( $type == 'id' )
			    return preg_replace ( '/^(.{3})[^@]+/' , '$1****' , $data ) ;

			if ( $type == 'name' )
			{
				if ( mb_strlen ( $data , CHARSET ) > 3 )
				{
				    return preg_replace ( '/.(?!...)/u' , '*' , $data ) ;
				} else {
					return preg_replace ( '/.(?=.$)/u' , '*' , $data ) ;
				}
			}
		}


		// 결과 반환
		return $data;
	}

	public static function Masking ( $data , $type = NULL )
	{
		$match = array
		(
			'bid' => '/^([0-9]{3})-?([0-9]{2})-?([0-9]{5})$/' ,
			'id' => '/^[a-z]{1}[a-z0-9]{5,15}$/',
			'phone' => '/^(?:\+[0-9]{1,3}\-)?(?:010|011|016|017|018|019)\-(?:[1-9]{1}[0-9]{2,4})\-(?:[0-9]{4})$/'
		) ;
		$check = array
		(
			'length10' => '^(\d{3})-?(\d{1})\d{2}-?(\d{1,2})\d{2}$^' ,
			'length11' => '^(\d{3})-?(\d{1,2})\d{2}-?(\d{1,2})\d{2}$^' ,
			'namelen3' => '/.(?=.$)/u' ,
			'namelen4' => '/.(?!...)/u' ,
			'bid' => '/([0-9]{3})-?([0-9]{2})-?([0-9]\d{2})/' ,
			'id' => '/^(.{2}).+(.{2})$/'
		) ;

		// Email 처리 : 앞 2자리**  마스킹
		if ( filter_Var ( $data, FILTER_VALIDATE_EMAIL ) )
			return preg_replace ('/^(.{2})[^@]+/', '$1****' , $data ) ;

		// nice_ci 및 nice_di : 전체마스킹
		if ( strstr ( $data , '=' ) )
			return '********************' ;



		if ( preg_match ( $match[''] , $data ) )
		{
			switch ( $data )
			{
				// 휴대폰 국번 3자리 : 010-1**-**34, 휴대폰 국번 4자리 : 010-12**-**34
				case phone :
					$strlen = mb_strlen ( str_replace ( '-' , '' , $data ) ) ;
					return preg_replace ( $check['length' . $strlen]  , '$1-$2**-$3**' , $data ) ;

				// 사업자 번호 처리 : 123-**-**345
				case bid :
					return preg_replace ( '/([0-9]{3})-?([0-9]{2})-?([0-9]\d{2})/' , '$1-***-***' , $data ) ;

				// 아이디 : ab***fg
				case id :
					return preg_replace ( '/^(.{2}).+(.{2})$/' , '$1' . str_repeat ( '*' , strlen ( $data ) - 4 ) . '$2' , $data ) ;
			}
		}

		// id , name 추가 작업
		if ( isset ( $type ) )
		{
			if ( $type == 'name' )
				return preg_replace ( $check['namelen' . ( mb_strlen ( $data , CHARSET ) > 3  ? '3' : '4' ) ] , '*' , $data ) ;
			else if ( $type == 'id' )
				return preg_replace ( '/^(.{3})[^@]+/' , '$1****' , $data ) ;
		}

		// 결과 반환
		return $data
	}


?>