<?

	// database constants

	define("DB_USER","bssredesign");
	define("DB_PASS","B05t4rtup_");
	define("DB_HOST","50.63.244.173");
	define("DB_NAME","bssredesign");

	$link = mysql_connect(DB_HOST, DB_USER, DB_PASS) or die('Could not connect to mysql server.');
	mysql_select_db(DB_NAME);

	// ensure $_SESSION exists
	session_start();

	$private_pages = "admin|comment_add|comments_list|tag_add|tags_list|applications_list|applications_view|get_all_tags";

	
	if(preg_match("/(:?" . $private_pages . ")\.php$/", $_SERVER["PHP_SELF"]))
    {
		// is anyone logged in?  if not...
		if(!isset($_SESSION["user"]))
		{
			// redirect to login.php.
			$protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
			$host  = $_SERVER["HTTP_HOST"];
			$path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
			header("Location: {$protocol}://{$host}{$path}/login.php");
		}
		
    }
	
	function passtotoken($password)
	{
		$token = "";
		for($i = 0; $i < strlen($password); $i++)
		{
			if(intval($password[$i]) > 0)
			{
				$token .= $password[$i];
			}
		}
		return $token;
	}
	
	function redirect($page)
	{	
		// redirect user 
		$protocol = (isset($_SERVER["HTTPS"])) ? "https" : "http";
		$host  = $_SERVER["HTTP_HOST"];
		$path = rtrim(dirname($_SERVER["PHP_SELF"]), "/\\");
		header("Location: {$protocol}://{$host}{$path}/{$page}");
	}

?>