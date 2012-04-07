<?php
	$start = $_GET["start"]; 
	$recordcount = $_GET["recordcount"];

	// Fetch records
	$db = mysql_connect("localhost", "root","");
	mysql_select_db("forest", $db);
	$result = mysql_query("SELECT Image from forest ORDER BY Updated LIMIT " . $start . ", " . $recordcount););
	while ($row = mysql_fetch_array($result)) {
		echo '<img src=' . $row['Image'] . ' alt="Tree picture" />';
	}
	mysql_close($db);
?>