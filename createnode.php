<html>
<?php
  $Title = mysql_real_escape_string($_POST['Title']);
  $Author = mysql_real_escape_string($_POST['Author']);
  $Story = mysql_real_escape_string($_POST['Story']);
  $tree_id = mysql_real_escape_string($_POST['tree_id']);
  $parent_id = mysql_real_escape_string($_POST['node_id']);
  
  include ("connect.php");
  //$result = mysql_query("INSERT INTO /*tree id*/ ( Name) VALUES ('$Name')");
  
?>
</html>