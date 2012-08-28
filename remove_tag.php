<?
	require("common.php");
	
	$tid = mysql_real_escape_string($_POST["tid"]);
	$tagval = mysql_real_escape_string($_POST["tagval"]);
	
	$sql = sprintf("DELETE FROM tags WHERE tid='%d'", $tid);
	$result = mysql_query($sql);
	
?>