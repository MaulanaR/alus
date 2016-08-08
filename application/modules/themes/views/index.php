	<script type="text/javascript">
    not = "<?php echo $this->session->flashdata('message');?>";
		base_url = '<?php echo base_url();?>';
    $(document).ready(function() {
        if(not == ""){
          $("#showbntr").show().delay(7000).hide(100);  
        }
        
    });
  function update(id) {
  var form=$("#New");
  var isi = $("#"+id).val();
  $.ajax({
        type:"POST",
        url:form.attr("action"),
        data:"tipe="+id+"&isi="+isi,
        beforeSend: function() 
        { $("#load_ajax").show(); },
        complete: function() 
        { $("#load_ajax").hide(); },
        success: function(msg){
          $("#container").html(msg);
        }
    });
  }

  </script>
	<?php if($this->session->flashdata('message')!="" ){?>
    <script>
      $("#notif").show("slow").delay(3000).hide(100);
    </script>
        <br/>
        <div class="toast-pf toast-pf-max-width toast-pf-top-right alert alert-warning alert-dismissable" id="notif" style="display:none;">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">
            <span class="pficon pficon-close"></span>
          </button>
          <span class="pficon pficon-ok"></span>
           <strong> Pemberitahuan ! </strong><?php echo $this->session->flashdata('message'); ?>
        </div>
    <?php } ?> 
    <br/>
    <div class="panel panel-warning" id="showbntr" style="display: none;">
        <div class="panel-heading">
            <span class="panel-title"> Informasi ! 
              <button type="button" class="close" data-dismiss="alert" data-target="#showbntr" aria-hidden="true" style="color:#ffffff;">
                  <span class="pficon pficon-close"></span>
              </button>
            </span>
        </div> 
        <div class="panel-body">ketikan warna pada kolom yang sudah tersedia , contohnya :<strong>red</strong>. atau bisa menggunakan linear gradien contohnya : <strong>linear-gradient(to bottom, rgba(58,72,89,0.92) 0%, rgba(58,72,89,0.92) 100%)</strong> atau kosongkan untuk menggunakan setelan default. Setelah itu tekan tombol <strong>Change</strong> , dan silahkan login ulang untuk melihat perubahan .</div>
    </div>

    <h2 class="text-center">Theme</h2>
        <form action="<?php echo base_url();?>themes/update" method="POST" id="New">
        <div class="form-group">
                <label>Base header color</label>
            <div class="form-group">
                <div class="col-sm-10" style="padding: 0px; padding-right: 2px;">
                    <input type="text" name="header" class="form-control" value="<?php echo $this->alus_auth->get_theme_header();?>" id="header">   
                </div>
                <div class="col-sm-2" style="padding: 0px; padding-left: 2px;">
                  <?php if($can_edit == 1)
                  { ?>
                    <button class="btn btn-primary btn-xs" type="button" onclick="update('header')">Change !</button>
                  <?php }?>
                </div>
          </div>  
            <div class="form-group"> 
                <div class="col-sm-3">Preview (Current)</div>
                <div class="col-sm-9"><input class="form-control" style="background:<?php echo $this->alus_auth->get_theme_header();?>;" readonly> </div>
            </div>
        </div>
        <br/>
        <div class="form-group">
                <label>Base navbar Menu color</label>
            <div class="form-group">
                <div class="col-sm-10" style="padding: 0px; padding-right: 2px;">
                    <input type="text" name="menu" class="form-control" value="<?php echo $this->alus_auth->get_theme_menu();?>" id="navbar">
                </div>
                <div class="col-sm-2" style="padding: 0px; padding-left: 2px;">
                <?php if($can_edit == 1)
                  { ?>
                    <button class="btn btn-primary btn-xs" type="button" onclick="update('navbar')">Change !</button>
                    <?php }?>
                </div>
            </div>

            <div class="form-group" > 
                <div class="col-sm-3">Preview (Current)</div>
                <div class="col-sm-9"><input class="form-control" style="background:<?php echo $this->alus_auth->get_theme_menu();?>;" readonly> </div>
            </div>
        </div>
        <br/>
       <div class="form-group">
                <label >Base Modal header color</label>
            <div class="form-group">
                <div class="col-sm-10" style="padding: 0px; padding-right: 2px;">
                    <input type="text" name="headtable" class="form-control" value="<?php echo $this->alus_auth->get_theme_modal('header');?>" id="headmodal">
                </div>
                <div class="col-sm-2" style="padding: 0px; padding-left: 2px;">
                <?php if($can_edit == 1)
                  { ?>
                    <button class="btn btn-primary btn-xs" type="button" onclick="update('headmodal')">Change !</button>
                    <?php }?>
                </div>
            </div>

            <div class="form-group" > 
                <div class="col-sm-3">Preview (Current)</div>
                <div class="col-sm-9"><input class="form-control" style="background:<?php echo $this->alus_auth->get_theme_modal('header');?>;" readonly> </div>
            </div>
        </div>
        <br/>
        <div class="form-group">
                <label >Base text header modal</label>
            <div class="form-group">
                <div class="col-sm-10" style="padding: 0px; padding-right: 2px;">
                    <input type="text" name="textmodal" class="form-control" value="<?php echo $this->alus_auth->get_theme_modal('text');?>" id="textmodal">
                </div>
                <div class="col-sm-2" style="padding: 0px; padding-left: 2px;">
                <?php if($can_edit == 1)
                  { ?>
                    <button class="btn btn-primary btn-xs" type="button" onclick="update('textmodal')">Change !</button>
                    <?php }?>
                </div>
            </div>

            <div class="form-group" > 
                <div class="col-sm-3">Preview (Current)</div>
                <div class="col-sm-9"><input class="form-control" style="background:<?php echo $this->alus_auth->get_theme_modal('text');?>;" readonly> </div>
            </div>
        </div>
        <br/>
        <div class="form-group">
                <label >Base close(x) modal color</label>
            <div class="form-group">
                <div class="col-sm-10" style="padding: 0px; padding-left: 2px;">
                    <input type="text" name="closemodal" class="form-control" value="<?php echo $this->alus_auth->get_theme_modal('close');?>" id="closemodal">
                </div>
                <div class="col-sm-2" style="padding: 0px; padding-left: 2px;">
                <?php if($can_edit == 1)
                  { ?>
                    <button class="btn btn-primary btn-xs" type="button" onclick="update('closemodal')">Change !</button>
                    <?php }?>
                </div>
            </div>

            <div class="form-group" > 
                <div class="col-sm-3">Preview (Current)</div>
                <div class="col-sm-9"><input class="form-control" style="background:<?php echo $this->alus_auth->get_theme_modal('close');?>;" readonly> </div>
            </div>
        </div>
        <br/>
         <div class="form-group">
                <label >Header Color DataTables <b>*tidak bisa linear-gradient</b></label>
            <div class="form-group">
                <div class="col-sm-10" style="padding: 0px; padding-right: 2px;">
                    <input type="text" name="headtable" class="form-control" value="<?php echo $this->alus_auth->get_theme_modal('headtable');?>" id="headtable">
                </div>
                <div class="col-sm-2" style="padding: 0px; padding-left: 2px;">
                <?php if($can_edit == 1)
                  { ?>
                    <button class="btn btn-primary btn-xs" type="button" onclick="update('headtable')">Change !</button>
                    <?php }?>
                </div>
            </div>

            <div class="form-group" > 
                <div class="col-sm-3">Preview (Current)</div>
                <div class="col-sm-9"><input class="form-control" style="background:<?php echo $this->alus_auth->get_theme_modal('headtable');?>;" readonly> </div>
            </div>
        </div>
        <br/>
         <div class="form-group">
                <label >Color Text header DataTables</label>
            <div class="form-group">
                <div class="col-sm-10" style="padding: 0px; padding-right: 2px;">
                    <input type="text" name="colortable" class="form-control" value="<?php echo $this->alus_auth->get_theme_modal('colortable');?>" id="colortable">
                </div>
                <div class="col-sm-2" style="padding: 0px; padding-left: 2px;">
                <?php if($can_edit == 1)
                  { ?>
                    <button class="btn btn-primary btn-xs" type="button" onclick="update('colortable')">Change !</button>
                    <?php }?>
                </div>
            </div>

            <div class="form-group" > 
                <div class="col-sm-3">Preview (Current)</div>
                <div class="col-sm-9"><input class="form-control" style="background:<?php echo $this->alus_auth->get_theme_modal('colortable');?>;" readonly> </div>
            </div>
        </div>
      </form>
<br/>
<br/>
      <button class="btn btn-primary btn-md"  data-backdrop="static" 
      data-keyboard="false"  data-toggle="modal" data-target="#myModal">Show Example Modal</button>

   <!-- modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <!-- modal head -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">MODAL</h4>
      </div>
      <!-- modal body -->
      <div class="modal-body">
      </div>
    </div>
</div>
</div>
<!-- akhir modal -->
