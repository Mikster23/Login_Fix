
    <?php

 session_start();
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbase ="messages";
    $con=mysqli_connect($servername,$username,$password,$dbase);


    $conn = new mysqli($servername, $username, $password,$dbase);
    ?>




    <?php


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
     $quser = mysqli_query($conn,"select * from chat where receiver_num = $mynum or sender_num = $mynum  AND read_status = 1 ");
        //  $quser = mysqli_query($conn,"select receiver_num  , sender_num where receiver_num != '$mynum' AND sender_num ='$mynum'");



        $num = array();
        $name = array();
        $r = array();
        $flag = 0;
          while($urow=mysqli_fetch_array($quser)){
            //echo $urow['receiver_num'];
          //  $num[$flag] = $urow['receiver_num'];

        /*    if($urow['sender_num']==$urow['receiver_num']){
                continue;
            }*/

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
            }


          }

          $num = array_unique($num);
          $num = preg_replace('/[^\w\s].*$/', "", $num);
          $num = array_filter(array_map('trim', $num));
          $num = array_unique($num);
          $name = array_unique($name);
          $name = preg_replace('/[^\w\s].*$/', "", $name);
          $name = array_filter(array_map('trim', $name));
          $name = array_unique($name);

echo $flag;

      ?>
