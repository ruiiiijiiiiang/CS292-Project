<html>
<?php
  $Title = mysql_real_escape_string($_POST['Title']);
  $Author = mysql_real_escape_string($_POST['Author']);
  $Story = mysql_real_escape_string($_POST['Story']);
  $tree_id = mysql_real_escape_string($_POST['tree_id']);
  $parent_id = mysql_real_escape_string($_POST['node_id']);
  
  include ("connect.php");
  
  $result = mysql_query("INSERT INTO forest." . $tree_id . " (Title, Author, Content, rNum, rTotal, pID, cNum) VALUES ('$Title', '$Author', '$Story', '0', '0', '$parent_id', '0')");
  if ($result == 0) die(mysql_error());
  
  //FIND PARENT ROW
   $result = mysql_query("SELECT * from forest." . $tree_id . " WHERE ID = '$parent_id'");
  if ($result == 0) die(mysql_error());
  $row = mysql_fetch_array($result);
  $cNum = $row['cNum'];
  ++$cNum;
  
  //increase parent's cNum+1
  $result = mysql_query("UPDATE forest." . $tree_id . " SET cNum='$cNum' WHERE ID='$parent_id'");
  if ($result == 0) die(mysql_error());
  
  if($cNum == 1){
    //create table tree_id~parent's ID
    $result = mysql_query('CREATE TABLE `' . $tree_id . '~' . $parent_id . '` (cID int(8));');
    if ($result == 0) die(mysql_error());
  }
  
  //FIND CURRENT ID
  $result = mysql_query("SELECT * from forest." . $tree_id . " WHERE pID = '$parent_id' AND Title = '$Title'");
  if ($result == 0) die(mysql_error());
  $row = mysql_fetch_array($result);
  $current_id = $row['ID'];
  //insert current ID into the table tree_id~parent's ID
  $result = mysql_query("INSERT INTO forest.`" . $tree_id . '~' . $parent_id . "` (cID) VALUES ('$current_id')");
  if ($result == 0) die(mysql_error());
?>
</html>