<?php
session_start();


 ?>

<?php


include 'dbcon.php';
date_default_timezone_set("Asia/Manila");

$insertdate = date("Y/m/d H:i:s", strtotime("now"));
$statuschange = $_SESSION["sId"];
$sqldate = "UPDATE users SET logouttime= '$insertdate'  WHERE userID= '$statuschange'";
$result = mysqli_query ($conn,$sqldate);

//Inserting of Login record
//date_default_timezone_set("Asia/Manila");

      //$l_id = $_SESSION["sId"];
      $l_uname = $_SESSION["susername"];
      $l_sdate= $_SESSION["slogind"];
      $l_sdate = date("Y/m/d", strtotime($l_sdate));
      $l_stime= $_SESSION["slogint"];

      $insertdate = date("Y/m/d", strtotime("now"));
        $l_logd = $insertdate;
      $insertdate = date("H:i:s", strtotime("now"));
        $l_logt =$insertdate;
//echo '<script> alert("Heyyy '.$statuschange.' | '.$l_uname.' | '.$l_sdate.' | '.$l_stime.' | '.$l_logd.' | '.$l_logt.' ")</script>';
      $sqlate = "UPDATE login SET logoutDate= '$l_logd' WHERE  userID= '$statuschange' AND loginDate ='$l_sdate' AND loginTime = '$l_stime'";
        $res = mysqli_query ($conn,$sqlate);
        /*$sqlate = "UPDATE login SET logoutDate= '$l_logd' WHERE userID= '$statuschange' AND loginDate ='$l_sdate' AND loginTime = '$l_stime'";
          $res = mysqli_query ($conn,$sqlate);*/
      $sqltime = "UPDATE login SET logoutTime = '$l_logt' WHERE userID= '$statuschange' AND loginDate ='$l_sdate' AND loginTime = '$l_stime'";
        $res = mysqli_query ($conn,$sqltime);

$servername = "localhost";
$username = "root";
$password = "";
// Create connection
//$conn = new mysqli($servername, $username, $password,"smstest");
$dbase ="messages";
$conn = new mysqli($servername, $username, $password,$dbase);


/*
      $qquery="INSERT INTO login (userID, userName, logoutDate, logoutTime)
              VALUES ($l_id,'$l_uname','$l_logd','$l_logt')";
      //execute query
      if ($conn->real_query($qquery)) {
          //If the query was successful
          echo "Wrote message to db";
      }else{
          //If the query was NOT successful
          echo "An error occured";
          echo $conn->errno;
      }*/
//End of Logout record

/*include_once 'login_reg.html';*/


$statuschange = $_SESSION["sId"];
$sql = "UPDATE users SET Status= '0'  WHERE userID= '$statuschange'";
$result = mysqli_query ($conn,$sql);
echo $_SESSION["sId"];
echo $_SESSION["sfname"];
echo $_SESSION["smname"];
echo $_SESSION["slname"];
echo $_SESSION["sdept"];
echo $_SESSION["susername"];
echo $_SESSION["spassword"];
echo $_SESSION["semail"];

session_unset();
session_destroy();
echo '<script language="javascript">';
echo 'alert("Login First Please")';
echo '</script>';
header('Location:login_reg.php');
 ?>
