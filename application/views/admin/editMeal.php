<!-- <div class="col-md-10 col-md-offset-1"> -->
<div class="box box-info">
<!-- <div class="box-header with-border"> -->
        <h3 class="box-title " style="text-align: center; background: lightgrey; padding: 5px;">Edit Meal</h3>
           
           <form class="form-horizontal" id="add_name" method="POST" enctype="multipart/form-data">
           <div class="input_fields_wrap">
           <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Date: </label>

                  <div class="col-sm-10">
                    <input class="col-md-6" name="cal_1" id="cal_1" placeholder="click to select date" type="text">
                </div>
                </div> 
             
              <!-- /.box-body -->
              <div class="box-footer">
              <h1 class="btnSearch btn btn-lg btn-info col-md-3 col-md-offset-1">Search</h1>
                <h1 id="submit"  class="btn btn-lg btn-success col-md-3 col-md-offset-1" >Update</h1>
                
              </div>
              <!-- /.box-footer -->
                 
           </div>
           
            </form>
           
          </div>
          <!-- </div> -->


     <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
   
<!-- <div class="input_fields_wrap">
    <button class="add_field_button">Add More Fields</button>
    <div><input type="text" name="mytext[]"></div>
</div> -->
        <script type="text/javascript">
          $(document).ready(function() {
    var max_fields      = 50; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    });


    //for insert data
       $('#submit').click(function(){  
           $.ajax({  
                url:"<?php echo base_url();?>updateMeal",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#add_name')[0].reset();  
                }  
           });  
           //alert("ho");
      });  
    //end for insert data

    //for show data
       $('.btnSearch').click(function(){  
       var date = $('#cal_1').val(); 

           $.ajax({  
                url:"<?php echo base_url();?>editMealByDate",  
                method:"POST",  
                data:'date='+date,  
                success:function(data)  
                {  
                     var resultObj = JSON.parse(data);
                        $.each(resultObj,function(key,value){           
                          if (value != '') {
                            $('.btnSearch').hide('fast');

                          }
                       // alert(value.name);                                 
                          $(wrapper).append('<div><div class="box-body"><div class="form-group"><label for="inputEmail3" class="col-sm-2 control-label">Name: </label><div class="col-sm-10"><select name="name[]" class="col-md-6" required><option '+value.name+'>'+value.name+'</option><?php $usersName = $this->UserModel->Read(); ?><?php foreach ($usersName as $uName) { ?> <option value="<?php echo $uName->userName; ?>" ><?php echo $uName->userName; ?></option>  <?php } ?></select></div></div><div class="form-group"><label for="inputEmail3" class="col-sm-2 control-label">Today\'s Meal: </label>     <div class="col-sm-10"><input class="col-md-6" type="text" name="meal[]" value="'+value.meal+'"></div></div><div class="form-group"><label for="inputEmail3" class="col-sm-2 control-label">Bazar TK: </label><div class="col-sm-10"><input class="col-md-6" type="text" name="bazartk[]" value="'+value.bazartk+'"><input type="hidden" name="ID[]" value="'+value.ID+'"></div></div></div><a href="#" class="remove_field btn btn-danger">Remove</a></div>');
                          })
                }  
           });  
          
      });  
    //end for show data
});
        </script>
          

         