<?php include("lib/config.php");

function find_personal_income_cummulative11($user,$start,$end){
    $bv=0;
  
    $amts1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pp) as bv FROM `amount_detail` where user_id='$user' and payment_date>='$start' and  payment_date<='$end'"));
    $bv=$amts1['bv'];
    if($bv==''){
      $bv=0;
    }else{
      $bv=$bv;  
    }
    return $bv;
}


function find_team_income_cummulative($user, $start, $end)
{
  
$total_team_point=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"],"SELECT sum(am.pp) as teampurchase FROM `matrix_downline` as ur join amount_detail as am on am.user_id=ur.down_id  and ur.income_id='$user' and am.payment_date>='$start' and  am.payment_date<='$end'"));
$tbv=$total_team_point['teampurchase'];
        if($tbv=='')
        {
          $tbv=0;
        }
        else
        {
          $tbv=$tbv;  
        }

        $allbv=$allbv+$tbv;
 return $allbv;
}

// function find_team_income_cummulative11($user,$start,$end){
//     $allbv=0;
//     $teambv=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where income_id='$user'");
//     while($teambv1=mysqli_fetch_array($teambv)){
//         $down_id=$teambv1['down_id'];
//         $tbv=0;
     
//     $amts1=mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pp) as bv FROM `amount_detail` where user_id='$down_id' and payment_date>='$start' and  payment_date<='$end'"));

//         $tbv=$amts1['tbv'];
//         if($tbv==''){
//           $tbv=0;
//         }else{
//           $tbv=$tbv;  
//         }
//         $allbv=$allbv+$tbv;
//     }
//   return $allbv;
// }


                     
function find_directteam_income_cummulative11($user,$start,$end){
    $allbv=0;
    $allbv11=0;
    $allbv1=0;
    $teambv=mysqli_query($GLOBALS["___mysqli_ston"], "select * from matrix_downline where income_id='$user' and director_status=0 and level=1");
    while($teambv1=mysqli_fetch_array($teambv)){
        $down_id=$teambv1['down_id'];
        $tbv=0;
     $allbv=find_personal_income_cummulative11($down_id,$start,$end);
     $tbv=find_team_income_cummulative11($down_id,$start,$end);
        $allbv1=$allbv+$tbv;
        $allbv11=$allbv1+$allbv11;
    }
     $allbvaa=find_personal_income_cummulative11($user,$start,$end);
  return $allbv11+$allbvaa;
}





$total_director=0;
$start_date = "2020-08-01";
 $end_date = "2020-08-31";
// $start_date = "2020-07-01";
//  $end_date = "2020-07-30";
$comapany_turn= mysqli_fetch_array(mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(pp) as tbv FROM `amount_detail` where payment_date between '$start_date' and '$end_date'"));
$comapany_turn_over_bv = $comapany_turn['tbv'];

if ($comapany_turn_over_bv == '') {
    $comapany_turn_over_bv = 0;
} else {
    $comapany_turn_over_bv = $comapany_turn_over_bv;
}

$fourteen_percent= $comapany_turn_over_bv * 30 / 100;
echo "Cturn----".$comapany_turn_over_bv;echo"<br>";
echo "Cturn30%----".$fourteen_percent;echo"<br>";
$rd123 = mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration  where user_rank_name!='Free User' and slab>=40 ");
while ($rds12 = mysqli_fetch_array($rd123)) {
   echo $uid= $rds12['user_id'];echo"<br>";
    $finder = $uid;
    // $start= date('Y-m-') . "01";
    // $end = date('Y-m-') . "31";
$start = "2020-08-01";
 $end = "2020-08-31";
   $finder_perosnal_bvks = find_personal_income_cummulative11($uid, $start, $end);
   $finder_team_bvks     = find_team_income_cummulative($uid, $start, $end);
   echo "Personal Purchase----".$finder_perosnal_bvks;echo"<br>";
   echo "Team Purchase----".$finder_team_bvks;echo"<br>";
    $tbvsks=$finder_perosnal_bvks + $finder_team_bvks;
    

       $comm=$rds12['director_per'];
          echo "My Direct Per----".$comm;echo"<br>";
  $sixpercent =$tbvsks*$comm/100;
  if ($sixpercent > 0) {
 $total_director=$total_director+$sixpercent;
 echo "Leader Point----".$total_director;echo"<br>";
 }      
        


}




   $director_points=$fourteen_percent/$total_director;

   echo "Direct Point----".$director_points;echo"<br>";echo"<br>";echo"<br>";

// $rd = mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration  where user_rank_name!='Free User' and slab>=40");

// while ($rds = mysqli_fetch_array($rd)) {
//     $uid                = $rds['user_id'];
//     $user_rank_name     = $rds['user_rank_name'];
//     $finder             = $uid;
//     $start              = date('Y-m-') . "01";
//     $end                = date('Y-m-') . "31";
 

//    $finder_perosnal_bvks = find_directteam_income_cummulative11($uid,$start,$end);
//    $comm=$rds['director_per'];
// $sixpercent =$finder_perosnal_bvks*$comm/100;
//   if ($sixpercent > 0) {
// $total_director=$total_director+$sixpercent;
//  }
//     } 





 $rd = mysqli_query($GLOBALS["___mysqli_ston"], "select * from user_registration  where user_rank_name!='Free User' and slab>=40 ");

 while ($rds = mysqli_fetch_array($rd)) {
       $uid                = $rds['user_id'];echo"<br>";
       $finder             = $uid;
$start = "2020-08-01";
 $end = "2020-08-31";
       $finder_perosnal_bvks = find_personal_income_cummulative11($uid, $start, $end);
       $finder_team_bvks     = find_team_income_cummulative($uid, $start, $end);
     

if ($finder_perosnal_bvks>=500) {
 

      $tbvsks=$finder_perosnal_bvks + $finder_team_bvks;
   echo "Again Total Buiness---".$tbvsks;echo"<br>";
    echo "Again Direct Slab---".$comm;echo"<br>";
        $comm=$rds['director_per'];
 $sixpercent =$tbvsks*$comm/100;
       echo "Again My Per Amt---".$sixpercent;echo"<br>";
       $total_amount =$director_points*$sixpercent;
die;
      $invoice_no=rand(10000000,99999999);
        echo  $total_amount2 = $total_amount;
          $date=  date('Y-m-d');
          $urls = "http://" . $_SERVER["SERVER_NAME"] . $_SERVER["REQUEST_URI"];
          mysqli_query($GLOBALS["___mysqli_ston"], "update final_e_wallet set amount=(amount+$total_amount2) where user_id='".$uid."'");
          mysqli_query($GLOBALS["___mysqli_ston"], "insert into credit_debit values(NULL,'$invoice_no','".$uid."','$total_amount2','0','0','".$uid."','$uid','$end','Leadership Bonus','Leader Income','$comm','$fourteen_percent','$invoice_no','$director_points','0','Payout Wallet',CURRENT_TIMESTAMP,'$tbvsks')");

}
 } 
    
 
    
    
