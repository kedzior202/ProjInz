<?php
	function getUserById($id)
	{
		require('vars.php');
		$conn = new mysqli($host, $login, $pass, $dbname);

		if ($conn->connect_error)
		{
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT * FROM $dbname.users WHERE user_id = $id";
		$result = $conn->query($sql);

		if ($result->num_rows > 0)
		{
			$row = $result->fetch_assoc();
		    $json = json_encode($row, JSON_PRETTY_PRINT);
		    return $json;
		}
		else 
		{
		    return "no results";
		}
	
		$conn->close();
	}

	function getPasswordByLogin($login)
	{
		require('vars.php');
		$conn = new mysqli($host, $login, $pass, $dbname);

		if ($conn->connect_error)
		{
		    die("Connection failed: " . $conn->connect_error);
		} 

		$sql = "SELECT * FROM $dbname.users WHERE login = '$login'";
		$result = $conn->query($sql);

		if ($result->num_rows > 0)
		{

			$row = $result->fetch_assoc();
		  
		    
			return $row['password'];
		  
		}
		else 
		{
		    return "no results";
		}
	
		$conn->close();
	}


?>	