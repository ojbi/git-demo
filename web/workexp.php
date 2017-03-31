
<html>
<head>
  <title>  Job Opening </title>
    <!--  ULTIMATE DROPDOWN MENU v3.4.1 by Brothercake  -->
    <!--  http://www.brothercake.com/dropdown/  -->
    <?php
   session_start();
    require_once('../webstyle.php');
    require_once('../admin/config/conn.php');
   
$perid = $_SESSION['perid'];
    ?>
</head>
<body>
  
<?php

$sql=mysql_query("SELECT * from work_info where per_id = '$perid'");
$row=mysql_num_rows($sql);


if($row > 0)
{



echo "  <div class='eductablelayout'>
  <table class='hovertable' align = 'center'>
  <tr>
    <th style='height:50px; width:350px;' >Company</th>
    <th style='height:50px; width:300px;'>Position</th>
    <th style='height:50px; width:300px;'>Date</th>
    <th style='height:50px; width:300px;'>Reason Leaving</th>
    <th style='height:50px; width:300px;'>Salary</th>
    <th style='height:50px; width:150px;'>Edit/delete</th>
  </tr>

";
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
              
                <tr class='record'>

                  <td style='overflow:hidden; width:300px;' align='center'>$comp</td>
                  <td style='overflow:hidden; width:296px;' align='center'> $pos</td>
                  <td style='overflow:hidden; width:300px;' align='center'> FROM : $fromd   <br>TO : $tod </td>
                  
                   <td style='overflow:hidden; width:296px;' align='center'>  $res </td>
                    <td style='overflow:hidden; width:296px;' align='center'>  $sal</td>
                  <td style='overflow:hidden; width:150px;' align='center'> <center>
                  
                  <a href='editwork.php?workid=$workid'><img src='../images/edit.jpg' width='30px' height='30px'></a>
                  <a href = '#' workid = '$workid' class='delbutton'> 
                    <img src='../images/delete.png' width='30px' height='30px'></a></center></td>

                  </td>
                </tr>
            ";

              
          } // end of while
       

       echo " </table>";

        } // end of else

        else{


echo mysql_error();


        }

?>
</div>





<div class="workformlayout">

   <img src="../images/workexp.jpg" width="100px" height="100px"><h3>  Work Experience</h3>
<br>
   <?php
    require_once('../admin/config/dbadmin.php');
  ?>
 
<form action="" method="POST" autocomplete="off">
    <h2>Step <font color="red"> 3 </font> of  4 </h2>


    <br>
    <div align="center"><label>Company :</label></div><input name="comp" type="text" maxlength="50" autofocus><br>
    <div align="center"> <label>Position :</label></div><input name="pos" type="text" maxlength="50"><br>
 <div align="center"><label>Nature of work :<br>      (with a short job description)</label></div><textarea cols="20" rows="10" name='nt'></textarea><br>
        <div align="center"> <label>Exclusive Dates :</label> </div><div id='date'>From:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;To:</div>


        
        <?php
       // Months

              $cmonth = array ("01"=>"January", "02"=>"February", "03"=> "March", "04"=>"April", "05"=>"May", "06"=>"June", "07"=>"July", "08"=>"August", "09"=>"September", "10"=>"October", "11"=>"November", "12"=>"December");
              $select = "<select name ='fmo'>\n";
              $select .= "<option value=''";
              $select .= " selected=\"selected\">MM</option>\n";
              foreach ($cmonth as $key => $val) 
              {
                  $select .= "<option value=\"".$key."\"";
                  $select .= ">".$val."</option>\n";
                      
              }
              $select .= "</select>";
              echo $select;

             
               echo " <select name='fdate'>";
               echo "<option value='' selected='selected'> DD </option>";
                for($day=1; $day <=31; $day++)
                  {
                    if(strlen($day)==1)
                    {
                      $day="0".$day;
                    }

                    if($day==date('d'))
                    {
                      echo "<option value='$day'> $day </option>";
                    }

                    else
                     {
                      echo "<option value='$day'> ".$day." </option>";
                     }
                    
                  }
                    echo "</select>"; 


                    // Date
              echo " <select name ='fyr'>";
               echo"<option value='' selected='selected'>YYYY</option>\n";
                for($yr=date('Y'); $yr>=1960; $yr--)
                  {
                    
                      echo "<option value='$yr'> ".$yr." </option>";
                    }
                    echo "</select>"; 
 // Months

              $select = "<select name ='tmo'>\n";
              $select .= "<option value =''";
              $select .= " selected=\"selected\">MM</option>\n";
              foreach ($cmonth as $key => $val) 
              {
                  $select .= "<option value =\"".$key."\"";
                  $select .= ">".$val."</option>\n";
                      
              }
              $select .= "</select>";
              echo $select;


            // Date
              echo " <select name ='tdate'>";
               echo"\<option value='' selected=\"selected\">DD</option>\n";

                for($tday=1; $tday <=31; $tday++)
                  {
                    if(strlen($tday)==1)
                    {
                      $tday = "0".$tday;
                    }

                    if($tday==date('d'))
                    {

                     echo "<option value='$tday'> $tday </option>";
                    }

                    else
                     {
                      echo "<option value='$tday'> ".$tday." </option>";
                     }
                   }
                   echo "</select>";


                    // Date
              echo " <select name ='tyr'>";
               echo"\<option value='' selected=\"selected\">YYYY</option>\n";
                for($tyr=date('Y'); $tyr>=1960; $tyr--)
                  {
                    
                      echo "<option value ='$tyr'> ".$tyr." </option>";
                    }
                    echo "</select>"; 




?> <br> <div align="center"><label>Reason for Leaving :<br>
      (with a short description)</label></div><textarea cols="20" rows="10" name='res'></textarea><br>
       <div align="center">  <label>Salary :</label></div><input name="sal" type="text" maxlength="50"><br>


     <input type="submit" value="Save Work Experience" name="workinfo" id="work">
     <br><br>
    <div align='right'><a href="ref.php"><h2> Proceed to Reference</h2></a></div>
       </form> 
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
var del_id = element.attr("workid");

//Built a url to send
var info = 'workid=' + del_id;
 if(confirm("Delete Work Experince ?"))
      {

 $.ajax({
   type: "GET",
   url: "../admin/config/delete.php",
   data: info,
   success: function(){
window.location.href="workexp.php";
   }
 });
        
    

 }

return false;

});

});
</script>





</body>
</html>