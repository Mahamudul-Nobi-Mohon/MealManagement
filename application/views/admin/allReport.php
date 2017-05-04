<!-- <div class="col-md-10 col-md-offset-1"> -->
<div class="box box-info">
<!-- <div class="box-header with-border"> -->
        <h3 class="box-title " style="text-align: center; background: lightgrey; padding: 5px;">All Members Report</h3>
           
           <form class="form-horizontal" id="add_name" method="POST" action="<?php echo base_url(); ?>MealController/exportReportSearchByDate" enctype="multipart/form-data">
           <div class="input_fields_wrap">

           <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">Start Date: </label>

                  <div class="col-sm-10">
                    <input class="col-md-6" name="cal_1" id="cal_1" placeholder="click to select date" type="text">
                </div>
                </div> 

                <div class="form-group">
                  <label for="inputEmail3" class="col-sm-2 control-label">End Date: </label>

                  <div class="col-sm-10">
                    <input class="col-md-6" name="cal_2" id="cal_2" placeholder="click to select date" type="text">
                </div>
                </div> 
             
              <!-- /.box-body -->
              <div class="box-footer">
              <div style="float: left">
                <h1 class="btnSearch btn btn-lg btn-info col-md-10 col-md-offset-1">Search</h1> &nbsp&nbsp&nbsp&nbsp
              </div>
              <div style="float: left; padding-top: 21px;">
                <input type="submit" class="btn btn-lg btn-danger col-md-10 col-md-offset-1" name="downloadPdfFile" value="Download PDF">
                
              </div>
              <div style="clear: both"></div>
              
               </div>
                 
           </div>
           
            </form>
           
           <table class="table table-striped b-t b-light" style="border:1px solid black">
                  <thead>
                    <tr>
                      
                      <th>Name</th>
                      <th>Meal</th>
                      <th >Bazar Tk</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody id="showDataInTable">


                                     
                  </tbody>
                 
                </table>
          </div>
          <!-- </div> -->


     <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
   
<!-- <div class="input_fields_wrap">
    <button class="add_field_button">Add More Fields</button>
    <div><input type="text" name="mytext[]"></div>
</div> -->
        <script type="text/javascript">
          $(document).ready(function() {
   
    //for show data
       $('.btnSearch').click(function(){  
       var startDate = $('#cal_1').val();
       var endDate = $('#cal_2').val();  
       var name = $('#name').val();
       var dataHandler = $('#showDataInTable');
           dataHandler.html("");
           $.ajax({  
                url:"<?php echo base_url();?>showAllMemberReportBySearchDate",  
                method:"POST",  
                data:'startDate='+startDate+'&endDate='+endDate,  
                success:function(data)  
                {  
                     var resultObj = JSON.parse(data);
                        $.each(resultObj,function(key,value){           
                          
                               var newRaw = $('<tr>');
                            newRaw.html('<td>'+value.name+'</td><td class="count-me">'+value.meal+'</td><td class="count-me2">'+value.bazartk+'</td><td>'+value.date+'</td>');
                            dataHandler.append(newRaw);                      
                          
                          })

                         // table column sum

                var tds = document.getElementById('showDataInTable').getElementsByTagName('td');
                var sum = 0;
                var sum2 = 0;

                for(var i = 0; i < tds.length; i ++) {
                    if(tds[i].className == 'count-me') {
                        sum += isNaN(tds[i].innerHTML) ? 0 : parseInt(tds[i].innerHTML);
                    }
                }
                for(var j = 0; j < tds.length; j ++) {
                    if(tds[j].className == 'count-me2') {
                        sum2 += isNaN(tds[j].innerHTML) ? 0 : parseInt(tds[j].innerHTML);
                    }
                }
                document.getElementById('showDataInTable').innerHTML += '<tr class="hideRow"><td><b>total</b></td><td><b>' + sum + ' </b></td><td><b>' + sum2 + ' TK</b></td><td></td></tr>';
            
              // table column sum end
                }  
           });  
          
      });  
    //end for show data
});
        </script>
          

         