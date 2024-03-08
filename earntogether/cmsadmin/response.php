<?php
//include connection file 
include("../lib/config.php");
	 if(!isset($_SESSION['token_id'])){
  header("Location:login.php");
}
else if(isset($_SESSION['token_id'])){
  if($_SESSION['token_id'] != md5($_SESSION['user_id'])){
    header("Location:login.php");
  }
  
  else{
  
    $condition = " where user_id ='".$_SESSION['user_id']."'";
    $args_user = $mxDb->get_information('admin', '*', $condition,true, 'assoc');
  }
}
// store random no for security
$_SESSION['rand'] = mt_rand(1111111,9999999);
	// initilize all variable
	$params = $columns = $totalRecords = $data = array();

	$params = $_REQUEST;

	//define index of column
	$columns = array( 
		0 =>'id',
		1 => 'user_id', 
		2 => 'username',
		3 => 'Name',
		4 => 'ref_id',
		5 => 'registration_date',
		5 => 'binary_pos',
		6 => 'User Rank',
		7 => 'Email',
		8 => 'Phone no',
		9 => 'Package',
		10 => 'Edit',
		10 => 'reset',	
	);

	$where = $sqlTot = $sqlRec = "";

	// check search value exist
	if( !empty($params['search']['value']) ) {   
		$where .=" WHERE ";
		$where .=" ( user_registration.user_id LIKE '".$params['search']['value']."%' ";    
		$where .=" OR user_registration.username LIKE '".$params['search']['value']."%' ";
		$where .=" OR user_registration.ref_id LIKE '".$params['search']['value']."%' ";
		$where .=" OR status_maintenance.name LIKE '".$params['search']['value']."%' ";
		$where .=" OR user_registration.binary_pos LIKE '".$params['search']['value']."%' ";

		$where .=" OR first_name LIKE '".$params['search']['value']."%' )";
	}

	// getting total number records without any search
	$sql = "SELECT  user_registration.id,user_registration.user_id,user_registration.username,user_registration.first_name,user_registration.last_name,user_registration.ref_id,user_registration.registration_date,user_registration.binary_pos,user_registration.email,user_registration.telephone,status_maintenance.name FROM `user_registration` LEFT JOIN status_maintenance ON user_registration.user_plan = status_maintenance.id ";

	//$sql = "SELECT credit_debit.id,credit_debit.user_id,user_registration.username,user_registration.first_name,user_registration.last_name,credit_debit.credit_amt,credit_debit.ttype,credit_debit.TranDescription,credit_debit.status,credit_debit.ts FROM credit_debit LEFT JOIN user_registration ON credit_debit.user_id = user_registration.user_id AND credit_debit.ttype='Binary Income'";
	$sqlTot .= $sql;
	$sqlRec .= $sql;
	//concatenate search sql if value exist
	if(isset($where) && $where != '') {
		$sqlTot .= $where;
		$sqlRec .= $where;
	}


 	$sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."  DESC  LIMIT ".$params['start']." ,".$params['length']." ";

	$queryTot = mysqli_query($GLOBALS["___mysqli_ston"], $sqlTot) ;


	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($GLOBALS["___mysqli_ston"], $sqlRec) ;
    $id=1;
    $id1=0;


	//iterate on results row and create new index array of data
	while( $row = mysqli_fetch_row($queryRecords) ) { 

	
    



		$data[$id1][0] = $id;
		$data[$id1][1] = $row[1];
		$data[$id1][2] = $row[2];
		$data[$id1][3] = $row[3]." ".$row[4];
		$data[$id1][4] = $row[5];
		$data[$id1][5] = $row[6];

		$data[$id1][6] = $row[7];
		$data[$id1][7] = $row[8];
		$data[$id1][8] = $row[9];

		$data[$id1][9] = $row[10];
		
		$data[$id1][10] = "<a href='edit_member_profile.php?id=$row[0]' >Edit</a>";
		$data[$id1][11] = "<a href='resest_kyc_process.php?id=$row[1]' >Reset</a>";
		
		
	

    	$id++;
        $id1++;

	}	

	$json_data = array(
			"draw"            => intval( $params['draw'] ),   
			"recordsTotal"    => intval( $totalRecords ),  
			"recordsFiltered" => intval($totalRecords),
			"data"            => $data   // total data array
			);

	echo json_encode($json_data);  // send data as json format
?>
	