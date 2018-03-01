<div class="modal fade" id="addnew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

	<?php echo "addUser_modal.php" ?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
			<div class = "modal-header">
				<h3 class="text-success modal-title" style="font-family: 'Eras ITC Medium','BebasNeueRegular', 'Arial Narrow', Arial, sans-serif; font-size: 25px; margin-left: 37%;">Add User</h3>
			</div>
			<form class="form-inline">
				<div class="modal-body" style="margin-left: 15%;">
					Firstname<br> <input type="text" value="" id="afirstname" class="form-control" style="width: 80%;"><br>
					Middlename<br> <input type="text" value="" id="amiddlename" class="form-control" style="width: 80%;"><br>
					Lastname<br> <input type="text" value="" id="alastname" class="form-control" style="width: 80%;"><br>
					Department<br> <input type="text" value="" id="adepartment" class="form-control" style="width: 80%;"><br>
					Email<br> <input type="text" value="" id="aemail" class="form-control" style="width: 80%;"><br>
					Username<br> <input type="text" value="" id="ausername" class="form-control" style="width: 80%;"><br>
					Password<br> <input type="text" value="" id="apassword" class="form-control" style="width: 80%;"><br>
					Phone Number<br> <input type="text" value="" id="aphoneNumber" class="form-control" style="width: 80%;">
				</div>
				<div class="modal-footer" style="margin-left: 53%;">
					 <button type="button" class="addnewuser btn btn-success" style="padding: 10px 24px; font-size: 15px;"> <i class = "fa fa-user-plus"></i> Add</button> <button type="button" class="btn btn-default" data-dismiss="modal" style="padding: 10px 24px;"><i class="fa fa-remove"></i> Cancel</button>
				</div>
			</form>
    </div>
  </div>
</div>
