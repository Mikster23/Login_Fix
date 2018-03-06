<link rel = "stylesheet" type ="text/css" href ="css/style-welcome.css"/>
<script src = "js/updatechat.js"></script>
<table class = "divActiveTable" > <!--class = "table table-bordered alert-warning table-hover"  style="width: 100%; height: 100%;" -->



  <tbody>
    <?php

    session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbase ="messages";

    require("./_connect.php");
    $db = new mysqli($db_host,$db_user, $db_password, $db_name);
    $con=mysqli_connect($servername,$username,$password,$dbase);


    $conn = new mysqli($servername, $username, $password,$dbase);
    ?>




    <?php



    $mynum = $_SESSION["sphonenum"];

    $sendid = $_SESSION['sId'];
    $sendid = trim($sendid);
  //  $quser=mysqli_query($conn,"select receiver_num  from chat where sender_id = '$sendid' or receiver_id = '$sendid' ");

 //$quser = mysqli_query($conn,"select receiver_num  , sender_num from chat where receiver_num = $mynum or sender_num = $mynum  ");
 $quser = mysqli_query($conn,"select * from chat where receiver_num = $mynum or sender_num = $mynum ");
    //  $quser = mysqli_query($conn,"select receiver_num  , sender_num where receiver_num != '$mynum' AND sender_num ='$mynum'");



    $num = array();
    $name = array();
    $r = array();
    $checkstat = array();
    $readmsg = array();
    $flag = 0;
    $fc = 0 ;
    $f=0;
      while($urow=mysqli_fetch_array($quser)){
        //echo $urow['receiver_num'];
      //  $num[$flag] = $urow['receiver_num'];
        $flag +=1;

    /*    if($urow['sender_num']==$urow['receiver_num']){
            continue;
        }*/

        if($urow['sender_num']==$mynum){
            $r[$flag] = $urow ['read_status'];
            $num[$flag] = $urow['receiver_num'];
            switch($urow['receiver_fname']){
              case "": $name[$flag] = "Unknown"; break;
              default: $name[$flag] = $urow['receiver_fname']; break;
            }
          /*  if($urow['read_status']==1){

              $checkstat[$fc] = $urow['receiver_num'];
              $fc+=1;

            }*/
        //   echo 'receiver: ', $row['sender_num'];
        }
        else if($urow['receiver_num']!=$mynum) {
      //   echo 'sender: ', $row['receiver_num'];
            $num[$flag] = $urow['receiver_num'];
            switch($urow['receiver_fname']){
              case "": $name[$flag] = "Unknown"; break;
              default: $name[$flag] = $urow['receiver_fname']; break;
            }
            if($urow['read_status']==1){
              $checkstat[$fc] = $urow['receiver_num'];
              $fc+=1;
            }
          /*  if($urow['read_status']==0){
              $readmsg[$f] = $urow['sender_num'];
              $f+=1;
            }*/
        }
        else if($urow['receiver_num']==$mynum) {
      //   echo 'sender: ', $row['receiver_num'];
            $num[$flag] = $urow['sender_num'];
            if($urow['sender_name']==""&&$urow['sender_id']=="0"){
              $name[$flag] = "Unknown";
            }
            else{
              $name[$flag] = $urow['sender_name'];
            }
            /*switch($urow['sender_name']){
              case "": $name[$fgilag] = "Unknown"; break;
              default: $name[$flag] = $urow['sender_name']; break;
            }*/
            if($urow['read_status']==1){
              $checkstat[$fc] = $urow['sender_num'];
              $fc+=1;
            }
        /*    if($urow['read_status']==0){
              $readmsg[$f] = $urow['sender_num'];
              $f+=1;
            }*/
        }
        ?>
        <?php
      }
      $num = array_unique($num);
      $num = preg_replace('/[^\w\s].*$/', "", $num);
      $num = array_filter(array_map('trim', $num));
      $num = array_unique($num);
      $name = array_unique($name);
      $name = preg_replace('/[^\w\s].*$/', "", $name);
      $name = array_filter(array_map('trim', $name));
      $name = array_unique($name);
        if(sizeof($checkstat>0)){
          $checkstat = array_unique($checkstat);
          $checkstat = preg_replace('/[^\w\s].*$/', "",$checkstat);
          $checkstat = array_filter(array_map('trim',$checkstat));
          $checkstat = array_unique($checkstat);
      }
    ?>
    <?php
    $numNew = array();
    $nameNew = array();
    //$readmsgNew = array();
    $y=0;
    foreach ($num as $value) {
      $numNew[$y]=$value;
      $y+=1;
    }
    /*$y=0;
    foreach ($readmsg as $value) {
      $readmsgNew[$y]=$value;
      $y+=1;
    }*/
    $z=0;
    foreach ($name as $value) {
      $nameNew[$z]=$value;
      $z+=1;
    }

   for ($i = 0 ; $i < sizeof($nameNew) ; $i++){
     $nameNew[$i] =ucfirst( $nameNew[$i].$numNew[$i]);
    // print_r($nameNew[$i]);


   }
   sort($nameNew);

      for ($i = 0 ; $i < sizeof($nameNew) ; $i++){
      $newString = preg_replace('/[^0-9]+/', '', $nameNew[$i]);
        $numNew[$i] = $newString;
       // print_r($nameNew[$i]);


      }
   print_r($nameNew);
   print_r($numNew);
    $asd=0;
    for ($i=0; $i < sizeof($numNew); $i++) {
      if(sizeof($checkstat)!=0){
        if(!(in_array($numNew[$i], $checkstat))){
          $readmsg[$asd]=$numNew[$i];
          $asd++;
        }
      }
      else{
        $readmsg[$asd]=$numNew[$i];
        $asd++;
      }
    }

    if(sizeof($readmsg>0)){
      $readmsg = array_unique($readmsg);
      $readmsg = preg_replace('/[^\w\s].*$/', "",$readmsg);
      $readmsg = array_filter(array_map('trim',$readmsg));
      $readmsg = array_unique($readmsg);
  }
  //print_r($readmsg);
    ?>
    <?php
  //   $GLOBALS['z'] =0;
    $qread = mysqli_query($conn,"SELECT receiver_num, sender_num, sender_name, receiver_fname, read_status from chat where sender_num = '$mynum'  or receiver_num = '$mynum' ");
       //  $quser = mysqli_query($conn,"select receiver_num  , sender_num where receiver_num != '$mynum' AND sender_num ='$mynum'");

   $rrow=mysqli_fetch_array($qread);
if(isset($rrow))
{
   $rrow = array_unique($rrow);
   $rrow = preg_replace('/[^\w\s].*$/', "", $rrow);
   $rrow = array_filter(array_map('trim', $rrow));
   $rrow = array_unique($rrow);

   $rctr  = 0;
 }
   $flag = 0;
   $ctr = 0;
   /*print_r($readmsg);
   print_r($checkstat);*/
      for ($x = 0; $x < sizeof($numNew); $x++) {

      ?>

        <table id="updatechat">
          <?php
            $squery_sender="SELECT * FROM carrier ";
            if ($db->real_query($squery_sender)) {
              $snum = substr($numNew[$x],1,3);
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

            //echo $numNew[$x].$carrier;
            switch ($carrier) {
              case 'globe':
                ?><tr class="clickable-row" style="background:#4C6A92;" >
                  <td>
                    <p class="Logoit"><i class="fa fa-user-circle"></i></p>
                  </td>
                  <td>
                    <?php
                   $temp = $numNew[$x];
                   //print($numNew[$x]." | ".$x." SIZE: ".sizeof($checkstat));
                   if(sizeof($checkstat)!=0){
                     foreach ($checkstat as $value) {
                       if($temp == $value){
                         ?>
                         <p class="Nameit" style="text-shadow: 2px 2px 4px #000000; font-weight:bold;"> <?php echo $nameNew[$x]; ?></p>
                         <p class="Numit" style="text-shadow: 2px 2px 4px #000000; font-weight:bold;"><?php  echo $numNew[$x]."|".strtoupper($carrier);?></p>
                         <?php
                       }
                     }
                   }
                   if(sizeof($readmsg)!=0){
                     foreach ($readmsg as $key ) {
                       if($temp == $key){
                        // print("IM INSIDE ".$numNew[$x]." | ".$x." SIZE: ".sizeof($checkstat));
                         ?>
                         <p class="Nameit"> <?php echo $nameNew[$x]; ?></p>
                         <p class="Numit"><?php  echo $numNew[$x]."|".strtoupper($carrier); ?> </p> <?php
                       }
                     }
                   }
                   ?>
               </td>
              </tr> <?php
                break;

              case 'smart':
                ?><tr class="clickable-row" style="background:#92B558;" >
                  <td>
                    <p class="Logoit"><i class="fa fa-user-circle"></i></p>
                  </td>
                  <td>
                    <?php
                   $temp = $numNew[$x];
                   //print($numNew[$x]." | ".$x." SIZE: ".sizeof($checkstat));
                   if(sizeof($checkstat)!=0){
                     foreach ($checkstat as $value) {
                       if($temp == $value){
                         ?>
                         <p class="Nameit" style="text-shadow: 2px 2px 4px #000000; font-weight:bold;"> <?php echo $nameNew[$x]; ?></p>
                         <p class="Numit" style="text-shadow: 2px 2px 4px #000000; font-weight:bold;"><?php  echo $numNew[$x]."|".strtoupper($carrier);?></p>
                         <?php
                       }
                     }
                   }
                   if(sizeof($readmsg)!=0){
                     foreach ($readmsg as $key ) {
                       if($temp == $key){
                        // print("IM INSIDE ".$numNew[$x]." | ".$x." SIZE: ".sizeof($checkstat));
                         ?>
                         <p class="Nameit"> <?php echo $nameNew[$x]; ?></p>
                         <p class="Numit"><?php  echo $numNew[$x]."|".strtoupper($carrier); ?> </p> <?php
                       }
                     }
                   }
                    ?>
               </td>
              </tr> <?php
                break;
            }
          ?>
          <?php /*for($j = 0 ;$j < sizeof($rrow) ; $j ++){ */ /*if($nameNew[$x] == $rrow[$x])*/// if($rrow['read_status']==1) { ?>



  <?php
    //  }
    $flag = 0;
}


   /////////////////////////////////////////



   ?>
  </table>

  </tbody>


</table>
