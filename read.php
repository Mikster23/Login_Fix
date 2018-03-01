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
if (isset($_POST['id'])){
$sendid= $_SESSION['sId'];

$recnum = $_SESSION['recphonenumber'];
$recnum.trim();
//echo $recnum;

$phone =  $_SESSION['sphonenum'];

$query="SELECT * FROM chat where sender_num= '$phone'  AND sender_id = 'sendid' AND receiver_num = '$recnum'  ORDER BY index_num DESC " ;



}
//echo "USERNAME IS $vusername";

//$query="SELECT * FROM chat ORDER BY index_num ASC ";
//execute query
if ($db->real_query($query)) {
	//If the query was successful
	$res = $db->use_result();

    while ($row = $res->fetch_assoc()) {
      $username = $row["sender_name"];
      $text=$row["message"];
      //  $time=date('G:i', strtotime($row["time"])); //outputs date as # #Hour#:#Minute#
      if ($username == $vusername) {
        echo "<p id=\"pleft\"> $username: $text</p>\n";
        echo "<p></p>";
      }
      else{
        echo "<p id=\"pright\"> You: $text</p>\n";
        echo "<p></p>";
      }
    }
}else{
	//If the query was NOT successful
	echo "An error occured";
	echo $db->errno;
}

$db->close();
?>
