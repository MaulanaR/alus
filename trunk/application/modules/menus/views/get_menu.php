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