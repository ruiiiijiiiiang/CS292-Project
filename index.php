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
  <script type="text/javascript" src="jit.js"></script>
  <script type="text/javascript" src="example2.js"></script>
</head>

<body>
<div id="container">
<?php
include ("connect.php");
include ("header.php");
include ("navigation.php");
include ("var.php");
?>
  <div id="forest_content">
    <div id="subnav">
      <?php        
        $result = mysql_query("SELECT Name from forest ORDER BY Name");
        $row = mysql_fetch_array($result);
        $names = '\"' . $row['Name'] . '\"';
        while ($row = mysql_fetch_array($result))
          $names = $names . ',\"' . $row['Name'] . '\"';
        echo '<script type="text/javascript">var tags = ["'.$names. '"]; </script>';
      ?>

      <form name="frmTreeSearch" method="post">
        <input id="search" type="text" name="search"/>
        <input type="submit" value="Search" /><br/>
      </form>
    </div>
    <div id="subnav2">
      <?php
        $result = mysql_query("SELECT * from forest ORDER BY Name");
        while ($row = mysql_fetch_array($result)) {
          echo '<a href="#' . $row['Name'] . '" onclick= "myinit(&quot'. htmlspecialchars(start($row['ID'])) . '&quot, ' . $row['ID'] . ');">' . $row['Name'] . '</a><br/>';
        }
      ?>
    </div>
    <div id="infovis"></div>
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
    <div id="login">
    <iframe src="https://www.facebook.com/plugins/like.php?href=broken.html" scrolling="no" frameborder="0" style="border:none; width:325px; height:80px"></iframe>
    </div>
    <div id="welcomenote">
      <h1>Welcome to FicForest!</h1>
      <p>Welcome to FicForest, a wonderful forest of storytelling and literary adenture!</p><br />
      <p>FicForest is a website where stories are no longer static, constant things that exist  as they are written by a single author.  here writing is dynamic - always growing and branching out in new directions.</p><br />
      <p>Have you ever been reading something and wondered how the plot or characters or setting would have been affected if something had gone differently at some point or points along the way?  We believe that you shouldno longer just have to wonder - all the writing here is in a format where it's easy for stories to branch off and take any number of courses from any single point along the way.</p><br />
      <p>We are a community of authors and readers collaboratin on writing and scrutinizing every part of stories - characters, plots, settings, and everything else that comes together to make them the entertainment we so love.</p><br /><br />
      <p>Take a tour by clicking the the navigation bar above, or just jump in on your own and explore this forest of fiction for yourself!</p>
    </div>
  </div>
  <div id="tourguide_content">
    <h2>Tour Guide</h2>
    <div class="accordion">
      <h3><a href="#">1. Getting Started</a></h3>
      <div>
        <p>There are no usernames or passwords, no account creation or email confirmations.  This community is intended to be completely open to anyone, and we want to make it as easy as possible for you to just start reading and writing right away!</p><br />
        <p>You don't need to jump through any hoops to participate in our community!</p>
      </div>
      <h3><a href="#">2. Go on an Adventure</a></h3>
      <div>
        <p>Click on "The Forest."  This is where all the stories are!</p><br />
        <p>From there, you can click on any story listed on the left, search for a specific story if you know one you like or that's been recommended to you, or you can just click on a tree displayed on the right to start reading there.</p><br />
        <p>To continue reading a story, just click on a story branch stemming from the one you're already on and keep reading!  If you don't like where it's going, or would like to explore different ways the story goes at a certain point, just click on another branch coming from that same earlier point.</p>
      </div>
      <h3><a href="#">3. Contribute your own Story Branch</a></h3>
      <div>
        <p>If you're reading a story and you think of some way you'd like for it to go, you can create your own branch from which to continue the story!</p><br />
        <p>Just click "Create Branch" and you can create your own branch!  Title it, give an author name if you like (you don't have to if you prefer to be anonymous), write it, and hit "Submit."  That's all!  you're done and have contributed your own branch!</p><br />
      </div>
      <h3><a href="#">4. Plant your own Story Tree</a></h3>
      <div>
        <p>If you want to start your own new story, click "Plant a Seed" on the navigation bar at the top and just like contributing a branch to an existing story, you can title and write your own new story beginning!  Click "Finished!" when you're done, and that's all it takes!</p><br />
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
        <td><input type="text" name="Title" size="25"/></td></tr>
     <tr>
        <td width="10"></td>
        <td><label>Author:</label></td></tr>
      <tr>
        <td width="10"></td>
        <td><input type="text" name="Author" size="25"/></td></tr>
     <tr>
        <td width="10"></td>
        <td><label>Story:</label></td></tr>
      <tr>
        <td width="10"></td>
        <td><textarea type="text" name="Content" cols="25" rows="20"></textarea></td></tr>
      <tr>
        <td width="10"></td>
        <td><input id="createnode_button" type="submit" value="Publish!"/></td></tr></table>
    </form>
  </div>
  <div id="plantseed_content">
    <h2>Plant a Seed</h2>
    <div id="seedform">
    <form action="plantseed.php" target="" method="post">
    <table id="tblPlantSeed" BORDER="0" cellpadding="0" cellspacing="10" WIDTH="1000">
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
        <td><input type="submit" value="Finished!" /></td></tr>
    </table>
    </form>
    </div>
  </div>
  <div id="contactus_content">
    <h2>Contact Us</h2>
    <p>If you have any questions, comments, or suggestions for us, just <a href="mailto:webmaster.ficforest@gmail.com?Subject=Hello">send us an email</a> and we will get back to you!</p>
    <br/>
  </div>
  <div id="TOU_content">
    <?php include("termsofuse.php"); ?> 
  </div>
    <?php include ("footer.php"); ?>
</div>
</body>
</html>
