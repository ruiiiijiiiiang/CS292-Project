<?php

	// validate input

	$options = array(

		'options' => array(

			'min_range' => 0 // the input must be a non-negative integer

		), 'flags' => FILTER_FLAG_ALLOW_OCTAL,

	);

	$startingindex = $_GET["startingfrom"];

	$recordcount = $_GET["recordcount"];

	filter_var($recordcount, FILTER_VALIDATE_INT, $options) or die();

	if (!filter_var($startingindex, FILTER_VALIDATE_INT, $options) && $startingindex != 0) die(); // 0 and FALSE are of the same value



	// Fetch records

	$db = mysql_connect("localhost", "root", "");

	mysql_select_db("forest", $db) or die();

	$result = mysql_query("SELECT * from forest ORDER BY Name LIMIT " . $startingindex . ", " . $recordcount);
	while ($row = mysql_fetch_array($result)) {
		echo '<a class="totree" href="#"><img style"=margin-left:5px" src=' . $row['Image'] . ' alt="Tree Picture" /></a>';
	}
	mysql_close($db);

?>
