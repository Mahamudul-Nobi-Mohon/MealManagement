<div class="col-md-10 col-md-offset-1">
<div class="box box-info">
<!-- <div class="box-header with-border"> -->

              <h3 class="box-title " style="text-align: center; background: lightgrey; padding: 5px;">Change Password</h3>
            <!-- </div> -->
            <!-- /.box-header -->
            <!-- form start -->
            <div class="col-md-12">
           <div class="col-md-8">
                  
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
            <form class="form-horizontal" method="post" action="<?php echo base_url('UserController/changePassword'); ?>" enctype="multipart/form-data">
              <div class="box-body">
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Old Password: </label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="oldPassword"  placeholder="Old Password" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="dateOfBirth" class="col-sm-2 control-label">New Password :</label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="newPassword" placeholder="New Password" required>
                  </div>
                </div>
                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Confirm Password: </label>

                  <div class="col-sm-10">
                    <input type="password" class="form-control" name="confirmPassword" placeholder="Confirm Password" required>
                  </div>
                </div>
               
              </div>
              <!-- /.box-body -->
              <div class="box-footer">
                <button type="submit" name="submit" class="btn btn-lg btn-primary col-md-3 col-md-offset-1">Change</button>
              </div>
              <!-- /.box-footer -->
            </form>
          </div>
          </div>