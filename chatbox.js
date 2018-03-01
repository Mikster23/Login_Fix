$(function(){
      function loadNum()
      {
        /*var table = document.getElementById("myTable");
        var row = table.insertRow(0);
        var cell1 = row.insertCell(0);
        var cell2 = row.insertCell(1);
        cell1.innerHTML = $('td').load('query.php');
        cell2.innerHTML = "CELL 2";*/

        $('p').load('query.php');
        setTimeout(loadNum, 1000); // makes it reload every 5 sec
      }
      loadNum(); // start the process...
    });

  //Add row to table
  /*
function myCreateFunction() {
    var table = document.getElementById("myTable");
    var row = table.insertRow(0);
    var cell1 = row.insertCell(0);
    var cell2 = row.insertCell(1);
    cell1.innerHTML = "CELL 1";
    cell2.innerHTML = "CELL 2";

    var mysql = require('mysql');

    var con = mysql.createConnection({
      host: "localhost",
      user: "root",
      password: "root",
      database: "messages"
    });

    con.connect(function(err) {
      if (err) throw err;
      //Select all customers and return the result object:
      con.query("SELECT index_num, receiver_name, sender_name FROM chat"), function (err, result, fields) {
        if (err) throw err;
        console.log(result);
      });
    });

    /*
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "messages";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT index_num, receiver_name, sender_name FROM chat";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>ID</th><th>Name</th></tr>";
        // output data of each row
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["id"]. "</td><td>" . $row["firstname"]. " " . $row["lastname"]. "</td></tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    $conn->close();
    ?>
}

var myVar = setInterval(myCreateFunction, 2000);
*/
/*
function myTimer() {
    var d = new Date();
    document.getElementById("demo").innerHTML = d.toLocaleTimeString();
}
*/
//Reverse wheel direction
/*document.querySelector('.two').addEventListener('wheel', function(e) {
  if(e.deltaY) {
    e.preventDefault();
    e.currentTarget.scrollTop -= parseFloat(getComputedStyle(e.currentTarget).getPropertyValue('font-size')) * (e.deltaY < 0 ? -1 : 1) * 2;
  }
});*/
//Send section
/*send = function() {
  var inp = document.querySelector('.text-input');
  document.querySelector('.scroll').insertAdjacentHTML('beforeend', '<p>' + inp.value);
  inp.value = '';
  inp.focus();
}*/
