<?php include("header.php");

 

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php include("title.php");?>

     <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Ubuntu:300,400,700' rel='stylesheet' type='text/css'>

    <link href="css/epoch.min.css" rel="stylesheet" type="text/css">
    <link href="css/style.css" rel="stylesheet" type="text/css">

    <!-- SugarRush CSS -->
    <!-- <link href="css/sugarrush.css" rel="stylesheet"> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script type="text/javascript">

    function getXMLHTTP() { //fuction to return the xml http object

    var xmlhttp=false;  

    try{

      xmlhttp=new XMLHttpRequest();

    }

    catch(e)  {   

      try{      

        xmlhttp= new ActiveXObject("Microsoft.XMLHTTP");

      }

      catch(e){

        try{

        xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");

        }

        catch(e1){

          xmlhttp=false;

        }

      }

    }

      

    return xmlhttp;

    }


      function getState(countryId) {    

    

    var strURL="findStateing.php?platform="+countryId;

    var req = getXMLHTTP();

    

    if (req) {

      

      req.onreadystatechange = function() {

        if (req.readyState == 4) {

          // only if "OK"

          if (req.status == 200) {            

            document.getElementById('statediv').innerHTML=req.responseText;

                        

          } else {

            alert("Problem while using XMLHTTP:\n" + req.statusText);

          }

        }       

      }     

      req.open("GET", strURL, true);

      req.send(null);

    }   

  }
    </script>
  </head>

  <body class="">
    <div class="animsition">  
    
   
      <!-- - - - - - - - - - - - - -->
      <!-- start of SIDEBAR        -->
      <!-- - - - - - - - - - - - - -->
   <?php include("sidebar.php");?>
      <!-- - - - - - - - - - - - - -->
      <!-- end of SIDEBAR          -->
      <!-- - - - - - - - - - - - - -->


      <main id="playground">

        
        <!-- - - - - - - - - - - - - -->
        <!-- start of TOP NAVIGATION -->
        <!-- - - - - - - - - - - - - -->
   
      <?php include("top.php");?>
        <!-- - - - - - - - - - - - - -->
        <!-- end of TOP NAVIGATION   -->
        <!-- - - - - - - - - - - - - -->


        <!-- PAGE TITLE -->
        <section id="page-title" class="row">

          <div class="col-md-8">
            <h1>Topup</h1>
            <p><div align="center" style="color:#900;font-weight:bold;"><?php echo @$_GET['msg'];?></div>
      <?php if($_GET['msg']=='Thank You! for your purchase. Your request is in process')
      {
        print_r("<br/>");print_r("<br/>");
        //echo "Note : Due to many layers of processes, the reload may take up to 2 hours to complete. Please allow the time needed to reload. If the reload is not complete within 2 hours, please contact support.";print_r("<br/>");
      }
?></p>
            <!-- <p><div align="center" style="color:#900;font-weight:bold;"><?php echo @$_GET['msg'];?></div></p> -->
          </div>

             
             
          <div class="col-md-4">
 <!--  <a href="external-fund-transfer-list.php"><input type="submit" name="updates1" value="View Transaction" class="btn btn-primary"></a> -->   
           

          </div>
        </section> <!-- / PAGE TITLE -->

        <div class="container-fluid">
          <div class="row">
       
            <div class="col-md-6" style="float:none; margin-left:auto; margin-right:auto;">

              <form  method="post" class="form_container left_label" name="profile" action="product_buy_code1.php" >
              
                              <div style="width:100%; float:left; text-align:center;">
                <?php $rel=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from reward_e_wallet where user_id='$userid'"));?> 
                <div>

   <label class="field_title">Present Reload Point : <font color="#FF0000" size="2">  <?php echo number_format($rel['amount'],2);?> PV</font></label>
<br/><br/> <a href="#" style="text-decoration:none;color:#900;font-size:18px;font-weight:bold;">Please process same reload with a difference of 30 minutes</a><br/>
                  

                  <label class="field_title">Select Product</label>
                  <div class="form_input">
            <select name="product" id="countryId"  onChange="getState(this.value)" style="width:530px; border:1px solid #ebebeb; padding:5px;"required>
 <option disabled="" selected="selected">Select Product</option> 
                      
                      <option disabled="">----------------------------------Telco Malaysia Prepaid------------------------------</option> 
                        

                       <?php 

              $fquery=mysqli_query($GLOBALS["___mysqli_ston"], "select * from contact_categories where type='Prepaid'");

              while($queryf1=mysqli_fetch_array($fquery))

              {

              ?>

                          <option value="<?php echo $queryf1['id'];?>"><?php echo $queryf1['name'];?></option>

                          <?php } ?>
   <!-- <option disabled="">-------------------------------Telco Malaysia Postpaid------------------------------------</option> 
                       <?php 

              $fquery=mysqli_query($GLOBALS["___mysqli_ston"], "select * from contact_categories where type='Postpaid'");

              while($queryf1=mysqli_fetch_array($fquery))

              {

              ?>

                          <option value="<?php echo $queryf1['id'];?>"><?php echo $queryf1['name'];?></option>

                          <?php } ?>-->

    <option disabled="">--------------------Telco International Air Time-----------------</option> 
 <?php 

              $fquery=mysqli_query($GLOBALS["___mysqli_ston"], "select * from contact_categories where type='International Air Time' and id=14 || id=15");

              while($queryf1=mysqli_fetch_array($fquery))

              {

              ?>

                          <option value="<?php echo $queryf1['id'];?>"><?php echo $queryf1['name'];?></option>

                          <?php } ?>
        

                      </select>
                  </div>
                </div>
                               

               <div id="statediv">

                     

                      <select style="display:none" name="amount"><option value="">Select</option></select>

                     </div>       

                     <label class="field_title">Enter Mobile Number <a href="#" style="text-decoration:none;color:#900;font-size:14px;font-weight:bold;">(without country code)</a> <font color="#FF0000" size="2">*</font></label>

                    <div class="form_input"> 

                      

                    

                     <input type="number" name="mobile" value="" required style="width:400px;border:2px solid #ebebeb;">

                    </div>

                     <label class="field_title">Confirm Mobile Number <a href="#" style="text-decoration:none;color:#900;font-size:14px;font-weight:bold;">(without country code)</a> <font color="#FF0000" size="2">*</font></label>

                    <div class="form_input"> 

                      

                    

                     <input type="number" name="cmobile" value="" required style="width:400px;border:2px solid #ebebeb;">

                    </div>
                    
                    
                    <label class="field_title">Enter Your Transaction Password <font color="#FF0000" size="2">*</font></label>

                    <div class="form_input"> 

                      

                    

                     <input type="password" name="password" value="" required style="width:400px;border:1px solid #ebebeb; padding:5px;">

                    </div>
                    
                      
                           
                <div class="form_grid_12">
                  <div class="form_input">
                    <input type="submit" name="submit" value="Buy Now"  class="btn btn-primary">
                    
                  </div>
                </div>
                                
                                </div>

            </form>

           <!-- <form name="bankinfo" method="post" action="external-fund-transfer-confirm.php">
              <section class="panel">

                <header class="panel-heading">
                  <h3 class="panel-title">e-Wallet fund transfer</h3>
                </header>
                <header class="panel-heading">
                 <br/> <h3 class="panel-title">e-Wallet Ballance : MYR <?php $data=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "select * from final_e_wallet where user_id='$userid'"));?><strong><?php  echo number_format($data['amount'],2);?></strong> </h3>
                <br/></header>
                <div class="panel-body">
<input name="wallet" id="wallet" type="hidden" tabindex="1" required class="" style="width:4%;" value="final_e_wallet" checked="checked" />
            
           <div class="form-group">
                      <label for="exampleInputAddress">Enter Recipient User ID</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="user" required value="" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>

           <div class="form-group">
                      <label for="exampleInputAddress">Enter Amount to Transfer</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="text" name="amounts" required value="" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>
                         <div class="form-group">
                      <label for="exampleInputAddress">Enter Transaction Password</label>
                      <div class="input-group">
                        <span class="input-group-addon"></span>
                        <input type="password" name="t_password" required value="" class="form-control" id="exampleInputAddress">
                      </div>
                    </div>
                 <div class="row">
            <div class="col-md-12">
              <div class="panel">
                <div class="panel-body">
                  <input type="submit" name="update" value="Transfer" class="btn btn-primary">             </div>
              </div>
            </div>
          </div>

              </section>

</form> -->

            </div> <!-- / col-md-6 -->

          

          </div> <!-- / row -->

         

        </div> <!-- / container-fluid -->


<?php include("footer.php");?>

    </main> <!-- /playground -->


    <!-- - - - - - - - - - - - - -->
    <!-- start of NOTIFICATIONS  -->
    <!-- - - - - - - - - - - - - -->
 <?php include("rightside-panel.php");?>
    <!-- - - - - - - - - - - - - -->
    <!-- start of NOTIFICATIONS  -->
    <!-- - - - - - - - - - - - - -->

    <div class="scroll-top">
      <i class="ti-angle-up"></i>
    </div>
  </div> <!-- /animsition -->

  <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
  <script src="js/raphael-min.js"></script>
  <script src="js/jquery-1.11.2.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <!-- Include all compiled plugins (below), or include individual files as needed -->
  <script src="js/jquery.animsition.min.js"></script>
  <script src="js/d3.min.js"></script>
  <script src="js/epoch.min.js"></script>

  <script src="js/includes.js"></script>
  <script src="js/sugarrush.js"></script>
  <script>
  jQuery(document).ready(function() {
    // REAL TIME DATA GENERATOR
    /*
     * Real-time data generators for the example graphs in the documentation section.
     */
    (function() {

        /*
         * Class for generating real-time data for the area, line, and bar plots.
         */
        var RealTimeData = function(layers) {
            this.layers = layers;
            this.timestamp = ((new Date()).getTime() / 1000)|0;
        };

        RealTimeData.prototype.rand = function() {
            return parseInt(Math.random() * 100) + 50;
        };

        RealTimeData.prototype.history = function(entries) {
            if (typeof(entries) != 'number' || !entries) {
                entries = 60;
            }

            var history = [];
            for (var k = 0; k < this.layers; k++) {
                history.push({ values: [] });
            }

            for (var i = 0; i < entries; i++) {
                for (var j = 0; j < this.layers; j++) {
                    history[j].values.push({time: this.timestamp, y: this.rand()});
                }
                this.timestamp++;
            }

            return history;
        };

        RealTimeData.prototype.next = function() {
            var entry = [];
            for (var i = 0; i < this.layers; i++) {
                entry.push({ time: this.timestamp, y: this.rand() });
            }
            this.timestamp++;
            return entry;
        }

        window.RealTimeData = RealTimeData;


        /*
         * Gauge Data Generator.
         */
        var GaugeData = function() {};

        GaugeData.prototype.next = function() {
            return Math.random();
        };

        window.GaugeData = GaugeData;



        /*
         * Heatmap Data Generator.
         */

        var HeatmapData = function(layers) {
            this.layers = layers;
            this.timestamp = ((new Date()).getTime() / 1000)|0;
        };
        
        window.normal = function() {
            var U = Math.random(),
                V = Math.random();
            return Math.sqrt(-2*Math.log(U)) * Math.cos(2*Math.PI*V);
        };

        HeatmapData.prototype.rand = function() {
            var histogram = {};

            for (var i = 0; i < 1000; i ++) {
                var r = parseInt(normal() * 12.5 + 50);
                if (!histogram[r]) {
                    histogram[r] = 1;
                }
                else {
                    histogram[r]++;
                }
            }

            return histogram;
        };

        HeatmapData.prototype.history = function(entries) {
            if (typeof(entries) != 'number' || !entries) {
                entries = 60;
            }

            var history = [];
            for (var k = 0; k < this.layers; k++) {
                history.push({ values: [] });
            }

            for (var i = 0; i < entries; i++) {
                for (var j = 0; j < this.layers; j++) {
                    history[j].values.push({time: this.timestamp, histogram: this.rand()});
                }
                this.timestamp++;
            }

            return history;
        };

        HeatmapData.prototype.next = function() {
            var entry = [];
            for (var i = 0; i < this.layers; i++) {
                entry.push({ time: this.timestamp, histogram: this.rand() });
            }
            this.timestamp++;
            return entry;
        }

        window.HeatmapData = HeatmapData;


    })();

    // Real time line epoch

    var data3 = new RealTimeData(3);

    var chart = $('#real-time-bar').epoch({
        type: 'time.bar',
        data: data3.history(),
        axes: [],
        margins: { top: 0, right: 0, bottom: 0, left: 0 }
    });

    setInterval(function() { chart.push(data3.next()); }, 1000);
    chart.push(data3.next());


  });
  </script>
  </body>
</html>