<?
	require("common.php");

	$arg = $_POST["arg"];
	$filter = $_POST["filter"];
	$search = mysql_real_escape_string($_POST["search"]);
	$aid = $_POST["aid"];
	$sql = sprintf("SELECT * FROM applications ORDER BY aid DESC");
	

	if($arg == "single")
	{
		$sql = sprintf("SELECT * FROM applications WHERE aid='%d'", $aid);
	}
	else if($arg == "filter")
	{
		if($search != "ALL")
		{
			$sql = sprintf("SELECT * FROM applications 
							LEFT JOIN tags 
							ON applications.aid=tags.aid
							WHERE tags.tagval='%s' AND applications.reapplication=0
							ORDER BY applications.aid DESC", $search);
		}
	}
	else if($arg == "search")
	{
		$sql = sprintf("SELECT * FROM applications 
						LEFT JOIN tags 
						ON applications.aid=tags.aid
						WHERE tags.tagval='%s' AND applications.reapplication=0
						ORDER BY applications.aid DESC", $search);
	}
	
	$result = mysql_query($sql);
	
	$array = array();
	
	while($row = mysql_fetch_array($result))
	{	
		$application = array();	
		
		// new application's info from applications
		$application["aid"] = $row["aid"];
		$application["email"] = $row["email"];
		$application["fullname"] = $row["fullname"];
		$application["edu"] = $row["college"];
		$application["track"] = $row["track"];
		$application["who"] = $row["whoareyou"];
		$application["linkedin"] = $row["linkedin"];
		$application["foot1"] = $row["foot1"];
		$application["foot2"] = $row["foot2"];
		$application["foot3"] = $row["foot3"];
		$application["foot4"] = $row["foot4"];
		$application["foot5"] = $row["foot5"];
		$application["why"] = $row["whybss"];
		$application["proudof"] = $row["proudof"];
		$application["awesomehire"] = $row["awesomehire"];
		$application["other"] = $row["anythingelse"];
		
		$application["accepted"] = 0;
		$application["rating"] = 0;

		$csql = sprintf("SELECT * FROM comments WHERE aid='%d'", $application["aid"]);
		$cres = mysql_query($csql);		
		$comments = array();		
		while($crow = mysql_fetch_array($cres))
		{
			$comment = array();
			$comment["cid"] = $crow["cid"];
			$comment["commenttext"] = stripslashes($crow["commenttext"]);
			$comment["displayname"] = stripslashes($crow["name"]);
			$comment["user"] = $crow["uid"];
			$comment["timestamp"] = $crow["ctstamp"];
			$comments[] = $comment;
		}
		$application["comments"] = $comments;
		
		$tsql = sprintf("SELECT * FROM tags WHERE aid='%d'", $application["aid"]);
		$tres = mysql_query($tsql);		
		$tags = array();		
		while($trow = mysql_fetch_array($tres))
		{
			$tag = array();
			$tag["tid"] = $trow["tid"];
			$tag["tagval"] = stripslashes($trow["tagval"]);
			$tags[] = $tag;
		}		
		$application["tags"] = $tags;
		
		$array[] = $application;
	}
	
	$all_data = array();
	$all_data["applications"] = $array;
	
	echo(json_encode($all_data));
	
?>