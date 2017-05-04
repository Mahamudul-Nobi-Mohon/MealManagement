<section class="content">
    <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Current Month</h3>
        </div>
            <!-- /.box-header -->
            
            <!-- ./box-body -->
            
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>

      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i class="ion ion-ios-people-outline "></i></span>
           <?php 
               $totalBazars = 0; 
               $totalMeals= 0;
               $mealRate = 0;

               ?>
            <div class="info-box-content">
              <span class="info-box-text">Total Members</span>
              <?php $totalMembers = $this->UserModel->countAllMember(); ?>
                 <?php foreach ($totalMembers as $uName) { ?>      
              <span class="info-box-number"><?php echo $uName->allMember; ?><small></small></span>
              <?php }  ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-google-plus"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Bazar</span>
              <?php $totalBazar = $this->MealModel->totalBazar(); ?>
                 <?php foreach ($totalBazar as $totalBazartk) { ?>      
              <span class="info-box-number"><?php echo $totalBazartk->bazartk; ?><small></small></span>
              <?php } $totalBazars = $totalBazartk->bazartk;?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i class="ion ion-ios-cart-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Total Meal</span>
              <?php $totalMeal = $this->MealModel->totalMeal(); ?>
                 <?php foreach ($totalMeal as $tMeal) { ?>      
              <span class="info-box-number"><?php echo $tMeal->meal; ?><small></small></span>
              <?php }  $totalMeals = $tMeal->meal; ?>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-yellow"><i class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Meal Rate</span>
              <span class="info-box-number">
              <?php  
                  if ($totalBazars != 0 && $totalMeals != 0) {
                    echo $mealRate = round(($totalBazars / $totalMeals),3); 
                
                  }
                 ?> 
              </span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
     <div class="row">
        <div class="col-md-12">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
               <div id="container" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>

              
            </div>
             </div>
             </div>
        <div class="col-md-6">
          <div id="container2" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>
        </div>
        </div>
      </div>
    
      
    </section>
<script src="<?php echo base_url(); ?>assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
   
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>



    <script type="text/javascript">
      
    </script>

    <script type="text/javascript">
      $(document).ready(function(){
         //$('#submit').click(function(){
           $.ajax({  
                url:"<?php echo base_url();?>currentMonthPersonMeal",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {  
                       var resultObj = JSON.parse(data);
                      
                   
                        //chart
                       Highcharts.chart('container', {
                      chart: {
                          plotBackgroundColor: null,
                          plotBorderWidth: null,
                          plotShadow: false,
                          type: 'pie'
                      },
                      title: {
                          text: 'Personwise Meal Report For This Month'
                      },
                      tooltip: {
                          pointFormat: '{series.name}: <b>{point.percentage:.1f}% Food In This Month</b>'
                      },
                      plotOptions: {
                          pie: {
                              allowPointSelect: true,
                              cursor: 'pointer',
                              dataLabels: {
                                  enabled: true,
                                  format: '<b>{point.name}</b>: {point.y:.1f}',
                                  style: {
                                      color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                                  }
                              }
                          }
                      },
                      series: [{
                          name: 'You Have Eaten',
                          colorByPoint: true,
                          data: resultObj
                          // [
                          // {"name":"person 1","y":100},
                          // {"name":"person 2","y":200},
                          // {"name":"person 3","y":300},
                          // {"name":"person 4","y":400},
                          // {"name":"person 5","y":500},
                          // {"name":"person 6","y":600}
                          // ]
                      }]
                  });
                      //end chart 
                }   
           });  

           //for count bazar tk for running month
           $.ajax({  
                url:"<?php echo base_url();?>currentMonthPersonBazar",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {  
                      var resultObj = JSON.parse(data);
                       //console.log(resultObj);
                      
                   
                        //chart
                      Highcharts.chart('container2', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'This Month Members Bazar Taka'
                        },
                        subtitle: {
                            text: 'Source: <a href="http://en.wikipedia.org/wiki/List_of_cities_proper_by_population">Meal Management</a>'
                        },
                        xAxis: {
                            type: 'category',
                            labels: {
                                rotation: -45,
                                style: {
                                    fontSize: '13px',
                                    fontFamily: 'Verdana, sans-serif'
                                }
                            }
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Bazar Taka(In this Month)'
                            }
                        },
                        legend: {
                            enabled: false
                        },
                        tooltip: {
                            pointFormat: 'Your Bazar is: <b>{point.y:.1f} Taka</b>'
                        },
                        series: [{
                            name: 'Population',
                            data: resultObj,
                            dataLabels: {
                                enabled: true,
                                rotation: -90,
                                color: '#FFFFFF',
                                align: 'right',
                                format: '{point.y:.1f}', // one decimal
                                y: 10, // 10 pixels down from the top
                                style: {
                                    fontSize: '13px',
                                    fontFamily: 'Verdana, sans-serif'
                                }
                            }
                        }]
                    });
                      //end chart 
                }   
           });  
           //for count bazar tk for running month end
          
      }); 
     </script>