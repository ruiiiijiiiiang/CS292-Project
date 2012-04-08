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
  <div id="forest_content">
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
  <div id="home_content">
      <h2>Home</h2>
  </div>
  <div id="tourguide_content">
    <div class="accordion">
        <a href="#">1. Getting Started</a>
        <div>
    <ol>
      <li>Enter valid E-mail</li>
      <li>Fill out information </li>
      <li>Check email for confirmation email</li>
      <li>Login with password</li>
    </ol>
        </div>
    <a href="#">2. Go on an Adventure</a>
        <div>
    <ol>
      <li>Click "The Forest"</li>
      <li>Click on a tree or one of the tree names in the list</li>
      <li>Read the node</li>
      <li>Click on an adjacent node to continue the story</li>
    </ol>
        </div>
    </div>
  </div>
  <div id="plantseed_content">
        <form>
                        Name: <input type="text" name="Name" /> <br/>
                        Author: <input type="text" name="Author" /> <br/>
                        Story: <input type="text" name="Content" /> <br/>
                        Invite: <input type="text" name="email" /><br/>
                        <input type="submit" value="Finished!" />
        </form>
  </div>


</div>
<?php
include ("footer.php");
?>

</body>
</html>
