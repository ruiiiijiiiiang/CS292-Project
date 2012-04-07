<!DOCTYPE html>
<html>
<head>
  <title> TBA </title>
  <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
  <meta name="keywords" content="Stories" />
  <link rel="stylesheet" type="text/css" href="general.css" />
</head>
<body>

<div id="container">
<?php
include ("header.php");
include ("navigation.php");
?>
  <div id="content">
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