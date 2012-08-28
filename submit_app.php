<?
	require("common.php");


	$email = mysql_real_escape_string($_POST["email"]);
	$name = mysql_real_escape_string($_POST["fullname"]);
	$edu = mysql_real_escape_string($_POST["edu"]);
	$track = mysql_real_escape_string($_POST["track"]);
	$who = mysql_real_escape_string($_POST["whoareyou"]);
	$linkedin = mysql_real_escape_string($_POST["linkedin"]);
	$foot1 = mysql_real_escape_string($_POST["foot1"]);
	$foot2 = mysql_real_escape_string($_POST["foot2"]);
	$foot3 = mysql_real_escape_string($_POST["foot3"]);
	$foot4 = mysql_real_escape_string($_POST["foot4"]);
	$foot5 = mysql_real_escape_string($_POST["foot5"]);
	$why = mysql_real_escape_string($_POST["why"]);
	$proud = mysql_real_escape_string($_POST["proud"]);
	$awesome = mysql_real_escape_string($_POST["awesome"]);
	$other = mysql_real_escape_string($_POST["anythingelse"]);
	
	$sql = sprintf("INSERT INTO applications " .
					"(aid, email, fullname, college, track, whoareyou, linkedin, foot1, foot2, foot3, foot4, foot5, whybss, proudof, awesomehire, anythingelse) " . 
					"VALUES(NULL, '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s', '%s')", 
					$email, $name, $edu, $track, $who, $linkedin, $foot1, $foot2, $foot3, $foot4, $foot5, $why, $proud, $awesome, $other);
	$result = mysql_query($sql);
	
	$array = array();
	
	if(!$result)
	{
		$array["result"] = "error";
	}
	else
	{
		$array["result"] = "ok";
	}
	echo(json_encode($array));

?>