    </div>
    <div class="container-fluid">
        <h1 style="font-size:20pt" class="text-center">Manajemen Users</h1>
        <br />
        <?php if($can_add == 1){?>
        <button class="btn btn-success" onclick="add_person()"><i class="glyphicon glyphicon-plus"></i> Tambah User</button>
      <?php } ?>
        <button class="btn btn-default" onclick="reload_table()"><i class="glyphicon glyphicon-refresh"></i> Reload</button>
        <br />
        <br />
        <table id="table" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead>
                <tr>
                  <th class="text">First Name</th>
                  <th class="text">Last Name</th>
                  <th class="text">Email</th>
                  <th class="text">Groups</th>
                  <th class="text-center" width="15%">Tools</th>
                </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>

    
    <!-- Datatables , jika tidak digunakan silahkan dihapus -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/components/datatables/media/css/jquery.dataTables.min.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/components/datatables/media/css/dataTables.bootstrap.min.css" >
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/components/datatables/Buttons/css/buttons.dataTables.min.css" >
    <script src="<?php echo base_url();?>assets/components/datatables/media/js/dataTables.bootstrap.min.js"></script>
    <script src="<?php echo base_url();?>assets/components/datatables/Buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo base_url();?>assets/components/datatables/Buttons/js/buttons.flash.min.js"></script>
    <script src="<?php echo base_url();?>assets/components/datatables/jszip/dist/jszip.min.js"></script>
    <script src="<?php echo base_url();?>assets/components/datatables/Buttons/js/buttons.html5.min.js"></script>
    <script src="<?php echo base_url();?>assets/components/datatables/Buttons/js/buttons.colVis.min.js"></script>
    <script src="<?php echo base_url();?>assets/components/datatables/pdfmake/build/pdfmake.min.js"></script>
    <script src="<?php echo base_url();?>assets/components/datatables/pdfmake/build/vfs_fonts.js"></script>
    <!-- End Data tables -->

<script type="text/javascript">
 
var save_method; //for save method string
var table;
 
$(document).ready(function() {
 
    //datatables
    table = $('#table').DataTable({ 
    dom:"Blfrtip",
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
 
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('users/ajax_list')?>",
            "type": "POST"
        },
 
        //Set column definition initialisation properties.
        "columnDefs": [
        { 
            "targets": [ -1 ], //last column
            "orderable": false, //set not orderable
        },
        ],
        "lengthMenu" : [[10, 25, 100, 1000, -1], [10, 25, 100,1000, "All"]],
        "buttons" : [
                {   extend: 'excelFlash',
                  text: 'Eksport Excel(E)',
                  key: { key: 'e', altkey: true },
                  title:"Data Users",
                  exportOptions: {
                       columns: [0,1,2]
                      }

              },
                {   extend: 'pdf',
                  text: 'Export Pdf(F)',
                  key: { key: 'f', altkey: true },
                  title:"Data Users",
                  exportOptions: {
                       columns: [0,1,2]
                      }
              },
                { extend: 'colvis', text: 'Show/Hide columns(H)',key: { key: 'h', altkey: true }}
              ],
 
    });

});
 
function add_person()
{
    save_method = 'add';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    $('#modal_form').modal('show'); // show bootstrap modal
    $('.modal-title').text('Add User'); // Set Title to Bootstrap modal title
}
 
function edit_person(id)
{
    save_method = 'update';
    $('#form')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
 
    //Ajax Load data from ajax
    $.ajax({
        url : "<?php echo site_url('users/ajax_edit/')?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function(data)
        {
            $('[name="id"]').val(data.data.id);
            $('[name="elama"]').val(data.email);
            $('[name="username"]').val(data.data.username);
            $('[name="job"]').val(data.data.job_title);
            $('[name="email"]').val(data.email);
            $('[name="password"]').val();
            $('[name="re_password"]').val();
            $('[name="first_name"]').val(data.data.first_name);
            $('[name="last_name"]').val(data.data.last_name);
            $('[name="phone"]').val(data.data.phone);
            $('#form').find(':checkbox[name^="group"]').each(function () {
                    $(this).prop("checked", ($.inArray($(this).val(), data.grup) != -1));
                });
            $('#modal_form').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit User'); // Set title to Bootstrap modal title
 
        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}
 
function reload_table()
{
    table.ajax.reload(null,false); //reload datatable ajax 
}
 
function save()
{
    $('#btnSave').text('saving...'); //change button text
    $('#btnSave').attr('disabled',true); //set button disable 
    var url;
 
    if(save_method == 'add') {
        url = "<?php echo site_url('users/ajax_add')?>";
    } else {
        url = "<?php echo site_url('users/ajax_update')?>";
    }
 
    // ajax adding data to database
    $.ajax({
        url : url,
        type: "POST",
        data: $('#form').serialize(),
        dataType: "JSON",
        success: function(data)
        {
 
            if(data.status) //if success close modal and reload ajax table
            {
                popup();
                $('#modal_form').modal('hide');
                reload_table();
            }else{
              popup(data.msg);
                reload_table();
            }
 
            $('#btnSave').text('save'); //change button text
            $('#btnSave').attr('disabled',false); //set button enable 
        }
    });
}
 
function delete_person(id)
{
    if(confirm('Are you sure delete this data?'))
    {
        // ajax delete data to database
        $.ajax({
            url : "<?php echo site_url('users/ajax_delete')?>/"+id,
            type: "POST",
            dataType: "JSON",
            success: function(data)
            {
               if(data.status) //if success close modal and reload ajax table
              {
                  $('#modal_form').modal('hide');
                  popup();
                  reload_table();
              }else{
                popup(data.msg);
                  reload_table();
              }
            }
        });
 
    }
}
function popup(ms = null) {
  if(ms == null)
  {
    $().toasty({
        message: "Berhasil",
        autoHide: 3000
    }); 
  }else{
    $().toasty({
        message: ms,
        autoHide: 3000
    }); 
  } 
  
}
</script>
 
<!-- Bootstrap modal -->
<div class="modal fade" id="modal_form" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h3 class="modal-title">Tambah User</h3>
            </div>
            <div class="modal-body form">
                <form action="#" id="form" class="form-horizontal" name="formnih">
                    <input type="hidden" value="" name="id"/> 
                    <input type="hidden" value="" name="elama"/> 
                    <div class="form-body">
                        <div class="form-group">
                            <label class="control-label col-md-3">Username</label>
                            <div class="col-md-9">
                                <input type="text" name="username" class="form-control" placeholder="username">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Job title</label>
                            <div class="col-md-9">
                                <input type="text" name="job" class="form-control" placeholder="Job title">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Email</label>
                            <div class="col-md-9">
                                <input type="email" name="email" class="form-control" placeholder="Email">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Password</label>
                            <div class="col-md-9">
                                <input type="password" name="password" class="form-control" placeholder="Password" id="pw">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Re-Type Password</label>
                            <div class="col-md-9">
                                <input type="password" name="re_password" class="form-control" placeholder="Re-Type Password" id="repw">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">First Name</label>
                            <div class="col-md-9">
                                <input type="text" name="first_name" class="form-control" placeholder="First Name">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Last Name</label>
                            <div class="col-md-9">
                                <input type="text" name="last_name" class="form-control" placeholder="Last Name">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Phone Number</label>
                            <div class="col-md-9">
                                <input type="text" name="phone" class="form-control" placeholder="Phone Number">
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-md-3">Active</label>
                            <div class="col-md-9">
                            <select name="active" class="form-control">
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                            </select>
                                <span class="help-block"></span>
                            </div>
                        </div>
                        <div class="form-group">
                    <label class="control-label col-md-3" >Groups</label>
                    <div style="border:0px solid #ccc; width:98% ; height: 170px; overflow-y: scroll; padding-left: 10px;">
                      <div class="contain">
                          <table class="table table-striped table-bordered table-hover"> 
                            <thead>
                              <tr>
                                <th width="2%"></th>
                                <th class="text-left">Name</th>
                                <th class="text-center">Description</th>
                              </tr>
                            </thead>
                            <tbody>
                               <?php foreach ($list->result() as $key) {
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
                        
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" id="btnSave" onclick="save()" class="btn btn-primary">Save</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancel</button>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<!-- End Bootstrap modal -->