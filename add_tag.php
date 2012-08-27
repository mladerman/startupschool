<?
	require("common.php");
	
	$aid = mysql_real_escape_string($_POST["aid"]);
	$value = mysql_real_escape_string($_POST["tagval"]);
	
	$valid_sql = sprintf("SELECT * FROM tags WHERE aid='%d' AND tagval='%s'", $aid, $value);
	$valid_res = mysql_query($valid_sql);
	if(!$valid_res || mysql_num_rows($valid_res) < 1)
	{
		if($value != "")
		{
			$sql = sprintf("INSERT INTO tags (tid,aid,tagval) VALUES(NULL, '%d', '%s')", $aid, $value);
			$result = mysql_query($sql);
			$tid = mysql_insert_id();
			$array = array();
			$array["tid"] = $tid;
			echo(json_encode($array));
		}
		else
		{
			$array = array();
			$array["tid"] = "empty";
			echo(json_encode($array));
		}
	}
	else
	{
		$array = array();
		$array["tid"] = "duplicate";
		echo(json_encode($array));
	}
	
?>