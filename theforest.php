<!DOCTYPE html>
<html>
<head>
  <title> TBA </title>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <meta name="keywords" content="Stories" />
  <link rel="stylesheet" type="text/css" href="general.css" />
  <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/jquery-ui.min.js"></script>
  <script type="text/javascript" src="myjquery.js"></script>
</head>

<body>
<div id="container">
<?php
include ("header.php");
include ("navigation.php");
?>
  <div id="content">
	<div id="subnav">
		 <form>
			<input type="text" name="search"/>
			<input type="submit" value="Search" />
		</form>
		<div id="subnav2">
			<?php
				$db = mysql_connect("localhost", "root","");
				mysql_select_db("forest", $db);
				$result = mysql_query("SELECT Name from forest ORDER BY Name");
				while ($row = mysql_fetch_array($result)) {
					echo '<p>' . $row['Name'] . '</p>';
				}
				mysql_close($db);
			?>
		</div>
	</div>
	<div id="gallery">
		<?php
			$db = mysql_connect("localhost", "root","");
			mysql_select_db("forest", $db);
			$result = mysql_query("SELECT Image from forest ORDER BY ID LIMIT 15");
			while ($row = mysql_fetch_array($result)) {
				echo '<img src=' . $row['Image'] . ' alt="Tree picture" />';
			}
			mysql_close($db);
		?>
		<h3><a class="loadmore" href="forestpaginator.php">More...</a></h3>
	</div>
  </div>
</div>
<?php
include ("footer.php");
?>

</body>
</html>