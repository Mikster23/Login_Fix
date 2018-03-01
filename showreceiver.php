<!DOCTYPE html><html lang="en" class="no-js">
    <head>

    </head>
    <body>
<script>


</script>
</script>
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


$conn = new mysqli($servername, $username, $password,$dbase);

//connect to db
$db = new mysqli($db_host,$db_user, $db_password, $db_name);
if ($db->connect_errno) {
	//if the connection to the db failed
    echo "Failed to connect to MySQL: (" . $db->connect_errno . ") " . $db->connect_error;
}

$vusername = $_SESSION["susername"];
//if (isset($_GET['id'])){




if(isset($_POST['id'])){
$sendid = $_POST['id'];
$_SESSION["recphonenumber"] = $sendid;
}



//}
$sendid= $_SESSION['sId'];
$recnum = $sendid;
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

    ?> <p id = "getfname" class="limitless"> <?php if($fname == '') {

      $unknown = $_SESSION["recphonenumber"];


?>
<?php

$unknowncheck = $_SESSION["recphonenumber"];
$ucheck = false;
 $quser = mysqli_query($conn,"select * from chat where receiver_num = $unknowncheck or sender_num = $unknowncheck");
 if($quser){
while($urow=mysqli_fetch_array($quser)){
  //echo $urow['receiver_num'];
//  $num[$flag] = $urow['receiver_num'];

/*    if($urow['sender_num']==$urow['receiver_num']){
      continue;
  }*/
 if($urow['sender_num'] || $urow['receiver_num'] == $unknown){

   $ucheck = true;
 }


}
}
?>
<?php if($ucheck == true){ ?>
  <div id="contactmod" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title" id="myModalLabel" >Add Contact</h4>
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-window-close" style="color:white;"></i></button>
        </div>
        <form class="tagForm" id="tag-form" >
          <div class="modal-body">
            <label for="Number">Number: </label>
            <input id="addnum" class="form-control" type="text" value = "<?php echo $recnum;?>" /> ?><br>
            <label for="Name">Name: </label>
            <input id="addname" class="form-control" type="text"/><br>

          <input id="submitcontact" type="submit" class="newMessagebtn btn btn-primary" value="Send"/>
          </div><!--
          <div class="modal-footer">
            <br><br><br>
            <input id="tag-form-submit" type="submit" class="btn btn-primary" value="Send">
          </div>-->
        </form>
      </div>
    </div>
  </div> <?php  } ?> <?php
      //  echo '<script language="javascript">';
        //echo 'alert("Add the number first thank you.")';
        //echo '</script>';

    }
    else{

     echo $fname; ?> <?php  }echo $lname; ?> </p> <p id = "hiddentext " > <?php echo $lname;?> </p> <?php

}else{
	//If the query was NOT successful
	echo "An error occured";
	echo $db->errno;
}

$db->close();
?>
</body>
</html>
