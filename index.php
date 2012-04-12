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
        $currID;
        $db = mysql_connect("localhost", "root","");
        mysql_select_db("forest", $db);
        $result = mysql_query("SELECT Name from forest ORDER BY Name");
        while ($row[] = mysql_fetch_array($result));
      ?>
      <script>
        var tags = ["<?php echo join("\", \"", $row); ?>"];
      </script>
      <form>
        <input id="search" type="text" name="search"/>
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
        $result = mysql_query("SELECT * from forest ORDER BY Updated LIMIT 15");
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
    <form id="createnode">
      <h2>Create Node</h2>
        Author: <input type="text" name="Author" /> <br/>
        Blurb: <input type="text" name="Blurb" /> <br/>
        Story: <textarea type="text" name="Content" > </textarea> <br/>
                <input type="submit" value="Finished!" />
    </form>
    <div id="bookmarks">
      <a><h2>Bookmarks</h2></a>
    </div>
    <div id="tree">
      <?php
        $db = mysql_connect("localhost", "root","");
        mysql_select_db("forest", $db);
        $result = mysql_query("SELECT * FROM forest WHERE ID=" . $currID);
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
    <form>
      <label><h2>Story name: </h2></label>
      <input type="text" name="Name" /> <br/>
      <label><h2>Author:</h2></label>
      <input type="text" name="Author" /> <br/>
      <label><h2>Story:</h2></label>
      <textarea type="text" name="Content"></textarea> <br/>
              <input class="totree" type="submit" value="Finished!" />
    </form>
    </div>
  </div>
  <div id="contactus_content">
    <h2>Contact Us</h2>
    <h3>If you have any questions, comments, or suggestions for us, just fill out the forms below and we will get back to!</h3>
    <br/>
    <form>
    <label> Your name: </label>
    <input type="text" name="Name" /> <br/>
      <label> Your E-mail: </label>
      <input type="text" name="Email" /> <br/>
      <label> Message: </label>
      <textarea type="text" name="Message"></textarea> <br/>
      <input type="submit" value="Send!" />
    </form>
  </div>
  <div id="TOU_content">
    <h2>Terms of Use</h2>
  </div>
</div>
<?php
include ("footer.php");
?>

</body>
</html>
