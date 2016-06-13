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

function edit() {
  var form=$("#Editgroup");
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

function get_group(id) {
  $.ajax({
        url: base_url+"group/get_group/"+id,
        cache: false,
        beforeSend: function() 
        { $("#load_ajax").show(); },
        complete: function() 
        { $("#load_ajax").hide(); },
        success: function(msg){
          $("#idg").val(msg[0]['id']);
          $("#nama_group").val(msg[0]['name']);
          $("#desc_group").val(msg[0]['description']);
            $("#myModalEdit").modal('show');
        }
    
    });
  }

 function openform(id) {
  $.ajax({
        url: base_url+"group/hak_akses/"+id,
        beforeSend: function() 
        { $("#load_ajax").show(); },
        complete: function() 
        { $("#load_ajax").hide(); },
        cache: false,
        success: function(msg){
          $("#openhak").html(msg);
          $("#openhak").show("slow"); 
        }
    
    });
  }

function tutuphak()
  {
    $("#openhak").hide("slow");
  }


  function savehak() {
  var form=$("#hak");
  $.ajax({
        type:"POST",
        url:form.attr("action"),
        beforeSend: function() 
        { $("#load_ajax").show(); },
        complete: function() 
        { $("#load_ajax").hide(); },
        data:form.serialize(),
  success: function(msg){
          $("#openhak").hide();
          $(".container").html(msg);
        }
    
    });
  }
  
  function kill(id)
  {
    var r =  confirm("Anda yakin ingin menghapus group ? ");
    if (r == true) {
        $.ajax({
        url: base_url+"Group/delete_group/"+id,
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

  </script>

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
     <div id="openhak" style="display:none; overflow-y: hidden;" >

    </div>
    <h2 class="text-center">Manajemen Groups</h2>
  <?php if($can_add == 1){?><button class="btn btn-primary btn-md" data-toggle="modal" data-target="#myModal">+ Tambah Groups </button> <?php };?>

  <div class="table-responsive">
    <table class="table table-striped table-bordered table-hover" id="tablesu">
      <thead>
        <tr>
          <th class="text-center" width="5%">No</td>
          <th class="text">Nama Group</td>
          <th class="text">Deskripsi</td>
          <th class="text-center" width="5%"></td>
          <th class="text-center" width="5%"></td>
          <th class="text-center" width="5%"></td>
        </tr>
      </thead>
      <tbody>
        <?php 
        $no = 0;  
        foreach ($group as $rows) {
          $no++;
        ?>
        <tr>
          <td class="text-center"><?php echo $no; ?></td>
          <td><?php echo $rows->name; ?></td>
          <td><?php echo $rows->description; ?></td>
        <td class="text-center" >
        <?php if($can_edit == 1){ ?>
        <button class="btn btn-md" onclick='get_group(<?php echo $rows->id;?>)' title="EDIT"><span class="fa fa-lg fa-edit"></span></button>
        <?php };?>
        </td>
        <td class="text-center">
        <?php if($can_edit == 1){ ?>
        <button class="btn btn-primary btn-md" onclick='openform(<?php echo $rows->id;?>)' title="EDIT HAK AKSES"><span class="fa fa-users fa-lg"></span></button>
        <?php };?>
        </td>
        <td class="text-center">
        <?php if($can_delete == 1){ ?>
        <button class="btn btn-danger btn-md" onclick='kill(<?php echo $rows->id;?>)' title="HAPUS GROUP"><span class="fa fa-trash fa-lg"></span></button>
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
        <h4 class="modal-title" id="myModalLabel">Tambah Groups</h4>
      </div>
      <!-- modal body -->
      <div class="modal-body">
        <form action="<?php echo base_url();?>group/new_group" method="POST" id="New">
        <div class="form-group">
            <label for="id">Nama Group</label>
            <input type="text" name="group_nama" class="form-control" placeholder="Nama Group">
        </div>
        <div class="form-group">
                <label for="id">Deskripsi Group</label>
            <input type="text" name="des_group" class="form-control" placeholder="Deskripsikan tentang group ini">
        </div>
      </div>
          <!-- modal foot -->
          <div class="modal-footer">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" onclick="save()" data-dismiss="modal">Save</button> 
          </div>
      </form>
      </div>
    </div>
</div>
</div>
<!-- akhir modal -->

<!-- modal Edit groups-->
<div class="modal fade" id="myModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
        <!-- modal head -->
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Edit Group</h4>
      </div>
      <!-- modal body -->
     <form action="<?php echo base_url();?>group/edit_group/" method="POST" id="Editgroup"> 
      <div class="modal-body" id="Modaledit">
      <div class="form-group">
            <label for="id">Nama Group</label>
            <input type="hidden" name="idg" id="idg">
            <input type="text" id="nama_group" name="group_nama_edit" class="form-control" placeholder="Nama Group">
        </div>
        <div class="form-group">
                <label for="id">Deskripsi Group</label>
            <input type="text" id="desc_group" name="des_group_edit" class="form-control" placeholder="Deskripsikan tentang group ini">
        </div>
      </div>
      
      <!-- modal foot -->
      <div class="modal-footer">
      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <button type="submit" class="btn btn-primary" onclick="edit()" data-dismiss="modal">Save</button> 
      </div>
      </form>
      </div>
    </div>
</div>
</div>
<!-- akhir modal -->


