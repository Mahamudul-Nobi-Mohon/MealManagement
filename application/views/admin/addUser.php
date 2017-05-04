<div class="col-md-10 col-md-offset-1">
<div class="box box-info">
<!-- <div class="box-header with-border"> -->

              <h3 class="box-title " style="text-align: center; background: lightgrey; padding: 5px;">Create New User</h3>
              <div class="row">
                <div class="col-md-8">
                  <?php
                        $saveFaildMsg = $this->session->flashdata('saveFaildMsg');
                         if ($saveFaildMsg) { ?>
                         <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        <?php echo $saveFaildMsg; ?>
                      </div> 
                      <?php  } ?>  
                      <?php
                      if ($this->session->flashdata('emailExistsMsg')) { ?>
                         <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        <?php echo $this->session->flashdata('emailExistsMsg');  ?>
                      </div>  
                      <?php  } ?> 
                      <?php
                      if ($this->session->flashdata('passwordExistsMsg')) { ?>
                         <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        <?php echo $this->session->flashdata('passwordExistsMsg');  ?>
                      </div>  
                      <?php  } ?> 
                       <?php
                      if ($this->session->flashdata('errMsg')) { ?>
                         <div class="alert alert-danger alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        <?php echo $this->session->flashdata('errMsg');  ?>
                      </div>  
                      <?php  } ?>     
                       <?php
                      if ($this->session->flashdata('saveMsg')) { ?>
                         <div class="alert alert-success alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <h4><i class="icon fa fa-ban"></i> Alert!</h4>
                        <?php echo $this->session->flashdata('saveMsg');  ?>
                      </div>  
                      <?php  } ?>  
                    
                </div>
           </div>

            <form class="form-horizontal" method="post" action="<?php echo base_url('UserController/create'); ?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Full Name: </label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="fullName" id="fullName" placeholder="Full Name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Username: </label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="userName" id="userName" placeholder="Name" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="dateOfBirth" class="col-sm-2 control-label">Email :</label>

                  <div class="col-sm-10">
                    <input type="email" class="form-control" id="dateOfBirth" name="email" placeholder="Email" required>
                  </div>
                </div>
                 <div class="form-group">
                  <label for="dateOfBirth" class="col-sm-2 control-label">Phone :</label>

                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="phone" name="phone" placeholder="Phone" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Password: </label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="qualification" name="password" placeholder="Password" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Confirm Password: </label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirm Password" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="dateOfBirth" class="col-sm-2 control-label">Address :</label>

                  <div class="col-sm-10">
                    <textarea class="form-control" id="address" name="address" required></textarea>
                  </div>
                </div>
                
                 <div class="form-group">
                  <label for="dateOfBirth" class="col-sm-2 control-label">Designation :</label>

                  <div class="col-sm-10">
                  <input type="text" name="designation" placeholder="Designation">
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
          </div>
          </div>