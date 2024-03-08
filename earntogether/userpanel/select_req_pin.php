<?php 
 include("header.php");


 if(isset($_POST["pin_id"]))  
 {  

      $output = '';  
      $query = mysqli_query($GLOBALS["___mysqli_ston"],"SELECT pin_no,status FROM pins WHERE pin_no = '".$_POST["pin_id"]."'");
      $row = mysqli_fetch_array($query);

      if($row['status']==0){
          $dataa = 'UNUSED ALGORITHMIC CODE';
      }else{
          $dataa = 'USED ALGORITHMIC CODE';
      }
      if($row['status']==0){
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
     
           $output .= '  
                <tr>  
                     <td width="100%" colspan="2" style="text-align: center;font-family: monospace; color: black;">'.$dataa.'</td>  
  
                </tr> 
                <tr>  
                     <td width="50%"><input type="text" value="'.$row["pin_no"].'" id="myText" class="form-control" readonly></td>  
                     <td width="50%"><button id="btnCopy" class="btn-success btn" style="border-radius: 0px; color: black;">Copy Code</button></td>  
                </tr>  
                
                ';  
      $output .= "</table></div>";  
      echo $output;  
      }else{
          $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
     
           $output .= '  
                <tr>  
                     <td width="100%" colspan="2" style="text-align: center;font-family: monospace; color: black;">'.$dataa.'</td>  
  
                </tr> 
                <tr>  
                     <td width="100%" colspan="2"><input type="text" value="'.$row["pin_no"].'" id="myText" class="form-control" readonly></td>  
                </tr>  
                
                ';  
      $output .= "</table></div>";  
      echo $output;
      }
 }  
?>
                    <script>
                     document.getElementById("btnCopy").addEventListener("click", function(){
                       var copyText = document.getElementById("myText");
                       copyText.select();
                       document.execCommand("Copy");
                       alert("Copied Algorithmic Code!");
                     });
                    </script>
