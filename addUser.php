<?php
	include('dbcon.php');
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbase ="messages";

	require("./_connect.php");
	$db = new mysqli($db_host,$db_user, $db_password, $db_name);
	$con=mysqli_connect($servername,$username,$password,$dbase);


	$conn = new mysqli($servername, $username, $password,$dbase);

	if(isset($_POST['addnew'])){

		$firstname=$_POST['dfirstname'];
		$middlename =$_POST['dmiddlename'];
		$lastname=$_POST['dlastname'];
		$department=$_POST['ddepartment'];
		$email=$_POST['demail'];
		$username=$_POST['dusername'];
		$password=$_POST['dpassword'];
		$phoneNumber=$_POST['dphoneNumber'];

/*
$firstname='dfirstname';
$middlename ='dmiddlename';
$lastname='dlastname';
$department='ddepartment';
$email='demail';
$username='dusername';
$password='dpassword';
$phoneNumber='dphoneNumber'; */
/*
$id= $_POST['uid';
$firstname= $_POST['ufirstname'];
$lastname='hi';
$username='hi';
$password='hi';
$department='hi';
$middlename ='hi';
$email='hi';*/

/*
$id='4';
$firstname='firstname';
$middlename ='middlename';
$lastname='lastname';
$department='department';
$email='email';
$username='username';
$password='password';
$phoneNumber='phoneNumber';*/
$carrier="";
$squery_sender="SELECT * FROM carrier " ;
 if ($db->real_query($squery_sender)) {
	 $snum = substr($phoneNumber,1,3);

	//If the query was successful
	$sres = $db->use_result();
		 while ($row = $sres->fetch_assoc()) {
			 $car = $row["carrier"];


			 $num2 = $row["prefix"];
								if($snum == $num2){
										$carrier = $car;


								}
			// echo $snum;
			 //echo "<br></br>";
			// echo $num;


		 }

 }else{
	//If the query was NOT successful
 // 	echo "An error occured";
	echo $db->errno;
 }



		//mysqli_query($conn,"update useracc set fname ='$firstname', mname ='$middlename' , lname = '$lastname' ,dept ='$department' , username = '$username' , password = '$password ' , email = '$email' , where Id = $id");
  $sql = "INSERT INTO users (firstName, middleName, lastName, department, email, userName, password, phoneNumber, carrier) VALUES ('$firstname', '$middlename', '$lastname', '$department', '$email', '$username', '$password', '$phoneNumber','$carrier');";
		//$sql = "UPDATE users SET userID='$id',firstName='$firstname',middleName='$middlename',lastName='$lastname',department='$department',email='$email',userName='$username',password='$password',phoneNumber='$phoneNumber' where userID = $id";
//$sql = "UPDATE useracc SET fname='$firstname',lname='$lastname',mname='$middlename',dept='$department',username='$username,password='$password' WHERE id= '$id'";

if (mysqli_query($conn, $sql)) {
  //echo "successfully added to dbase";
	echo '<script type="text/javascript">alert("successfully added to dbase");</script>';
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

}
?>
