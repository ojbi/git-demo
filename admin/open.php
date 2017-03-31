
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
<script type="text/javascript">
      function confirmAction(){
        var confirmed = confirm("Are you sure you want to delete this record?");
        return confirmed;
      }
    </script>

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
  <img src="../images/jobsm.png" width="100px" height="100px"><h3>  Open Jobs </h3>
</div>

<?php
//count all jobs
     $sqlall=mysql_query("Select * from jobs_opening")or die (mysql_error());
     $all=mysql_num_rows($sqlall);
     // count open jobs
     $sqlop=mysql_query("Select * from jobs_opening where status='open'")or die (mysql_error());
     $op=mysql_num_rows($sqlop);
    //count close jobs
     $sqlcl=mysql_query("Select * from jobs_opening where status='close'")or die (mysql_error());
     $close=mysql_num_rows($sqlcl);

?>
  <div class="jobstat">
  <h5> Status: <a href="jobs.php">View All (<?php echo $all;?>) </a> | <a href="open.php"> Open ( <?php echo $op; ?>) </a> | <a href="close.php"> Close (<?php echo $close;?>) </a></h5>
</div>

<br>
 <table class="hovertable" align = 'center'>
  <tr>
    <th style='height:50px; width:300px;'>Position Title</th>
    <th style='height:50px; width:300px;'>Status</th>
    <th style='height:50px; width:300px;'>Opening Date</th>
    <th style='height:50px; width:300px;'>Closing Date</th>
    <th style='height:50px; width:300px;'>Total Apps</th>
    <th style='height:50px; width:300px;'>View/Edit/delete</th>


</tr>
</table>


 <?php
        //retriev all users
        $sql=mysql_query("Select * from jobs_opening where status='open'")or die (mysql_error());
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
 


<table class = 'hovertable'  style='table-layout:fixed' align = 'center'>   
              <input type = 'hidden' name = 'posid' value = <?php echo '$posid'; ?>>
                <tr class='record' onmouseover='this.style.backgroundColor=#0080FF;'  onmouseout='this.style.backgroundColor=#d4e3e5;'>

                  <td style='overflow:hidden; width:220px;' align='center'> <?php echo $pos; ?></td>
                  <td style='overflow:hidden; width:220px;' align='center'> <?php echo $st; ?></td>
                  <td style='overflow:hidden; width:220px;' align='center'> <?php echo date('F d, Y', strtotime($odate)); ?></td>
                  <td style='overflow:hidden; width:220px;' align='center'> <?php echo date('F d, Y', strtotime($cdate)); ?></td>
                   <td style='overflow:hidden; width:220px;' align='center'> <?php echo '2'; ?></td>
                  <td style='overflow:hidden; width:220px;' align='center'> <center>
                  <a href=""><img src="../images/view.jpg" width="30px" height="30px"></a> 
                  <a href="editjobs.php?posid=<?php echo $posid?>"><img src="../images/edit.jpg" width="30px" height="30px"></a>
                  <a href = "#" jid =" <?php echo $posid ?>" class="delbutton"> 
                    <img src="../images/delete.png" width="30px" height="30px"></a></center></td>

                  </td>
                </tr>
             </table>

              <?php
          } // end of while
        } // end of else
?>


 <br><br>
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
    window.location.href="Jobs.php";
    
   }
   
   });
        
 }

return false;

});

});
</script>

</body>
</html>