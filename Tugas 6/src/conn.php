<?php
	function connection()
	{
		$dbServer = 'localhost';
		$dbUser = 'root';
		$dbPass = '';
		$dbName = "dbprofile";

		$conn = mysqli_connect($dbServer, $dbUser, $dbPass);

		if (!$conn)
			die('Connection Failed: '.mysqli_error());

		return $conn;
	}
?>
