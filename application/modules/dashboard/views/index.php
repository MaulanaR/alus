
      <div class="row" style="background:#fafafa;">
        <div class="col-sm-8 col-md-9">
          <div class="page-header page-header-bleed-right">
            <h1>Dashboard</h1>
          </div>
         
          <div class="col-sm-12">
          <div class="card-pf">
            <h2 class="card-pf-title">
              <?php echo $this->session->userdata('first_name'); ?>
            </h2>
            <div class="card-pf-footer">
              <?php 

echo "Selamat Datang ".$this->session->userdata('first_name')." Di Halaman ".$this->session->userdata('job');
/*echo "<br/>";
echo $this->session->userdata('identity');
echo "<br/>";
echo $this->session->userdata('username');
echo "<br/>";
echo $this->session->userdata('user_id');
echo "<br/>";
echo $this->session->userdata('first_name');
echo "<br/>";
echo $this->session->userdata('last_name');
echo "<br/>";
echo $this->session->userdata('old_last_login');
echo "<br/>";
print_r($this->session->userdata('group'));
echo "<br/>";
echo $this->session->userdata('job');
echo "<br/>";*/





?>
            </div>
          </div>
        </div>
        </div><!-- /col -->
        <div class="col-sm-4 col-md-3 sidebar-pf sidebar-pf-right" style="background:#fff;">
          <div class="sidebar-header sidebar-header-bleed-left sidebar-header-bleed-right">
            
            <h2 class="h5">ADMIN</h2>
          </div>
          <ul class="list-group">
              <li class="list-group-item"><a href="#"><img src="<?php echo base_url(); ?>theme/img/country/indonesia.png" alt="" style="width:50px; margin-right:10px;" /> INDONESIA</a></li>
	          <li class="list-group-item"><a href="#"><img src="<?php echo base_url(); ?>theme/img/country/thailand.png" alt="" style="width:50px; margin-right:10px;" /> THAILAND</a></li>
	          <li class="list-group-item"><a href="#"><img src="<?php echo base_url(); ?>theme/img/country/myanmar.png" alt="" style="width:50px; margin-right:10px;" /> MYANMAR</a></li>
	          <li class="list-group-item"><a href="#"><img src="<?php echo base_url(); ?>theme/img/country/kamboja.png" alt="" style="width:50px; margin-right:10px;" /> CAMBODIA</a></li>
	          <li class="list-group-item"><a href="#"><img src="<?php echo base_url(); ?>theme/img/country/laos.png" alt="" style="width:50px; margin-right:10px;" /> LAOS</a></li>
	          <li class="list-group-item"><a href="#"><img src="<?php echo base_url(); ?>theme/img/country/singapore.png" alt="" style="width:50px; margin-right:10px;" /> SINGAPORE</a></li>
	          <li class="list-group-item"><a href="#"><img src="<?php echo base_url(); ?>theme/img/country/philipina.png" alt="" style="width:50px; margin-right:10px;" /> PHILIPINES</a></li>
	          <li class="list-group-item"><a href="#"><img src="<?php echo base_url(); ?>theme/img/country/malaysia.png" alt="" style="width:50px; margin-right:10px;" /> MALAYSIA</a></li>
	          <li class="list-group-item"><a href="#"><img src="<?php echo base_url(); ?>theme/img/country/vietnam.png" alt="" style="width:50px; margin-right:10px;" /> VIETNAM</a></li>
	          <li class="list-group-item"><a href="#"><img src="<?php echo base_url(); ?>theme/img/country/brunei.png" alt="" style="width:50px; margin-right:10px;" /> BRUNEI DARUSSALAM</a></li>
          </ul>
        </div><!-- /col -->
      </div><!-- /row -->

