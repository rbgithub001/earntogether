<?php 
ob_start();
include("../lib/config.php");
function redirectURL($url) {
	    echo '<script> window.location.href="'.$url.'"
		</script>"';

}	

		if(isset($_POST['Show'])){
		    echo $_POST['list'];die;
			$from=$_POST['from'];
            $end_date=$_POST['end_date'];
			$id=$_POST['list'];
		
			$query123=$_POST['qry'];
			$date=date('Y-m-d');
			$description=$_POST['description'];
		
            if(!empty($id)){
                foreach($id as $check) 
                {
   
				    mysqli_query($GLOBALS["___mysqli_ston"], "update user_registration set del_status=4  where id='$check' ");
                    
                }	
            }	    
	    }   
		 
//header("location:member-list.php");
?>
<div class='container'>

  <!-- Form -->
  <form method='post' action=''>
    <input type='submit' value='Delete' name='but_delete'><br><br>

    <!-- Record list -->
    <table border='1' id='recordsTable' style='border-collapse: collapse;' >
      <tr style='background: whitesmoke;'>
        <th>Username</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Email</th>
        <th>&nbsp;</th>
     </tr>

     <?php 
     $query = "SELECT * FROM user_registration";
     $result = mysqli_query($GLOBALS["___mysqli_ston"],$query);
     
     
     while($row = mysqli_fetch_array($result) ){
        $id = $row['id'];
        $username = $row['username'];
        $name = $row['first_name'];
        $gender = $row['gender'];
        $email = $row['email'];
     ?>
     <tr id='tr_<?= $id ?>'>

        <td><?= $username ?></td>
        <td><?= $name ?></td>
        <td><?= $gender ?></td>
        <td><?= $email ?></td>

        <!-- Checkbox -->
        <td><input type='checkbox' name='delete[]' value='<?= $id ?>' ></td>
 
    </tr>
    <?php
    }
    ?>
   </table>
 </form>
</div>