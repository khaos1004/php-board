<?php
class db
{
	public $servername = "10.101.0.12";
	public $username = "je";
	public $password = "keroro2424.";
	public $dbname = "mem";
	public $conn;
	function __construct()
		{
			$this->conn = new PDO( "mysql:host=$this->servername;dbname=$this->dbname;charset=utf8", $this->username, $this->password );
			$this->conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		}
}


