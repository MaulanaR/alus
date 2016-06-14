<!DOCTYPE html>
  <head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>Assets/img/favicon.png">
   
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/dist/css/patternfly.min.css" >
    <link rel="stylesheet" href="<?php echo base_url(); ?>Assets/dist/css/patternfly-additions.min.css" >
    <script src="<?php echo base_url()?>Assets/dist/js/jquery-2.1.4.min.js"></script>  
    <script src="<?php echo base_url();?>Assets/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url(); ?>Assets/dist/js/patternfly.min.js"></script>
     <script>
        $(document).ready(function() { 
            
              $('#capt').fadeIn("slow");
            
        });
          
    </script>

  </head>

  <body style="background: url('<?php echo base_url(); ?>Assets/dist/img/bg-login.jpg');">
        <div class="row" style="margin:0px;padding:0px;">
        <div>
           <?php if($this->session->flashdata('message') != ''){ ?>
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="alert alert-danger text-center"><span class="fa fa-user"></span> <strong> Oops!</strong><?php echo $this->session->flashdata('message');?></div>
                </div>
                 <?php }; ?>
        </div>
            <div style="width:300px;margin:auto;margin-top:100px">
           
                <div class="col-sm-12" style="padding:7px;">
                        <img src="<?php echo base_url();?>Assets/dist/img/logo.png" width="100%" height="100px">
                </div>
                <div class="col-sm-12" style="padding:7px;padding-top:11px;background:url('<?php echo base_url(); ?>Assets/dist/img/header-login.jpg');border-radius:5px 5px 0px 0px;color:#fff;font-weight:bold;">
                    <center><span>Login Base App ALUS.co</span></center>
                </div>
                <div class="col-sm-12" style="padding:20px;background:#fff;box-shadow: 0px 0px 3px #c1c1c1;border-radius:0px 0px 5px 5px;">
                    <div class="col-sm-12 col-md-12 col-lg-12 login">

                      <form class="form-horizontal" role="form" action="<?php echo base_url();?>admin/Login/login" method="post" autocomplete="off">
                        <div class="form-group">
                          
                          <div class="col-sm-12 col-md-12 input-group">
                            <span class="input-group-addon"><i class="fa fa-user"></i></span>
                            <input type="text" name="identity" class="form-control" id="inputUsername" placeholder="Username or Email" tabindex="1" required>
                            
                          </div>
                        </div>
                        <div class="form-group">
                         
                          <div class="col-sm-12 col-md-12 input-group">
                            <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="Password" tabindex="2" required>
                          </div>
                        </div>
                        <hr/>
                        <!-- captcha -->
                        <div id="capt" style="display:none">
                        <div class="form-group">
                         <center><label>Input Captcha</label>
                            <div class="col-md-12 input-group">
                            <?php echo $captcha ;?>
                            </div>
                          </center>
                        </div>
                        <div class="form-group">
                          <div class="col-sm-12 col-md-12 input-group">
                          <span class="input-group-addon"><i class="fa fa-key"></i></span>
                            <input type="text" name="captcha" class="form-control" id="inputCaptcha" placeholder="Isikan seperti yang terlihat di gambar" tabindex="2"  required>
                          </div>

                        </div>
                        <!-- end div hide-->
                        </div>
                        <div class="form-group">
                          <div class="col-xs-8 col-sm-offset-2 col-sm-6 col-md-offset-2 col-md-6">
                            
                          </div>
                          <div class="col-xs-4 col-sm-4 col-md-4 submit">
                            <button type="submit" class="btn btn-primary btn-lg" style="background:rgb(56, 56, 56) none repeat scroll 0% 0%;" tabindex="4" id="submit-form" >Log In</button>
                          </div>
                        </div>
                      </form>
                    </div><!--/.col-*-->
                </div>
                
            </div>
            </div>
  </body>
</html>
