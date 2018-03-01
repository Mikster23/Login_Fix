<?php
	include('dbcon.php');
?>
<!DOCTYPE html><html lang="en" class="no-js">
  <head>
  	<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator</title>
    <link rel="shortcut icon" href="../favicon.ico">
    <link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" /><!--
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.min.css" />-->
    <link rel="stylesheet" type="text/css" href="css/demo-admin.css" />
    <link rel="stylesheet" type="text/css" href="css/style-admin.css" />
		<link rel="stylesheet" type="text/css" href="css/animate-custom.css" />
    <link rel="stylesheet" type="text/css" href="package/font-awesome/css/font-awesome.min.css" />
		<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css"/>
		<!--<link rel="stylesheet" type="text/css" href="assets/bootstrap/css/bootstrap.css" />-->
    <link rel="stylesheet" type="text/css" href="css/multiple-select.css" />
    <!--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css" type="text/css" media="screen"/>-->
		<script src = "js/jquery-3.2.1.js"></script>
		<script src = "js/tether.js"></script>
		<script src = "js/jquery-1.12.4.js"></script>
		<script src = "js/jquery.dataTables.js"></script>
		<script src="js/jquery.min.js"></script>
		<script src = "js/bootstrap.js"></script>
    <style>
			tfoot input {
		  	width: 100%;
		    padding: 3px;
		    box-sizing: border-box;
		  }
		</style>
  </head>
  <body>
  	<section class="container">
    	<div class="one">
      	<table class="onetab">
      		<tr class="onetr">
      			<td class="home">
							<button type="button" id="homebtn" class = "home_btn btn-primary"><i class="fa fa-home"></i></button>
						</td>
						<td class="flag"></td>
      			<td class="admin">
      				<p><i class="fa fa-user"></i> Administrator</p>
      			</td>
      			<td class="log">
      				<button type="button" id="logoutbtn" class = "logout_btn btn-primary">Logout</button>
      			</td>
      		</tr>
      	</table>
      </div>
      <div class="two">
      	<table class="twotab">
      		<tr>
      			<td class="manage_user">
      				<button type="button" id="" class = "muser_btn btn-primary"><i class="fa fa-users"></i> Manage Users</button>
      			</td>
      			<td class="report">
      				<button type="button" id="report_id" class = "report_btn btn-primary"><i class="fa fa-file-text"></i> Report</button>
      			</td>
      			<td class="twoflag"></td>
      		</tr>
      	</table>
      </div>
			<div class="user_class">
      	<div class="three">
        	<table class="threetab">
      			<tr>
      				<td class="threeflag"></td>
      				<!--</td>-->
      				<td class="addUser">
              	<button class="auser_btn btn-success" type="button" data-toggle="modal" data-target="#addnew"> <i class="fa fa-user-plus"></i> Add User </button>
                <?php include('addUser_modal.php'); ?>
                  <!--<button type="button" class="auser_btn btn-default" onCLick="addUser"> <i class="fa fa-user-plus"></i> Add User </button>-->
      						<!-- <button type="button" id="" class = "auser_btn btn-primary"><span class = "glyphicon glyphicon-plus"></span>Add User</button> -->
      				</td>
      			</tr>
      		</table>
        </div>
	      <div class="four">
	      	<div id="userTable" class="userClass">
	        </div>
	     	</div>
			</div>
<!-- Report's div -->
			<div class="report_class">
				<div class="six">
					<div style="width:50%;float:right; margin: 2px;">
						<div class="form-group">
							<table style="width:100%;">
								<tr style="width:100%;">
									<td style="width:70%;">
										<input name="states" type="hidden">
										<select id="ms" multiple="multiple">
											<option value="index_num"> Message ID</option>
							        <option value="receiver_fname"> Receiver's Name</option>
							        <option value="receiver_num"> Receiver's Phone Number</option>
							        <option value="sender_name"> Sender's Name</option>
							        <option value="sender_num"> Sender's Phone Number</option>
							        <option value="message"> Message</option>
							        <option value="datesent"> Date Sent</option>
							        <option value="timesent"> Time Sent</option>
							      </select>
									</td>
									<td style="width:30%;">
										<button type="button" id="repTable" class = "repTable_btn btn-success" data-toggle="modal" data-target="#gennew"><i class="fa fa-table"></i> Generate Report</button>
										<!--<button class="auser_btn btn-success" type="button" data-toggle="modal" data-target="#addnew"> <i class="fa fa-user-plus"></i> Add User </button>-->
		                <?php include('generate_modal.php'); ?>
									</td>
								</tr>
							</table>
				    </div>
					</div>
					<div id="recordTable" class="userClass">
          </div>
				</div>
			</div>
    </section>
		<script src="js/multiple-select.js"></script>
		<script>
			$(function() {
				$('#ms').change(function() {
					//$num = array();
				  console.log($(this).val());
					$num = $(this).val();
					//$aphoneNumber=$('#aphoneNumber').val();
					$.ajax({
						url: 'show_recordTable.php',
						type: 'POST',
						async: false,
						data:{
							dnum: $num,
							recTab: 1
						},
						success: function(response){
							$('#recordTable').html(response);
						}
					});
				}).multipleSelect({
					width: '100%'
				  });
			});
		</script>

        <!--
        <script src="chatbox.js"></script>

      <script src="package/jquery/jquery.min.js"></script>
      <script src="js/chat.js"></script>-->
  </body>

	<script type = "text/javascript">
		$(document).ready(function(){
	//Generate Record
	  		$(document).on('click', '.dl', function(){
	  			if ($('#text_filename').val()==""){
	  				alert('Please input a file name first.');
	  			}
	  			else{
	        $('#gennew').modal('hide');
	    		$('body').removeClass('modal-open');
	    		$('.modal-backdrop').remove();
	  			$text_filename=$('#text_filename').val();
					//alert('baba is '+$text_filename);
	  				$.ajax({
	  					type: "POST",
	  					url: "generateReport.php",
	  					data:{
	  						dtext_filename: $text_filename,
	  						gennew: 1,
	  					},
	  					success: function(){
								text_filename.value="";
	              alert("File download complete.");
	  					}
	  				});
	  			}
	  		});
			});
	</script>


  <script type = "text/javascript">
  	$(document).ready(function(){
  		showUser();
			$('.report_class').hide();
			$('.five').hide();
			$('.six').hide();
			//report
			$('.report_btn').click(function() {
			   $('.user_class').hide();
				 $('.three').hide();
				 $('.auser_btn').hide();
				 $('.four').hide();
				 $('.report_class').show();
				 $('.five').show();
				 $('.six').show();
			});
			$('.muser_btn').click(function() {
			   $('.report_class').hide();
				 $('.five').hide();
				 $('.six').hide();
				 $('.user_class').show();
				 $('.three').show();
				 $('.four').show();
				 $('.auser_btn').show();
			});

/*
			$('.repTable_btn').click(function() {
				console.log("BABABABABBAA");
				$.get("./generateReport.php", {
            //username: userNameString,
            //text: chatInputString,
						    success: function(response){
        /*      $.get("./showusermsg.php", function (data) {

                 $chatOutput.html(data); //Paste content into chat output
             });*/
/*                }
        });
			});
*/  		//Add New
  		$(document).on('click', '.addnewuser', function(){
  			if ($('#afirstname').val()=="" || $('#alastname').val()==""){
  				alert('Please input data first');
  			}
  			else{
        $('#addnew').modal('hide');
    		$('body').removeClass('modal-open');
    		$('.modal-backdrop').remove();
  			$afirstname=$('#afirstname').val();
        $amiddlename=$('#amiddlename').val();
  			$alastname=$('#ac').val();
        $adepartment=$('#adepartment').val();
  			$aemail=$('#aemail').val();
  			$ausername=$('#ausername').val();
  			$apassword=$('#apassword').val();
  			$aphoneNumber=$('#aphoneNumber').val();
  				$.ajax({
  					type: "POST",
  					url: "addUser.php",
  					data:{
  						dfirstname: $afirstname,
              dmiddlename: $amiddlename,
  						dlastname: $alastname,
              ddepartment: $adepartment,
              demail: $aemail,
  						dusername: $ausername,
  						dpassword: $apassword,
  						dphoneNumber: $aphoneNumber,
  						addnew: 1,
  					},
  					success: function(){
							afirstname.value="";
							amiddlename.value="";
							alastname.value="";
							adepartment.value="";
							aemail.value="";
							ausername.value="";
							apassword.value="";
							aphoneNumber.value="";
              alert("New user has been added.");
  						showUser();
  					}
  				});
  			}
  		});
  		//Delete
  		$(document).on('click', '.delete', function(){
  			$id=$(this).val();
        if(confirm("Are you sure you want to delete this user?")){
        		$.ajax({
  					type: "POST",
  					url: "delete.php",
  					data: {
  						userID: $id,
  						del: 1,
  					},
  					success: function(){
  						showUser();
  					}
  				});
        }
  		});
  		//Update
  		$(document).on('click', '.updateuser', function(){
  			$uid=$(this).val();

  			$('#edit'+$uid).modal('hide');
  			$('body').removeClass('modal-open');
  			$('.modal-backdrop').remove();
  			$ufirstname=$('#ufirstname'+$uid).val();
        $umiddlename=$('#umiddlename'+$uid).val();
  			$ulastname=$('#ulastname'+$uid).val();
  			$udepartment=$('#udepartment'+$uid).val();
  			$uemail=$('#uemail'+$uid).val();
  			$uusername=$('#uusername'+$uid).val();
  			$upassword=$('#upassword'+$uid).val();
        $uphoneNumber=$('#uphoneNumber'+$uid).val();
        $ustatus=$('#ustatus'+$uid).val();

  				$.ajax({
  					type: "POST",
  					url: "update.php",
  					data: {
  						id: $uid,
  						firstname: $ufirstname,
              middlename: $umiddlename,
  						lastname: $ulastname,
  						department: $udepartment,
  						email: $uemail,
  						username: $uusername,
  						password: $upassword,
              phoneNumber: $uphoneNumber,
              status: $ustatus,
  						edit: 1,
  					},
  					success: function(){
              alert("Update successful.");
  						showUser();
  					}
  				});
  		});
  	});

  	//Showing our Table
  	function showUser(){
  		$.ajax({
  			url: 'show_user.php',
  			type: 'POST',
  			async: false,
  			data:{
  				show: 1
  			},
  			success: function(response){
  				$('#userTable').html(response);
  			}
  		});
  	}
  </script>
<!-- HUYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYYY -->
	<script type = "text/javascript">
		var btn = document.getElementById('homebtn');
		btn.addEventListener('click', function() {
		document.location.href = 'home.php';
		});
	</script>

	<script type = "text/javascript">
		var btn = document.getElementById('logoutbtn');
		btn.addEventListener('click', function() {
		document.location.href = 'logout.php';
		});
	</script>
</html>
