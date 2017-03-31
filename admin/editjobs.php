
<html>
<head>
  <title>  Job Opening </title>
    <!--  ULTIMATE DROPDOWN MENU v3.4.1 by Brothercake  -->
    <!--  http://www.brothercake.com/dropdown/  -->
    <?php
    require_once('../styles.php');
    ?>
</head>
<body>
  

<div class="jobformlayout">

   <img src="../images/editjobs.png" width="100px" height="100px"><h3>  Update Job Opening</h3>
<br>
   <?php
   $getid=$_GET['posid'];
    require_once('config/dbadmin.php');


$sql= mysql_query("select * from jobs_opening where posid='$getid'");
$row = mysql_fetch_array($sql);


$pos= $row['postitle'];
$res=$row['Responsibilities'];
$req=$row['Requirements'];
$st=$row['status'];
$odate=$row['opening_date'];
$cdate=$row['closing_date'];

$odatearray = explode('-',$odate);
$cdatearray = explode('-',$cdate);


  ?>
 
<form action="" method="POST" autocomplete="off">

        <label> Position Title:</label><input id="name" name="pos" type="text" maxlength="50" value="<?php echo $pos;?>"><br>
        <label>Opening Date :</label>
            <?php
            // Months
             
              $month = array ("01"=>"January", "02"=>"February", "03"=> "March", "04"=>"April", "05"=>"May", "06"=>"June", "07"=>"July", "08"=>"August", "09"=>"September", "10"=>"October", "11"=>"November", "12"=>"December");
              $select = "<select name='omonth'>\n";
              foreach ($month as $key => $val) 
              {
                  $select .= "\<option value=\"".$key."\"";
                  if ($key == $odatearray[1]) 
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
              echo " <select name='odate'>";
                for($day=1; $day <=31; $day++)
                  {
                    if(strlen($day)==1)
                    {
                      $day="0".$day;
                    }

                    if($day==$odatearray[2])
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
              echo " <select name='oyr'>";
                for($year=date('Y'); $year <=2060; $year++)
                  {

                    if($year==$odatearray[0])
                      {
                        echo"<option value='$year' selected='selected' > ".$year." </option>";
                      }         
                    else
                      {
                        echo "<option value='$year'> ".$year." </option>";
                      }          
                  }
                  echo "</select>"; 
             ?>
        <br>
        <label>Closing Date:</label>
            <?php
            // Months
              $c_month = date("m");
              $sel_cmonth = "<select name='cmonth'>\n";
              foreach ($month as $key => $val) 
              {
                  $sel_cmonth .= "\<option value=\"".$key."\"";
                  if ($key == $cdatearray[1]) 
                  {
                      $sel_cmonth .= " selected=\"selected\">".$val."</option>\n";
                  } else 
                  {
                      $sel_cmonth .= ">".$val."</option>\n";
                  }
              }

              $sel_cmonth .= "</select>";
              echo $sel_cmonth;
        
              // Date
              echo " <select name='cdate'>";
                for($cdate=1; $cdate <=31; $cdate++)
                  {
                    if(strlen($cdate)==1)
                    {
                      $cdate="0".$cdate;
                    }

                    if($cdate==$cdatearray[2])
                    {
                      echo "<option value='$cdate' selected='selected'> ".$cdate." </option>";
                    }

                    else
                     {
                      echo "<option value='$cdate'> ".$cdate." </option>";
                     }
                    
                  }
                    echo "</select>"; 

              //Year
              echo " <select name='cyr'>";
                for($cyear=date('Y'); $cyear <=2060; $cyear++)
                  {

                    if($cyear==$cdatearray[0])

                    {
                        echo "<option value='$cyear' selected='selected'> ".$cyear." </option>";
                    }
                    else
                      {
                        echo "<option value='$cyear'>".$cyear."</option>";
                      }

                    }
                  echo "</select>"; 
             ?><br>
         <label>Status:</label>
         <select name="st">
          <option value=""> </option>
          <option <?=($st=="Open")? "selected='selected'":''?> value="Open"> Open </option>
          <option <?=($st=="Close")? "selected='selected'":''?> value="Close"> Close </option>
        </select><br>
        <label>  Responsibilities:</label>
        <textarea rows="10" cols="100" name="res"><?php echo $res; ?></textarea>  <br>
        <label>  Requirements:</label><textarea rows="10" cols="100" name="req"> <?php echo $req; ?></textarea>
        <br>
        <input type="submit" value="Save" name="editjob">
    </form> 
</div>
<script type="text/javascript" language="javascript1.2" src="../styles/menu.js"></script>
</body>
</html>