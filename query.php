<?php

  //Connect to the database
  include("dbcon.php");

  //Query the database and get the count
  /*
  $q = mysql_query("SELECT index_num, receiver_name, sender_name as num, rname, sname FROM chat");
  $count = mysql_fetch_result($q,0,'num');
  $rcount = mysql_fetch_result($q,1,'rname');
  $scount = mysql_fetch_result($q,2,'sname');
  echo $count;*/

  $q = mysql_query("SELECT count(*) as num FROM chat");
  $count = mysql_fetch_result($q,0,'num');
  echo $count;
?>
