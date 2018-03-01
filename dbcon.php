<?php

?>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbase ="messages";
$con=mysqli_connect($servername,$username,$password,$dbase);

// Create connection
$conn = new mysqli($servername, $username, $password,$dbase);


/*
$sql = "INSERT INTO txtmsg (msg)
VALUES ('John')";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}*/

//mysqli_select_db($link, $dbase)
echo mysqli_select_db($conn, $password);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
//echo "Connected successfully";


?>
