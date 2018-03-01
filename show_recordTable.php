<?php
session_start();
	include('dbcon.php');
	if(isset($_POST['recTab'])){

    $columnn=$_POST['dnum'];
    if(!empty($columnn)){
    $stringq="select ";
    for ($x = 0; $x < sizeof($columnn); $x++) {
      $stringq .= $columnn[$x];
      $stringq .=" ,";
    }
    //printf("huy: $stringq");
    $flag = strlen($stringq);
    //printf("huy: $flag");
    $stringq = substr($stringq,0,$flag-1);
    //printf("huy: $stringq");
    $stringq.=" from `chat`";
    //printf("Heyy: $stringq");
/*
    foreach ($num as $value) {
      $numNew[$y]=$value;
      $y+=1;
    }
*/
		$tableHeader = array();
		$tableData = array();
		?>
    <link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
    <link rel="stylesheet" type="text/css" href="css/demo-admin.css" />
    <link rel="stylesheet" type="text/css" href="css/style-admin.css" />
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css"/>
    <script src = "js/jquery.dataTables.js"></script>

    <table id="example" class="display" cellspacing="0" style="width:100%; height:100%;">
								<thead style="width:100%;">
                  <?php
									$data="";
                  for ($x = 0; $x < sizeof($columnn); $x++) {
                    switch ($columnn[$x]) {
                      case "index_num":?>
                          <th style="width:5%">Message ID</th>
													<?php $tableHeader[$x] = "Message ID"; break;
                      case "receiver_fname":?>
                          <th style="width:10%">Receiver's Name</th>
													<?php $tableHeader[$x] = "Receiver's Name"; break;
                      case "receiver_num":?>
                          <th style="width:10%">Receiver's Phone Number</th>
													<?php $tableHeader[$x] = "Receiver's Phone Number"; break;
                      case "sender_name":?>
                          <th style="width:10%">Sender's Name</th>
													<?php $tableHeader[$x] = "Sender's Name"; break;
                      case "sender_num":?>
                          <th style="width:10%">Sender's Phone Number</th>
													<?php $tableHeader[$x] = "Sender's Phone Number"; break;
                      case "message":?>
                          <th style="width:35%">Message</th>
													<?php $tableHeader[$x] = "Message"; break;
                      case "datesent":?>
                          <th style="width:10%">Date Sent</th>
													<?php $tableHeader[$x] = "Date Sent"; break;
                      case "timesent":?>
                          <th style="width:10%">Time Sent</th>
													<?php $tableHeader[$x] = "Time Sent"; break;
                    }
                    //$stringq .=" ,";
                  }
									$_SESSION['tHeader']=$tableHeader;
                  ?>

                  <!--
									<th style="width:5%">Message ID</th>
									<th style="width:10%">Receiver's Name</th>
									<th style="width:10%">Receiver's Phone Number</th>
									<th style="width:10%">Sender's Name</th>
									<th style="width:10%">Sender's Phone Number</th>
									<th style="width:35%">Message</th>
									<th style="width:10%">Date Sent</th>
									<th style="width:10%">Time Sent</th>-->
								</thead>
								<tfoot style="width:100%;">
                  <?php
									//echo sizeof($columnn);
                  for ($x = 0; $x < sizeof($columnn); $x++) {
                    switch ($columnn[$x]) {
                      case "index_num":?>
                          <th style="width:5%">Message ID</th><?php break;
                      case "receiver_fname":?>
                          <th style="width:10%">Receiver's Name</th><?php break;
                      case "receiver_num":?>
                          <th style="width:10%">Receiver's Phone Number</th><?php break;
                      case "sender_name":?>
                          <th style="width:10%">Sender's Name</th><?php break;
                      case "sender_num":?>
                          <th style="width:10%">Sender's Phone Number</th><?php break;
                      case "message":?>
                          <th style="width:35%">Message</th><?php break;
                      case "datesent":?>
                          <th style="width:10%">Date Sent</th><?php break;
                      case "timesent":?>
                          <th style="width:10%">Time Sent</th><?php break;
                    }
                    //$stringq .=" ,";
                  }
                  ?>
                <!--
									<th style="width:5%">Message ID</th>
									<th style="width:10%">Receiver's Name</th>
									<th style="width:10%">Receiver's Phone Number</th>
									<th style="width:10%">Sender's Name</th>
									<th style="width:10%">Sender's Phone Number</th>
									<th style="width:35%">Message</th>
									<th style="width:10%">Date Sent</th>
									<th style="width:10%">Time Sent</th>
                -->
								</tfoot>



									<tbody style="width:100%;">
										<?php
										//$_SESSION["tableQuery"]=$stringq;
											$quser=mysqli_query($conn,$stringq);
                      //printf("Error: %s\n", mysqli_error($conn));
    //exit();
											$bab=0;
											while($urow=mysqli_fetch_array($quser)){
												$tableData[$bab]="";
                        ?>
                        <tr>
                        <?php
												//echo sizeof($columnn);
												//$a=""; $b=""; $c=""; $d=""; $e=""; $f=""; $g=""; $h="";

                        for ($x = 0; $x < sizeof($columnn); $x++) {
													//echo $columnn[$x] . " == " . $tableData[$x] . "|";
													$a=""; $b=""; $c=""; $d=""; $e=""; $f=""; $g=""; $h="";
                          switch ($columnn[$x]) {
                            case "index_num":?>
                                <td style="width:5%; overflow: hidden;"><?php echo $urow['index_num']; ?></td>
																<?php $a=$urow['index_num']; break;
                            case "receiver_fname":?>
                                <td style="width:10%; overflow: hidden;"><?php echo $urow['receiver_fname']; ?></td>
																<?php $b=$urow['receiver_fname']; break;
                            case "receiver_num":?>
                                <td style="width:10%; overflow: hidden;"><?php echo $urow['receiver_num']; ?></td>
																<?php $c=$urow['receiver_num']; break;
                            case "sender_name":?>
                                <td style="width:10%; overflow: hidden;"><?php echo $urow['sender_name']; ?></td>
																<?php $d=$urow['sender_name']; break;
                            case "sender_num":?>
                                <td style="width:10%; overflow: hidden;"><?php echo $urow['sender_num']; ?></td>
																<?php $e=$urow['sender_num']; break;
                            case "message":?>
                                <td style="width:35%; overflow: hidden;"><?php echo $urow['message']; ?></td>
																<?php $f=$urow['message']; break;
                            case "datesent":?>
                                <td style="width:10%; overflow: hidden;"><?php echo $urow['datesent']; ?></td>
																<?php $g=$urow['datesent']; break;
                            case "timesent":?>
                                <td style="width:10%; overflow: hidden;"><?php echo $urow['timesent']; ?></td>
																<?php $h=$urow['timesent']; break;
                          }
                          //$stringq .=" ,";
													//echo $columnn[$x] . " == " . $tableData[$x] . "|";
													if($a!=""){
														$tableData[$bab].=$a."`^";
													}
													if($b!=""){
														$tableData[$bab].=$b."`^";
													}
													if($c!=""){
														$tableData[$bab].=$c."`^";
													}
													if($d!=""){
														$tableData[$bab].=$d."`^";
													}
													if($e!=""){
														$tableData[$bab].=$e."`^";
													}
													if($f!=""){
														$tableData[$bab].=$f."`^";
													}
													if($g!=""){
														$tableData[$bab].=$g."`^";
													}
													if($h!=""){
														$tableData[$bab].=$h."`^";
													}
													//$tableData[$bab]=$a.",".$b.",".$c.",".$d.",".$e.",".$f.",".$g.",".$h;

                        }
												$flug = strlen($tableData[$bab]);
											    //printf("huy: $flag");
										    $tableData[$bab] = substr($tableData[$bab],0,$flug-2);

												$bab++;
												//echo"---- ".$bab;
												?>
                      </tr>
												<?php
											}
											$_SESSION["tableData"]=$tableData;
											$_SESSION["columnn"]=$columnn;
										?>
									</tbody>
								</table>
								<script type = "text/javascript">
						      $(document).ready(function() {
						      // Setup - add a text input to each footer cell
						        $('#example tfoot th').each( function () {
						            var title = $(this).text();
						            $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
						        } );

						        // DataTable
						        var table = $('#example').DataTable();

						        // Apply the search
						        table.columns().every( function () {
						            var that = this;

						            $( 'input', this.footer() ).on( 'keyup change', function () {
						                if ( that.search() !== this.value ) {
						                    that
						                        .search( this.value )
						                        .draw();
						                }
						            } );
						        } );
						      } );
						    </script>
		<?php
	}
}
?>
