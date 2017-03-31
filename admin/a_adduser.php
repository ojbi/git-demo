<?php

require_once('config/conn.php');
// var for user
$name= $_POST['name'];
$us= $_POST['us'];
$ps= $_POST['ps'];
$cpas=$_POST['cps'];
//var for jobs
$odate= $_POST['odate'];

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
        $sql=mysql_query("Select * from tbl_user where username = '$us'")or die (mysql_error());
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
			echo "<div class='display-error'>
		 			<center><img src='../images/pserror.png' width='20px' height='20px'></center> Password didn't match
	       		</div>";

	}
   }
  } // end of if


?>