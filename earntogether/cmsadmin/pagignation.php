<?php
class Paging
{
	function getpage_data($num, $per_page)
{

	$per_page = $per_page;
    $showeachside = 5;
    $thispage = $_SERVER['PHP_SELF'];
    $thisp1 = explode("/",$thispage);
    $last=end($thisp1);
    $thisp2 = explode(".php",$last);
	$thisp3 = $thisp2[0];
	
	
	
	
	if($_SESSION['lastpage']!='')
	{
		// check if session last page is same as thisp3
		if($_SESSION['lastpage']==$thisp3)
		{
			//echo "fdsfsdf";
			//$_SESSION['startp'] = '';
		// if match ok
			
			}
		else
		{
			$_SESSION['lastpage']=$thisp3;
			$_SESSION['startp'] = '';
			
			}
			
		// else clear paging
		}
	else
	{
		$_SESSION['lastpage']=$thisp3;
		
		}
	
	
	
	
	// set paging session 
	
	if($_REQUEST['startp']!='')
	{
		$startp=$_REQUEST['startp'];
		$_SESSION['startp'] = $startp;
		
		}
	elseif($_SESSION['startp']!='')
	{
		$startp=$_SESSION['startp'];	
		}
		
	else
	{
		$startp= ''; //$_REQUEST['startp'];
		$_SESSION['startp'] = $startp;
		}		
	
	
	//echo $startp;
	if(empty($startp)) { $startp=0; }
	$goto=$_REQUEST['goto'];	

	if($goto!="")
	{
		$startp=$per_page*($goto-1);

		$_SESSION['startp'] = $startp;
	}
	
	  // Current start position
		
	$max_pages = ceil($num / $per_page); // Number of pages
	$cur = ceil($startp / $per_page)+1; // Current page number
	
	
	//echo "sc=".$_SESSION["cur"] = $cur;
	//echo "ss=".$_SESSION["start"] = $start;
	//echo "sm=".$_SESSION["max_pages"] = $max_pages;	
	
	$values=$cur."~".$startp."~".$max_pages;
	//echo $values;
	//exit;
	
	return $values;	
}

function get_paging($num,$start,$cur,$max_pages,$p, $per_page)
{
	
	//echo $start;
	//exit;

$per_page = $per_page;

if($p!="")
	{
		//$thispage = $_SERVER['PHP_SELF']."?".$p."&";
	 	$thispage = "?".$p."&";
	}
/*else if($_REQUEST['goto']!='')
	{
	   	$thispage = "?".$p."&s"; 
	}*/
else
	{
		//$thispage = $_SERVER['PHP_SELF']."?";
		$thispage = "?";
	}
	
 $thispage;

if($max_pages>1)
	{
	?>
  
	<table width="100%" border="0" cellspacing="0" cellpadding="0" id="paging" class="table table-hover" >
			  <tr>
				<td width="80%"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0" class="phpbody">
					<tr>
					  <td width="0" align="center" ><?
						if(($start-$per_page) >= 0)
						{
							$next = $start-$per_page;
							?>
							  <a class="btn btn-success" href="<?php print("$thispage".("startp=0"));?>">First</a>
							  <?php
						}
						else
						{
						echo "First";
						}
						?>
					  |&nbsp;</td>
					  <td width="0" align="center" ><?php
						if(($start-$per_page) >= 0)
						{
							$next = $start-$per_page;
							if($next==0)
							{
							?>
									  <a class="btn btn-danger" href="<?php print("$thispage".("startp=0"));?>" >Prev</a>
									  <?php
							}
							else
							{
							?>
									  <a class="btn btn-danger" href="<?php print("$thispage".($next>0?("startp=").$next:""));?>" >Prev</a>
							<?
							}
						}
						else
						{
						echo "Prev";
						}
						?> |&nbsp;</td>
					  <td width="0" align="center" class="selected"> Page <?php print($cur);?> / <?php print($max_pages);?> (<?php print($num);?> records)&nbsp;|&nbsp;</td>
					  <td align="center"  width="0"><?php 
						//echo $num;
						if($start+$per_page<$num)
						{
						
						?>
						  <a class="btn btn-success" href="<?php print("$thispage"."startp=".max(0,$start+$per_page));?>" >Next</a>
						  <?php
						}
						else
						{
							echo "Next ";
						}
						?>|&nbsp;</td>
					  <td align="center" width="0"><?
						if($start+$per_page<$num)
						{
							$last=($max_pages-1)*$per_page;
							?>
							  <a class="btn btn-danger" href="<?php print("$thispage".("startp="."$last"));?>" >Last</a>
							  <?php
						}
						else
						{
							echo "Last";
						}
						?></td>
					</tr>
					
				</table></td>
				<td width="20%">
			<script>
			function chk_goto(max_pages)
			{
			    //alert(max_pages);
				if(document.getElementById('goto').value*1 > max_pages*1)
				{
					alert("Please enter valid page number.");
					document.getElementById('goto').focus();
					return false;
				}
			}
			</script>
					<form action="<?=$thispage.'startp='.$_REQUEST['goto'];?>" method="post" name="frmgoto" id="frmgoto" onsubmit="return chk_goto('<?=$max_pages;?>')">
					  <table width="100%" border="0" cellspacing="0" cellpadding="0" align="right" class=" table-hover">
						<tr>
						  <td align="right"><strong>Go to&nbsp;</strong></td>
						  <td><input  name="goto" type="text" id="goto" size="2" /></td>
					      <td><input class="btn btn-primary" type="submit" name="submit_go"  value="Go" /></td>
						</tr>
					  </table>
				</form></td>
			  </tr>
</table>

	<?php
	}
}
	
	
	
	
	
	}








?>