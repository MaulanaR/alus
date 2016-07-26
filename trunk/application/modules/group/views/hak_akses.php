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
					<td width="60%" class="bg-head">Nama Menu</td>
					<td width="10%" class="bg-head">Can View</td>
					<td width="10%" class="bg-head">Can Add</td>
					<td width="10%" class="bg-head">Can Edit</td>
					<td width="10%" class="bg-head">Can Delete</td>
					
					
				</tr>
			</thead>
			<tbody>
				<?php 
				$no = 1;
				$ar = 0;
				foreach ($sql->result() as $oo) {
					$menus[] = $oo->id_menu;
					$canad[] = $oo->can_add;
					$canedit[] = $oo->can_edit;
					$candelet[] = $oo->can_delete;
					$canview[] = $oo->can_view;
				}

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
				?>
				<tr>
					<td><input type="hidden" name="bot[]" value="<?php echo $no; ?>"><input type="hidden" name="menu[<?php echo $no; ?>]" value="<?php echo $rows->menu_id; ?>"></td>	
					<td><?php echo $no; ?></td>
					<td><?php echo $rows->menu_nama; ?></td>

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