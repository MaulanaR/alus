
<link rel="shortcut icon" href="<?php echo base_url(); ?>Assets/img/favicon.png">
<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo base_url();?>Assets/dist/css/forgor_password.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Assets/dist/css/loadercss.css" >
<link href='http://fonts.googleapis.com/css?family=Varela+Round' rel='stylesheet' type='text/css'>
<script src="<?php echo base_url()?>Assets/dist/js/jquery-2.1.4.min.js"></script>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

<title>Your New Password</title>

<div align="center">
<!-- FORGOT PASSWORD FORM -->
<div class="text-center" style="padding:50px 0">
	<div class="logo"><?php echo $message;?></div>
	<div class="logo">Your New Password</div>
	<div class="logo"><?php echo $new['new_password'];?></div>
	<!-- Main Form -->
	<div class="login-form-1">
		<form id="reset-form" class="text-left">
			<div class="etc-login-form">
				<p>Silahkan kembali ke halaman login dan gunakan password seperti diatas</p>
				<p>Jika masih gagal login silahkan hubungi administrator</p>
			</div>
			<br/>
			<div class="etc-login-form">
				<p><a href="<?php echo base_url()?>">Klik disini untuk kembali ke halaman login</a></p>
			</div>
		</form>
	</div>
</div>
	<!-- end:Main Form -->