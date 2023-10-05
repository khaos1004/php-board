<?php defined ( 'FRAMEWORK' ) OR exit ( '접근이 불가능합니다.' ) ;
/**
 * $data 마스킹 처리를 위한 클래스
 * @package SOF
 * @subpackage Classes
 * @author 제성현 <khaos1004@smileserv.com>
 * @since 2022년 05월 30일
 */
class Masking
{
  /**
	* 이메일주소 , 휴대폰번호, 사업자 번호 등을 마스킹(**) 처리한다.
	* @param string $type 체크 문자열
	* @param string $data 타입 분류
	* @return string $maskingVal 마스킹 처리후 문자열 반환
	*/

	//클래스 멤버 변수 선언
	private $data ;
	private $type ;

	// 정규식을 사용하여 $data변수의 값이 매치 되는지 확인 하기위한 배열
	private $match = array
	(
		'bid' => '/^([0-9]{3})-?([0-9]{2})-?([0-9]{5})$/' ,
		'id' => '/^[a-z]{1}[a-z0-9]{4,15}$/' ,
		'phone' => '/^(?:\+[0-9]{1,3}\-)?(?:01[0-9]{1})\-(?:[1-9]{1}[0-9]{2,4})\-(?:[0-9]{4})$/' ,
		'nice' => '/^=/' ,
		'email' => '/^[_\.0-9a-zA-Z-]+@([0-9a-zA-Z][0-9a-zA-Z-]+\.)+[a-zA-Z]{2,6}$/i'
	) ;

	// 클래스 생성자 , 인스턴스 생성시 자동으로 호출되며 $data , $type 변수 초기화
	public function __construct ( $data , $type = null )
	{
		// $type이 null 값이 아닌 경우
		if ( ! is_null ( $type ) )
			$this->setType ( $type ) ;

		// $data에 값이 있을 경우
		if ( ! empty ( $data ) )
			$this->setData ( $data ) ;
	}

	// $data 초기화 함수
	private function setData ( $data )
	{
		$this->data = $data ;
	}

	// $type 초기화 함수
	private function setType ( $type )
	{
		$this->type = $type ;
	}

	// $match 배열, 정규식을 이용하여 $data가 일치 하는지 체크 하는 반복문 , 일치하면 bid , id , phone , nice , email 중에 알맞는 메소드 호출
	public function getData ()
	{
		// name 작업 , $type이 name일경우 name 메소드 호출
		if ( $this->type == 'name' )
			return self::name () ;

		foreach ( $this->match as $k => $v )
		{
			if ( preg_match ( $v , $this->data ) )
				return self::$k () ;
		}
		// $data가 일치하는 조건이나 정규식이 없음
		return $this->data ;
	}

	// 사업자 번호 처리 : 123-**-**345
	private function bid ()
	{
		return preg_replace ( '/([0-9]{3})-?([0-9]{2})-?([0-9][0-9]{2})/' , '$1-***-***' , $this->data ) ;
	}

	// 아이디 : ab***fg
	private function id ()
	{
		// id 자릿수가 5개이거나 5개 이하 작업 abc***
		if ( mb_strlen ( $this->data , CHARSET ) <= 5 )
			return preg_replace ( '/^(.{2})[^@]+/' , '$1***' , $this->data ) ;

		return preg_replace ( '/^(.{2}).+(.{2})$/' , '$1' . str_repeat ( '*' , strlen ( $this->data ) - 4 ) . '$2' , $this->data ) ;
	}

	// 휴대폰 국번 3자리 : 010-1**-34**, 휴대폰 국번 4자리 : 010-12**-34**
	private function phone ()
	{
		$length = mb_strlen ( str_replace ( '-' , '' , $this->data ) ) ;
		$pattern = '^([0-9]{3})-?([0-9]{1})[0-9]{2}-?([0-9]{1,2})[0-9]{2}$^' ;
		return preg_replace ( $length == 10 ? $pattern : str_replace ( '[0-9]{1}' , '[0-9]{1,2}' , $pattern ) , '$1-$2**-$3**' , $this->data ) ;
	}

	// nice_ci 및 nice_di : 전체마스킹
	private function nice ()
	{
		return '********************' ;
	}

	// Email 처리 : 앞 2자리** 마스킹
	private function email ()
	{
		return preg_replace ( '/^(.{2})[^@]+/' , '$1****' , $this->data ) ;
	}

	// name 작업 , name이 3글자인경우 홍*동 3글자보다 클 경우 홍**동
	private function name ()
	{
		return preg_replace ( mb_strlen ( $this->data , CHARSET ) > 3 ? '/.(?!...)/u' : '/.(?=.$)/u' , '*' , $this->data ) ;
	}
}
