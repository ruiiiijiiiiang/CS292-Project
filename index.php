<!DOCTYPE html>
<html>
<head>
  <title> Index </title>
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
      <?php
        include ("connect.php");        
        $result = mysql_query("SELECT Name from forest ORDER BY Name");
        while ($row = mysql_fetch_array($result));
      ?>
      <script>
        var tags = ["<?php echo join("\", \"", $row); ?>"];
      </script>
      <form name="frmTreeSearch" method="post">
        <input id="search" type="text" name="search"/>
        <input type="submit" value="Search" /><br/>
      </form>
    </div>
    <div id="subnav2">
      <?php
        include ("connect.php");
        $result = mysql_query("SELECT Name from forest ORDER BY Name");
        while ($row = mysql_fetch_array($result)) {
          echo '<a class="totree" href="#">' . $row['Name'] . '</a><br/>';
        }
        mysql_close($db);
      ?>
    </div>
    <div id="gallery">
      <div class="tabpaginator">
        <?php
        $result = mysql_query("SELECT COUNT(*) from forest");
        $count = mysql_result($result, 0);
        $page = 1;  $startingfrom = 0;  $recordcount = 5;
        echo '<ul><li><a href="#">Prev</a></li>';
        while ($count > $startingfrom) {
        echo '<li><a href="paginator.php?startingfrom=' . $startingfrom . '&recordcount=' . $recordcount . '">' . $page . '</a></li>';
          $page ++;  $startingfrom += $recordcount;
        }
        echo '<li><a href="#">Next</a></li></ul>';
        ?>
      </div>
    </div>
  </div>
  <div id="home_content">
    <h2>Home</h2>
    <div id="login">
      <!-- 
        <form>
          <input type="text" name="user" value="yourEmail@mail.com"/>
          <input type="submit" value="Join!" />
        </form>
      -->
    <iframe src="https://www.facebook.com/plugins/like.php?href=broken.html" scrolling="no" frameborder="0" style="border:none; width:325px; height:80px"></iframe>
    </div>
  </div>
  <div id="tourguide_content">
    <h2>Tour Guide</h2>
    <div class="accordion">
      <h3><a href="#">1. Getting Started</a></h3>
      <div>
        <ol>
          <li>Enter valid E-mail</li>
          <li>Fill out information </li>
          <li>Check email for confirmation email</li>
          <li>Login with password</li>
        </ol>
      </div>
        <h3><a href="#">2. Go on an Adventure</a></h3>
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
  <div id="tree_content">
    <form id="createnode" name="frmCreateNode" method="post">
      <h2>Create Node</h2>
    <table name="tblCreateNode" id="tblCreateNode" BORDER="0" cellpadding="0" cellspacing="0" WIDTH="400">
      <tr>
        <td width="10"></td>
        <td><label>Title:</label></td></tr>
      <tr>
        <td width="10"></td>
        <td><input type="text" name="Title" size="45"/></td></tr>
     <tr>
        <td width="10"></td>
        <td><label>Author:</label></td></tr>
      <tr>
        <td width="10"></td>
        <td><input type="text" name="Author" size="45"/></td></tr>
     <tr>
        <td width="10"></td>
        <td><label>Story:</label></td></tr>
      <tr>
        <td width="10"></td>
        <td><textarea type="text" name="Content" cols="45" rows="30"></textarea></td></tr>
      <tr>
        <td width="10"></td>
        <td><input type="submit" value="Publish!" id="tblCreateNodeSubmit"/></td></tr></table>
    </form>
    <div id="bookmarks">
      <a href="#"><h2>Bookmarks</h2></a>
    </div>
    <div id="tree">
      <?php
        include ("connect.php");
        $result = mysql_query("SELECT * FROM `forest` WHERE `ID`= $currID");
        $row = mysql_fetch_array($result);
        echo '<a class="totree" href="#">' . $row['Name'] . '</a>';
        
        //select table $currID, use mySQL and DFS to generate input for tree
        //call jquery function that is now  $(".totree").click
        
        mysql_close($db);
      ?>
    </div>
  </div>
  <div id="plantseed_content">
    <h2>Plant a Seed</h2>
    <div id="seedform">
    <form name="frmPlantSeed" method="post">
    <table name="tblPlantSeed" id="tblPlantSeed" BORDER="0" cellpadding="0" cellspacing="10" WIDTH="1000">
      <tr>
        <td width="100"></td>

        <td width="125"><label><strong>Story name: </strong></label></td>
        <td><input type="text" name="Name" size="20"/> <br/></td></tr>
      <tr>
        <td width="100"></td>
        <td width="125"><label><strong>Author:</strong></label></td>
        <td><input type="text" name="Author" size="20"/> <br/></td></tr>
      <tr>
        <td width="100"></td>
        <td width="125"><label><strong>Story:</strong></label></td>
        <td> <textarea type="text" name="Content" cols="80" rows="25"></textarea> <br/></td></tr>
      <tr>
        <td width="100"></td>
        <td><input class="totree" type="submit" value="Finished!" /></td></tr></table>
    </form>
    </div>
  </div>
  <div id="contactus_content">
    <h2>Contact Us</h2>
    <h3>If you have any questions, comments, or suggestions for us, just fill out the form below and we will get back to you!</h3>
    <br/>
    <form name="frmContactUs" method="post">
    <table name="tblContactUs" id="tblContactUs" BORDER="0" cellpadding="0" cellspacing="10" WIDTH="1000">
      <tr>
        <td width="100"></td>
        <td width="125"><label> Your name: </label></td>
        <td><input type="text" name="Name" size="30"/><br/></td></tr>
      <tr>
        <td width="100"></td>
        <td width="125"><label> Your E-mail: </label></td>
        <td><input type="text" name="Email" size="30"/><br/></td></tr>
      <tr>
        <td width="100"></td>
        <td width="125"><label> Message: </label></td>
        <td><textarea type="text" name="Message" cols="80" rows="25"></textarea><br/></td></tr>
      <tr>
        <td width="100"></td>
        <td><input type="submit" value="Send!" /></td></tr>
    </table>
    </form>
  </div>
  <div id="TOU_content">
    <h2>Terms of Service:</h2>
    <?php include("termsofuse.php"); ?> 
  </div>
</div>
<?php
include ("footer.php");
?>

</body>
</html>
