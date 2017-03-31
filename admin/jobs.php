
<?
// Turn off all error reporting
error_reporting(0);
?>
<?php
$limit = 10;
$page = $_GET['page'];
$pagenum = ((isset($page) || !empty($page)) ? $page : 1);
$offset =(($pagenum * $limit) - $limit);
$stat=$_GET['st'];



if($page == 0){


header('location:jobs.php?page=1&st='.$stat);

}

?>
<html>
<head>
  <title>  Job Opening </title>
    <!--  ULTIMATE DROPDOWN MENU v3.4.1 by Brothercake  -->
    <!--  http://www.brothercake.com/dropdown/  -->
    <?php
    require_once('../styles.php');
    require_once('config/dbadmin.php');
    ?>


<?php


$st= strip_tags($_GET['st']);

?>
    <!--  Message delete -->

</head>
<body>
  <div class="jobs">
    <center>
      <p>
        To add another Job Opening, simply click on <a href="addjob.php">ADD JOB OPENING </a><br>
        To view your applicants for your opening, clicks on the Position Title <br>
        or the total # of applicants(Total Apps)
      </p>  
    </center>
  </div>

 

<div class="JobtableLayout">
  <div class="jobsma">
  <img src="../images/jobsm.png" width="100px" height="100px"><h3>  Jobs  </h3>
</div>

<?php
//count all jobs
     $sqlall=mysql_query("Select * from jobs_opening")or die (mysql_error());
     $all=mysql_num_rows($sqlall);
     // count open jobs
     $sqlop=mysql_query("Select * from jobs_opening where job_status_id='2'")or die (mysql_error());
     $op=mysql_num_rows($sqlop);

    //count close jobs
     $sqlcl=mysql_query("Select * from jobs_opening where job_status_id='1'")or die (mysql_error());
     $close=mysql_num_rows($sqlcl);

    

?>
  <div class="jobstat">
  <h5> Status: <a class="<?=($st=='all') ? 'active':'' ?>" href="jobs.php?page=1&st=all">View All (<?php echo $all;?>) </a> | <a class="<?=($st=='2') ? 'active':'' ?>" href="jobs.php?st=2"> Open ( <?php echo $op; ?>) </a> | <a class="<?=($st=='1') ? 'active':'' ?>" href="jobs.php?st=1"> Close (<?php echo $close;?>) </a></h5>
</div>

<br>
 <table class="hovertable" align = 'center'>
  <tr>
    <th style='height:50px; width:500px;'>Position Title</th>
    <th style='height:50px; width:300px;'>Status</th>
    <th style='height:50px; width:300px;'>Opening Date</th>
    <th style='height:50px; width:300px;'>Closing Date</th>
    <th style='height:50px; width:100px;'>Total Apps</th>
    <th style='height:50px; width:300px;'>View/Edit/delete</th>


</tr>



 <?php

 
$sql=mysql_query("SELECT * from jobs_opening LIMIT $offset, $limit")or die (mysql_error());
 $sql1=mysql_query("SELECT * from jobs_opening ORDER BY opening_date");
$count=mysql_num_rows($sql);
$count1=mysql_num_rows($sql1);
 $totalpage=ceil($count1 / $limit);

 if ($pagenum > $totalpage) {
 header("location:jobs.php?page=$totalpage");
}
else{

echo "";

}




 if($st=='all')
 {

 

          // if no users yet
          if (!$sql) 
          {
            echo "<p>Couldn't get record!";
          } 
    
          else 
          {
            // displaying users
            while ($row = mysql_fetch_array($sql)) 
            {  
               $posid= $row["posid"];
               $pos= $row["postitle"];
               $odate = $row["opening_date"];
               $cdate= $row["closing_date"];
               $st = $row["status"];
            
  

?>

  
              <input type = 'hidden' name = 'posid' value = <?php echo '$posid'; ?>>
                <tr class='record' onmouseover='this.style.backgroundColor=#0080FF;'  onmouseout='this.style.backgroundColor=#d4e3e5;'>

                  <td style='overflow:hidden; width:220px;' align='center'>  <a id='pos' href="viewjobsapps.php?idjob=<?php echo $posid;?>&st=Unprocessed&ocst=<?php echo $st; ?>"><?php echo $pos; ?></a></td>
                  <td style='overflow:hidden; width:220px;' align='center'> <?php echo $st; ?></td>
                  <td style='overflow:hidden; width:220px;' align='center'> <?php echo date('F d, Y', strtotime($odate)); ?></td>
                  <td style='overflow:hidden; width:220px;' align='center'> <?php echo date('F d, Y', strtotime($cdate)); ?></td>
                  <?php
                  $totalapp = mysql_query("SELECT count(*) as total from applicant_info where posid='$posid'");
                  $rowf=mysql_fetch_array($totalapp);

                  $tot=$rowf['total'];


                  ?>
                   <td style='overflow:hidden; width:220px;' align='center'>  <a id='st' href="viewjobsapps.php?idjob=<?php echo $posid;?>&st=Unprocessed&ocst=<?php echo $st; ?>"><?php echo $tot; ?></a></td>
                  <td style='overflow:hidden; width:220px;' align='center'> <center>
                  <a href="viewpos.php?posid=<?php echo $posid;?>"><img src="../images/view.jpg" width="30px" height="30px"></a> 
                  <a href="editjobs.php?posid=<?php echo $posid?>"><img src="../images/edit.jpg" width="30px" height="30px"></a>
                  <a href = "#" jid =" <?php echo $posid ?>" class="delbutton"> 
                    <img src="../images/delete.png" width="30px" height="30px"></a></center></td>

                  </td>
                </tr>
           


            <?php



            }

 echo "  </table>";}
}







 else
 {
        //retriev all users
$sqlres=mysql_query("SELECT * from jobs_opening where job_status_id = '$st' LIMIT $offset, $limit")or die (mysql_error());
 $sqlres1=mysql_query("SELECT * from jobs_opening Where job_status_id = '$st' ORDER BY opening_date");
$countres=mysql_num_rows($sqlres);
$count1=mysql_num_rows($sqlres1);
 $totalpage=ceil($count1 / $limit);



 if ($pagenum > $totalpage) {
 header("location:jobs.php?page=$totalpage");
}
else{

echo "";

}


          // if no users yet
          if ($countres == 0) 
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
            while ($row = mysql_fetch_array($sqlres)) 
            {  
               $posid= $row["posid"];
               $pos= $row["postitle"];
               $odate = $row["opening_date"];
               $cdate= $row["closing_date"];
               $st = $row["status"];

            

?>
 



              <input type = 'hidden' name = 'posid' value = <?php echo '$posid'; ?>>
                <tr class='record' onmouseover='this.style.backgroundColor=#0080FF;'  onmouseout='this.style.backgroundColor=#d4e3e5;'>

                  <td style='overflow:hidden; width:220px;' align='center'> <a id='pos' href="viewjobsapps.php?idjob=<?php echo $posid;?>&st=Unprocessed&ocst=<?php echo $st; ?>"><?php echo $pos; ?></td>
                  <td style='overflow:hidden; width:220px;' align='center'> <?php echo $st; ?></td>
                  <td style='overflow:hidden; width:220px;' align='center'> <?php echo date('F d, Y', strtotime($odate)); ?></td>
                  <td style='overflow:hidden; width:220px;' align='center'> <?php echo date('F d, Y', strtotime($cdate)); ?></td>
                  <?php
                  $totalapp = mysql_query("SELECT count(*) as total from applicant_info where posid='$posid'");
                  $rowf=mysql_fetch_array($totalapp);

                  $tot=$rowf['total'];


                  ?>
                   <td style='overflow:hidden; width:220px;' align='center'><a id='st' href="viewjobsapps.php?idjob=<?php echo $posid;?>&st=Unprocessed&ocst=<?php echo $st; ?>"> <?php echo $tot; ?></td>
                  <td style='overflow:hidden; width:220px;' align='center'> <center>
                  <a href="viewpos.php?posid=<?php echo $posid;?>"><img src="../images/view.jpg" width="30px" height="30px"></a> 
                  <a href="editjobs.php?posid=<?php echo $posid?>"><img src="../images/edit.jpg" width="30px" height="30px"></a>
                  <a href = "#" jid =" <?php echo $posid ?>" class="delbutton"> 
                    <img src="../images/delete.png" width="30px" height="30px"></a></center></td>

                  </td>
                </tr>
           

              <?php
          } // end of while
        }

        echo "  </table>";
         }// end of else
?>


 <br><br>
 <?php


if($pagenum > 1){

  ?>
<br>
<a id='prev' href="jobs.php?page=<?php echo $pagenum-1; ?>&st=<?php echo $stat;?>"> Previous </a>
<br><br>

<?php
}
if($pagenum < $totalpage){

  
?>
<br>
<a id='next' href="jobs.php?page=<?php echo $pagenum+1; ?>&st=<?php echo $stat;?>"> Next </a>
<br>
<br>






<?php
}



else{

  echo mysql_error();
}



  ?>
</div>

<script type="text/javascript" language="javascript1.2" src="../styles/menu.js"></script>

<script src="../js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("jid");

//Built a url to send
var info = 'jid=' + del_id;
 if(confirm("Delete job post?"))
      {

 $.ajax({
   type: "GET",
   url: "config/delete.php",
   data: info,
   success: function(){
    window.location.href="Jobs.php?st=all";
    
   }
   
   });
        
 }

return false;

});

});
</script>

</body>
</html>