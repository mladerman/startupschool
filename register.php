<?

	require("common.php");
	
	$name = mysql_real_escape_string($_POST["fullname"]);
	$email = mysql_real_escape_string($_POST["email"]);
	$password = $_POST["reg_pw"];
	$password2 = $_POST["reg_pw2"];
	$reason = "<b>Registration Failed:</b><ul>";
	
	$sql_emailcheck = sprintf("SELECT * FROM users WHERE email='%s'", $email);
	$result_emailcheck = mysql_query($sql_emailcheck);
	
	if($name == "" || $email == "" || $password == "" || $password2 == "")
	{
		$reason .= "<li class=\"square\">A field was left blank.</li>";
	}
	
	if(mysql_num_rows($result_emailcheck) > 0)
	{
		$reason .= "<li class=\"square\">Specified email address is already linked to an account.</li>";
	}
	
	if($password != $password2)
	{
		$reason .= "<li class=\"square\">Password fields did not match.</li>";
	}
	
	$array = array();
	$reason .= "</ul>";
	$array["reason"] = $reason;
	
	if($reason == "<b>Registration Failed:</b><ul></ul>")
	{
		// success
		$hash = crypt($password);
		$array["success"] = "success";
		$sql = sprintf("INSERT INTO users (uid, email, password, confirmed, name, privilege) VALUES(NULL, '%s', '%s', 0, '%s', 'test')", 
							$email, $hash, $name);
		$res = mysql_query($sql);
		
		$array["reason"] = "Your request has been received; an administrator will contact you once it had been processed.";
	}
	else
	{
		$array["success"] = "failure";
	}
	
	echo(json_encode($array));

?>