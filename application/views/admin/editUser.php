<div class="col-md-10 col-md-offset-1">
<div class="box box-info">
<!-- <div class="box-header with-border"> -->
              <h3 class="box-title " style="text-align: center; background: lightgrey; padding: 5px;">Edit User</h3>
            <!-- </div> -->
            <!-- /.box-header -->
            <!-- form start -->
            <div style="color: red; font-weight: bold; "><?php echo $this->session->flashdata('saveFaildMsg'); ?>
                </div>
                <div style="color: green; font-weight: bold; "><?php echo $this->session->flashdata('saveMsg'); ?>
            </div>
            <div style="color: red; font-weight: bold"><?php echo $this->session->flashdata('phoneExistsMsg'); ?>
            </div>
            <?php foreach($get_data as $singleUser) { ?>
           


            <form class="form-horizontal" method="post" action="<?php echo base_url('UserController/updateUserDetails/'); echo $singleUser->ID; ?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Full Name: </label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="fullName" id="fullName" value="<?php echo $singleUser->fullName; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Username: </label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="userName" id="userName" value="<?php echo $singleUser->userName; ?>" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="dateOfBirth" class="col-sm-2 control-label">Email :</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="dateOfBirth" name="email" value="<?php echo $singleUser->email; ?>" required>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="dateOfBirth" class="col-sm-2 control-label">Phone :</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone" name="phone" value="<?php echo $singleUser->phone; ?>" required>
                  </div>
                </div>
                
               
                <div class="form-group">
                  <label for="dateOfBirth" class="col-sm-2 control-label">Address :</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" id="address" name="address" required><?php echo $singleUser->address; ?></textarea>
                  </div>
                </div>
                
                 <div class="form-group">
                  <label for="dateOfBirth" class="col-sm-2 control-label">Designation :</label>

                  <div class="col-sm-10">
                  <input type="text" name="designation" value="<?php echo $singleUser->designation; ?>">
                   </div>
                </div>
                <!-- <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Picture: </label>

                  <div class="col-sm-10">
                    <input type="file" class="form-control" id="picture" name="picture" placeholder="Designation" required>
                  </div>
                </div> -->
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Role: </label>

                  <div class="col-sm-10">
                     <select name="role" required>
                        <option value="" disabled="disabled" selected="selected">--select--</option>
                        <option value="2">Admin</option>
                        <option value="3">Editor</option>
                    </select>
                  </div>
                </div>
                
                
                
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-lg btn-primary col-md-3 col-md-offset-1">Save</button>
              </div>
              <!-- /.box-footer -->
            </form>
            <?php } ?>
          </div>
          </div>