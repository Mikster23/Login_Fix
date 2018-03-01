<?php
session_start();

require("./_connect.php");

//connect to db
$db = new mysqli($db_host,$db_user, $db_password, $db_name);
if ($db->connect_errno) {
    //if the connection to the db failed
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}

$num =  $_POST['unum'];
//$num = '09066040569';

$name = $_POST['uname'];
//$name = 'hihi';

$snum = substr($num,1,3);

$num = trim($num);
$name = trim($name);
echo $snum;


//escaping is extremely important to avoid injections!
//*$nameEscaped = htmlentities(mysqli_real_escape_string($db,$username)); //escape username and limit it to 32 chars
//create query

//select Sender's name
$carry = "";
$squery_sender="SELECT * FROM carrier " ;
if ($db->real_query($squery_sender)) {
	//If the query was successful
	$sres = $db->use_result();
    while ($row = $sres->fetch_assoc()) {
      $car = $row["carrier"];
      $num2 = $row["prefix"];

      echo $snum;
      echo "<br></br>";
      echo $num;
      if($snum == $num2){
        echo $car;
        echo 'true';
        $carry = $car;
        $carry = trim($carry);
      }

    }
}else{
	//If the query was NOT successful
	echo "An error occured";
	echo $db->errno;
}

//select Receiver's name
/*
$rquery_sender="SELECT userID, firstName, lastName FROM users where phoneNumber= '$num'" ;
if ($db->real_query($rquery_sender)) {
	//If the query was successful
	$rres = $db->use_result();
    while ($row = $rres->fetch_assoc()) {
      $rid = $row["userID"];
      $rfname = $row["firstName"];
      $rlname=$row["lastName"];
    }
}else{
	//If the query was NOT successful
	echo "An error occured";
	echo $db->errno;
}*/

//Add record to table

$query="INSERT INTO users (firstName, phoneNumber , carrier)
        VALUES ('$name','$num','$carry')";
//$query="INSERT INTO chat (message,sender_num,sender_id,receiver_num,datesent,timesent) VALUES ('$textEscaped','$telnum','$sendid','$recnum','$insertdate','$inserttime')";
//execute query

if ($db->real_query($query)) {
    //If the query was successful
    echo '<script language="javascript">';
    echo 'alert("Add contact success")';
    echo '</script>';
}else{
    //If the query was NOT successful
    echo '<script language="javascript">';
    echo 'alert("Login Failed")';
    echo '</script>';
    echo $db->errno;
}
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
