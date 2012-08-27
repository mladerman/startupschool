<?
	require("common.php");
	
	$sql = sprintf("SELECT DISTINCT tagval FROM tags ORDER BY tagval ASC");
	$result = mysql_query($sql);
	
	$toreturn = array();
	$thetags = array();
	
	while($row = mysql_fetch_array($result))
	{
		$thetags[] = stripslashes($row["tagval"]);
	}
	
	$toreturn["tags"] = $thetags;
	
	echo(json_encode($toreturn));

?>