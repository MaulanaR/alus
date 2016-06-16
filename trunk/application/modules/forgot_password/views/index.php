
<link rel="shortcut icon" href="<?php echo base_url(); ?>Assets/img/favicon.png">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>Assets/dist/css/forgor_password.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Assets/dist/css/loadercss.css" >
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<script src="<?php echo base_url()?>Assets/dist/js/jquery-2.1.4.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<script type="text/javascript">
base_url = '<?php echo base_url();?>';
	function goo() {
		var email = $("#fp_email").val();
		if(email != "")
		{
		var form=$("#forgot-password-form");	
		$.ajax({
        	type:"POST",
        	url:base_url+"Forgot_password/actiongo/",
        	data:form.serialize(),
        beforeSend: function() 
        	{ $("#load_ajax").show(); },
        complete: function() 
        	{ $("#load_ajax").hide(); },
  		success: function(msg){
     		if(msg == "FALSE")
     		{
     			alert("Email yang anda masukan salah / sudah pernah dikirimkan recovery password sebelumnya !");
     		}else{
     			alert("Reset password Email Sent! Anda akan otomatis diarahkan ke halaman Login ");
//     			setTimeout(function () {
//   					window.location.href = "<?php echo base_url();?>";
//				}, 2000);
			$("#test").html(msg);
     		}
        }
    
    });
		}else{
			alert("Harap masukan email !");
		}
  }
</script>
<title>Forgot Password</title>
<div class="load_ajax" id="load_ajax" style="display:none">
  <img src="<?php echo base_url();?>Assets/dist/img/bigspin.gif" id="load_img" >
  <h2 style="color:white;">Loading</h2>
</div>

<div align="center">
<!-- FORGOT PASSWORD FORM -->
<div class="text-center" style="padding:50px 0">
	<div class="logo">forgot password</div>
	<!-- Main Form -->
	<div class="login-form-1">
		<form id="forgot-password-form" class="text-left">
			<div class="etc-login-form">
				<p>When you fill in your registered email address, you will be sent instructions on how to reset your password.</p>
			</div>
			<div class="login-form-main-message"></div>
			<div class="main-login-form">
				<div class="login-group">
					<div class="form-group">
						<label for="fp_email" class="sr-only">Email address</label>
						<input type="text" class="form-control" id="fp_email" name="fp_email" placeholder="Email address" required>
					</div>
				</div>
				<button type="button" class="login-button" onclick="goo()"><i class="fa fa-chevron-right"></i></button>
			</div>
			<div class="etc-login-form">
				<p>already have an account? <a href="<?php echo base_url()?>">login here</a></p>


				<p><a href="<?php echo base_url()?>recovery_password?activation_key=1vH8bSq.X2Aj.pJ.GGsdsMsLOc3301c5dd5ebbdd181">TEST</a></p>
			</div>
		</form>
	</div>
	<div id="test">
		
	</div>
</div>
	<!-- end:Main Form -->
	