
<html>
<head>
  <title>  Job Opening </title>
    <!--  ULTIMATE DROPDOWN MENU v3.4.1 by Brothercake  -->
    <!--  http://www.brothercake.com/dropdown/  -->
    <?php
   session_start();
    require_once('../styles.php');
    require_once('../admin/config/conn.php');
   
$perid = $_SESSION['perid'];
    ?>
</head>
<body>
  
<?php
$getid = strip_tags($_GET['workid']);
$sel = mysql_query("SELECT * from work_info WHERE workid = '$getid'");
$row = mysql_num_rows($sel);

if($row > 0)
{

 while($row = mysql_fetch_array($sel))
 {
    
 
              
               $workid =$row['workid'];
               $post= $row["pos"];
               $comp=$row["company"];
               $nt= $row["nature"];
               $from = $row["from"];
               $to= $row["to"];
               $sal = $row["salary"];
               $resn=$row["reason"];



$fromd = explode('-', $from);
$tod = explode('-', $to);

}
?>

<div class="workformlayout">

   <img src="../images/workexp.jpg" width="100px" height="100px"><h3> Edit Work Experience</h3>
<br>
   <?php
    require_once('../admin/config/dbadmin.php');
  ?>
 
<form action="" method="POST" autocomplete="off">
    <h2>Step <font color="red"> 3 </font> of  4 </h2>
    <input type='hidden' name='workid' value = '<?php echo $workid;?>'>

  
    <br>
    <div align="center"><label>Company :</label></div><input name="comp" type="text" maxlength="50" value="<?php echo $comp;?>"><br>
    <div align="center"> <label>Position :</label></div><input name="pos" type="text" maxlength="50" value="<?php echo $post;?>"><br>
 <div align="center"><label>Nature of work :<br>      (with a short job description)</label></div><textarea cols="20" rows="10" name='nt'><?php echo $nt; ?></textarea><br>
        <div align="center"> <label>Exclusive Dates :</label></div>
        <?php
       // Months
              $month = array ("01"=>"January", "02"=>"February", "03"=> "March", "04"=>"April", "05"=>"May", "06"=>"June", "07"=>"July", "08"=>"August", "09"=>"September", "10"=>"October", "11"=>"November", "12"=>"December");
              $select = "<select name='fmo'>\n";
              foreach ($month as $key => $val) 
              {
                  $select .= "\<option value=\"".$key."\"";
                  if ($key == $fromd[1]) 
                  {
                     $select .= " selected=\"selected\">".$val."</option>\n";
                  } else 
                  {
                      $select .= ">".$val."</option>\n";
                  }
              }

              $select .= "</select>";
              echo $select;

             
                // Date
              echo " <select name='fdate'>";
                for($day=1; $day <=31; $day++)
                  {
                    if(strlen($day)==1)
                    {
                      $day="0".$day;
                    }

                    if($day==$fromd[2])
                    {
                      echo "<option value='$day' selected='selected'> ".$day." </option>";
                    }

                    else
                     {
                      echo "<option value='$day'> ".$day." </option>";
                     }
                    
                  }
                    echo "</select>"; 

              //Year
              echo " <select name='fyr'>";
                for($year=date('Y'); $year <=2060; $year--)
                  {

                    if($year==$fromd[0])
                      {
                        echo"<option value='$year' selected='selected' > ".$year." </option>";
                      }         
                    else
                      {
                        echo "<option value='$year'> ".$year." </option>";
                      }          
                  }
                  echo "</select>"; 



                $select = "<select name='tmo'>\n";
              foreach ($month as $key => $val) 
              {
                  $select .= "\<option value=\"".$key."\"";
                  if ($key == $tod[1]) 
                  {
                     $select .= " selected=\"selected\">".$val."</option>\n";
                  } else 
                  {
                      $select .= ">".$val."</option>\n";
                  }
              }

              $select .= "</select>";
              echo $select;


              // Date
              echo " <select name='tdate'>";
                for($tday=1; $tday <=31; $tday++)
                  {
                    if(strlen($tday)==1)
                    {
                      $tday="0".$tday;
                    }

                    if($tday==$tod[2])
                    {
                      

                      echo "<option value='$tday' selected='selected'> ".$tday." </option>";
                    }

                    else
                     {
                      echo "<option value='$tday'> ".$tday." </option>";
                     }
                    
                  }
                    echo "</select>"; 

              //Year
              echo " <select name='tyr'>";
                for($tyear=date('Y'); $tyear <=2060; $tyear--)
                  {

                    if($tyear==$tod[0])
                      {
                        echo"<option value='$tyear' selected='selected' > ".$tyear." </option>";
                      }         
                    else
                      {
                        echo "<option value='$tyear'> ".$tyear." </option>";
                      }          
                  }
                  echo "</select>"; 




?> <br> <div align="center"><label>Reason for Leaving :<br>
      (with a short description)</label></div><textarea cols="20" rows="10" name='res'> <?php echo $resn; ?></textarea><br>
       <div align="center">  <label>Salary :</label></div><input name="sal" type="text" maxlength="50" value="<?php echo $sal;?>"><br>


     <input type="submit" value="Save" name="editwork" id="work">
     <br><br>
    <div align='right'><a href="ref.php"><h2> Proceed to Reference</h2></a></div>
       </form> 
       <?php
}else{

  echo mysql_error();
}
       ?>
  <br><br>
</div>
<script type="text/javascript" language="javascript1.2" src="../styles/menu.js"></script>


</body>
</html>