        <div class="form-group">
                <label >Username</label>
            <input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo $user->username;?>" disabled>
            <input type="hidden" name="id" class="form-control" value="<?php echo $user->id;?>">
        </div>
        <div class="form-group">
                <label >Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email" value="<?php echo $user->email;?>" disabled>
        </div>
        <div class="form-group">
                <label >Password</label>
            <input type="password" name="password" class="form-control" placeholder="Password" value="" id="chpw">
        </div>
        <div class="form-group">
                <label >Re-type Password</label>
            <input type="password" name="password_confirm" class="form-control" placeholder="Re-typePassword" value="" id="rechpw">
        </div>
        <label>Profile</label>
        <hr style="margin-bottom:5px;margin-top:1px;">
        <div class="form-group">
                <label class="control-label col-sm-2" style="padding: 0px;">Full Name</label>
                <div class="col-sm-5" style="padding: 0px; padding-right: 2px;">
                    <input type="text" name="first_name" class="form-control" placeholder="First Name" value="<?php echo $first_name;?>">
                </div>
                <div class="col-sm-5" style="padding: 0px; padding-left: 2px;">
                    <input type="text" name="last_name" class="form-control" placeholder="Last Name" value="<?php echo $last_name;?>">
                </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" style="padding-left: 0px; padding-top: 5px;">Job title</label>
                <div class="col-sm-10" style="padding-left: 0px; padding-top: 5px; padding-right: 5px;">
                    <input type="text" name="job" class="form-control" placeholder="Job title" value="<?php echo $job_title;?>">
                </div>
        </div>
         <div class="form-group">
            <label class="control-label col-sm-2" style="padding-left: 0px; padding-top: 5px;">Company</label>
                <div class="col-sm-10" style="padding-left: 0px; padding-top: 5px; padding-right: 5px;">
                    <input type="text" name="company" class="form-control" placeholder="Company" value="<?php echo $company;?>">
                </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2" style="padding-left: 0px; padding-top: 5px; padding-bottom: 10px;">Phone Number</label>
                <div class="col-sm-10" style="padding-left: 0px; padding-top: 5px; padding-right: 5px;  padding-bottom: 10px;">
                    <input type="text" name="phone" class="form-control" placeholder="Phone Number" value="<?php echo $phone;?>">
                </div>
        </div>
        <div class="form-group">
        <label >Groups</label>
        <div>
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
             <?php foreach ($groups as $group):?>
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
              <tr>
                <td class="text-right">
                    <input type="checkbox" name="groups[]" class="editgroup" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
                </td>
                <td>
                    <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>      
                </td>
                <td>
                    <?php echo htmlspecialchars($group['description'],ENT_QUOTES,'UTF-8');?>      
                </td>
              </tr>
          <?php endforeach?>
          </tbody>
        </table>
        </div>
    </div>
</div>
<div class="form-group">
                <label >Active</label>
            <select name="active">
                <option value="1" <?php if($user->active == 1){echo "selected";};?>>Active</option>
                <option value="0" <?php if($user->active == 0){echo "selected";};?>>Deactive</option>
            </select>
        </div>
        