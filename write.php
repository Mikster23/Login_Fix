<?php
session_start();
 ?>
<?php
require("./_connect.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbase ="messages";
$con=mysqli_connect($servername,$username,$password,$dbase);






$db = new mysqli($db_host,$db_user, $db_password, $db_name);


if ($db->connect_errno) {
    //if the connection to the db failed
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}

//connect to db
$db = new mysqli($db_host,$db_user, $db_password, $db_name);
if ($db->connect_errno) {
    //if the connection to the db failed
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}


//get userinput from url
//*$username=substr(/*$_GET["username"]*/"Juan", 0, 32);



$text=substr($_GET["text"], 0, 250);
$recnum = $_SESSION['recphonenumber'];

//echo $recnum;
$telnum = $_SESSION['sphonenum'];



$sendid= $_SESSION['sId'];

date_default_timezone_set("Asia/Manila");


//escaping is extremely important to avoid injections!
//*$nameEscaped = htmlentities(mysqli_real_escape_string($db,$username)); //escape username and limit it to 32 chars
$textEscaped = htmlentities(mysqli_real_escape_string($db, $text)); //escape text and limit it to 250 chars
$insertdate = date("Y-m-d", strtotime("now"));

$inserttime = date("H:i:s", strtotime("now"));

$telnum = trim($telnum);
$recnum = preg_replace('/\D/', '', $recnum);
$recnum = trim($recnum);

/*
//execute query
$queryselect="select userID from users where phoneNumber = '$recnum'";
//execute query$result = $conn->query($sql);
$result = $con->query($queryselect);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $recid = $row["userID"];
    }
    $_SESSION["receiver_id"] = $recid;
} else {
    echo "0 results";
}*/

//Row count for total sent and total received sms per user
$rcountSent=0;
$rcountReceived=0;
//select Sender's name
$squery_sender="SELECT firstName, lastName, totalSent FROM users where phoneNumber= '$telnum'" ;
if ($db->real_query($squery_sender)) {
	//If the query was successful
	$sres = $db->use_result();
    while ($row = $sres->fetch_assoc()) {
      $sfname = $row["firstName"];
      $rcountSent=1+$row["totalSent"];
      //$sfname .= " ";
      //$sfname .= $row["lastName"];
    }
}else{
	//If the query was NOT successful
	echo "An error occured";
	echo $db->errno;
}

//select Receiver's name
$rquery_sender="SELECT userID, firstName, lastName, totalReceived FROM users where phoneNumber= '$recnum'" ;
if ($db->real_query($rquery_sender)) {
	//If the query was successful
	$rres = $db->use_result();
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

$_SESSION["txtnum"] = $sendid;
$_SESSION["txtmsg"] = $textEscaped;
//create query
$query="INSERT INTO chat (receiver_id, receiver_num, receiver_fname, receiver_lname, sender_id, sender_num, sender_name, message, datesent, timesent, read_status)
        VALUES ($rid,'$recnum','$rfname','$rlname',$sendid,'$telnum','$sfname','$textEscaped','$insertdate','$inserttime',1)";
//execute query
if ($db->real_query($query)) {
    //If the query was successful
    echo "Wrote message to db";
}else{
    //If the query was NOT successful
    echo "An error occured";
    echo $db->errno;
}

$sqldate = "UPDATE users SET totalSent = $rcountSent WHERE userID='$sendid'";
$result = mysqli_query ($db,$sqldate);

$sqlupdate = "UPDATE users SET totalReceived = $rcountReceived WHERE userID='$rid'";
$rslt = mysqli_query ($db,$sqlupdate);

$db->close();
?>
