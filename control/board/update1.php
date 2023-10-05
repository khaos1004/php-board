<?php
include "../../include/session.php";
include "../db/conn.php";

try
{
	$idx = $_POST['idx'];
	$id = $_SESSION["id"];
	$title = $_POST["title"];
	$writer = $_POST['writer'];
	$contents = $_POST["contents"];

	$sql = $conn->prepare( "SELECT idx, password FROM board WHERE idx = :idx" );
	$sql->bindValue(":idx", $idx);
	$sql->execute();
	$result = $sql->fetch();

	if ( $id == $writer )
	{
		$duplch = $conn->prepare( "UPDATE board SET title = :title, contents = :contents WHERE idx = :idx" );
		$duplch->bindValue( ":title", $title);
		$duplch->bindValue( ":contents", $contents );
		$duplch->bindValue( ":idx", $idx );
		$duplch->execute();
                  echo "true";
	}
	else if ( $id != $writer && $_POST["password"] == $result["password"] )
	{
		$duplch = $conn->prepare( "UPDATE board SET title = :title, contents = :contents WHERE idx = :idx" );
		$duplch->bindValue( ":title", $title );
		$duplch->bindValue( ":contents", $contents );
		$duplch->bindValue( ":idx", $idx );
		$duplch->execute();
		echo "true";
	}
	else
	{
		echo "fail";
	}
}
catch ( PDOException $ex )
{
	echo "실패! : " .$ex->getMessage()."<br> error! : ".$ex->getCode()."<br> error! : ".$ex->getLine();
}
?>