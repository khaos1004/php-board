<?php
include "db.php";

class Read
{
	public $db;
	public $page;
	public $result;
	public $idx;
	function __construct( array $data )
	{
		$this->db = new db();
		$this->page = $data["page"];
		$this->idx= $data["idx"];

		$board_sel=$this->db->conn->prepare( "SELECT  idx, account_id, title, writer, contents FROM board where idx=:idx" );
		$board_sel->bindValue( ":idx", $this->idx );
		$board_sel->execute();
		$this->result=$board_sel->fetch();

		$all_sel=$this->db->conn->prepare( "SELECT board.idx FROM board JOIN view ON board.idx = view.board_idx AND board.ip = view.ip where board.idx = :idx" );
		$all_sel->bindValue(":idx", $this->idx );
		$all_sel ->execute();
		$result_view=$all_sel->fetchall();

		if( empty( $result_view ) )
		{
			$view_insert = $this->db->conn->prepare( "INSERT INTO view SET board_idx = :board_idx, view=view + 1, ip = :ip" );
			$view_insert->bindValue( ":board_idx", $this->idx );
			$view_insert->bindValue( ":ip", $_SERVER["REMOTE_ADDR"] );
			$view_insert->execute();
		}
	}

	public function read_print ()
	{
		$sql = "SELECT idx, name, contents, date_insert FROM reply WHERE board_idx = :idx ORDER BY idx DESC";
		$sql_read = $this->db->conn->prepare( $sql );
		$sql_read->bindValue( ":idx", $this->idx );
		$sql_read->execute();

		$tr = "";
		$board_data = array ( "name", "contents" );

		while ( $row = $sql_read->fetch( PDO::FETCH_ASSOC ) )
		{
			$tr .= "<div class='card-body'>"
					. "<ul class='list-group list-group-flush'>"
					. "<li class='list-group-item'>"
					. "<div name='test' class='form-inline mb-3' idx=".$row['idx'].">"
					. "<span class='glyphicon glyphicon-user'></span>";
			foreach( $board_data as $k)
			{
				$tr .= ( $k == "name" ? "<input idx=".$row['idx']." type='text' name='replyid_read' class='form-control' value='$row[$k]' readonly>"
						. "<button idx=".$row['idx']." type='button' name='reply_plus' class='btn btn-default btt-position'>댓글 달기</button>"
						. "<button idx=".$row['idx']." type='button' name='re_read' class='btn btn-default btt-position'>수정</button></div>"
						: "<textarea idx=".$row['idx']." class='form-control' name='replycontents_read' rows='2' style='margin-top:10px' readonly>".$row[$k]."</textarea>"
						. "</li>" );
			}
			$tr .=  "</ul>"
				. "</div>";
		}
		return $tr;
	}
}
?>
