<?
	require("common.php");
 
    // if user is already logged in, log out
    if (isset($_SESSION["user"]))
	{
        unset($_SESSION["user"]);
	}
	
	session_destroy();
	
	redirect("index.php");
?>