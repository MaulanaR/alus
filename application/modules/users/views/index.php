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
                  title:"Users",
                  exportOptions: {
                      columns: [0,1,2,3,4]
                      }

              },
                {   extend: 'pdf',
                  text: 'Export Pdf(F)',
                  key: { key: 'f', altkey: true },
                  title:"Users",
                  exportOptions: {
                      columns: [0,1,2,3,4]
                      }
              },
                { extend: 'colvis', text: 'Show/Hide columns(H)',key: { key: 'h', altkey: true }}
              ]
              
                });
} );

function save() {
  var form=$("#New");
  var count = $(".groups").filter(":checked").length ;
  if($("#pw").val().length < 8)
  {
    alert("Password Minimal terdiri dari 8 karakter")
  }
  if($("#repw").val() != $("#pw").val())
  {
    alert("Re-Type Password tidak sesuai !");
  }

  if(count == 0)
  {
    alert("Minimal 1 group harus diceklis !!");
  }else{
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
}
function kill(id)
  {
    var r =  confirm("Anda yakin ingin menghapus user ? ");
    if (r == true) {
        $.ajax({
        url: base_url+"Users/delete_user/"+id,
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

  function get_data_user(id)
  {
    $.ajax({
        url: base_url+"Users/get_data_user/"+id,
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
    <h2 class="text-center">Manajemen Users</h2>
	<?php if($can_add == 1){?><button class="btn btn-primary btn-md"  data-backdrop="static" 
   data-keyboard="false"  data-toggle="modal" data-target="#myModal">+ Tambah Users</button><?php };?>

	<div class="table-responsive">
		<table class="table table-striped table-bordered table-hover" id="tablesu">
			<thead>
				<tr>
					<th class="text-center" width="2%">No</td>
					<th class="text">First Name</td>
					<th class="text">Last Name</td>
          <th class="text">Email</td>
          <th class="text">Groups</td>
					<th class="text-center">Tools</td>
				</tr>
			</thead>
			<tbody>
				<?php 
				$no = 0;	
				foreach ($users as $user){
					$no++;
				?>
				<tr>
					<td class="text-center"><?php echo $no; ?></td>
					<td><?php echo htmlspecialchars($user->first_name,ENT_QUOTES,'UTF-8');?></td>
					<td><?php echo htmlspecialchars($user->last_name,ENT_QUOTES,'UTF-8');?></td>
          <td><?php echo htmlspecialchars($user->email,ENT_QUOTES,'UTF-8');?></td>
          <td>
              <?php foreach ($user->groups as $group):?>
              <?php echo htmlspecialchars($group->name,ENT_QUOTES,'UTF-8');?><br />
              <?php endforeach?>
          </td>
				<td class="text-center" >
        <?php if($can_edit == 1){ ?>
				<button class="btn btn-success btn-md" onclick='get_data_user(<?php echo $user->id?>)'>EDIT</button>
        <?php }; if($can_delete == 1){?>
				<button class="btn btn-danger btn-md" onclick='kill(<?php echo $user->id?>)'>DELETE</button>
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
        <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
      </div>
      <!-- modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url();?>users/new_user" method="POST" id="New">
        <div class="form-group">
                <label >Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username">
        </div>
        <div class="form-group">
                <label >Job title</label>
            <input type="text" name="job" class="form-control" placeholder="Job title">
        </div>
        <div class="form-group">
                <label >Email</label>
            <input type="email" name="email" class="form-control" placeholder="Email">
        </div>
        <div class="form-group">
                <label >Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" id="pw">
        </div>
        <div class="form-group">
                <label >Re-Type Password</label>
            <input type="password" name="re-password" class="form-control" placeholder="Re-Type Password" id="repw">
        </div>
        <div class="form-group">
                <label >First Name</label>
            <input type="text" name="first_name" class="form-control" placeholder="First Name">
        </div>
        <div class="form-group">
                <label >Last Name</label>
            <input type="text" name="last_name" class="form-control" placeholder="Last Name">
        </div>
        <div class="form-group">
                <label >Phone Number</label>
            <input type="text" name="phone" class="form-control" placeholder="Phone Number">
        </div>
        <div class="form-group">
              <div>
              <label >Groups</label>
                <div class="contain">
                    <table class="table table-striped table-bordered table-hover"> 
                      <thead>
                        <tr>
                          <th></th>
                          <th class="text-left">Name</th>
                          <th class="text-center">Description</th>
                        </tr>
                      </thead>
                    <tbody>
            <?php $asd = $this->db->query("select * from alus_groups ORDER BY name ASC"); 
                foreach ($asd->result() as $key) {
                 ?>
                 <tr>
                 <td class="text-right">
                  <input type="checkbox" class="groups" name="group[]" value="<?php echo $key->id ;?>">
                  </td>
                 <td><?php echo $key->name;?></td>
                <td><?php echo $key->description;?></td>
                </tr>
                 <?php }; ?>
                 </tbody>
                 
                </table>
            </div>
            </div>
        </div>
        <div class="form-group">
                <label >Active</label>
            <select name="active">
                <option value="1">Active</option>
                <option value="0">Deactive</option>
            </select>
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
     <form action="<?php echo base_url();?>Users/edit_data_users" method="POST" id="NewEdit"> 
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