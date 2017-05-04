<!-- <div class="col-md-10 col-md-offset-1"> -->
<div class="box box-info">
<!-- <div class="box-header with-border"> -->
        <h3 class="box-title " style="text-align: center; background: lightgrey; padding: 5px;">Single Members Report</h3>
           
           <table class="table table-striped b-t b-light" style="border:1px solid black; width: 100%">
                  <thead>
                    <tr style="text-align:left">
                      
                      <th style="text-align: left;">Name</th>
                      <th style="text-align: left;">Meal</th>
                      <th style="text-align: left;" >Bazar Tk</th>
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
          </div>
          <!-- </div> -->


    