<link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dist/css/toasty.css" >
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/dist/css/patternfly.min.css" >

<script src="<?php echo base_url()?>assets/dist/js/jquery-2.1.4.min.js"></script>  
<script src="<?php echo base_url();?>assets/dist/js/toasty.js"></script>

<style type="text/css">
/* latin-ext */
@font-face {
  font-family: 'Exo';
  font-style: normal;
  font-weight: 100;
  src: local('Exo Thin'), local('Exo-Thin'), url(http://fonts.gstatic.com/s/exo/v4/8u62BadBN2JBBSWXwLrcLA.woff2) format('woff2');
  unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Exo';
  font-style: normal;
  font-weight: 100;
  src: local('Exo Thin'), local('Exo-Thin'), url(http://fonts.gstatic.com/s/exo/v4/bSEuBfAK9i16rKak_EdKNA.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}
/* latin-ext */
@font-face {
  font-family: 'Exo';
  font-style: normal;
  font-weight: 200;
  src: local('Exo ExtraLight'), local('Exo-ExtraLight'), url(http://fonts.gstatic.com/s/exo/v4/Hy3VpD2TiyQkDhJpDnN2QPesZW2xOQ-xsNqO47m55DA.woff2) format('woff2');
  unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Exo';
  font-style: normal;
  font-weight: 200;
  src: local('Exo ExtraLight'), local('Exo-ExtraLight'), url(http://fonts.gstatic.com/s/exo/v4/lA-XzkxvFbAS7qSN5Rm7dw.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}
/* latin-ext */
@font-face {
  font-family: 'Exo';
  font-style: normal;
  font-weight: 400;
  src: local('Exo Regular'), local('Exo-Regular'), url(http://fonts.gstatic.com/s/exo/v4/J59yWLG3iwczjwZ63gnONw.woff2) format('woff2');
  unicode-range: U+0100-024F, U+1E00-1EFF, U+20A0-20AB, U+20AD-20CF, U+2C60-2C7F, U+A720-A7FF;
}
/* latin */
@font-face {
  font-family: 'Exo';
  font-style: normal;
  font-weight: 400;
  src: local('Exo Regular'), local('Exo-Regular'), url(http://fonts.gstatic.com/s/exo/v4/kA_pX0U45Eb7PbHijV1x2w.woff2) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2212, U+2215, U+E0FF, U+EFFD, U+F000;
}
body{
  margin: 0;
  padding: 0;
  background: #fff;

  color: #fff;
  font-family: Arial;
  font-size: 12px;
}

.body{
  position: absolute;
  top: -20px;
  left: -20px;
  right: -40px;
  bottom: -40px;
  width: auto;
  height: auto;
  background-image: url('<?php echo base_url(); ?>assets/dist/img/bg-login.jpg');
  background-size: cover;
  -webkit-filter: blur(2px);
  z-index: 0;
}

.grad{
  position: absolute;
  top: -20px;
  left: -20px;
  right: -40px;
  bottom: -40px;
  width: auto;
  height: auto;
  background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,rgba(0,0,0,0)), color-stop(100%,rgba(0,0,0,0.65))); /* Chrome,Safari4+ */
  z-index: 1;
  opacity: 0.7;
}

.header{
  position: absolute;
  top: calc(50% - 35px);
  left: calc(50% - 255px);
  z-index: 2;
}

.header div{
  float: left;
  color: #fff;
  font-family: 'Exo', sans-serif;
  font-size: 35px;
  font-weight: 200;
}

.header div span{
  color: #5379fa !important;
}

.login{
  position: absolute;
  top: calc(50% - 75px);
  left: calc(50% - 50px);
  height: 150px;
  width: 350px;
  padding: 10px;
  z-index: 2;
}

.login input[type=text]{
  width: 250px;
  height: 30px;
  background: transparent;
  border: 1px solid rgba(255,255,255,0.6);
  border-radius: 2px;
  color: #fff;
  font-family: 'Exo', sans-serif;
  font-size: 16px;
  font-weight: 400;
  padding: 4px;
}

.login input[type=password]{
  width: 250px;
  height: 30px;
  background: transparent;
  border: 1px solid rgba(255,255,255,0.6);
  border-radius: 2px;
  color: #fff;
  font-family: 'Exo', sans-serif;
  font-size: 16px;
  font-weight: 400;
  padding: 4px;
  margin-top: 10px;
}

.login input[type=button]{
  width: 260px;
  height: 35px;
  background: #fff;
  border: 1px solid #fff;
  cursor: pointer;
  border-radius: 2px;
  color: #a18d6c;
  font-family: 'Exo', sans-serif;
  font-size: 16px;
  font-weight: 400;
  padding: 6px;
  margin-top: 10px;
}

.login input[type=button]:hover{
  opacity: 0.8;
}

.login input[type=button]:active{
  opacity: 0.6;
}

.login input[type=text]:focus{
  outline: none;
  border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=password]:focus{
  outline: none;
  border: 1px solid rgba(255,255,255,0.9);
}

.login input[type=button]:focus{
  outline: none;
}

::-webkit-input-placeholder{
   color: rgba(255,255,255,0.6);
}

::-moz-input-placeholder{
   color: rgba(255,255,255,0.6);
}

button,
.button {
  display: inline-block;
  width: 230px;
  height: 35px;
  margin: 0.75rem;
  padding: 0.75rem 1.5rem;
  border: none;
  border-radius: 0.1875rem;
  outline: none;
  background-color: #80ced6;
  color: white;
  font-family: inherit;
  font-size: 1.125em;
  font-weight: 300;
  line-height: 1.5rem;
  text-decoration: none;
  cursor: pointer;
  -webkit-transition: all 150ms ease-out;
  transition: all 150ms ease-out;
}
button:focus, button:hover,
.button:focus,
.button:hover {
  background-color: #ffffff;
  box-shadow: 0 0 0 0.1875rem white, 0 0 0 0.375rem #0D6094;
}
button:active,
.button:active {
  background-color: #0D6094;
  box-shadow: 0 0 0 0.1875rem #0D6094, 0 0 0 0.375rem #0D6094;
  -webkit-transition-duration: 75ms;
          transition-duration: 75ms;
}
button.outline,
.button.outline {
  border: 0.2875rem solid #0D6094;
  background-color:rgba(255,255,255,0.4);;
  color: #ffffff;
}
button.outline:focus, button.outline:hover,
.button.outline:focus,
.button.outline:hover {
  border-color: #0D6094;
  color: #ffffff;
}
button.outline:active,
.button.outline:active {
  border-color: #80ced6;
  color: #b18d3c;
}

/* notif */
.notif {
  background-image: repeating-linear-gradient(-45deg, transparent, transparent 20px, rgba(255,255,255,0.1) 20px, rgba(255,255,255,0.1) 40px );
  color: #fff;
  text-shadow: 0 1px 0 rgba(0,0,0,0.2);
  padding: 5px 10px;
  box-shadow: inset 0 1px 0 rgba(255,255,255,0.5);
  border: 1px solid;
  margin: 10px 0;
}
.error {
  background-color: #f31;
  border-color: #d10;
}


</style>
<!DOCTYPE html>
  <head>
    <title>Login</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png">
  </head>
  <body>
   <script type="text/javascript">
   $( document ).ready(function() {
     var msg = '<?php echo $this->session->flashdata('message');?>';
      if(msg != "")
      {
        $().toasty({
          message: msg,
          autoHide: 3000
        }); 
      }
  });
    </script>

    <div class="body"></div>
    <div class="grad"></div>

    <div class="header">
      <div><img src="<?php echo base_url();?>assets/dist/img/logo.png" width="100%" height="100px"></div><br/>
      <div>Base <span>App</span></div>
    </div>
    <br>

    <div class="login">
      <form action="<?php echo base_url();?>admin/Login/login" method="post" autocomplete="off">
        <input type="text" placeholder="username" name="identity" required><br>
        <input type="password" placeholder="password" name="password" required><br>
        <div id="cap">
        <div style="padding-left:18%; padding-top:3%; padding-bottom:3%;"><?php echo $captcha ;?></div>
        <input type="text" placeholder="Captcha" name="captcha" required><br>
        </div>
        <div>
          <button type="submit" tabindex="4" id="submit-form" class="button outline">Log-in</button>
        </div>
          <p style="padding-top:10px;"><a href="<?php echo base_url();?>forgot_password/">Forgot Password ?</a></p>
      </form>
    </div>    

  </body>
