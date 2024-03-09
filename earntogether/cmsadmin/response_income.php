<?php
//include connection file 

include("../lib/config.php");


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
		4 => 'Commission',
        5 => 'Transaction Type',
		6 => 'Remark',
		7 => 'Paid Status',
		
		8 => 'ts',	
	);

	$where = $sqlTot = $sqlRec = "";

	// check search value exist
	if( !empty($params['search']['value']) ) {   
		$where .=" WHERE ";
		$where .=" ( credit_debit.user_id LIKE '".$params['search']['value']."%' ";    
		$where .=" OR user_registration.username LIKE '".$params['search']['value']."%' ";
$where .=" OR credit_debit.ts LIKE '".$params['search']['value']."%' ";
		$where .=" OR user_registration.first_name LIKE '".$params['search']['value']."%' )";
	}
else{
	    $where .=" WHERE ";
		$where .="   credit_debit.ttype='Binary Income' ";  
	    }
	// getting total number records without any search
	$sql = "SELECT credit_debit.id,credit_debit.user_id,user_registration.username,user_registration.first_name,user_registration.last_name,credit_debit.credit_amt,credit_debit.ttype,credit_debit.TranDescription,credit_debit.status,credit_debit.ts FROM credit_debit LEFT JOIN user_registration ON credit_debit.user_id = user_registration.user_id ";
	$sqlTot .= $sql;
	$sqlRec .= $sql;
	//concatenate search sql if value exist
	if(isset($where) && $where != '') {
		$sqlTot .= $where;
		$sqlRec .= $where;
	}


 	$sqlRec .=  " ORDER BY ". $columns[$params['order'][0]['column']]."  DESC  LIMIT ".$params['start']." ,".$params['length']." ";

	$queryTot = mysqli_query($GLOBALS["___mysqli_ston"], $sqlTot);


	$totalRecords = mysqli_num_rows($queryTot);

	$queryRecords = mysqli_query($GLOBALS["___mysqli_ston"], $sqlRec);
    $id=1;
    $id1=0;


	//iterate on results row and create new index array of data
	while( $row = mysqli_fetch_row($queryRecords) ) { 

	
    



		$data[$id1][0] = $id;
		$data[$id1][1] = $row[1];
		$data[$id1][2] = $row[2];
		$data[$id1][3] = $row[3]." ".$row[4];
		if($row[5]==0)
			$data[$id1][4] = 0;
		else
			$data[$id1][4] = number_format($row[5],2);
		
		
		$data[$id1][5] = $row[6];
		$data[$id1][6] = $row[7];
		
        if($row[8]==0)
			$data[$id1][7] = "paid";
		else
			$data[$id1][7] = "unpaid";
        $data[$id1][7] = $row[9];
		
		
	

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
	