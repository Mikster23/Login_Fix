<?php
	include('dbcon.php');
	if(isset($_POST['show'])){
		?>
		<table class = "table table-bordered alert-warning table-hover">
			<thead>
				<!--<th>User ID</th>-->
				<th>First Name</th>
				<th>Middle Name</th>
				<th>Last Name</th>
				<th>Department</th>
				<!--<th>Email</th>-->
				<th>Username</th>
				<th>Phone Number</th>
				<th>Total Sent SMS</th>
				<th>Total Received SMS</th>
				<th>Status</th>
				<th>Action</th>
			</thead>
				<tbody>
					<?php
						$quser=mysqli_query($conn,"select * from `users`");
						while($urow=mysqli_fetch_array($quser)){
							?>
								<tr>
									<td><?php echo $urow['firstName']; ?></td>
									<td><?php echo $urow['middleName']; ?></td>
									<td><?php echo $urow['lastName']; ?></td>
									<td><?php echo $urow['department']; ?></td>
									<td><?php echo $urow['userName']; ?></td>
									<td><?php echo $urow['phoneNumber']; ?></td>
									<td><?php echo $urow['totalSent']; ?></td>
									<td><?php echo $urow['totalReceived']; ?></td>
									<td><?php echo $urow['Status']; ?></td>
									<td><button class="btn btn-success" data-toggle="modal" data-target="#edit<?php echo $urow['userID']; ?>"><i class = "fa fa-pencil"></i></button>
										| <button class="btn btn-danger delete" value="<?php echo $urow['userID']; ?>"><i class = "fa fa-trash"></i></button>
										| <button class="btn btn-success" data-toggle="modal" data-target="#show<?php echo $urow['userID']; ?>"><i class = "fa fa-eye"></i></button>
									<?php include('edit_modal.php'); ?>
									<?php include('show_modal.php'); ?>
									</td>
								</tr>
							<?php
						}

					?>
				</tbody>
			</table>
		<?php
	}

?>
