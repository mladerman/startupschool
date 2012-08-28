<?
	require("common.php");
	
	$email = mysql_real_escape_string($_POST["username"]);
	$password = $_POST["password"];
	
	$sql = sprintf("SELECT * FROM users WHERE email='%s'", $email);
	$result = mysql_query($sql);
	
	if(mysql_num_rows($result) == 1)
	{
		$row = mysql_fetch_array($result);
		$hash = $row["password"];
		
        if (crypt($password, $hash) == $hash)
        {
			$confirmed = $row["confirmed"];
			if($confirmed == 1)
			{
				$_SESSION["user"] = array();
				$_SESSION["user"]["name"] = $row["name"];
				$_SESSION["user"]["email"] = $row["email"];
				$_SESSION["user"]["id"] = $row["uid"];
				$array = array();
				$array["confirmed"] = 1;
				echo(json_encode($array));
			}
			else
			{
				$array = array();
				$array["confirmed"] = 0;
				echo(json_encode($array));
			}
		}
	}

?>