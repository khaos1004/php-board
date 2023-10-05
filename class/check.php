<?php
include "db.php";

class Check
{
	public $db;
	function __construct()
	{
		$this->db = new db();
	}

	public function idch ( array $idch )
	{
		try
		{
		$sql = $this->db->conn->prepare( "SELECT idx, account_id FROM board WHERE idx = :idx" );
		$sql->bindValue( ":idx", $idch["idx"] );
		$sql->execute();
		$result = $sql->fetch();

			if ( $result['account_id'] === $_SESSION['id'] )
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

	public function passch ( array $passch )
	{
		try
		{
		$sql = $this->db->conn->prepare( "SELECT idx FROM board where idx = :idx and password = :password" );
		$sql->bindValue( ":idx", $passch["idx"] );
		$sql->bindValue( ":password", $passch["password"] );
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