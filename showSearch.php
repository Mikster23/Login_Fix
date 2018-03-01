<!--<link rel = "stylesheet" type ="text/css" href ="css/style-welcome.css"/>-->
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


    <table id="tblGrid" style="overflow-y:scroll;">
      <?php
      $servername = "localhost";
      $username = "root";
      $password = "";
      $dbase ="messages";
      $con=mysqli_connect($servername,$username,$password,$dbase);
      $conn = new mysqli($servername, $username, $password,$dbase);
      $test = $_POST['testt'];

      $numnum = $_SESSION["sphonenum"];
      $quser = mysqli_query($conn,"select *  from chat WHERE message LIKE '%$test%' AND (receiver_num = $numnum OR sender_num = $numnum)");
      ?>

      <tbody>
        <?php
          $evenRow = 0;
          $rowcnt = 0;
          while($urow=mysqli_fetch_array($quser)){
            if(($numnum==$urow['sender_num'])&&($evenRow%2==0)){
              ?>
                <tr id="trGrid" class="clickable-row" style="width: 100%; padding:0; margin: auto; background-color: #b2b2b2;"> <!-- class="trSearch"-->
                  <td style="display:none"><?php echo $urow['index_num'];  ?></td>
                  <td style="display:none"><?php echo "|*|";  ?></td>
                  <td style="width: 30%; font-family: 'Calibri', 'Arial Narrow', Arial, sans-serif; font-size: 1.2vw; color: black; text-align:center; border-right: 2px solid white;"><?php echo $urow['receiver_fname'];  ?></td>
                  <td style="display:none"><?php echo "|*|";  ?></td>
                  <td style="display:none"><?php echo $urow['receiver_num'];  ?></td>
                  <td style="display:none"><?php echo "|*|";  ?></td>
                  <td style="width: 70%; font-family: 'Calibri', 'Arial Narrow', Arial, sans-serif; font-size: 1.2vw; color: black; padding: 10px 24px; margin: auto;"><?php echo $urow['message']; ?></td>
                </tr> <?php
            }elseif(($numnum==$urow['sender_num'])&&($evenRow%2!=0)){
              ?>
                <tr id="trGrid" class="clickable-row" style="width: 100%; padding:0; margin: auto; background-color: white;"> <!-- class="trSearch"-->
                  <td style="display:none"><?php echo $urow['index_num'];  ?></td>
                  <td style="display:none"><?php echo "|*|";  ?></td>
                  <td style="width: 30%; font-family: 'Calibri', 'Arial Narrow', Arial, sans-serif; font-size: 1.2vw; color: black; text-align:center; border-right: 2px solid #b2b2b2;"><?php echo $urow['receiver_fname'];  ?></td>
                  <td style="display:none"><?php echo "|*|";  ?></td>
                  <td style="display:none"><?php echo $urow['receiver_num'];  ?></td>
                  <td style="display:none"><?php echo "|*|";  ?></td>
                  <td style="width: 70%; font-family: 'Calibri', 'Arial Narrow', Arial, sans-serif; font-size: 1.2vw; color: black; padding: 10px 24px; margin: auto;"><?php echo $urow['message']; ?></td>
                </tr> <?php
            }elseif(($numnum==$urow['receiver_num'])&&($evenRow%2==0)){
              ?>
                <tr id="trGrid" class="clickable-row" style="width: 100%; background-color: #b2b2b2;">
                  <td style="display:none"><?php echo $urow['index_num'];  ?></td>
                  <td style="display:none"><?php echo "|*|"; ?></td>
                  <td style="width: 30%; font-family: 'Calibri', 'Arial Narrow', Arial, sans-serif; font-size: 1.2vw; color: black; text-align:center; border-right: 2px solid white;"><?php echo $urow['sender_name'];  ?></td>
                  <td style="display:none"><?php echo "|*|";  ?></td>
                  <td style="display:none"><?php echo $urow['sender_num'];  ?></td>
                  <td style="display:none"><?php echo "|*|";  ?></td>
                  <td style="width: 70%; font-family: 'Calibri', 'Arial Narrow', Arial, sans-serif; font-size: 1.2vw; color: black; padding: 10px 24px; margin: auto;"><?php echo $urow['message']; ?></td>
                </tr> <?php
            }elseif(($numnum==$urow['receiver_num'])&&($evenRow%2!=0)){
              ?>
                <tr id="trGrid" class="clickable-row" style="width: 100%; background-color: white;">
                  <td style="display:none"><?php echo $urow['index_num'];  ?></td>
                  <td style="display:none"><?php echo "|*|"; ?></td>
                  <td style="width: 30%; font-family: 'Calibri', 'Arial Narrow', Arial, sans-serif; font-size: 1.2vw; color: black; text-align:center; border-right: 2px solid #b2b2b2;"><?php echo $urow['sender_name'];  ?></td>
                  <td style="display:none"><?php echo "|*|";  ?></td>
                  <td style="display:none"><?php echo $urow['sender_num'];  ?></td>
                  <td style="display:none"><?php echo "|*|";  ?></td>
                  <td style="width: 70%; font-family: 'Calibri', 'Arial Narrow', Arial, sans-serif; font-size: 1.2vw; color: black; padding: 10px 24px; margin: auto;"><?php echo $urow['message']; ?></td>
                </tr> <?php
            }
            /*  switch($numnum){
                case $urow['sender_num']: ?>
                  <tr id="trGrid" class="clickable-row" style="width: 100%; padding:0; margin: auto;"> <!-- class="trSearch"-->
                    <td style="display:none"><?php echo $urow['index_num'];  ?></td>
                    <td style="display:none"><?php echo "|*|";  ?></td>
                    <td style="width: 30%; font-family: 'Calibri', 'Arial Narrow', Arial, sans-serif; font-size: 1.2vw; color: white; text-align:center;"><?php echo $urow['receiver_fname'];  ?></td>
                    <td style="display:none"><?php echo "|*|";  ?></td>
                    <td style="display:none"><?php echo $urow['receiver_num'];  ?></td>
                    <td style="display:none"><?php echo "|*|";  ?></td>
                    <td style="width: 70%; font-family: 'Calibri', 'Arial Narrow', Arial, sans-serif; font-size: 1.2vw; color: white; padding: 10px 24px; margin: auto; background: pink;"><?php echo $urow['message']; ?></td>
                  </tr> <?php
                break;
                case $urow['receiver_num']: ?>
                  <tr id="trGrid" class="clickable-row" style="width: 100%">
                    <td style="display:none"><?php echo $urow['index_num'];  ?></td>
                    <td style="display:none"><?php echo "|*|"; ?></td>
                    <td style="width: 30%; font-family: 'Calibri', 'Arial Narrow', Arial, sans-serif; font-size: 1.2vw; color: white; text-align:center;"><?php echo $urow['sender_name'];  ?></td>
                    <td style="display:none"><?php echo "|*|";  ?></td>
                    <td style="display:none"><?php echo $urow['sender_num'];  ?></td>
                    <td style="display:none"><?php echo "|*|";  ?></td>
                    <td style="width: 70%; font-family: 'Calibri', 'Arial Narrow', Arial, sans-serif; font-size: 1.2vw; color: white; padding: 10px 24px; margin: auto; background: pink;"><?php echo $urow['message']; ?></td>
                  </tr> <?php
                break; */

              $rowcnt++; $evenRow++;
          }
          if($rowcnt==0){ ?>
            <center><p style="font-family: 'Calibri', 'Arial Narrow', Arial, sans-serif; font-size: 1.2vw; color: black; text-align:center; background: white;">No matches found</p></center> <?php
          }
          exit();
        ?>
      </tbody>
    </table>
  </tbody>
</table>
