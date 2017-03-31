
<html>
<head>
  <title>  Job Opening </title>
    <!--  ULTIMATE DROPDOWN MENU v3.4.1 by Brothercake  -->
    <!--  http://www.brothercake.com/dropdown/  -->
    <?php
    require_once('../styles.php');
    require_once('config/dbadmin.php');
    ?>

    <!--  Message delete -->


<div class="main">
  <div class="per">

 <?php

$appid = $_GET['pid'];       
        //retriev all users
        $res = mysql_query("SELECT pi.per_id,ai.posid,pi.fname,pi.mname,pi.lname,pi.nname,pi.padd,pi.con,pi.eadd,pi.bdate,pi.bplace,pi.dateapplied,pi.gen,pi.stat,pi.namesp,pi.occsp,pi.empsp,pi.child, (YEAR(CURDATE())-YEAR(bdate))-(RIGHT(CURDATE(),5)<RIGHT(bdate,5)) AS age from personal_info as pi,applicant_info as ai where ai.per_id = pi.per_id and ai.posid =pi.posid and ai.appid='$appid'");
  
  echo mysql_error();
          // if no users yet
          if (!$res) 
          {
            echo "<p>Couldn't get record!";
          } 
    
          else 
          {
            // displaying users
            $row = mysql_fetch_array($res);
             
              $perid=$row['per_id'];
              $fn= $row['fname'];
               $mn = $row['mname'];
               $ln=$row['lname'];
               $sex= $row['gen'];
               $age=$row['age'];
                $bdate=date('F d, Y', strtotime($row['bdate']));
                $nname=$row['nname'];
                $date=date('F d, Y', strtotime($row['dateapplied']));
                $posid=$row['posid'];
                $bplace=$row['bplace'];
                $con=$row['con'];
                $gen=$row['gen'];
                $add=$row['padd'];
                $eadd=$row['eadd'];
                $st=$row['stat'];
                $namesp=$row['namesp'];
                $occsp=$row['occsp'];
                $empsp=$row['empsp'];
                $ch=$row['child'];




            }

?>




<h4>Personal Information  </h4>
<label> First name : </label> <input type='text' value="<?php echo $fn;?>" disabled/><br>
<label> Middle name : </label> <input type='text' value="<?php echo $mn;?>" disabled/><br>
<label> Last name : </label> <input type='text' value="<?php echo $ln;?>" disabled/><br>
<label> Birthdate : </label> <input type='text' value="<?php echo $bdate;?>" disabled/><br>
<label>  Age: </label> <input type='text' value="<?php echo $age;?>" disabled/><br>
<label>  Birth Place: </label> <input type='text' value="<?php echo $bplace;?>" disabled/><br> 
<label>  Gender: </label> <input type='text' value="<?php echo $gen;?>" disabled/><br> 
<label>  Civil Status: </label> <input type='text' value="<?php echo $st;?>" disabled/><br> 
<label>  Nickname: </label> <input type='text' value="<?php echo $nname;?>" disabled/><br> 

</div>

<div class="con">
<br><br><br>
<label> Contact No. : </label> <input type='text' value="<?php echo $con;?>" disabled/><br>
<label>Address : </label> <input type='text' value="<?php echo $add;?>" disabled/><br>
<label> E-mail Address: </label> <input type='text' value="<?php echo $eadd;?>" disabled/><br>

<label> Name of Spouse: </label> <input type='text' value="<?php echo $namesp?>" disabled/><br>
<label>Occupation of Spouse: </label> <input type='text' value="<?php echo $occsp;?>" disabled/><br>
<label>Employer of Spouse: </label> <input type='text' value="<?php echo $empsp;?>" disabled/><br>
<label>No. of Children </label> <input type='text' value="<?php echo $ch;?>" disabled/><br>
</div>



</div>



<div class="resumeformlayout">
<h4> Educational Background </h4>


<?php
       

       echo "  
  <table class='hovertable' align = 'center'>
  <tr>
    <th style='height:50px; width:350px;' >Education</th>
    <th style='height:50px; width:300px;'>Course</th>
    <th style='height:50px; width:200px;'>Years Attended</th>
    <th style='height:50px; width:300px;'>School</th>
    <th style='height:50px; width:300px;'>Address</th>
    
  </tr>

"; 

        $sql=mysql_query("Select * from educ_info WHERE per_id = '$perid'")or die (mysql_error());
        $row=mysql_num_rows($sql);

      

          
          if ($row > 0) 
          {
            
          
        


          // displaying users
            while ($row = mysql_fetch_array($sql)) 
            {  
               $educid=$row["educid"];
               $educ= $row["educ"];
               $deg=$row["course"];
               $from= $row["fro"];
               $to = $row["to"];
               $hon= $row["hon"];
               $ns = $row["nschool"];
               $adds=$row["addschool"];



 
?>

<input type="hidden" name="educid" value="<?php echo $educid;?>">

<?php

echo "
              
                <tr class= 'record'vonmouseover='this.style.backgroundColor=#0080FF;'  onmouseout='this.style.backgroundColor=#d4e3e5;'>

                  <td style='overflow:hidden; width:350px;' align='center'>$educ</td>
                  <td style='overflow:hidden; width:296px;' align='center'> $deg</td>
                  <td style='overflow:hidden; width:196px;' align='center'> FROM : $from   TO : $to</td>
                  
                   <td style='overflow:hidden; width:296px;' align='center'>  $ns </td>
                    <td style='overflow:hidden; width:296px;' align='center'>  $adds</td>
                  
                  
                 
                </tr>
             ";

              
          } 

          echo "</table>";// end of while
        } // end of else

        else{


echo "<table class = 'hovertable'  style='table-layout:fixed' align = 'center'>   
              
                <tr class= 'record'vonmouseover='this.style.backgroundColor=#0080FF;'  onmouseout='this.style.backgroundColor=#d4e3e5;'>

                  <td style='overflow:hidden; width:1500px;' align='center'>No record found</td></tr></table>";


        }
?>
    </table>
</div>


<div class="resumeformlayout">
<h4>Honors Recieved </h4>


<?php
// end of else

       $honors = explode("\n", $hon);


echo "<table class = 'hovertable'  style='table-layout:fixed' align = 'center'>   
              
                <tr class= 'record'vonmouseover='this.style.backgroundColor=#0080FF;'  onmouseout='this.style.backgroundColor=#d4e3e5;'>";

                foreach($honors as $val1){
  if(!empty($val1)){


?>

<td style='overflow:hidden; width:1500px;' align='left'> <ul> <li><?php  echo str_replace('-', ' ', $val1); ?></li></ul></td></tr></table></div>
<?php

}
else{
?>

  <td style='overflow:hidden; width:1500px;' align='left'> <ul> <li> No Record found </li></ul></td></tr></table></div>

<?php
}}
        
?>
    
</div>
<div class="resumeformlayout">
<h4> Work Experience</h4>
<?php

echo "   <table class='hovertable' align = 'center'>
  <tr>
    <th style='height:50px; width:350px;' >Company</th>
    <th style='height:50px; width:300px;'>Position</th>
    
    <th style='height:50px; width:200px;'>Date</th>
    <th style='height:50px; width:300px;'>Reason Leaving</th>
    <th style='height:50px; width:200px;'>Salary</th>
    
  </tr>
";

$sql=mysql_query("SELECT * from work_info where per_id = '$perid'");
$row=mysql_num_rows($sql);


if($row > 0)
{




          // displaying users
            while ($row = mysql_fetch_array($sql)) 
            {  
              $workid =$row['workid'];
               $pos= $row["pos"];
               $comp=$row["company"];
               $nt= $row["nature"];
               $from = $row["from"];
               $to= $row["to"];
               $sal = $row["salary"];
               $res=$row["reason"];

 $fromd = date('F d, Y', strtotime($from));
$tod = date('F d, Y', strtotime($to));

?>
<input type='hidden' name='workid' value ='<?php echo $workid;?>'>

<?php
echo "
              
                <tr onmouseover='this.style.backgroundColor=#0080FF;'  onmouseout='this.style.backgroundColor=#d4e3e5;'>

                  <td style='overflow:hidden; width:350px;' align='center'>$comp</td>
                  <td style='overflow:hidden; width:296px;' align='center'> $pos</td>
                  <td style='overflow:hidden; width:196px;' align='center'> FROM : $fromd   <br>TO : $tod </td>
                  
                   <td style='overflow:hidden; width:296px;' align='center'>  $res </td>
                    <td style='overflow:hidden; width:200px;' align='center'>  $sal</td>
                
                </tr>
             ";

              
          } 

          echo "</table>";// end of while
        } // end of else

        else{


echo "<table class = 'hovertable'  style='table-layout:fixed' align = 'center'>   
              
                <tr class= 'record'vonmouseover='this.style.backgroundColor=#0080FF;'  onmouseout='this.style.backgroundColor=#d4e3e5;'>

                  <td style='overflow:hidden; width:1500px;' align='center'>No record found</td></tr></table>";


        }

?>
</div>

<div class="resumeformlayout">
<h4> Character References </h4>

<?php

echo "   <table class='hovertable' align = 'center'>
  <tr>
    <th style='height:50px; width:350px;' >Company</th>
    <th style='height:50px; width:300px;'>Position</th>
     <th style='height:50px; width:300px;'>Name</th>
    <th style='height:50px; width:200px;'>Contact</th>
    <th style='height:50px; width:300px;'>Relationship</th>
   
    
  </tr>

";


$sql=mysql_query("SELECT * from ref_info where per_id = '$perid'");
$row=mysql_num_rows($sql);


if($row > 0)
{




          // displaying users
            while ($row = mysql_fetch_array($sql)) 
            {  


              
              
               $comp=$row["comp"];
               $name= $row["name"];
               $con = $row["con"];
               $pos= $row["pos"];
               $rel= $row["rel"];

?>
<input type='hidden' name='workid' value ='<?php echo $workid;?>'>

<?php
echo "  
              
                <tr onmouseover='this.style.backgroundColor=#0080FF;'  onmouseout='this.style.backgroundColor=#d4e3e5;'>

                  <td style='overflow:hidden; width:350px;' align='center'>$comp</td>
                   <td style='overflow:hidden; width:296px;' align='center'>  $pos</td>
                
                  <td style='overflow:hidden; width:296px;' align='center'> $name</td>
                  <td style='overflow:hidden; width:196px;' align='center'> $con </td>
                  
                   <td style='overflow:hidden; width:296px;' align='center'>  $rel</td>
                   
                </tr>
            ";

              
          } 
          echo " </table>";// end of while
        } // end of else

        else{


echo "<table class = 'hovertable'  style='table-layout:fixed' align = 'center'>   
              
                <tr class= 'record'vonmouseover='this.style.backgroundColor=#0080FF;'  onmouseout='this.style.backgroundColor=#d4e3e5;'>

                  <td style='overflow:hidden; width:1500px;' align='center'>No record found</td></tr></table>";


        }

?>
</div>

</div>
<script type="text/javascript" language="javascript1.2" src="../styles/menu.js"></script>



</body>
</html>