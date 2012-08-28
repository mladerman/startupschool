<?
	// configuration
    require_once(dirname(__FILE__) . "/config.php");
	require("common.php");
	$id = $_POST["id"];
	
	if($id == 0)
	{
		$id = $_SESSION["userid"];
	}

	$sql = sprintf("SELECT * FROM comments WHERE student_id='%d' ORDER BY timestamp ASC", $id);
	$result = mysql_query($sql);

    if($result)
    {
        $comments = array();
        
        while($row = mysql_fetch_assoc($result))
        {          
            $comment = array();
            $comment["comment"] = $row["comment"];
			$comment["timestamp"] = $row["timestamp"];
			$comment["advname"] = $row["advisor_name"];
            
            $comments[] = $comment;
        }
        echo(json_encode($comments));        
    }
?>