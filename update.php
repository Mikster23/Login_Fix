<?php
	include('dbcon.php');

	if(isset($_POST['edit'])){

		$id=$_POST['id'];
		$firstname=$_POST['firstname'];
		$middlename =$_POST['middlename'];
		$lastname=$_POST['lastname'];
		$department=$_POST['department'];
		$email=$_POST['email'];
		$username=$_POST['username'];
		$password=$_POST['password'];
		$phoneNumber=$_POST['phoneNumber'];


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

		//mysqli_query($conn,"update useracc set fname ='$firstname', mname ='$middlename' , lname = '$lastname' ,dept ='$department' , username = '$username' , password = '$password ' , email = '$email' , where Id = $id");
		$sql = "UPDATE users SET userID='$id',firstName='$firstname',middleName='$middlename',lastName='$lastname',department='$department',email='$email',userName='$username',password='$password',phoneNumber='$phoneNumber' where userID = $id";
//$sql = "UPDATE useracc SET fname='$firstname',lname='$lastname',mname='$middlename',dept='$department',username='$username,password='$password' WHERE id= '$id'";

if (mysqli_query($conn, $sql)) {
		
} else {
    echo "Error updating record: " . mysqli_error($conn);
}

}
?>
