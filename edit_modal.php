<div class="modal fade" id="edit<?php echo $urow['userID']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
	<?php
		$n=mysqli_query($conn,"select * from `users` where userID='".$urow['userID']."'");
		$nrow=mysqli_fetch_array($n);
	?>
	<?php echo "edit_modal.php" ?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
			<div class = "modal-header">
				<h3 class = "text-success modal-title" style="font-family: 'Eras ITC Medium','BebasNeueRegular', 'Arial Narrow', Arial, sans-serif; font-size: 25px; margin-left: 37%;">Edit User</h3>
			</div>
			<form class="form-inline">
				<div class="modal-body" style="margin-left: 15%;">
					Firstname<br> <input type="text" value="<?php echo $nrow['firstName']; ?>" id="ufirstname<?php echo $urow['userID']; ?>" class="form-control" style="width: 80%;"> <br>
					Middlename<br> <input type="text" value="<?php echo $nrow['middleName']; ?>" id="umiddlename<?php echo $urow['userID']; ?>" class="form-control" style="width: 80%;"> <br>
					Lastname<br> <input type="text" value="<?php echo $nrow['lastName']; ?>" id="ulastname<?php echo $urow['userID']; ?>" class="form-control" style="width: 80%;"> <br>
					Department<br> <input type="text" value="<?php echo $nrow['department']; ?>" id="udepartment<?php echo $urow['userID']; ?>" class="form-control" style="width: 80%;"> <br>
					Email<br> <input type="text" value="<?php echo $nrow['email']; ?>" id="uemail<?php echo $urow['userID']; ?>" class="form-control" style="width: 80%;"> <br>
					Username<br> <input type="text" value="<?php echo $nrow['userName']; ?>" id="uusername<?php echo $urow['userID']; ?>" class="form-control" style="width: 80%;"> <br>
					Password<br> <input type="text" value="<?php echo $nrow['password']; ?>" id="upassword<?php echo $urow['userID']; ?>" class="form-control" style="width: 80%;"> <br>
					Phone Number<br> <input type="text" value="<?php echo $nrow['phoneNumber']; ?>" id="uphoneNumber<?php echo $urow['userID']; ?>" class="form-control" style="width: 80%;">
				</div>
				<div class="modal-footer" style="margin-left: 53%;">
					<button type="button" class="updateuser btn btn-success" value="<?php echo $urow['userID']; ?>" style="padding: 10px 24px; font-size: 15px;"><i class = "fa fa-save	"></i> Save</button> <button type="button" class="btn btn-default" data-dismiss="modal" style="padding: 10px 24px;"><i class="fa fa-remove"></i> Cancel</button>
				</div>
			</form>
    </div>
  </div>
</div>
