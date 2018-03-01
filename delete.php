<?php
	include('dbcon.php');
	if(isset($_POST['del'])){
		$id=$_POST['userID'];
		mysqli_query($conn,"delete from `users` where userID= '$id'");
	}
?>
