<?php
session_start();

?>
<?php
  include 'dbcon.php';
	/*include_once 'login_reg.html';*/
	$servername = "localhost";
	$username = "root";
  $password = "";
  // Create connection
	//$conn = new mysqli($servername, $username, $password,"smstest");
  $dbase ="messages";
	$conn = new mysqli($servername, $username, $password,$dbase);
	// Check connection
	if ($conn->connect_error) {
	   die("Connection failed: " . $conn->connect_error);
	}else{
		//echo "Connected successfully";
  }

if (isset($_POST["username"])&&isset($_POST["password"])) {
  $_user = $_POST["username"];
  $_pass = $_POST["password"];

  $sql = "SELECT * FROM users WHERE userName='$_user' AND password='$_pass'";
  $result = mysqli_query ($conn,$sql);
  $row = mysqli_fetch_assoc($result);
  if($row['userID']!=0){
      //echo "<p>First Name: ".$row['firstName']."</p>";
      //echo "<p>Last Name: ".$row['lastName']."</p>";
      date_default_timezone_set("Asia/Manila");
      $insertdate = date("Y/m/d H:i:s", strtotime("now"));


      $_SESSION["sId"] = $row["userID"];
      $_SESSION["sfname"] = $row["firstName"];
      $_SESSION["smname"] = $row["middleName"];
      $_SESSION["slname"] = $row["lastName"];
      $_SESSION["sdept"] =  $row["department"];
      $_SESSION["semail"] =  $row["email"];
      $_SESSION["susername"] = $row["userName"];
      $_SESSION["spassword"] = $row["password"];
      $_SESSION["sphonenum"] = $row["phoneNumber"];
      $_SESSION["sstatus"] = $row["Status"];
      $_SESSION["stype"] = $row["userType"];
      $statuschange = $_SESSION["sId"];
      $uname=$_SESSION["susername"];
      $insertdate = date("Y/m/d H:i:s", strtotime("now"));
      $logind = $insertdate;
      $_SESSION["slogind"] = $insertdate;
      $insertdate = date("H:i:s", strtotime("now"));
      $logint = $insertdate;
      $_SESSION["slogint"] = $insertdate;
      $qquery="INSERT INTO login (userID, userName, loginDate, loginTime)
              VALUES ($statuschange,'$uname','$logind','$logint')";
      //execute query
      if ($conn->real_query($qquery)) {
          //If the query was successful
          echo "Wrote message to db";
      }else{
          //If the query was NOT successful
          echo "An error occured";
          echo $conn->errno;
      }

      $sqldate = "UPDATE users SET logintime= '$insertdate'  WHERE userID= '$statuschange'";
        $result = mysqli_query ($conn,$sqldate);
      if(isset($_SESSION["sstatus"])){
        $sql = "UPDATE users SET Status= '1'  WHERE userID= '$statuschange'";
        $result = mysqli_query ($conn,$sql);
      }
      else {
        echo '<script language="javascript">';
        echo 'alert("Login Failed")';
        echo '</script>';
      }
/*//Inserting of login record
date_default_timezone_set("Asia/Manila");

      $l_id = $_SESSION["sId"];
      $l_uname = $_SESSION["susername"];
      $insertdate = date("Y/m/d H:i:s", strtotime("now"));
        $l_logind = $insertdate;
      $insertdate = date("H:i:s", strtotime("now"));
        $l_logint =$insertdate;

      $qquery="INSERT INTO login (userID, userName, loginDate, loginTime)
              VALUES ($l_id,'$l_uname','$l_logind','$l_logint')";
      //execute query
      if ($conn->real_query($qquery)) {
          //If the query was successful
          echo "Wrote message to db";
      }else{
          //If the query was NOT successful
          echo "An error occured";
          echo $conn->errno;
      }
//End of Login record*/

    //  include_once 'welcome.php';
     header ('Location:welcomeMe.php');
    }
    else{
      echo '<script language="javascript">';
      echo 'alert("User account does not exist. Please check your username and password or click SIGN UP.")';
      echo '</script>';
      include_once 'login_reg.php';
      //When account does not exist
      //echo "Waley";
    }
}
  $conn->close();

?>
