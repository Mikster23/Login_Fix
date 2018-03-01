
<script>
//<link rel = "stylesheet" type ="text/css" href ="css/style-welcome.css"/>
</script>
<?php
session_start();
?>
<?php
require("./_connect.php");


//connect to db
$db = new mysqli($db_host,$db_user, $db_password, $db_name);
if ($db->connect_errno) {
	//if the connection to the db failed
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}

$vusername = $_SESSION["susername"];
//if (isset($_GET['id'])){




if(isset($_POST['rr'])){
  $msgid = $_POST['id'];
  list($msgid, $recname, $recnum, $mess) = explode("|*|", $msgid);
  //echo "Hello $recnum";
  $_SESSION["recphonenumber"] = $recnum;
}


//}
$sendid= $_SESSION['sId'];
$recnum = $_SESSION['recphonenumber'];
$recnum = trim($recnum);
$recnum = preg_replace("/[^0-9]/", "", $recnum);
//echo $recnum."qwwewe";
$phone =  $_SESSION['sphonenum'];
//echo $phone."jhfjdf";

//$query="SELECT * FROM chat where sender_num= '$phone'  AND sender_id= '$sendid' AND receiver_num = '$recnum'   ORDER BY index_num DESC " ;
$query="SELECT * from chat where receiver_num = $phone or sender_num = $phone " ;

//echo $sendid;
//$query="SELECT * FROM chat where sender_num= $sendid ORDER BY index_num DESC " ;
//echo "USERNAME IS $vusername";
$fname = "";
$lname = "";
//execute query
if ($db->real_query($query)) {
	//If the query was successful
	//echo "hi";
	$res = $db->use_result();

    while ($row = $res->fetch_assoc()) {
      if($row['sender_num']==$recnum){
        $fname = $row["sender_name"];
      //   echo 'receiver: ', $row['sender_num'];
      }
/*      else if($row['receiver_num']!=$recnum) {
    //   echo 'sender: ', $row['receiver_num'];
    $fname = $row["receiver_fname"];
    $lname = $row["receiver_lname"];
        //  $num[$flag] = $urow['receiver_num'];
          //$name[$flag] = $urow['receiver_fname'];
      }
*/     if($row['receiver_num']==$recnum) {
    //   echo 'sender: ', $row['receiver_num'];
    $fname = $row["receiver_fname"];
    $lname = $row["receiver_lname"];
    //$lname = $row["receiver_lname"];
      //    $num[$flag] = $urow['sender_num'];
        //  $name[$flag] = $urow['sender_name'];
      }

/*
      $rfname = $row["receiver_fname"];
      $rlname = $row["receiver_lname"];
*/



      //  $time=date('G:i', strtotime($row["time"])); //outputs date as # #Hour#:#Minute#
    }

    ?> <p class="limitless"> <?php echo $fname; ?> <?php echo $lname; ?> </p> <?php

}else{
	//If the query was NOT successful
	echo "An error occured";
	echo $db->errno;
}

$db->close();
?>
