<?php
session_start();

require_once('conn.php');

//user var
$name= strip_tags($_POST['name']);
$us= strip_tags($_POST['us']);
$ps= strip_tags($_POST['ps']);
$cpas=strip_tags($_POST['cps']);
$level= strip_tags($_POST['level']);

//Job var
$pos= strip_tags($_POST['pos']);
$omo= strip_tags($_POST['omonth']);
$odate= strip_tags($_POST['odate']);
$oyr= strip_tags($_POST['oyr']);
$cmo=strip_tags($_POST['cmonth']);
$cdate= strip_tags($_POST['cdate']);
$cyr= strip_tags($_POST['cyr']);
$res= strip_tags($_POST['res']);
$st= strip_tags($_POST['st']);
$req=strip_tags($_POST['req']);




if(isset($_POST['log']))
{

	$sql=mysql_query("SELECT * from users where username='$us' and password='$ps'");
	$row=mysql_num_rows($sql);

	if($row > 0)
	{

    header('location:../admin/home.php');

	}
	else
	{
		echo "<div class='display-error'>
		 		<center><img src='../images/error.png' width='20px' height='20px'></center> 
		 		Incorrect Username/password
              </div>";
    }
		
	

}

// adding user
if(isset($_POST['addus']))
{
	// check if all fields are not empty
	if(empty($name) || empty($us) || empty($ps) || empty($level)) 
	{
		echo "<div class='display-error'>
		 		<center><img src='../images/error.png' width='20px' height='20px'></center> All fields are required
              </div>";
    }
	//Check if ps and cpas is match
	else
	{
		if($ps==$cpas)
		{
	  // Select if username exist
        $sql=mysql_query("Select * from tbl_user where username = '$us' and acceslevel='$level'")or die (mysql_error());
        $row=mysql_num_rows($sql);
        $result = mysql_fetch_array($sql);

        	if($row > 0 )
        		{
                  //username exist
        			echo "<div class='display-error'>
		 					<center><img src='../images/user.jpg' width='20px' height='20px'></center> Username already exist, Please try anothe one
        				  </div>";	
        		}
        //Insert new user
		   else
        		{
						mysql_query("INSERT INTO tbl_user(userid,name,username,password,acceslevel) VALUES ('','$name','$us','$ps','$level')");
		       				echo "<div class='display-success'>
				 					<center><img src='../images/add.png' width='20px' height='20px'></center> Sucessfully added new user
		        				 </div>";
        		}
        //If not, Insert data

		} // end of else
	else
	{	
			echo "<div class='display-error'>s
		 			<center><img src='../images/pserror.png' width='20px' height='20px'></center> Password didn't match
	       		</div>";

	}
   }
  } // end of adding user



// adding user
if(isset($_POST['addjob']))
{

	
// check if all fields are not empty
	if(empty($pos) || empty($st)) 
	

	{
		echo "<div class='job-error'>
		 		<center><img src='../images/error.png' width='20px' height='20px'></center> All fields are required
              </div>";
    }

    else
    {

	$op_date = "$oyr-$omo-$odate";
	$oc_date = "$cyr-$cmo-$cdate";

	

	
		mysql_query("INSERT INTO jobs_opening(posid,postitle,status,opening_date,closing_date,Responsibilities,Requirements) VALUES ('','$pos','$st','$op_date','$oc_date','$res','$req')");
		       	echo "<div class='job-success'>
				 		<center><img src='../images/add.png' width='20px' height='20px'></center> Sucessfully added job Opening
		        	</div>";


    }
}

// Deleting Jobs
if($_GET['command'] == "deletepos") 
{
	$getid = strip_tags($_GET['posid']);
	
	 // DELETE QUERY
		mysql_query("DELETE FROM jobs_opening WHERE posid = '$getid' ");
	      echo "<script>
				   alert('Record Deleted.'); location.href ='../jobs.php';
			    </script>";
}
// end of deleting job


//updating jobs

if(isset($_POST['editjob']))
{


// check if all fields are not empty
	if(empty($pos) || empty($st)) 
	

	{
		echo "<div class='job-error'>
		 		<center><img src='../images/error.png' width='20px' height='20px'></center> All fields are required
              </div>";
    }

    else
    {

	$op_date = "$oyr-$omo-$odate";
	$oc_date = "$cyr-$cmo-$cdate";

	

	
		$sql=mysql_query("Update jobs_opening SET postitle = '$pos', status='$st', opening_date='$op_date',closing_date='$oc_date',Responsibilities='$res',Requirements='$req' WHERE posid='$getid'");
		       	
		        	if($sql)
		        	{

  echo "<div class='job-success'>
				 		<center><img src='../images/add.png' width='20px' height='20px'></center> Sucessfully Updated Job 
		        	</div>";

		        	}

		        	else

		        	{
						echo mysql_error();
		        	}
		        }
}
// end of updating jobs



// Update User account
 if(isset($_POST['updateus']))
  {
// check if all fields are not empty
	if(empty($name) || empty($us) || empty($ps) || empty($level)) 
	{
		echo "<div class='display-error'>
		 		<center><img src='../images/error.png' width='20px' height='20px'></center> All fields are required
              </div>";
    }
	//Check if ps and cpas is match
	else
	{

	if($ps==$cpas)
		{
	  // Update Account
        	 $sql=mysql_query("Update tbl_user SET username='$us', name='$name', password='$ps', acceslevel='$level' WHERE userid='$getid' ");    	
		       if($sql)
		        {
		        	echo "<div class='display-success'>
				 		  <center><img src='../images/add.png' width='20px' height='20px'></center> Sucessfully Updated Account
		        	      </div>";
		        }
		       	else
		       	{
 					echo mysql_error();
		        }
	
        }
     else
   		{    
        	echo "<div class='display-error'>
		 			<center><img src='../images/error.png' width='20px' height='20px'></center>Password didn't match
            	  </div>";
          }
        
      }
      }// End of update user account


if(isset($_POST['perinfo']))
{

// personal info var
$posapplied=strip_tags($_POST['posid']);
$se= strip_tags($_POST['se']);
$fn= strip_tags($_POST['fn']);
$mn= strip_tags($_POST['mn']);
$ln= strip_tags($_POST['ln']);
$eadd= strip_tags($_POST['eadd']);
$add= strip_tags($_POST['add']);
$cn= strip_tags($_POST['cn']);
$nn= strip_tags($_POST['nn']);
$nsp= strip_tags($_POST['nsp']);
$esp= strip_tags($_POST['esp']);
$osp= strip_tags($_POST['osp']);
$cs= strip_tags($_POST['cs']);
$gen= strip_tags($_POST['gen']);
$pos= strip_tags($_POST['pos']);
$bmonth= strip_tags($_POST['bmonth']);
$bdate= strip_tags($_POST['bdate']);
$byr= strip_tags($_POST['byr']);
$stat= strip_tags($_POST['cs']);




	if(empty($se) || empty($fn) || empty($mn) || empty($ln) || empty($cn)|| empty($ln) || empty($add) || empty($nn) || empty($eadd) || empty($bmonth) || empty($bdate) || empty($byr) || empty($bpl) || empty($gen) || empty($cs))

	{
	             echo "<div class='job-error'>
			 		<center><img src='../images/error.png' width='20px' height='20px'></center> All fields are required
	              </div>";
	}

	else
	{

		$bday = "$byr-$bmonth-$bdate"; 

		$select=mysql_query("SELECT * from personal_info where fname='$fn' and mname='$mn' and lname='$ln' and bdate='$bday'");
		$row=mysql_num_rows($select);

 			

		
		if($row == 0)
		{

			$sql=mysql_query("INSERT INTO personal_info VALUES ('','$se','$fn','$posapplied','$mn','$ln','$nn','$add','$cn','$eadd','$bday','$bpl','$gen','$stat','$nsp','$osp','$esp','$ch','".date('Y-m-d')."')");
			$id =mysql_insert_id();
			$res=mysql_query("INSERT into applicant_info VALUES ('','$id','$posapplied','Unprocessed','".date('Y-m-d')."','0')");
			
			 


					$_SESSION['perid'] = $id;


					  if($sql && $res)
					  {

			          header('location:eduinfo.php');


					  }  

					  else
					  {

						echo mysql_error();

					  }   

	    }


	else

	{

 			

 			$rowid= mysql_fetch_array($select);
 		    $appid = $rowid['per_id'];

 		    
   

 		    $sql = mysql_query("SELECT * from applicant_info where per_id = '$appid' and posid='$posapplied'");
 		    $row1=mysql_num_rows($sql);

 		   
 		    if($row1 > 0)

 		    {

			
             echo "<div class='job-error'>
			 		<center><img src='../images/error.png' width='20px' height='20px'></center> You have already applied for this job
	              </div>";

 		    }

 		    else
 		    {

 		    	

			

				$bday = "$byr-$bmonth-$bdate"; 

				

					$sql=mysql_query("INSERT INTO personal_info VALUES ('','$se','$fn','$posapplied','$mn','$ln','$nn','$add','$cn','$eadd','$bday','$bpl','$gen','$stat','$nsp','$osp','$esp','$ch','".date('Y-m-d')."')");
					$id =mysql_insert_id();
					$res=mysql_query("INSERT into applicant_info VALUES ('','$id','$posapplied','Unprocessed','".date('Y-m-d')."','0')");
					
					 


					$_SESSION['perid'] = $id;


					  if($sql && $res)
					  {

			          header('location:eduinfo.php');


					  }  

					  else
					  {

						echo mysql_error();

					  }   
		       
		   }
		}
	} // end of adding personal info
}
// adding of educ info
if(isset($_POST['educinfo']))

{

$perid = $_SESSION['perid'];
$educ=strip_tags($_POST['educ']);
$yr=strip_tags($_POST['yr']);
$deg=strip_tags($_POST['deg']);
$from=strip_tags($_POST['from']);
$to=strip_tags($_POST['to']);
$hon=strip_tags($_POST['hon']);
$sa=strip_tags($_POST['sa']);
$sn=strip_tags($_POST['sn']);


		if(empty($educ) || empty($from) || empty($to) || empty($sa) || empty($sn))
		{

				echo "<div class='job-error'>
			 		<center><img src='../images/error.png' width='20px' height='20px'></center> All fields are required
	              </div>";
	    }


	    else
	    {

	    	$sql = mysql_query("INSERT INTO educ_info VALUES ('','$perid','$educ','$deg','$from','$to','$hon','$sn','$sa')");

	    	$_SESSION['perid'] = $perid;
	    	
	    	if($sql)
	    	{ 
	    		header('location:eduinfo.php');

	    	}
	    	else
	    	{
			echo mysql_error();
	    	}

	    }



} // end adding educ info

if(isset($_POST['workinfo']))
{

	$pos=strip_tags($_POST['pos']);
	$comp=strip_tags($_POST['comp']);
	$nt=strip_tags($_POST['nt']);
	$fmo=strip_tags($_POST['fmo']);
	$fdate=strip_tags($_POST['fdate']);
	$fyr=strip_tags($_POST['fyr']);
	$tmo = strip_tags($_POST['tmo']);
	$tdate=strip_tags($_POST['tdate']);
	$tyr=strip_tags($_POST['tyr']);
	$res=strip_tags($_POST['res']);
	$sal=strip_tags($_POST['sal']);

        
       $fromd = "$fyr-$fmo-$fdate";
		 $tod = "$tyr-$tmo-$tdate";


		 	if (empty($pos) || empty($comp) || empty($nt) || empty($fmo) || empty($fdate) || empty($fyr) || empty($tmo) || empty($tdate) || empty($tyr) || empty($res) || empty($sal))
	{

    			echo "<div class='job-error'>
			 		<center><img src='../images/error.png' width='20px' height='20px'></center> All fields are required
	              </div>";

	              

	}

	else
	{


    

       $sql= mysql_query("INSERT INTO work_info VALUES ('','$perid','$pos','$comp','$nt','$fromd','$tod','$res','$sal')");

		if($sql){

 			
 			header('location:workexp.php');

		}
		else{

			echo mysql_error();
		}

	}


}

if(isset($_POST['finish']))

{

	$rname = strip_tags($_POST['rname']);
	$rrname = strip_tags($_POST['rrname']);
	$rrcomp = strip_tags($_POST['rrcomp']);
	$rcomp = strip_tags($_POST['rname']);
	$rcn = strip_tags($_POST['rcn']);
	$rrcn = strip_tags($_POST['rrcn']);
	$rrel = strip_tags($_POST['rrel']);
	$rrrel = strip_tags($_POST['rrrel']);
	$rpos = strip_tags($_POST['rpos']);
	$rrpos = strip_tags($_POST['rrpos']);


	if(empty($rname) || empty($rrname) || empty($rcomp) || empty($rrcomp) || empty($rpos) || empty($rrpos) || empty($rcn) || empty($rrcn) || empty($rrel) || empty($rrrel))
	{

			echo "<div class='job-error'>
			 		<center><img src='../images/error.png' width='20px' height='20px'></center> All fields are required
	              </div>";
	}
	else
	{

		$sql=mysql_query("INSERT INTO ref_info VALUES ('','$perid','$rcomp','$rname','$rpos','$rcn','$rrel')");
		$sql1=mysql_query("INSERT INTO ref_info VALUES ('','$perid','$rrcomp','$rrname','$rrpos','$rrcn','$rrrel')");
 session_start();
session_destroy();


header('location:../web/finish.php');
	}


}




if(isset($_POST['upeduc']))
{



$perid = $_SESSION['perid'];
$educ=strip_tags($_POST['educ']);
$yr=strip_tags($_POST['yr']);
$deg=strip_tags($_POST['deg']);
$from=strip_tags($_POST['from']);
$to=strip_tags($_POST['to']);
$hon=strip_tags($_POST['hon']);
$sa=strip_tags($_POST['sa']);
$sn=strip_tags($_POST['sn']);


$getid = strip_tags($_GET['educid']);

		if(empty($educ) || empty($from) || empty($to) || empty($sa) || empty($sn))
		{

				echo "<div class='job-error'>
			 		<center><img src='../images/error.png' width='20px' height='20px'></center> All fields are required
	              </div>";
	    }


	    else
	    {

	    	$sql = mysql_query("UPDATE educ_info set educ='$educ', course='$deg', fro='$from', nschool='$sn', addschool='$sa', hon='$hon', `to`='$to' WHERE educid = '$getid'");

	    	$_SESSION['perid'] = $perid;
	    	
	    	if($sql)
	    	{ 
	    		header('location:eduinfo.php');

	    	}
	    	else
	    	{
			echo mysql_error();
	    	}

	    }


}

// edit work info
if(isset($_POST['editwork']))
{

$workid = strip_tags($_GET['workid']);
$pos=strip_tags($_POST['pos']);
	$comp=strip_tags($_POST['comp']);
	$nt=strip_tags($_POST['nt']);
	$fmo=strip_tags($_POST['fmo']);
	$fdate=strip_tags($_POST['fdate']);
	$fyr=strip_tags($_POST['fyr']);
	$tmo = strip_tags($_POST['tmo']);
	$tdate=strip_tags($_POST['tdate']);
	$tyr=strip_tags($_POST['tyr']);
	$res=strip_tags($_POST['res']);
	$sal=strip_tags($_POST['sal']);

 $from = "$fyr-$fmo-$fdate";
		 $to = "$tyr-$tmo-$tdate";


		


	if (empty($pos) || empty($comp) || empty($nt) || empty($fmo) || empty($fdate) || empty($fyr) || empty($tmo) || empty($tdate) || empty($tyr) || empty($res) || empty($sal))
	{

    			echo "<div class='job-error'>
			 		<center><img src='../images/error.png' width='20px' height='20px'></center> All fields are required
	              </div>";

	              

	}

	else
	{




       $sql= mysql_query("Update work_info set pos ='$pos', company='$comp', nature='$nt', `from`='$from', `to`='$to', reason='$res', salary='$sal' where workid = '$workid'");

		if($sql){
 			
 			header('location:workexp.php');

		}
		else{

			echo mysql_error();
		}

	}

}


//END OF FILE


if(isset($_POST['view'])){

$jobid = $_POST['job'];


  $un=mysql_query("SELECT * from applicant_info where status='Unprocessed' and posid = '$jobid'");
 $count=mysql_num_rows($un);

$un1=mysql_query("SELECT * from applicant_info where status = 'shortlisted' and posid = '$jobid'");
$count1=mysql_num_rows($un1);

$un2=mysql_query("SELECT * from applicant_info where status = 'keptforReference' and posid = '$jobid'");
$count2=mysql_num_rows($un2);

$un3=mysql_query("SELECT * from applicant_info where status = 'Denied' and posid = '$jobid'");
$count3=mysql_num_rows($un3);


$sql=mysql_query("SELECT * from personal_info,jobs_opening where personal_info.posid = '$jobid'");
$row=mysql_num_rows($sql);
$fetch=mysql_fetch_array($sql);


$sqlf=mysql_query("SELECT * from jobs_opening where posid = '$jobid'");
$fetc = mysql_fetch_array($sqlf);
$post =$fetc['postitle'];
$oct = $fetc['status'];

$tot= $count + $count1 + $count2 + $count3;

if(empty($jobid))

{


	header('location:vapps.php');
}

else
{


if($sql)
{


?>




<div class="appsLayout">
 <center><h3> <?php echo $post;?> </h3></center>

  

   <table class='hovertable' align = 'center'>
    <tr>
      <th style='height:50px; width:220px;'> Folder</th>
      <th style='height:50px; width:220px;'>Total Resume</th>
      
    </tr>

    </table>

  
               
              <table class = 'hovertable'  style='table-layout:fixed; width:400px' align = 'center'>   

                <tr onmouseover='this.style.backgroundColor=#0080FF;'  onmouseout='this.style.backgroundColor=#d4e3e5;'>
                  <td style='overflow:hidden; width:220px;' align='left'> <a href="viewjobsapps.php?idjob=<?php echo $jobid;?>&st=Unprocessed&ocst=<?php echo $oct;?>"><img src='../images/folder.png' width='30px' height='30px'> Unprocessed </td>
                  <td style='overflow:hidden; width:220px;' align='center'> <?php echo $count; ?>  </td></tr>

                  <tr>
                  <td style='overflow:hidden; width:220px;' align='left'>  <a href="viewjobsapps.php?idjob=<?php echo $jobid;?>&st=Shortlisted&ocst=<?php echo $oct;?>"> <img src='../images/folder.png' width='30px' height='30px'>Shortlisted</td>
                  <td style='overflow:hidden; width:220px;' align='center'>  <?php echo $count1; ?>  </td>
                </tr><tr>
                  <td style='overflow:hidden; width:220px;' align='left'>   <a href="viewjobsapps.php?idjob=<?php echo $jobid;?>&st=keptforReference&ocst=<?php echo $oct;?>"><img src='../images/folder.png' width='30px' height='30px'>Kept for Reference </td>
                  <td style='overflow:hidden; width:220px;' align='center'> <?php echo $count2; ?>   </td>
                </tr><tr>
                  <td style='overflow:hidden; width:220px;' align='left'>   <a href="viewjobsapps.php?idjob=<?php echo $jobid;?>&st=Denied&ocst=<?php echo $oct;?>"><img src='../images/folder.png' width='30px' height='30px'>Denied</td>
                  <td style='overflow:hidden; width:220px;' align='center'>  <?php echo $count3; ?>  </td></tr>

                  <td style='overflow:hidden; width:220px;' align='right'>   <b>Total</b> </td>
                  <td style='overflow:hidden; width:220px;' align='center'>  <?php echo $tot; ?>  </td></tr>
                  
                </tr>
             </table>

   
  <!-- End of Table -->
  <br><br>
</div>

<?php

}

}



}


if(isset($_POST['ok'])){


$check=$_POST['check'];
$sel=strip_tags($_POST['select']);

if(empty($check) || empty($sel))
{



}

else
{




foreach ($check as $key => $value) {
	$sql= mysql_query("UPDATE applicant_info set applicant_status_id='$applicant_status_id' Where appid='$value'");
}


//echo " $sel";


}}



if(isset($_GET['click'])){


$id=$_GET['pid'];
$sql= mysql_query("UPDATE applicant_info set unread='1' Where appid='$id'");


}	?>