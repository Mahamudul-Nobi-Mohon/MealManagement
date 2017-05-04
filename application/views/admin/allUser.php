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
             <?php }
              if ($this->session->flashdata('saveMsg')) { ?>
                 <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-check"></i> Alert!</h4>
                  <?php echo $this->session->flashdata('saveMsg'); ?>
                </div>
             <?php }
          ?>
      </div>
    </div>
    
    
     
     <div class="row">
        <div class="col-md-8 col-md-offset-2">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Bordered Table</h3>
              
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                   <th>Sl_NO</th>
                   <th>Name</th>
                   <th>Email</th>
                   <!-- <th>Picture</th> -->
                   <th>Role</th>
                   <th>Action</th>
                 </tr>
                </thead>
                <tbody>
                 <?php $sl = 1; ?>
         <?php foreach ($allData as $data) { ?>
           
         
         <tr>
           <td><?php echo $sl++ ; ?></td>
           <td><?php echo $data->fullName ; ?></td>
           <td><?php echo $data->email; ?></td>
           <!-- <td><?php //echo $data->Picture ; ?></td> -->
           <td><?php
           if ($data->role == 1) {
             echo 'Super Admin';
           }
           if ($data->role == 2) {
             echo 'Admin';
           }
           if ($data->role == 3) {
             echo 'Editor';
           }         
           ?></td>
           <td>
           <a href="<?php echo base_url() ; ?>UserController/editUserPage/<?php echo $data->ID ?>"><img title="Click For Edit" src='<?php echo base_url() ; ?>assets/images/edit.png' style="height:30px; width:30px;"></a>
           <?php if ($data->user_status == '1' || $data->user_status == '2') { ?>        
           <a href="<?php echo base_url() ; ?>UserController/deActiveUser/<?php echo $data->ID ?>"><img title="Click For Deactive Account" src='<?php echo base_url() ; ?>assets/images/activeAccount.jpg' style="height:30px; width:30px;"></a>
           <?php } if ($data->user_status == '0' ) { ?>
           <a href="<?php echo base_url() ; ?>UserController/activeUser/<?php echo $data->ID ?>"><img title="Click For active Account" src='<?php echo base_url() ; ?>assets/images/deActiveAccount.jpg' style="height:30px; width:30px;"></a>
           <?php } ?>                                         
          </td>
         </tr>
        <?php } ?>
                
                </tbody>
                <!-- <tfoot>
                <tr>
                  <th>Rendering engine</th>
                  <th>Browser</th>
                  <th>Platform(s)</th>
                  <th>Engine version</th>
                  <th>CSS grade</th>
                </tr>
                </tfoot> -->
              </table>
              
            </div>
           
          </div>
         
        </div>
        <!-- /.col -->
       
        
      </div>