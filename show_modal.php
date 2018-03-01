<div class="modal fade" id="show<?php echo $urow['userID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<?php echo "show_modal.php" ?>
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
			<div class = "modal-header">
				<h3 class = "text-success modal-title" style="font-family: 'Eras ITC Medium','BebasNeueRegular', 'Arial Narrow', Arial, sans-serif; font-size: 25px; margin-left: 37%;">View User Record</h3>
			</div>
			<form class="form-inline">
				<div class="modal-body" style="height: 500px; margin-left: 7%; overflow-y: scroll;">
          <table>
            <thead>
      				<th>User ID</th>
      				<th>Username</th>
      				<th>Login Date</th>
							<th>Login Time</th>
      				<th>Logout Date</th>
      				<th>Logout Time</th>
      			</thead>
            <tbody>
    					<?php
    						$user=mysqli_query($conn,"SELECT * FROM login WHERE login.userID='".$urow['userID']."'");
								$flag=0;
								while($urow=mysqli_fetch_array($user)){
    							?>
    								<tr>
    									<td><?php echo $urow['userID']; ?></td>
    									<td><?php echo $urow['userName']; ?></td>
    									<td><?php echo $urow['loginDate']; ?></td>
    									<td><?php echo $urow['loginTime']; ?></td>
											<td><?php echo $urow['logoutDate']; ?></td>
    									<td><?php echo $urow['logoutTime']; ?></td>
    								</tr>
    							<?php
									$flag++;
    						}
								if($flag==0){
									?>
    								<tr>
											<td colspan="6" style="text-align:center;">No Login Record.</td>
    								</tr>
    							<?php
								}
    					?>
    				</tbody>
          </table>
				</div>
				<div class="modal-footer" style="margin-left: 83%;">
					<button type="button" class="btn btn-default" data-dismiss="modal" style="padding: 10px 24px;"><i class="fa fa-remove"></i> Close</button>
				</div>
			</form>
    </div>
  </div>
</div>
