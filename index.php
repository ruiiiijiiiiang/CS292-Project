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
            echo '<a class="totree" href="#">' . $row['Name'] . '</a>';
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
          echo '<a class="totree" href="#"><img src=' . $row['Image'] . ' alt="Tree picture" /></a>';
        }
        mysql_close($db);
      ?>
    </div>
  </div>
  <div id="home_content">
      <h2>Home</h2>
  </div>
  <div id="tourguide_content">
    <div class="accordion">
      <a><h2>1. Getting Started</h2></a>
      <div>
        <ol>
          <li>Enter valid E-mail</li>
          <li>Fill out information </li>
          <li>Check email for confirmation email</li>
          <li>Login with password</li>
        </ol>
      </div>
      <a><h2>2. Go on an Adventure</h2></a>
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
    <form id="createnode">
      <h2>Create Node</h2>
        Author: <input type="text" name="Author" /> <br/>
        Story:  <textarea type="text" name="Content" > </textarea> <br/>
                <input type="submit" value="Finished!" />
    </form>
    <div id="bookmarks">
      <h2>Bookmarks</h2>
    </div>
  </div>
  <div id="plantseed_content">
    <form>
      Story name:   <input type="text" name="Name" /> <br/>
      Author: <input type="text" name="Author" /> <br/>
      Story:  <textarea type="text" name="Content"></textarea> <br/>
      Invite: <input type="text" name="email" /><br/>
              <input type="submit" value="Finished!" />
    </form>
  </div>
  <div id="contactus_content">
    <h2>Contact Us</h2>
    <form>
      Your name:   <input type="text" name="Name" /> <br/>
      Your E-mail: <input type="text" name="Email" /> <br/>
      Message:  <textarea type="text" name="Message"></textarea> <br/>
              <input type="submit" value="Send!" />
    </form>
  </div>
  <div id="TOU_content">
    <h2>Terms of Use</h2>
  </div>
</div>
</div>
<?php
include ("footer.php");
?>

</body>
</html>
