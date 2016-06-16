        <div class="form-group">
                <label >Nama Menu</label>
            <input type="text" name="name" class="form-control" placeholder="Nama" value="<?php echo $nama;?>">
            <input type="hidden" name="id" value="<?php echo $id;?>">
        </div>
        <div class="form-group">
                <label >URI Menu (controller / folder)</label>
            <input type="text" name="uri" class="form-control" placeholder="URI" value="<?php echo $uri;?>">
        </div>
        <div class="form-group">
                <label >Order Number</label>
            <input type="number" name="order" class="form-control" placeholder="Order Number" value="<?php echo $order;?>">
        </div>
        <div class="form-group">
                <label >Target Menu</label>
             <select name="target" class="form-control">
                <option value="" <?php if($target == ""){echo "selected"; };?>>This Page</option>
                <option value="_blank" <?php if($target == "_blank"){echo "selected"; };?>>New Tab Page</option>
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
                  <input type="radio" class="radio" name="parent" value="0" <?php if($parent == 0){ echo "checked"; }; ?>>
                  </td>
                 <td>Ini Parent Menu</td>
                </tr>
            <?php 
                foreach ($tree as $tre) {
                 ?>
                 <tr>
                 <td class="text-right">
                  <input type="radio" class="radio" name="parent" value="<?php echo $tre->menu_id;?>" <?php if($parent == $tre->menu_id){ echo "checked"; }; ?> <?php if($id == $tre->menu_id){echo "disabled";}; if($id == $tre->menu_parent){echo "disabled";};?>>
                  </td>
                 <td><?php echo $tre->menu_nama;?></td>
                </tr>
                 <?php }; ?>
                 </tbody>
                 
                </table>
            </div>
            </div>
        </div>
        <div class="form-group">
                <label class="col-sm-12">Icon Menu</label>
              <div class="col-sm-2"><input type="radio" name="icon" value="" <?php if($icon == ""){echo "checked";};?>><strong>None</strong></div>
             <div class="col-sm-2"><input type="radio" name="icon" value="fa fa-home fa-fw" <?php if($icon == "fa fa-home fa-fw"){echo "checked";};?> ><i class="fa fa-home fa-2x" aria-hidden="true"></i></div>
             <div class="col-sm-2"><input type="radio" name="icon" value="fa fa-book fa-fw" <?php if($icon == "fa fa-book fa-fw"){echo "checked";};?> ><i class="fa fa-book fa-2x" aria-hidden="true"></i></div>
             <div class="col-sm-2"><input type="radio" name="icon" value="fa fa-users fa-fw" <?php if($icon == "fa fa-users fa-fw"){echo "checked";};?> ><i class="fa fa-users fa-2x" aria-hidden="true"></i></div>
             <div class="col-sm-2"><input type="radio" name="icon" value="fa fa-fax fa-fw" <?php if($icon == "fa fa-fax fa-fw"){echo "checked";};?> ><i class="fa fa-fax fa-2x" aria-hidden="true"></i></div>
             <div class="col-sm-2"><input type="radio" name="icon" value="fa fa-folder fa-fw" <?php if($icon == "fa fa-folder fa-fw" ){echo "checked";};?> ><i class="fa fa-folder fa-2x" aria-hidden="true"></i></div>
             <div class="col-sm-2"><input type="radio" name="icon" value="fa fa-folder-open fa-fw" <?php if($icon == "fa fa-folder-open fa-fw"){echo "checked";};?>><i class="fa fa-folder-open  fa-2x" aria-hidden="true"></i></div>
             <div class="col-sm-2"><input type="radio" name="icon" value="fa fa-folder-o fa-fw" <?php if($icon == "fa fa-folder-o fa-fw"){echo "checked";};?>><i class="fa fa-folder-o fa-2x" aria-hidden="true"></i></div>
             <div class="col-sm-2"><input type="radio" name="icon" value="fa fa-user fa-fw" <?php if($icon == "fa fa-user fa-fw"){echo "checked";};?>><i class="fa fa-user fa-2x" aria-hidden="true"></i></div>
             <div class="col-sm-2"><input type="radio" name="icon" value="fa fa-cloud fa-fw" <?php if($icon == "fa fa-cloud fa-fw"){echo "checked";};?>><i class="fa fa-cloud fa-2x" aria-hidden="true"></i></div>
             <div class="col-sm-2"><input type="radio" name="icon" value="fa fa-calendar fa-fw" <?php if($icon == "fa fa-calendar fa-fw"){echo "checked";};?>><i class="fa fa-calendar fa-2x" aria-hidden="true"></i></div>
             <div class="col-sm-2"><input type="radio" name="icon" value="fa fa-building fa-fw" <?php if($icon == "fa fa-bars fa-fw"){echo "checked";};?>><i class="fa fa-building fa-2x" aria-hidden="true"></i></div>
             <div class="col-sm-2"><input type="radio" name="icon" value="fa fa-bars fa-fw" <?php if($icon == "fa fa-bars fa-fw"){echo "checked";};?>><i class="fa fa-bars fa-2x" aria-hidden="true"></i></div>
             <div class="col-sm-2"><input type="radio" name="icon" value="fa fa-archive fa-fw" <?php if($icon == "fa fa-archive fa-fw"){echo "checked";};?>><i class="fa fa-archive fa-2x" aria-hidden="true"></i></div>
             <div class="col-sm-2"><input type="radio" name="icon" value="fa fa-briefcase fa-fw" <?php if($icon == "fa fa-briefcase fa-fw"){echo "checked";};?>><i class="fa fa-briefcase fa-2x" aria-hidden="true"></i></div>
        </div>