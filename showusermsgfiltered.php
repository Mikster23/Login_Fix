


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



if(!empty($_POST['pnum'])){
  $sendid = $_POST['id'];

$phoneNumber = $_POST['pnum'];
  $query="SELECT * FROM chat where sender_num= $sendid OR sender_num LIKE '%$phoneNumber%' ORDER BY index_num DESC " ;
}
else {
  $query="SELECT * FROM chat where sender_num= $sendid ORDER BY index_num DESC " ;

}



//}

echo $sendid;
$query="SELECT * FROM chat where sender_num= $sendid ORDER BY index_num DESC " ;
//echo "USERNAME IS $vusername";

//execute query
if ($db->real_query($query)) {
	//If the query was successful
	echo "hi";
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
