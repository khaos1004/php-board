<?php
include "db.php";

class Reply
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
		$password = $create_data["password"];
		$reply = $this->db->conn->prepare( "INSERT INTO reply SET board_idx = :board_idx, name = :name, password = :password, contents = :contents, ip = :ip" );
		$data = array ( "board_idx", "name", "password", "contents", "ip" );

			if( is_numeric( $password ) && strlen( $password ) == 4  )
			{
				foreach ( $data as $k )
				{
					$reply->bindValue( ":".$k, $k == "ip" ? $_SERVER["REMOTE_ADDR"] : $create_data[$k] );
				}
				$reply->execute();
				$comment_up = $this->db->conn->prepare( "UPDATE board SET comment = comment +1 WHERE idx = :idx" );
				$comment_up->bindValue( ":idx", $create_data["board_idx"] );
				$comment_up->execute();
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

	public function delete ( array $del_data )
	{
		try
		{
		$sql = $this->db->conn->prepare( "SELECT idx FROM reply where idx = :idx and password = :password" );
		$sql->bindValue( ":idx", $del_data["idx"] );
		$sql->bindValue( ":password", $del_data["password"] );
		$sql->execute();
		$result = $sql->fetch();

			if ( !empty( $result ) )
			{
				$delete_reply = $this->db->conn->prepare( "DELETE FROM reply WHERE idx = :idx" );
				$delete_reply->bindValue( ":idx",  $del_data["idx"] );
				$delete_reply->execute();
				$comment_up = $this->db->conn->prepare( "UPDATE board SET comment = comment -1 WHERE idx = :idx" );
				$comment_up->bindValue( ":idx", $del_data["board_idx"] );
				$comment_up->execute();
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
		$ch = array ("name", "contents", "idx");
		$sql = $this->db->conn->prepare( "UPDATE reply SET name = :name, contents = :contents WHERE idx =:idx" );
			if ( !empty( $update_data["name"]) && !empty( $update_data["contents"] ) )
			{
				foreach ( $ch as $v )
				{
					$sql->bindValue( ":".$v, $update_data[$v] );
				}
				$sql->execute();
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

	public function passwordch ( array $check_data )
	{
		try
		{
		$sql = $this->db->conn->prepare( "SELECT idx FROM reply WHERE idx = :idx and password = :password" );
		$sql->bindValue( ":idx", $check_data["idx"] );
		$sql->bindValue( ":password", $check_data["password"] );
		$sql->execute();
		$result = $sql->fetch();

			if ( !empty( $result ) )
			{
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
}
?>