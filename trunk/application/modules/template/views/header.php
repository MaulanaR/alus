<!DOCTYPE html>
<html>
<head>
  <title>ALUS.CO</title>

  
  <!-- Load material css and js-->
  <link rel="shortcut icon" href="<?php echo base_url(); ?>Assets/img/favicon.png">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Assets/dist/css/patternfly.min.css" >
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Assets/dist/css/loadercss.css" >
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Assets/dist/css/patternfly-additions.min.css" >
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Assets/components/datatables/media/css/jquery.dataTables.min.css" >
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Assets/components/datatables/media/css/dataTables.bootstrap.min.css" >
  <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>Assets/components/datatables/Buttons/css/buttons.dataTables.min.css" >
    

    <script src="<?php echo base_url()?>Assets/dist/js/jquery-2.1.4.min.js"></script>  
    <script src="<?php echo base_url();?>Assets/components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url();?>Assets/dist/js/bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>Assets/dist/js/patternfly.min.js"></script>
    <script src="<?php echo base_url();?>Assets/dist/js/jquery.chained.min.js"></script>
    <script src="<?php echo base_url();?>Assets/dist/js/bootstrap-combobox.js"></script>
    <script src="<?php echo base_url();?>Assets/components/datatables/media/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>Assets/components/datatables/Buttons/js/dataTables.buttons.min.js"></script>

    <script src="<?php echo base_url();?>Assets/components/datatables/Buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url();?>Assets/components/datatables/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url();?>Assets/components/datatables/Buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>Assets/components/datatables/Buttons/js/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url();?>Assets/components/datatables/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>Assets/components/datatables/pdfmake/build/vfs_fonts.js"></script>
    
    <!-- baru -->

    

</head>
 
<body>
<div class="load_ajax" id="load_ajax" style="display:none">
  <img src="<?php echo base_url();?>Assets/dist/img/bigspin.gif" id="load_img" >
  <h2 style="color:white;">Loading</h2>
</div>
<nav class="navbar navbar-default navbar-pf" role="navigation">
        <div class="navbar-header">
          <a class="navbar-brand" href="#">
            <img src="<?php echo base_url(); ?>Assets/dist/img/logo.png" width=90px; height=20px; alt="PatternFly Enterprise Application" />
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
        
          <ul class="nav navbar-nav">
            <li>
              <a href="<?php echo base_url(); ?>dashboard/" target="" >
                Home
              </a>
            </li>
           <?php
          foreach ($head as $key) {
            echo $key;
          }
          
            ?>
          </ul>
        </div>
</nav>

    <div class="container">
    