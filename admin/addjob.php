<?
// Turn off all error reporting
error_reporting(0);
?>
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

   <img src="../images/job.png" width="100px" height="100px"><h3>  Add Job Openings</h3>
<br>
   <?php
    require_once('config/dbadmin.php');
  ?>
 
<form action="" method="POST" autocomplete="off">

        <label> Position Title:</label><input id="name" name="pos" type="text" maxlength="50" autofocus><br>
        <label>Opening Date :</label>
            <?php
            // Months
              $curr_month = date("m");
              $month = array ("01"=>"January", "02"=>"February", "03"=> "March", "04"=>"April", "05"=>"May", "06"=>"June", "07"=>"July", "08"=>"August", "09"=>"September", "10"=>"October", "11"=>"November", "12"=>"December");
              $select = "<select name='omonth'>\n";
              foreach ($month as $key => $val) 
              {
                  $select .= "\t<option value=\"".$key."\"";
                  if ($key == $curr_month) 
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

                    if($day==date('d'))
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
                for($year=date('Y'); $year >=1960; $year--)
                  {
                   echo "<option value='$year'> ".$year." </option>";
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
                  $sel_cmonth .= "\t<option value=\"".$key."\"";
                  if ($key == $c_month) 
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

                    if($cdate==date('d'))
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
                   echo "<option value='$cyear'> ".$cyear." </option>";
                  }
                  echo "</select>"; 
             ?><br>
         <label>Status:</label>
         <select name="st">
          <option value=""> </option>
          <option value="Open"> Open </option>
          <option value="Close"> Close </option>
        </select><br>
        <label>  Responsibilities:</label>
        <textarea rows="20" cols="100" name="res"></textarea><br>
        <label>  Requirements:</label><textarea rows="20" cols="100" name="req"></textarea>
        <br>
        <input type="submit" value="Save" name="addjob">
    </form> 
</div>
<script type="text/javascript" language="javascript1.2" src="../styles/menu.js"></script>
</body>
</html>