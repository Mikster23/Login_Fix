


</script>
<?php
ob_start();
session_start();
?>
<?php
require("./_connect.php");

$servername = "localhost";
$username = "root";
$password = "";
$dbase ="messages";
$con=mysqli_connect($servername,$username,$password,$dbase);


$conn = new mysqli($servername, $username, $password,$dbase);
//connect to db
$db = new mysqli($db_host,$db_user, $db_password, $db_name);
if ($db->connect_errno) {
	//if the connection to the db failed
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}

$vusername = $_SESSION["susername"];
//if (isset($_GET['id'])){




if(isset($_POST['ur'])){

$msgid = $_POST['id'];
list($msgid, $recname, $recnum, $mess) = explode("|*|", $msgid);
$_SESSION['recphonenumber'] = $recnum;
//$_SESSION["recphonenumber"] = $msgid;
}



//}
$myid= $_SESSION['sId'];

//$recnum = $_SESSION['recphonenumber'];
//echo "##" ,$recnum," ** ",$msgid," :::: ";
$recnum = trim($recnum);
$recnum = preg_replace('/\D/', '', $recnum);
$myid = trim($myid);
$phone =  $_SESSION['sphonenum'];
$phone = trim($phone);
//$query="SELECT * FROM chat where sender_num= '$phone'  AND sender_id= '$sendid' AND receiver_num = '$recnum' OR receiver_num = '$phone'   ORDER BY index_num DESC " ;
//echo $phone," Eyyy " ,$recnum;
$query="SELECT * FROM chat where ((sender_num= '$phone'   AND receiver_num = '$recnum')  OR (receiver_num = '$phone' AND sender_num = '$recnum'))  AND index_num <= $msgid ORDER BY index_num DESC " ;


/*$mynum = $_SESSION["sphonenum"];
//printf("receiver_num: ".$mynum."sender_num: ".$recnum);
$quser = mysqli_query($conn,"update chat set read_status = 0  where receiver_num = $mynum AND sender_num = $recnum AND read_status = 1 ");
*/

//echo $sendid;
//$query="SELECT * FROM chat where sender_num= $sendid ORDER BY index_num DESC "
//echo "USERNAME IS $vusername";

//execute query
if ($db->real_query($query)) {
	//If the query was successful
	$res = $db->use_result();

    while ($row = $res->fetch_assoc()) {
      $username = $row["sender_name"];

      /*if (isset($username)){
        $username = "unknown";

      }*/
      $receivernum = $row["receiver_num"];
      $sendernum    = $row ["sender_num"];
      $text=$row["message"];
      //  $time=date('G:i', strtotime($row["time"])); //outputs date as # #Hour#:#Minute#
      if ($phone != $sendernum) {
        switch($username){
          case "": echo "<p id=\"pleft\"> Unknown: $text</p>\n";  break;
          default: echo "<p id=\"pleft\"> $username: $text</p>\n";  break;
        }

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
