<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbase ="messages";

require("./_connect.php");

//connect to db
$db = new mysqli($db_host,$db_user, $db_password, $db_name);
$con = new mysqli($servername, $username, $password,$dbase);
$conn = new mysqli($servername, $username, $password,$dbase);
$connn = new mysqli($servername, $username, $password,$dbase);
if ($db->connect_errno) {
    //if the connection to the db failed
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}
$telnum = "09066040569";

$msg =  "Hello! I am a message.";
$num =  "0922";
$sendid = 4;
date_default_timezone_set("Asia/Manila");


//escaping is extremely important to avoid injections!
//*$nameEscaped = htmlentities(mysqli_real_escape_string($db,$username)); //escape username and limit it to 32 chars
$textEscaped = htmlentities(mysqli_real_escape_string($db, $msg)); //escape text and limit it to 250 chars
$insertdate = date("Y-m-d", strtotime("now"));

$inserttime = date("H:i:s", strtotime("now"));
//create query
$rquery="SELECT * FROM users where phoneNumber= '$num'" ;
if ($db->real_query($rquery)) {
	//If the query was successful
  //Row count for total sent and total received sms per user
  $rcountSent=0;
  $rcountReceived=0;
  //select Sender's name
  $squery_sender="SELECT firstName, phoneNumber, totalSent FROM users where userID=$sendid" ;
  if ($con->real_query($squery_sender)) {
  	//If the query was successful
  	$sres = $con->use_result();
      while ($row = $sres->fetch_assoc()) {
        $sfname = $row["firstName"];
        $spnum = $row["phoneNumber"];
        $rcountSent=1+$row["totalSent"];
      }
  }else{
  	//If the query was NOT successful
  	echo "An error occured";
  	echo $db->errno;
  }

  //select Receiver's name
  $rquery_sender="SELECT userID, firstName, lastName, totalReceived FROM users where phoneNumber= '$num'" ;
  if ($conn->real_query($rquery_sender)) {
  	//If the query was successful
  	$rres = $conn->use_result();
      while ($row = $rres->fetch_assoc()) {
        $rid = $row["userID"];
        $rfname = $row["firstName"];
        $rlname=$row["lastName"];
        $rcountReceived=1+$row["totalReceived"];
      }
  }else{
  	//If the query was NOT successful
  	echo "An error occured";
  	echo $db->errno;
  }

  //Add record to table
  $query="INSERT INTO chat (receiver_id, receiver_num, receiver_fname, receiver_lname, sender_id, sender_num, sender_name, message, datesent, timesent,read_status)
          VALUES ($rid,'$num','$rfname','$rlname',$sendid,'$spnum','$sfname','$textEscaped','$insertdate','$inserttime',1)";
  //$query="INSERT INTO chat (message,sender_num,sender_id,receiver_num,datesent,timesent) VALUES ('$textEscaped','$telnum','$sendid','$recnum','$insertdate','$inserttime')";
  //execute query
  if ($connn->real_query($query)) {
      //If the query was successful
      echo "Wrote message to db";
  }else{
      //If the query was NOT successful
      echo "An error occured";
      echo $db->errno;
  }
}else{
	//If the query was NOT successful
	echo "Unknown";
}

$sqldate = "UPDATE users SET totalSent = $rcountSent WHERE userID='$sendid'";
$result = mysqli_query ($db,$sqldate);

$sqlupdate = "UPDATE users SET totalReceived = $rcountReceived WHERE userID='$rid'";
$rslt = mysqli_query ($db,$sqlupdate);

/*
$query="INSERT INTO chat (message,sender_num,receiver_num,sender_id) VALUES ('$msg','$telnum','$num','$sendid')";
//execute query
if ($db->real_query($query)) {
    //If the query was successful
    echo "Wrote message to db";
}else{
    //If the query was NOT successful
    echo "An error occured";
    echo $db->errno;
}
*/
$db->close();


 ?>
