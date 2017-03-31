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
<?php
$jid = strip_tags($_GET['idjob']);
$st=strip_tags($_GET['st']);

$oct=strip_tags($_GET['ocst']);
$sqlf=mysql_query("SELECT * from jobs_opening where posid = '$jid'");
$fetc = mysql_fetch_array($sqlf);
$post =$fetc['postitle'];






?>
 


<div class="JobtableLayout">
  <div class="jobsma">
  <img src="../images/jobsm.png" width="100px" height="100px"><h3>  <?php echo "$post ($oct) "; ?> </h3>
</div>


  <div class="stat">
<?php
  $un=mysql_query("SELECT * from applicant_info where status='Unprocessed' and posid = '$jid'");
 $count=mysql_num_rows($un);

$un1=mysql_query("SELECT * from applicant_info where status='shortlisted' and posid = '$jid'");
$count1=mysql_num_rows($un1);

$un2=mysql_query("SELECT * from applicant_info where status='keptforReference' and posid = '$jid'");
$count2=mysql_num_rows($un2);

$un3=mysql_query("SELECT * from applicant_info where status='Denied' and posid = '$jid'");
$count3=mysql_num_rows($un3);

  ?>

  <a class="<?=($st=='Unprocessed') ? 'active':'' ?>" href="viewjobsapps.php?idjob=<?php echo $jid;?>&st=Unprocessed&ocst=<?php echo $oct; ?>"><img src='../images/folder.png' width='30px' height='30px'> Unprocessed (<?php echo $count;?>) </a>
  <a class="<?=($st=='Shortlisted') ? 'active':'' ?>" href="viewjobsapps.php?idjob=<?php echo $jid;?>&st=Shortlisted&ocst=<?php echo $oct; ?>"><img src='../images/folder.png' width='30px' height='30px'> Shorlisted (<?php echo $count1;?>) </a>
  <a class="<?=($st=='keptforReference') ? 'active':'' ?>" href="viewjobsapps.php?idjob=<?php echo $jid;?>&st=keptforReference&ocst=<?php echo $oct; ?>"><img src='../images/folder.png' width='30px' height='30px'> Kept for Reference (<?php echo $count2;?>) </a>
  <a class="<?=($st=='Denied') ? 'active':'' ?>" href="viewjobsapps.php?idjob=<?php echo $jid;?>&st=Denied&ocst=<?php echo $ocst; ?>"><img src='../images/folder.png' width='30px' height='30px'> Denied (<?php echo $count3;?>) </a>

</div>
<br><br>
<?php
if($st=='Unprocessed')
{
  ?>
<label>
  Applicants in this folder will be informed that you have not yet started evaluating their resumes

  </label><br><br>

  <?php
}

?>

<br>
<div class="movelayout">
  <form action="" method="POST">
  <font color="red"><i> with selected applicants</i></font><br>
  <select name="select">
    <option value="" selected="selected"> ---------------------------------------------</option>
     <option value="Unprocessed"> Unprocessed</option>
    <option value="Shortlisted"> Shortlisted</option>
     <option value="keptforReference"> Kept for Reference</option>
      <option value="Denied">Denied</option>

</select> <input type="submit" name="ok" value="Move" id="ok"/><br>To view the resume, click on the name. Resume will be displayed on a different screen.
<br><br> 
</div><br>

 <table class="hovertable" align = 'center'>
  <tr>
     <th style='height:50px; width:30px;'></th>
    <th style='height:50px; width:300px;'>Applicants</th>
    <th style='height:50px; width:300px;'>Sex</th>
    <th style='height:50px; width:300px;'>Age</th>
    <th style='height:50px; width:300px;'>Latest Position</th>
    <th style='height:50px; width:300px;'>Course</th>
    <th style='height:50px; width:300px;'>Date Applied</th>


</tr>




 <?php
       
       
        //retriev all users
        $res = mysql_query("SELECT pi.per_id,ai.posid,pi.fname,pi.mname,pi.lname,pi.dateapplied,pi.gen,ai.unread, (YEAR(CURDATE())-YEAR(bdate))-(RIGHT(CURDATE(),5)<RIGHT(bdate,5)) AS age from personal_info as pi,applicant_info as ai where pi.per_id =ai.per_id and ai.posid ='$jid' and ai.status = '$st'");
        $count = mysql_num_rows($res);

  echo mysql_error();
          // if no users yet
          if ($count ==0) 
          {
            ?>


<table class = 'hovertable'  style='table-layout:fixed' align = 'center'>   

<tr class='record' onmouseover='this.style.backgroundColor=#0080FF;'  onmouseout='this.style.backgroundColor=#d4e3e5;'>

                  <td style='overflow:hidden; width:1500px;' align='center'>  No record found</td></tr></table>

<?php
          } 
    
          else 
          {
            // displaying users
            while ($row = mysql_fetch_array($res)) 
            {  
              $perid=$row['per_id'];
              $fn= $row['fname'];
               $mn = $row['mname'];
               $ln=$row['lname'];
               $sex= $row['gen'];
               $age=$row['age'];
                $date=date('F d, Y', strtotime($row['dateapplied']));
                $posid=$row['posid'];
$unread=$row['unread'];            

?>
 


  
             
                <tr class='record' onmouseover='this.style.backgroundColor=#0080FF;'  onmouseout='this.style.backgroundColor=#d4e3e5;'>
                  
                  <?php
                  $app = mysql_query("SELECT * from applicant_info where per_id = '$perid' and posid = '$posid'");
                  $row1=mysql_fetch_array($app);

                  $appid=$row1['appid'];

                  ?>
                  <td style='overflow:hidden; width:22px; height:40px;' align='center'> <input type='checkbox' name='check[]' value="<?php echo $appid; ?>"></td>
                  <td style='overflow:hidden; width:220px; height:40px;' align='center'> <?php echo "<b> <a href='resume.php?pid=$appid&click=true'> $fn,$mn,$ln </a> </b>"; 
                  if($unread=='0')
                  {
                      echo "<br><b><i><font color='red'>Unread</i></b></font>";

                  }

          

                  ?></td>
                  <td style='overflow:hidden; width:220px; height:40px;' align='center'> <?php echo $sex; ?></td>
                  <td style='overflow:hidden; width:220px; height:40px;' align='center'> <?php echo $age;?></td>
            <?php
                    $pos=mysql_query("SELECT * from work_info where per_id = '$perid' order by `to` DESC LIMIT 1");
                    $rowpos=mysql_fetch_array($pos);

                    $latepos=$rowpos['pos'];
                   

            ?>
                  <td style='overflow:hidden; width:220px;' align='center'> <?php echo $latepos; ?></td>


                  <?php

                  $course = mysql_query("SELECT * from educ_info where per_id='$perid' order by `to` DESC LIMIT 1");
                  $rowc=mysql_fetch_array($course);

                    $cour=$rowc['course'];


                  ?>
                   <td style='overflow:hidden; width:220px;' align='center'> <?php echo $cour; ?></td>
                    <td style='overflow:hidden; width:220px;' align='center'> <?php echo $date; ?>
                  </td>

                  </td>
                </tr>
            

              <?php
          } // end of while
       echo " </table>";

        }// end of else
?>


 <br><br>
</form></div>

<script type="text/javascript" language="javascript1.2" src="../styles/menu.js"></script>



</body>
</html>