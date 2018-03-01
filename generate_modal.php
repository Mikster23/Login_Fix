<div class="modal fade" id="gennew" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">

	<?php echo "generate_modal.php" ?>
  <div class="modal-dialog" role="document">
    <div class="modal-content">
			<div class = "modal-header">
				<center><h3 class = "text-success modal-title">Generate Report</h3></center>
			</div>
			<form class="form-inline">
				<div class="modal-body">
					<div id="text-demo">
			        <form id="text-options">
			            <label><input type="text" class="filename" id="text_filename" placeholder="Enter filename"/>.csv</label>
			        </form>
			    </div>
				</div>
				<div class="modal-footer">
					 <button type="button" class="dl btn btn-success"> <i class = "fa fa-download"></i> Download</button> <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-remove"></i> Cancel</button>
				</div>
			</form>
    </div>
  </div>
</div>
