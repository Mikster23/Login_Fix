<?php
session_start();
if (!isset($_SESSION['sphonenum']) || $_SESSION['sId'] == ''){
  echo '<script language="javascript">';
  echo 'alert("Login First Please")';
  echo '</script>';
  header("Location:login_reg.php");
}
else {

  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbase ="messages";

  require("./_connect.php");
  $db = new mysqli($db_host,$db_user, $db_password, $db_name);
  $con=mysqli_connect($servername,$username,$password,$dbase);


  $conn = new mysqli($servername, $username, $password,$dbase);


      $mynum = $_SESSION["sphonenum"];

      $sendid = $_SESSION['sId'];
      $sendid = trim($sendid);
    //  $quser=mysqli_query($conn,"select receiver_num  from chat where sender_id = '$sendid' or receiver_id = '$sendid' ");

   //$quser = mysqli_query($conn,"select receiver_num  , sender_num from chat where receiver_num = $mynum or sender_num = $mynum  ");
   $quser = mysqli_query($conn,"select * from chat where receiver_num = $mynum AND read_status = 1 ");
      //  $quser = mysqli_query($conn,"select receiver_num  , sender_num where receiver_num != '$mynum' AND sender_num ='$mynum'");

      $num = array();
      $name = array();
      $r = array();
      $flag = 0;
        while($urow=mysqli_fetch_array($quser)){

          $name[$flag] = $urow['receiver_fname'];
          $name[$flag] = $urow['receiver_num'];
          $flag++;
          /*
          if($urow['sender_num']==$mynum){
              $flag +=1;
              $r[$flag] = $urow ['read_status'];
              $num[$flag] = $urow['receiver_num'];
              $name[$flag] = $urow['receiver_fname'];
          //   echo 'receiver: ', $row['sender_num'];
          }
          else if($urow['receiver_num']!=$mynum) {
        //   echo 'sender: ', $row['receiver_num'];
              $flag +=1;
              $num[$flag] = $urow['receiver_num'];
              $name[$flag] = $urow['receiver_fname'];
          }
          else if($urow['receiver_num']==$mynum) {
        //   echo 'sender: ', $row['receiver_num'];
              $flag +=1;
              $num[$flag] = $urow['sender_num'];
              //$name[$flag] = $urow['receiver_fname'];
          }*/
        }

        $num = array_unique($num);
        $num = preg_replace('/[^\w\s].*$/', "", $num);
        $num = array_filter(array_map('trim', $num));
        $num = array_unique($num);
        $name = array_unique($name);
        $name = preg_replace('/[^\w\s].*$/', "", $name);
        $name = array_filter(array_map('trim', $name));
        $name = array_unique($name);

//echo  ' you have '.$flag.' unread messages';
if($flag!=0){
  echo '<script> alert("You have '.$flag.' unread messages")</script>';
}
/*  echo '<script language="javascript">';
  echo 'alert("You have unread messages.")';
  echo '</script>'; */
//  header("Location:login_reg.html");
}
//$id = $_POST['id'];
//echo $id;
?>
<!DOCTYPE html><html lang="en" class="no-js">
    <head>
      <meta charset="UTF-8" />
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Welcome!</title>
      <link rel="shortcut icon" href="../favicon.ico">
      <!--   <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"> !-->
      <link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
      <link rel = "stylesheet" type = "text/css" href = "css/bootstrapTab.css" />
      <link rel="stylesheet" type="text/css" href="css/demo-welcome.css" />
      <link rel="stylesheet" type="text/css" href="css/style-welcome.css" />
		  <link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
      <link rel="stylesheet" type="text/css" href="css/dropdown.css" />
      <link rel="stylesheet" type="text/css" href="package/font-awesome/css/font-awesome.min.css" />
    <!--    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">!-->
    <!--    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> !-->
      <!--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" type="text/css" media="screen"/> !-->
      <script src="js/tether.js"></script>
      <script src = "js/jquery-3.2.1.js"></script>

        <!--  <script src = "js/bootstrap.js"></script>!-->

        <!--  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>!-->

<!--
        <script type="text/javascript">

          $(document).ready(function(){
            showUser();
            $("#myBtn").click(function(){
              console.log('success');

                $("#myModal").modal();
            });




            //Add New

            //Update
          });
</script>!-->
    </head>
    <body>
      <section class="container">
        <div class="one">
          <table class="tbone">
            <tr class="trheader">
              <td class="tdname">
                <div class="dropdown">
                  <p class="username">
                    <button onclick="logoutdrop()" class="dropbtn"><i class="fa fa-navicon"></i></button><?php echo   $_SESSION["sfname"] ; ?>
                  </p>
                  <div id="myDropdown" class="dropdown-content">
                    <a onclick="cont()"><i class="fa fa-address-book"></i> Contacts</a>
                    <?php
                    if($_SESSION['stype'] == 'admin'){
                    ?>
                        <a href="home.php"><i class="fa fa-home"></i> Home</a>
                    <?php
                    }
                    ?>
                    <a href="logout.php">Logout</a>
                  </div>
              </td>
              <td class="tdnmsg">
                <button type="button" class="composebtn btn btn-default btn-lg" id="myBtn"><i class="fa fa-pencil-square-o"></i></button>
                      <!--  <button id="nmess" class="nmessage"><i class="fa fa-edit"></i></button>!-->
              </td>
            </tr>
            <tr class="trheaderr">
              <td class="tdinput">
              <!--  <input type="text" placeholder="Search Phone Number" id="srchNum" value=""></input>
                <input type="text" placeholder="Search Message" id="srchMes" value=""></input>-->
                <input type="text" placeholder="Search Message" id="srchMes" value="" onkeyup="showSRCH()"></input>
              </td>
              <td></td>
            </tr>
          </table>
                <!--<button data-target="#modsearch" id="smessid" data-toggle="modal" class="smess btn btn-success" style="display:none;"><i class="fa fa-search"></i></button>-->

                <!--<button data-target="#modsearch" id="smessid" data-toggle="modal" class="smess btn btn-success"><i class="fa fa-search"></i></button>-->
<!-- ***** ORIGINAL
                <input type="text" placeholder="Name..."></input>
                <input id="pnum" type="text" placeholder="Phone No. ..." ></input> -->

              <!--<td class="tdsearch">-->
                <!--      <button id="smess" data-toggle="modal" class="btn btn-success"><i class="fa fa-search"></i></button>!-->
        <!--        <button data-target="#modsearch" id="smessid" data-toggle="modal" class="smess btn btn-success"><i class="fa fa-search"></i></button>-->
              <!-- </td> -->

<!-- CHATHEAD -->
        <div class="tab">
          <button class="tablinks" onclick="openCity(event, 'divAll')" id="defaultOpen">All</button>
          <button class="tablinks" onclick="openCity(event, 'divGlobe')">Globe</button>
          <button class="tablinks" onclick="openCity(event, 'divSmart')">Smart</button>
          <button class="tablinks" onclick="openCity(event, 'divContact')" id="contButton" style="display:none;"><i class="fa fa-address-book" style="text-align:right;"></i> Contacts</button>
        </div>
        <table id="srchHeader" class="csrchHeader" style="display: none; margin-left:7px;">
          <thead style="background-color: #505050; color: white; width: 100%;">
            <p id="HideMe" style="height: 10px;"></p>
            <tr atyle=" width: 100%;">
              <th style="width: 30%; font-family:  'Calibri', 'Arial Narrow', Arial, sans-serif; font-size: 1.7vw; color: white; text-align:center; border-right: 2px solid white; padding: 5px 20px">Name</th>
              <th style="width: 70%; font-family:  'Calibri', 'Arial Narrow', Arial, sans-serif; font-size: 1.7vw; color: white; text-align:center; padding: 5px 50px;"> Message </th>
              <!--<th class="text-right">Mean</th>-->
            </tr>
          </thead>
        </table>
        <!--  <div id="divActiveTable" class="divActive" style="overflow-y: auto; height:398%; background: yellow;"> </div> -->
          <div id="divAll" class="tabcontent" style="overflow-y: auto; height:392%; border: none;">
          </div>
          <div id="divGlobe" class="tabcontent" style="overflow-y: auto; height:392%; border: none;">
          </div>
          <div id="divSmart" class="tabcontent" style="overflow-y: auto; height:392%; border: none;">
          </div>
          <div id="divContact" class="tabcontent" style="overflow-y: auto; height:392%; border: none;float:right;">
          </div>


  <!--
          <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">All</a></li>
            <li><a data-toggle="tab" href="#menu1">Globe Sim</a></li>
            <li><a data-toggle="tab" href="#menu2">Smart Sim</a></li>
          </ul>

          <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
              <h3>HOME</h3>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div id="menu1" class="tab-pane fade">
              <h3>Menu 1</h3>
              <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
            </div>
            <div id="menu2" class="tab-pane fade">
              <h3>Menu 2</h3>
              <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
            </div>
          </div>
        -->
  <!--      </div>-->
                  <!--
                  <div class="container-1">
                    <div class="userHeader">
                      <h1>Nammi</h1>
                      <a href="https://www.w3schools.com" id="nmess" class="nmessage"><i class="fa fa-edit"></i></a>
                    </div>
                    <div class="userHeader">
                      <input type="text" id="search1" placeholder="Search Name..."></input>
                      <input type="text" id="search2" placeholder="Search Phone No. ..."></input>
                      <a href="https://www.w3schools.com" id="smess" class="searchBut"><i class="fa fa-search"></i></a>
                    </div>
                  -->
                </div>
        </div>

        <div class="three">
          <div id ="divReceiver">

          </div>
        </div>

        <div class="conversation">
          <div class="two">
            <div id="chatOutput">

            </div>
                      <!-- Modal !-->

                      <!--*****
                      <input id="chatInput" type="text" placeholder="Input Text here" maxlength="128" >
                      <button id="chatSend" >Send</button>
                    *****-->
                    <!-- <div class="scroll">
                      <div class="right">
                        <span>.</span>
                      </div>
                      <div class="left">
                        <span>.</span>
                      </div>
                    -->
                    <!--
                    <p>M<p>Me<p>Mes<p>Mess<p>Messa
                    <p>Messag<p>Message<p>Messag<p>Messa<p>Mess
                    </div> -->
          </div>

          <div class="four">
            <table> <!-- style="width: 100%; height: 100%;" -->
              <tr>
                <td class="tdfourtb"> <!--style="width: 90%; background: red;"-->
                  <textarea class="inputarea" id="chatInput" type="text" placeholder="Type your message here..." autofocus></textarea>
                </td>
                <td class="tdfoursend">
                  <button class="button" id="chatSend" name="but" data-toggle="modal" data-target="#unknown"><i class="fa fa-send"></i></button>
                          <!-- <button class="button" id="send" onclick="send();" name="but">Send</button> -->
                </td>
              </tr>
            </table>
                    <!-- <textarea placeholder="Type your message here..."></textarea> -->
                    <!-- <button class="button" >Send</button> -->
          </div>
        </div>

        </section>
        <!--
        <script src="chatbox.js"></script>
      -->
      <div id="mymodal" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content" style="margin-top: 25%">
            <div class="modal-header">
              <h4 class="modal-title" id="myModalLabel" style="font-size:25px;">Compose Message</h4>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><i class="fa fa-window-close" style="color:white;"></i></button>
            </div>
            <form class="tagForm" id="tag-form" action="{{ path('addTag') }}" method="post" enctype="multipart/form-data">
              <div class="modal-body">
                <label for="Number">Number: </label>
                <input id="modnum" class="form-control" type="text"/><br>
                <label for="Message">Message: </label>
                <textarea id="modmsg" class ="form-control" type="text" placeholder="Type your message here..." autofocus></textarea>
                <input id="tag-form-submit" type="submit" class="newMessagebtn btn btn-primary" value="Send"/>
              </div><!--
              <div class="modal-footer">
                <br><br><br>
                <input id="tag-form-submit" type="submit" class="btn btn-primary" value="Send">
              </div>-->
            </form>
          </div>
        </div>
      </div>





      <!-- MODAL FOR ADD CONTACTS !-->


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
                <input id="addnum" class="form-control" type="text"/><br>
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
      </div>


<!-- MODAL FOR SEARCH  !-->

      <div class="modal fade bs-example-modal-lg" id="modsearch">
        <div class="modal-dialog">
          <div class="modal-content" style="margin-top:150px;">
            <div class="modal-header">
              <h3 class="modal-title">Search Result</h3>
              <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
            </div>
            <div class="modal-body">
              <!--<h5 class="text-center">Hello. Some text here.</h5>-->
              <table class="table" id="tblGrid" style = "overflow-y:scroll; height : 100px">
                <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbase ="messages";
                $con=mysqli_connect($servername,$username,$password,$dbase);
                $conn = new mysqli($servername, $username, $password,$dbase);
                $test = "strawberry";

                $numnum = $_SESSION["sphonenum"];
                $quser = mysqli_query($conn,"select *  from chat WHERE message LIKE '%$test%' AND (receiver_num = $numnum OR sender_num = $numnum)");
                ?>
                <thead id="tblHead">
                  <tr>
                    <th>Name</th>
                    <th>Message</th>
                    <!--<th class="text-right">Mean</th>-->
                  </tr>
                </thead>
                <tbody>
                  <?php

                    while($urow=mysqli_fetch_array($quser)){
                        switch($numnum){
                          case $urow['sender_num']: ?>
                            <tr class="trSearch">
                              <td style="display:none"><?php echo $urow['index_num'];  ?></td>
                              <td style="display:none"><?php echo "|*|";  ?></td>
                              <td><?php echo $urow['receiver_fname'];  ?></td>
                              <td style="display:none"><?php echo "|*|";  ?></td>
                              <td style="display:none"><?php echo $urow['receiver_num'];  ?></td>
                              <td style="display:none"><?php echo "|*|";  ?></td>
                              <td><?php echo $urow['message']; ?></td>
                            </tr> <?php
                          break;
                          case $urow['receiver_num']: ?>
                            <tr class="trSearch">
                              <td style="display:none"><?php echo $urow['index_num'];  ?></td>
                              <td style="display:none"><?php echo "|*|"; ?></td>
                              <td><?php echo $urow['sender_name'];  ?></td>
                              <td style="display:none"><?php echo "|*|";  ?></td>
                              <td style="display:none"><?php echo $urow['sender_num'];  ?></td>
                              <td style="display:none"><?php echo "|*|";  ?></td>
                              <td><?php echo $urow['message']; ?></td>
                            </tr> <?php
                          break;
                        }
                    }
                  ?>
                </tbody>
              </table>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div><!-- /.modal -->
    </div>

        <!-- MODAL FOR SEARCH  !-->

      <div id="wait" style="display:none;width:69px;height:89px;border:1px solid black;position:absolute;top:50%;left:50%;padding:2px;"><img src='demo_wait.gif' width="64" height="64" /><br>Loading..</div>


    <!--  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script> !-->
      <script src="js/chat.js"></script>
        <script src="js/compose.js"></script>




    </body>

  <!--  <script src = "js/updatechat.js"></script> -->
      <script src = "js/dropdown.js"></script>
    <!--  <script src = "js/search.js"></script> -->
            <script src = "js/getcheck.js"></script>
      <!--<script src = "js/addcontact.js"></script>-->
      <script src = "js/jquery-3.2.1.js"></script>
      <script src = "js/bootstrap.js"></script>
  <!--    <script src = "js/searchmsg.js"></script>
      <script src = "js/searchBtn.js"></script> -->

<script type = "text/javascript">

function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    switch(cityName){
      case "divAll": showUser(); console.log("HUYYY"); break;
      case "divGlobe": showUserGlobe(); break;
      case "divSmart": showUserSmart(); break;
      case "divContact": showUserContact(); break;
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}

function cont(){
  document.getElementById("contButton").click();
}

document.getElementById("defaultOpen").click();


function logoutdrop() {
    document.getElementById("myDropdown").classList.toggle("show");
}

//Showing our Table
/*
function showmsg(){
  $.ajax({
    url: 'showusermsg.php',
    type: 'POST',
    async: false,
    data:{
      show: 1
    },
    success: function(response){
      $('#divActiveTable').html(response);
    }

  });
}*/
    //$( "#smess" ).click(function() {
    //    $phone=$('#pnum').val();
var myVarAll, myVarGlobe, myVarSmart;
var yourVar = false;

function showUser(){
  document.getElementById("HideMe").style.display = "none";
  document.getElementById("srchHeader").style.display = "none";
  $.ajax({
    url: 'showactive.php',
    type: 'POST',
    async: false,
    data:{
    //  pnum : $phone,
      show: 1
    },
    success: function(response){
        document.getElementById("HideMe").style.display = "none";
        document.getElementById("srchHeader").style.display = "none";
    //  clearTimeout(yourVar);
      $('#divAll').html(response);
      //setTimeout(showUser,4000);
      //console.log("setTimeoutAll");
      myVarAll = setTimeout(showUser,4000);
      yourVar = true;
    }

  });
  /*
setInterval(function(){

   $('#divActiveTable').load('showactive.php');

}, 1000)*/

}

function showUserGlobe(){
  $.ajax({
    url: 'showactiveglobe.php',
    type: 'POST',
    async: false,
    data:{
    //  pnum : $phone,
      show: 1
    },
    success: function(response){
      document.getElementById("HideMe").style.display = "none";
      document.getElementById("srchHeader").style.display = "none";
      $('#divGlobe').html(response);
      console.log("setTimeoutGlobe");
     myVarGlobe = setTimeout(showUserGlobe,4000);
    }

  });
  /*
setInterval(function(){

   $('#divActiveTable').load('showactive.php');

}, 1000)*/

}

function showUserSmart(){
  $.ajax({
    url: 'showactivesmart.php',
    type: 'POST',
    async: false,
    data:{
    //  pnum : $phone,
      show: 1
    },
    success: function(response){
      document.getElementById("HideMe").style.display = "none";
      document.getElementById("srchHeader").style.display = "none";
      $('#divSmart').html(response);
      console.log("setTimeoutSmart");
     myVarSmart = setTimeout(showUserSmart,4000);
    }

  });
  /*
setInterval(function(){

   $('#divActiveTable').load('showactive.php');

}, 1000)*/

}

function showUserContact(){

  $.ajax({

    url: 'showcontact.php',
    type: 'POST',
    async: false,
    data:{
    //  pnum : $phone,
      show: 1
    },
    success: function(response){
      $('#divContact').html(response);
     setTimeout(showUserContact,4000);
    }

  });
  /*
setInterval(function(){

   $('#divActiveTable').load('showactive.php');

}, 1000)*/

}

/*
$(document).ready(function(){
  $('#srchMes').keypress(function(e) {

    //$('#modsearch').modal();
    showSRCH();
  });

});*/

function showSRCH(){
clrhightime();
  $srchMe = document.getElementById("srchMes").value;
  if($srchMe==""){
    showUser();
  }else{
    $.ajax({
      url: 'showSearch.php',
      type: 'POST',
      //async: false,
      data:{
        testt: $srchMe,
      //  pnum : $phone,
        //show: 1
      },
      success: function(response){
        document.getElementById("defaultOpen").click();
        document.getElementById("HideMe").style.display = "block";
        document.getElementById("srchHeader").style.display = "inline";
        document.getElementById("divAll").style.height = "353%";
        //document.getElementById("defaultOpen").click();
        clearTimeout(myVarAll);
        clearTimeout(myVarGlobe);
        clearTimeout(myVarSmart);
        //console.log("CLEAR TIMEOUT: all, globe, smart");
        $('#divAll').html(response);
        //yourVar = setTimeout(showSRCH,4000);
      //  setTimeout(showSRCH,4000);
      }

    });
  }
}





    </script>

</html>
