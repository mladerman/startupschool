<?
	require("common.php");
	
	$comment = mysql_real_escape_string($_POST["newcommenttext"]);
	$aid = $_POST["aid"];
	
	$toreturn = array();
	
	if(!isset($_SESSION["user"]["id"]))
	{
		$toreturn["res"] = "fail";
		$toreturn["reason"] = "You must be logged in to post a comment.";
		echo(json_encode($toreturn));
		return;
	}
	
	$uid = $_SESSION["user"]["id"];
	$name = $_SESSION["user"]["name"];
	
	
	$sql = sprintf("INSERT INTO comments (cid,commenttext,aid,name,uid,ctstamp) VALUES (NULL,'%s','%d','%s','%d',NULL)", 
						$comment, $aid, $name, $uid);
	
	$result = mysql_query($sql);		
	
	if(!$result)
	{
		$toreturn["res"] = "fail";
		$toreturn["reason"] = "Something went wrong on our end!  Sorry about that, try again soon!";
	}
	else
	{
		$toreturn["res"] = "win";
		$toreturn["displayname"] = $name;
		$toreturn["commenttext"] = $comment;
		$toreturn["user"] = $uid;
	}
	echo(json_encode($toreturn));
	
?>