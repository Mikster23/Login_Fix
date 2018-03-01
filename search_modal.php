<?php
	session_start();
	?>
<div class="modal fade" id="modsearch" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

	<?php echo "search_modal.php" ?>
	<div class="modal-dialog">
		<div class="modal-content" style="margin-top:500px;">
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

					$test = $_POST["lookForMe"];
					echo "@",$test;
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
