<html>
<?php
  $name = mysql_real_escape_string($_POST["Name"]);
  $author = mysql_real_escape_string($_POST["Author"]);
  $content = mysql_real_escape_string($_POST["Content"]);
 
  include("connect.php");
  $result = mysql_query("INSERT INTO forest (Name) VALUES ('$name')");
  if ($result == 0) die(mysql_error());
  
  $result = mysql_query("SELECT * from forest WHERE Name = '$name'");
  $row = mysql_fetch_array($result);
  
  $id = "";
  $id = $id . $row['ID'];
  //testing done until here
  $result = mysql_query("CREATE TABLE " . $id . "
    (
      ID INT(8) NOT NULL AUTO_INCREMENT,
      Title varchar(64),
      Author varchar(32) default 'Anonymous',
      Content varchar(1024),
      rNum int(4),
      rTotal int(4),
      pID int(8),
      cNum int(4),
      PRIMARY KEY (ID)
    );"); 
  if ($result == 0) die(mysql_error());  
  
  //insert first row into new table
?>
</html>