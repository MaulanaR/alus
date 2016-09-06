	<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>assets/dist/css/bootstrap-datetimepicker.css" >
	<script src="<?php echo base_url();?>assets/dist/js/bootstrap-datetimepicker.js"></script>
	
	
	<h1 class="text-center">Hak Akses</h1>
	<?php function is_not_null($var)
		{ return !is_null($var); } 
		?>
<div class="form-horizontal well">
		<form  action="<?php echo base_url();?>group/save_hak_akses" method="POST" id="hak">
				<input type="hidden" name="id_group" class="form-control" value="<?php echo $id;?>">

        		<div class="form-group">
					<div class="col-sm-12">
						<div style="overflow-y:scroll;height:300px;padding:0px;" class="form-control">
								<div>
									<table class="table table-striped table-bordered">
			<thead>
				<tr>
					<td width="1%" class="bg-head"></td>
					<td width="1%" class="bg-head">No</td>
					<td width="60%" class="bg-head">Nama Menu (URI)</td>
					<td width="10%" class="bg-head">Can View</td>
					<td width="10%" class="bg-head">Can Add</td>
					<td width="10%" class="bg-head">Can Edit</td>
					<td width="10%" class="bg-head">Can Delete</td>
					<td width="10%" class="bg-head text-center">Periode Awal View</td>
					<td width="10%" class="bg-head text-center">Periode Akhir View</td>
					<td width="10%" class="bg-head text-center">Periode Awal Edit/Del</td>
					<td width="10%" class="bg-head text-center">Periode Akhir Edit/Del</td>
					
					
				</tr>
			</thead>
			<tbody>
				<?php 
				$no = 1;
				$ar = 0;

				//get list menu 
   				foreach ($result as $rows) {
   					if(empty($menus[$ar])){$menus[$ar] = 0;}
   					if(empty($canad[$ar]))
   					{
   						$canad[$ar] = 0;
   					}
   					if(empty($canedit[$ar]))
   					{
   						$canedit[$ar] = 0;
   					}
   					if(empty($candelet[$ar]))
   					{
   						$candelet[$ar] = 0;
   					}
   					if(empty($canview[$ar]))
   					{
   						$canview[$ar] = 0;
   					}
   					if(empty($psv[$ar]))
   					{
   						$psv[$ar] = '';
   					}
   					if(empty($pev[$ar]))
   					{
   						$pev[$ar] = '';
   					}
   					if(empty($psed[$ar]))
   					{
   						$psed[$ar] = '';
   					}
   					if(empty($peed[$ar]))
   					{
   						$peed[$ar] = '';
   					}
				?>
				<tr>
					<td><input type="hidden" name="bot[]" value="<?php echo $no; ?>"><input type="hidden" name="menu[<?php echo $no; ?>]" value="<?php echo $rows->menu_id; ?>"></td>	
					<td><?php echo $no; ?></td>
					<td><?php echo $rows->order_num.$this->alus_auth->decrypt($rows->menu_nama)." ( ".$this->alus_auth->decrypt($rows->menu_uri)." )"; ?></td>

					<td class="text-center">
					
					<input type="hidden" name="canview[<?php echo $no; ?>]" value="0" id="canaddhidden">
					<input type="checkbox" name="canview[<?php echo $no; ?>]" value="1" id="canadd" 
					<?php 
					for($x = 0; $x < count($menus); $x++){
					if($menus[$x] == $rows->menu_id)
						{
							if($canview[$x] == 1){
								echo "checked='checked'";
							};
							break;
						};
					};
					?>
					>

					</td>
					<td class="text-center">
					
					<input type="hidden" name="canadd[<?php echo $no; ?>]" value="0" id="canaddhidden">
					<input type="checkbox" name="canadd[<?php echo $no; ?>]" value="1" id="canadd"
					<?php 
					for($x = 0; $x < count($menus); $x++){
					if($menus[$x] == $rows->menu_id)
						{
							if($canad[$x] == 1){
								echo "checked='checked'";
							};
							break;
						};
					};
					?>>

					</td>
					<td class="text-center">
					<input type="hidden" name="canedit[<?php echo $no; ?>]" value="0" id="candithidden">
					<input type="checkbox" name="canedit[<?php echo $no; ?>]" value="1" id="canedit" <?php 
					for($x = 0; $x < count($menus); $x++){
					if($menus[$x] == $rows->menu_id)
						{
							if($canedit[$x] == 1){
								echo "checked='checked'";
							};
							break;
						};
					};
					?>>
					</td>
					<td class="text-center">
					<input type="hidden" name="candelete[<?php echo $no; ?>]" value="0" id="candeletehidden">
					<input type="checkbox" name="candelete[<?php echo $no; ?>]" value="1" id="candelete"<?php 
					for($x = 0; $x < count($menus); $x++){
					if($menus[$x] == $rows->menu_id)
						{
							if($candelet[$x] == 1){
								echo "checked='checked'";
							};
							break;
						};
					};
					?>>

					</td>
					<td class="text-center">
					<div class="input-group">
					<input type="text" class="bootstrap-datepicker" name="psv[<?php echo $no; ?>]" value="<?php echo date('Y-m-d h:i:s',strtotime($psv[$ar]));?>" id="psv">
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
					</td>
					<td class="text-center">
					<div class="input-group">
					<input type="text" class="bootstrap-datepicker" name="pev[<?php echo $no; ?>]" value="<?php echo date('Y-m-d h:i:s', strtotime($pev[$ar]));?>" id="pev">
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
					</td>
					<td class="text-center">
					<div class="input-group">
					<input type="text" class="bootstrap-datepicker" name="psed[<?php echo $no; ?>]" value="<?php echo $psed[$ar];?>" id="psed">
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
					</td>
					<td class="text-center">
					<div class="input-group">
					<input type="text" class="bootstrap-datepicker" name="peed[<?php echo $no; ?>]" value="<?php echo $peed[$ar];?>" id="peed">
					<span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                    </div>
					</td>
				</tr>
				<?php
				$no++;
				$ar++; }
				?>
			</tbody>
		</table>
							</div>
						<div>
					</div>
				</div>
			</div>
		</div>
		
       			<div class="form-group">
				    <div class="col-sm-12" >
				    	<div style="float:right;">
				    <button type="button" class="btn btn-danger" onclick="tutuphak()">Close</button>
				      <button type="button" class="btn btn-warning"  onclick="savehak()">Save !</button>
				      </div>
				    </div>
				</div>
		</form>
</div>

<script>
  // Initialize Boostrap-Datepicker
        $('.bootstrap-datepicker').datetimepicker({
        	autoclose: true,
        	todayBtn: true,
        });
</script>