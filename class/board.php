<?php
include "db.php";

class Board
{
	public $db;
	function __construct()
	{
		$this->db = new db();
	}

	public function create ( array $create_data )
	{
		try
		{
			if ( empty( $create_data ) )
			{
				return false;
			}
			$password = $create_data["password"];
			$data = array ( "account_id", "title", "writer", "contents", "password", "ip" );
			if ( is_numeric( $password ) && strlen( $password ) == 4  )
			{
				$create_sql = $this->db->conn->prepare( "INSERT INTO board SET account_id = :account_id, title = :title, writer = :writer, contents = :contents, password = :password, ip = :ip");
				foreach($data as $k)
				{
					if ( $k == "account_id" )
					{
						$create_sql->bindValue ( ":" . $k, empty( $_SESSION["id"] ) ? "guest" : $_SESSION['id'] );
					}
					else
					{
						$create_sql->bindValue ( ":". $k, $k == "ip" ? $_SERVER["REMOTE_ADDR"] : $create_data[$k] );
					}
				}
				$create_sql->execute();
				return true;
			}
			else
			{
				return false;
			}
		}
		catch ( PDOException $ex )
		{
		echo "실패! : ".$ex->getMessage()."<br> error! : ".$ex->getCode()."<br> error! : ".$ex->getLine();
		}
	}

	public function delete ( array $delete_data )
	{
		try
		{
		$idx = $delete_data["idx"];
		$sql = $this->db->conn->prepare( "SELECT idx FROM board where idx = :idx and password = :password" );
		$sql->bindValue( ":idx", $idx );
		$sql->bindValue( ":password", $delete_data["password"] );
		$sql->execute();
		$result = $sql->fetch();

			if ( !empty( $result ) )
			{
				$delete_view = $this->db->conn->prepare( "DELETE FROM view WHERE board_idx = :idx" );
				$delete_view->bindValue( ":idx",  $idx );
				$delete_view->execute();

				$delete_board = $this->db->conn->prepare( "DELETE FROM board WHERE idx = :idx" );
				$delete_board->bindValue( ":idx",  $idx );
				$delete_board->execute();
				return true;
			}
			else
			{
				return false;
			}
		}
		catch ( PDOException $ex )
		{
			echo "실패! : ".$ex->getMessage()."<br> error! : ".$ex->getCode()."<br> error! : ".$ex->getLine();
		}
	}

	public function update ( array $update_data )
	{
		try
		{
		$data = array ( "title", "writer", "contents", "idx" );
		$update = $this->db->conn->prepare( "UPDATE board SET title = :title, writer = :writer, contents = :contents WHERE idx = :idx" );
			foreach($data as $k)
			{
				if ( !empty($update_data[$k]) )
				{
					$update->bindValue ( ':' .$k, $update_data[$k] );
				}
				else
				{
					return false;
				}
			}
			$update->execute();
			return true;
		}
		catch ( PDOException $ex )
		{
			echo "실패! : ".$ex->getMessage()."<br> error! : ".$ex->getCode()."<br> error! : ".$ex->getLine();
		}
	}
}
