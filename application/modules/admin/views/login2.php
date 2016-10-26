<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dist/css/toasty.css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/patternfly.min.css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/login-style.css" >

<!DOCTYPE html>
  <head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png">
  </head>
  <body>
  
    <div class="body" style="background-image: url('<?php echo base_url(); ?>assets/dist/img/bg-login.jpg');"></div>
    <div class="grad"></div>

    <div class="header">
      <div><img src="<?php echo base_url();?>assets/dist/img/logo.png" width="100%" height="100px"></div><br/>
      <div>Base <span>App</span></div>
    </div>
    <br>

    <div class="login">
      <form action="<?php echo base_url();?>admin/Login/login" method="post" autocomplete="off" id="form">
        <input type="text" placeholder="Email" id="emailn" name="identity" required><br>
        <input type="password" placeholder="password" id="passn" name="password" required><br>
        <div id="cap">
        <div style="padding-left:18%; padding-top:3%; padding-bottom:3%;"><?php echo $captcha ;?></div>
        <input type="text" placeholder="Captcha" name="captcha" id="captn" onkeypress="trylogin(event)" required><br>
        </div>
        <div>
          <button type="button" id="submitform" class="button outline">Log-in</button>
        </div>
          <p style="padding-top:10px;"><a href="<?php echo base_url();?>forgot_password/">Forgot Password ?</a></p>
      </form>
    </div>    


  </body>

<!-- js -->
<script src="<?php echo base_url()?>assets/dist/js/jquery-2.1.4.min.js"></script>  
<script src="<?php echo base_url();?>assets/dist/js/toasty.js"></script>
 <script src="<?php echo base_url();?>assets/dist/js/master.js"></script>
<script type="text/javascript">
  /*Di saat input field captcha ditekan enter */
function trylogin(e) {
    if (e.keyCode == 13)
    {
      masukbr();
    }
  }
</script>
