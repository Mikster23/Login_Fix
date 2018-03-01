<?php
  include 'dbcon.php';
	include_once 'login_reg.html';
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

if(isset($_POST["pass"])==isset($_POST["conf"])){
  if (isset($_POST["email"])&&isset($_POST["user"])) {
    $fn =$_POST["fname"];
    $mn =$_POST["mname"];
    $ln =$_POST["lname"];
    $de =$_POST["dept"];
    $em =$_POST["email"];
    $us =$_POST["user"];
    $pass =$_POST["pass"];
    $passrep =$_POST["conf"];
                    /*
                    <script>
                      window.alert('Password not equal');
                    </script>
                    */
  									/*
                    $sql = "INSERT INTO useracc(fname,mname,lname,dept,email,username,password)
  													VALUES('$fn','$mn','$ln','$de','$em','$us','$pass')";
  													if ($conn->query($sql) === TRUE) {
  														echo "New record created successfully";
  													} else {
  														echo "Error: " . $sql . "<br>" . $conn->error;
  													}*/
    $stmt = $conn->prepare("INSERT INTO users (firstName,middleName,lastName,department,email,userName,password) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssss" ,$fn ,$mn ,$ln ,$de ,$em ,$us ,$pass);
    $stmt->execute();
    $stmt->close();
      /*
                  if($pass==$passrep)
                  {


                  if ($conn->query($sql) === TRUE) {
  									echo "New record created successfully";
  								} else {
  									echo "Error: " . $sql . "<br>" . $conn->error;
  								}
  								}
  								else
                  {

  									echo 'password not equal';
                  }*/
  	$conn->close();
    echo $us , "<br>";
  	echo $em,"<br>";
    echo $pass,"<br>";
  	echo $passrep,"<br>";
    $hashedpass =   password_hash($pass, PASSWORD_DEFAULT);
    echo $hashedpass;
  }
  else{
  	echo "N0, mail is not set";
  }
}
?>
