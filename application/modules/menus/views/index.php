	<script type="text/javascript">
		base_url = '<?php echo base_url();?>';
$(document).ready(function() {
    var table = $('#tablesu').DataTable({
            dom:"Blfrtip",
            
                    "responsive": true,
                    "processing": true,
                    lengthMenu: [[10, 25, 100, -1], [10, 25, 100, "All"]],
                    buttons: [
                {   extend: 'excelFlash',
                  text: 'Eksport Excel(E)',
                  key: { key: 'e', altkey: true },
                  title:"Menus",
                  exportOptions: {
                      columns: [0,1,2,3]
                      }

              },
                {   extend: 'pdf',
                  text: 'Export Pdf(F)',
                  key: { key: 'f', altkey: true },
                  title:"Menus",
                  exportOptions: {
                      columns: [0,1,2,3]
                      }
              },
                { extend: 'colvis', text: 'Show/Hide columns(H)',key: { key: 'h', altkey: true }}
              ]
              
                });
} );

function save() {
  var form=$("#New");
  
    $.ajax({
        type:"POST",
        url:form.attr("action"),
        data:form.serialize(),
        beforeSend: function() 
        { $("#load_ajax").show(); },
        complete: function() 
        { $("#load_ajax").hide(); },
  success: function(msg){
          $(".container").html(msg);
        }
    }); 
}
function kill(id)
  {
    var r =  confirm("Anda yakin ingin menghapus menu ? ");
    if (r == true) {
        $.ajax({
        url: base_url+"menus/delete_menus/"+id,
        beforeSend: function() 
        { $("#load_ajax").show(); },
        complete: function() 
        { $("#load_ajax").hide(); },
        cache: false,
        success: function(msg){
          $(".container").html(msg);
        }
    });
    } else {
      return false;
    }
  }

  function get_data_menu(id)
  {
    $.ajax({
        url: base_url+"menus/get_data_menu/"+id,
        beforeSend: function() 
        { $("#load_ajax").show(); },
        complete: function() 
        { $("#load_ajax").hide(); },
        cache: false,
        success: function(msg){
            $("#myModalEdit").modal('show');
            $("#Modaledit").html(msg);
        }
    
    });
  }

  function edit() {
  var form=$("#NewEdit");
  $.ajax({
        type:"POST",
        url:form.attr("action"),
        data:form.serialize(),
        beforeSend: function() 
        { $("#load_ajax").show(); },
        complete: function() 
        { $("#load_ajax").hide(); },
  success: function(msg){
          $(".container").html(msg);

        }
    
    });
  }

  </script>
  <style type="text/css">
  .contain { border:2px solid #ccc; width:100% ; height: 170px; overflow-y: scroll; padding-left: 0px;}
  </style>
	<?php if($this->session->flashdata('message')!="" ){?>
       <script>
          $("#notif").show("slow").delay(3000).hide(100);
        </script>
        <br/>
        <div class="panel panel-warning" id="notif" style="display: none;">
        <div class="panel-heading">
            <span class="panel-title"> Pemberitahuan ! 
              <button type="button" class="close" data-dismiss="alert" data-target="#notif" aria-hidden="true" style="color:#ffffff;">
                  <span class="pficon pficon-close"></span>
              </button>
            </span>
        </div> 
        <div class="panel-body"><?php echo $this->session->flashdata('message'); ?></div>
        </div>
    <?php } ?> 
    <h2 class="text-center">Manajemen Menu</h2>
	<?php if($can_add == 1){?><button class="btn btn-primary btn-md"  data-backdrop="static" 
   data-keyboard="false"  data-toggle="modal" data-target="#myModal">+ Tambah Menu</button><?php };?>

	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover" id="tablesu">
			<thead>
				<tr>
					<th class="text-center" width="2%">No</td>
					<th class="text">Nama Menu</td>
					<th class="text">URI</td>
          <th class="text">Order</td>
					<th class="text-center">Tools</td>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no = 0;	
				foreach ($list->result() as $menu){
					$no++;
				?>
				<tr>
					<td class="text-center"><?php echo $no; ?></td>
					<td><?php echo $menu->menu_nama ;?></td>
					<td><?php echo $menu->menu_uri;?></td>
          <td><?php echo $menu->order_num;?></td>
				<td class="text-center" >
        <?php if($can_edit == 1){ ?>
				<button class="btn btn-success btn-md" onclick='get_data_menu(<?php echo $menu->menu_id;?>)'>EDIT</button>
        <?php }; if($can_delete == 1){?>
				<button class="btn btn-danger btn-md" onclick='kill(<?php echo $menu->menu_id;?>)'>DELETE</button>
        <?php };?>
				</td>

				</tr>
				<?php
				}
				?>
			</tbody>
		</table>
	</div>

  <!-- modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <!-- modal head -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Tambah Menu</h4>
      </div>
      <!-- modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url();?>menus/new_menus" method="POST" id="New">
        <div class="form-group">
                <label >Nama Menu</label>
            <input type="text" name="name" class="form-control" placeholder="Nama">
        </div>
        <div class="form-group">
                <label >URI Menu (controller / folder)</label>
            <input type="text" name="uri" class="form-control" placeholder="URI">
        </div>
        <div class="form-group">
                <label >Order Number</label>
            <input type="number" name="order" class="form-control" placeholder="Order Number">
        </div>
        <div class="form-group">
                <label >Target Menu</label>
             <select name="target" class="form-control">
                <option value="">This Page</option>
                <option value="_blank">New Tab Page</option>
            </select>
        </div>
        <div class="form-group">
              <div>
              <label >Menu Parent</label>
                <div class="contain">
                    <table class="table table-striped table-bordered table-hover"> 
                      <thead>
                        <tr>
                          <th width="2%"></th>
                          <th class="text-left">Menu</th>
                        </tr>
                      </thead>
                    <tbody>
                <tr>
                 <td class="text-right">
                  <input type="radio" class="radio" name="parent" value="0">
                  </td>
                 <td>Ini Parent Menu</td>
                </tr>
            <?php 
                foreach ($tree as $tre) {
                 ?>
                 <tr>
                 <td class="text-right">
                  <input type="radio" class="radio" name="parent" value="<?php echo $tre->menu_id ;?>">
                  </td>
                 <td><?php echo $tre->menu_nama;?></td>
                </tr>
                 <?php }; ?>
                 </tbody>
                 
                </table>
            </div>
            </div>
        </div>
          </div>
          <!-- modal foot -->
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" data-dismiss="modal" onclick="save()">Save</button>
          </div>
      </form>
      </div>
    </div>
</div>
</div>
<!-- akhir modal -->

  <!-- modal Edit menu-->
<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <!-- modal head -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit User</h4>
      </div>
      <!-- modal body -->
     <form action="<?php echo base_url();?>menus/edit_data_menus" method="POST" id="NewEdit"> 
      <div class="modal-body" id="Modaledit">
    
      </div>
      
      <!-- modal foot -->
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <button type="submit" class="btn btn-primary" onclick="edit()" data-dismiss="modal">Update</button>
      </div>
      </form>
      </div>
    </div>
</div>
</div>
<!-- akhir modal -->