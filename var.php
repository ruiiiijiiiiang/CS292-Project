<html>
<?php
  //include("connect.php");
  $id=0;
  
  function ncolor($num, $total){
    if($total < 5){
      return '#23A4FF';
    } 
    $fraction = $num/$total;
    if($fraction < 1/8){
      return '#F00';
    }else if($fraction < 2/8){
      return '#F30';
    }else if($fraction < 3/8){
      return '#F60';
    }else if($fraction < 4/8){
      return '#F90';
    }else if($fraction < 5/8){
      return '#EF1';
    }else if($fraction < 6/8){
      return '#9F1';
    }else if($fraction < 7/8){
      return '#4F2';
    }else{
      return '#0F0';
    }
  }
  
  function helper($curr)
  {
    global $id;
    $tmp='';
    
    $result = mysql_query("SELECT cNum FROM  `$id` WHERE  `ID` = $curr");
    $row = mysql_fetch_array($result);
    if($row['cNum']!=0){    
      $result = mysql_query('SELECT cID from `' . $id . '~' . $curr . '`');
      if(!$result){
        die(mysql_error());
      }
      if($row = mysql_fetch_array($result)){
        $tmp = $tmp . buildjson($row['cID']);
        while($row = mysql_fetch_array($result)){
          $tmp = $tmp . ', ' . buildjson($row['cID']);
        }
      }
    }
    return $tmp;
  }
  
  function buildjson($curr)
  {
    global $id;
    $result = mysql_query("SELECT * FROM  `$id` WHERE  `ID` = $curr");
    if(!$result){
      die(mysql_error());
    }
    $row = mysql_fetch_array($result);
    $tmp = '{id:\"' . $row['ID'] . '\",name:\"' . $row['Title'] . '\",data:{$color:\"' . ncolor($row['rNum'], $row['rTotal']) . '\"},children:[' . helper($curr) . ']}';
    return $tmp;
  }
  
  function start($treeid)
  {
    global $id;
    $id = $treeid;
    return buildjson(1);
  }
  //mysql_close($db);
?>
</html>