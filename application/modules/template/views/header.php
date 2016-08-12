<!DOCTYPE html>
<html>
<head>
  <title>ALUS.CO</title>

  
  <!-- Load material css and js-->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>assets/img/favicon.png">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dist/css/patternfly.min.css" >
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dist/css/loadercss.css" >
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dist/css/toasty.css" >
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dist/css/patternfly-additions.min.css" >
  
    

    <script src="<?php echo base_url()?>assets/dist/js/jquery-2.1.4.min.js"></script>  
    <script src="<?php echo base_url();?>assets/dist/js/toasty.js"></script>
    <script src="<?php echo base_url();?>assets/components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>assets/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/dist/js/patternfly.min.js"></script>


<style>
/* ubah warna atas modal */
.modal-header{
  background:<?php echo $this->alus_auth->get_theme_modal('header');?>;
  color:<?php echo $this->alus_auth->get_theme_modal('text');?>;
}
/* ubah warna tanda x pada modal */
.close{
  color: <?php echo $this->alus_auth->get_theme_modal('close');?>;
}
.table thead th {
  background-color: <?php echo $this->alus_auth->get_theme_modal('headtable');?>;
  background: <?php echo $this->alus_auth->get_theme_modal('headtable');?>;
  color: <?php echo $this->alus_auth->get_theme_modal('colortable');?>;
}
.testaja{
 background-color: <?php echo $this->alus_auth->get_theme_modal('headtable');?>;
 background: <?php echo $this->alus_auth->get_theme_modal('headtable');?>;
  color: <?php echo $this->alus_auth->get_theme_modal('colortable');?>; 
}
</style>
    

</head>
 
<body>
<div class="load_ajax" id="load_ajax" style="display:none">
  <img src="<?php echo base_url();?>assets/dist/img/bigspin.gif" >
  <h2 style="color:white;">Loading</h2>
</div>
<nav class="navbar navbar-default navbar-pf" role="navigation" style="background:<?php echo $this->alus_auth->get_theme_header();?>">
        <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse-5">
      <span class="sr-only">Toggle navigation</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
          <a class="navbar-brand" href="#">
            <img src="<?php echo base_url(); ?>assets/dist/img/logo.png" width=25%; height=25%; alt="PatternFly Enterprise Application" />
          </a>
        </div>
        
        <div class="collapse navbar-collapse navbar-collapse-5">
          <ul class="nav navbar-nav navbar-utility">
            <li>
              <a href="#"><?php echo $this->session->userdata('job'); ?></a>
            </li>
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <span class="pficon pficon-user"></span>
                <?php echo $this->session->userdata('first_name').' '.$this->session->userdata('last_name') ;?>

                <b class="caret"></b>
              </a>
                <ul class="dropdown-menu">
                  <li>
                    <a href="<?php echo base_url(); ?>admin/Login/logout"><i class="fa fa-sign-out"></i> Logout</a>
                  </li>
                </ul>
              </li>
          </ul>
          
           <?php
           echo $head;
            ?>
          
        </div>
</nav>
    <div class="container-fluid" id="container">