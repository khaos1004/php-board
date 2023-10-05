<?php
include "db.php";

class Paging
{
	public $page_row = 10; // 한페이지 줄 수
	public $block = 5; // 한페이지 블럭 수
	public $page;
	public $db;
	public $total_page;

	function __construct( $data_page )
	{
		$this->db = new db();
		$this->page = ( !empty( $data_page ) && $data_page > 1 ? $data_page : 1 );
		$count = $this->db->conn->prepare( "SELECT COUNT(*) as total FROM board" );
		$count->execute();
		$totalcount = $count->fetch();
		$this->total_page = ceil( intval( $totalcount['total'] ) / $this->page_row );
	}

	public function paging_btn ()
	{
		$btn = array();
		$paging = ( intval( ( 1 - ceil( $this->page / $this->block ) ) * $this->block ) == 0 ? intval( ( 1 - ceil( $this->page / $this->block ) ) * $this->block ) : intval( ( 1 - ceil( $this->page / $this->block ) ) * $this->block ) + 1);
		for ( $i = $paging; $i < $this->total_page; $i++ )
		{
			array_push($btn, $i);
		}
		$btn = array_slice( $btn, $paging, $this->block );
		return $btn;
	}

	public function board_print ()
	{
		$start = 10 * ( intval( $this->page ) - 1 ); // page 값이 2부터 -1
		$sql = "SELECT DISTINCT board.idx as idx , board.title as title, board.writer as writer, board.date_insert as date_insert, board.comment as comment, view.view as view "
		. "from board LEFT JOIN view ON view.board_idx = board.idx ORDER BY board.idx DESC LIMIT $start, $this->page_row";
		$sql_print = $this->db->conn->query( $sql );
		$tr = "";
		$board_data = array( "idx", "title", "writer", "date_insert", "view" );

		while ( $row = $sql_print->fetch( PDO::FETCH_ASSOC ) )
		{
			$tr .= "<tr>";
			foreach ( $board_data as $k )
			{
				if ( $k == "title" ) {
					$tr .= ( $row["comment"] > 0 ? "<td><a href=read.php?idx=" . $row["idx"] . ">" . $row["title"] . " [" . $row["comment"] . "]</a></td>" : "<td><a href=read.php?idx=" . $row["idx"] . ">" . $row["title"] . "</a></td>" );
				} else {
					$tr .= "<td>" . $row[$k] . "</td>";
				}
			}
			$tr .= "</tr>\n";
		}
		return $tr;
	}
}
