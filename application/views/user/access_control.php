
<?php echo form_open('user/access_control/'.$user['user_id']); ?>
<div class="card-body">
    <h3 class="box-title text-center">User Access Control</h3>
    <div class="row clearfix">
        <div class="col-md-3">
            <label>First Name</label>
            <div class="form-group">
                <input type="text" readonly="" name="fname" value="<?php echo $user['fname']; ?>" class="form-control" id="fname" placeholder="First Name" />
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-3">
            <label>Last Name</label>
            <div class="form-group">
                <input type="text" readonly="" name="lname" value="<?php echo $user['lname']; ?>" class="form-control" id="lname" placeholder="Last Name"/>
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label>Designation</label>
            <div class="form-group">
                <input type="text" readonly="" name="designation" value="<?php echo $user['username']; ?>" class="form-control" id="username" placeholder="Username"/>
                <i class="form-group__bar"></i>
            </div>
        </div>

        <div class="col-md-6">
            <label>Username</label>
            <div class="form-group">
                <input type="text" readonly="" name="username" value="<?php echo $user['username']; ?>" class="form-control" id="username" placeholder="Username"/>
                <i class="form-group__bar"></i>
            </div>
        </div>
        <div class="col-md-6">
            <label>Email</label>
            <div class="form-group">
                <input type="text" readonly="" name="email" value="<?php echo $user['email']; ?>" class="form-control" id="username" placeholder="Username"/>
                <i class="form-group__bar"></i>
            </div>
        </div>
        

        <div class='col-md-12'>
            <input type="hidden"  name="user_id" value="<?php echo $user['user_id']; ?>" />
            <input type="hidden"  name="userDesID" value="<?php echo $user['userDesID']; ?>" />
            <input type="hidden"  name="userCatID" value="<?php echo $user['userCatID']; ?>" />
        
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Sr.NO</th>
                        <th>Module Name</th>
                        <th>Access</th>
                        <th>Submodule</th>
                        <th>View</th>
                        <th>Add</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($module as $key => $value) { ?>
                        <tr>
                            <td rowspan="<?php echo count($submodule[$key]) + 1;?>"><?php echo $key + 1; ?></td>
                            <td rowspan="<?php echo count($submodule[$key]) + 1;?>"><?php echo $value['moduleName']; ?></td>
                            <td rowspan="<?php echo count($submodule[$key]) + 1;?>">
                                <div class="">
                                        <div class="toggle-switch">
                                            <input type="checkbox" class="toggle-switch__checkbox <?php echo 'module'.$value['moduleID']; ?>" name='modules[]' onchange="selectAccessSubmodule(<?php echo $value['moduleID']; ?>)" value="<?php echo $value['moduleCode'];?>"  <?php if(isset($user_module_access)){if(in_array($value['moduleCode'], $user_module_access)) echo "checked";}?>>
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                </div>
                            </td> 
                            
                        </tr>
                        <?php foreach ($submodule[$key] as $skey => $svalue) {  $access_level = json_decode($svalue['access_level']);?>
                        <tr>
                        
                            <td><?php echo str_replace("_"," ",$svalue['submoduleName']); $submoduleName = $svalue['submoduleName']; ?></td>
                            <td>
                                <?php if(in_array(1, $access_level)) { ?>
                                <div class="">
                                        <div class="toggle-switch">
                                            <input type="checkbox" class="toggle-switch__checkbox <?php echo 'submodule'.$value['moduleID']; ?>" name='<?php echo $svalue['submoduleName'].'[]'; ?>' <?php if(isset($user_module_access)){if(!in_array($value['moduleCode'], $user_module_access)) echo "disabled";}?> <?php if(isset($user_submodule_access->$submoduleName)){  if(in_array('1', $user_submodule_access->$submoduleName)) echo "checked";} ?> value="1">
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                </div>
                                <?php }else{ echo '-'; }?>
                            </td> 
                            <td>
                                <?php if(in_array(2, $access_level)) { ?>
                                <div class="">
                                        <div class="toggle-switch">
                                            <input type="checkbox" class="toggle-switch__checkbox <?php echo 'submodule'.$value['moduleID']; ?>" name='<?php echo $svalue['submoduleName'].'[]'; ?>' <?php if(isset($user_module_access)){if(!in_array($value['moduleCode'], $user_module_access)) echo "disabled";}?> <?php if(isset($user_submodule_access->$submoduleName)){  if(in_array('2', $user_submodule_access->$submoduleName)) echo "checked";} ?> value="2">
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                </div>
                                <?php }else{ echo '-'; }?>
                            </td>
                            <td>
                                <?php if(in_array(3, $access_level)) { ?>
                                <div class="">
                                        <div class="toggle-switch">
                                            <input type="checkbox" class="toggle-switch__checkbox <?php echo 'submodule'.$value['moduleID']; ?>" name='<?php echo $svalue['submoduleName'].'[]'; ?>' <?php if(isset($user_module_access)){if(!in_array($value['moduleCode'], $user_module_access)) echo "disabled";}?> name='<?php echo $svalue['submoduleName'].'[]'; ?>' <?php if(isset($user_submodule_access->$submoduleName)){  if(in_array('3', $user_submodule_access->$submoduleName)) echo "checked";} ?> value="3">
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                </div>
                                <?php }else{ echo '-'; }?>
                            </td>
                            <td>
                                <?php if(in_array(4, $access_level)) { ?>
                                <div class="">
                                        <div class="toggle-switch">
                                            <input type="checkbox" class="toggle-switch__checkbox <?php echo 'submodule'.$value['moduleID']; ?>" name='<?php echo $svalue['submoduleName'].'[]'; ?>' <?php if(isset($user_module_access)){if(!in_array($value['moduleCode'], $user_module_access)) echo "disabled";}?> <?php if(isset($user_submodule_access->$submoduleName)){  if(in_array('4', $user_submodule_access->$submoduleName)) echo "checked";} ?> value="4">
                                            <i class="toggle-switch__helper"></i>
                                        </div>
                                </div>
                                <?php }else{ echo '-'; }?>
                            </td>
                            
                        </tr>
                        <?php } ?>
                    <?php }?>
                </tbody>
            </table>
        </div>


    <div class="col-md-12 text-center">
        <button type="submit" class="btn btn-success btn-raised">
            <i class="fa fa-check"></i> Save
        </button>
    </div>
</div>
</div>

<?php echo form_close(); ?>
