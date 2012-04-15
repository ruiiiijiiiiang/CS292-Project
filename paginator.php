<?php
    echo 'alert("Shit went down!");';
    $options = array(
        'options' => array(
            'min_range' => 0
        ), 'flags' => FILTER_FLAG_ALLOW_OCTAL,
    ); 
    //$startingindex = $_GET["startingfrom"]; 
    //$recordcount = $_GET["recordcount"];
    //echo 'alert(' . $startingindex . ');';
    //echo 'alert(' . $recordcount . ');';
    filter_var($startingindex, FILTER_VALIDATE_INT, $options) or die();
    filter_var($recordcount, FILTER_VALIDATE_INT, $options) or die();
    $db = mysql_connect("localhost", "root", "");
    mysql_select_db("forest", $db) or die();
    $result = mysql_query("SELECT * from forest ORDER BY Name LIMIT " . $startingindex . ", " . $recordcount);
    while ($row = mysql_fetch_array($result)) {
        echo '<a class="totree" href="#"><img src=' . $row['Image'] . ' alt="Tree picture" /></a>';
    }
    mysql_close($db);
?>
