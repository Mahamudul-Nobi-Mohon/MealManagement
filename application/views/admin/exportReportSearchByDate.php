<!-- <div class="col-md-10 col-md-offset-1"> -->
<div class="box box-info">
<!-- <div class="box-header with-border"> -->
        <h3 class="box-title " style="text-align: center; background: lightgrey; padding: 5px;">Members Report</h3>
           
           <table class="table table-striped b-t b-light" style="border:1px solid black; width: 100%">
                  <thead>
                    <tr style="text-align: left;">
                      
                      <th style="text-align: left;">Name</th>
                      <th style="text-align: left;">Meal</th>
                      <th  style="text-align: left;">Bazar Tk</th>
                      <th style="text-align: left;">Date</th>
                    </tr>
                  </thead>
                  <tbody id="showDataInTable">
                  <?php //$data = $this->MealModel->showAllMemberReportBySearchDate($startDate,$endDate); ?>
                  <?php foreach ($data as $aData) { ?>
                  <tr style="text-align:left">
                     <td style="text-align: left;"><?php echo $aData->name ; ?></td>
                     <td style="text-align: left;"><?php echo $aData->meal ; ?></td>
                     <td style="text-align: left;"><?php echo $aData->bazartk ; ?></td>
                     <td style="text-align: left;"><?php echo $aData->date ; ?></td>
                     </tr>
                  <?php } ?>

                                     
                  </tbody>
                 
                </table>

                 <h3 class="box-title " style="text-align: center; background: lightgrey; padding: 5px;">Final Calculation For This Month</h3>
           
           <table class="table table-striped b-t b-light" style="border:1px solid black; width: 100%">
                  <thead>
                    <tr style="text-align: left;">
                      
                      <th style="text-align: left;">Name</th>
                       <th style="text-align: left;">Bazar Tk</th>
                       <th style="text-align: left;">Eaten Tk</th>
                      <th style="text-align: left;">Will Give</th>
                      <th style="text-align: left;">Will Get</th>
                    </tr>
                  </thead>
                  <tbody id="showDataInTable2">
                  <?php //$data = $this->MealModel->showAllMemberReportBySearchDate($startDate,$endDate); ?>
                  <?php foreach ($giveGetReport as $giveGet) { ?>
                  <tr style="text-align:left">
                     <td><?php echo $giveGet->name ; ?></td>
                     <td class="count-me"><?php echo $giveGet->bazartk ; ?></td>
                     <td class="count-me2"><?php echo $giveGet->eaten_tk ; ?></td>
                     <td class="count-me3"><?php echo $giveGet->will_give ; ?></td>
                     <td class="count-me4"><?php echo $giveGet->will_get ; ?></td>
                     </tr>
                  <?php } ?>

                                     
                  </tbody>
                 
                </table>
          </div>
          <!-- </div> -->


     <!-- <script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
   
     <script type="text/javascript">
          $(document).ready(function() {
    
          alert("hi");

                         // table column sum

                var tds = document.getElementById('showDataInTable2').getElementsByTagName('td');
                var sum = 0;
                var sum2 = 0;
                var sum3 = 0;
                var sum4 = 0;


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
                for(var k = 0; k < tds.length; k ++) {
                    if(tds[k].className == 'count-me3') {
                        sum3 += isNaN(tds[k].innerHTML) ? 0 : parseInt(tds[k].innerHTML);
                    }
                }
                for(var l = 0; l < tds.length; l ++) {
                    if(tds[l].className == 'count-me4') {
                        sum4 += isNaN(tds[l].innerHTML) ? 0 : parseInt(tds[l].innerHTML);
                    }
                }
                document.getElementById('showDataInTable2').innerHTML += '<tr class="hideRow"><td><b>total</b></td><td><b>' + sum + ' </b></td><td><b>' + sum2 + ' TK</b></td><b>' + sum3 + ' TK</b><td></td><td><b>' + sum4 + ' TK</b></td></tr>';
            
              // table column sum end
               
           });  
          
      
        </script>
           -->
