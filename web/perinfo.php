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
    require_once('../webstyle.php');
    require_once('../admin/config/conn.php');
    ?>
</head>
<body>
  

<div class="jobformlayout">
  <?php
    $getid=strip_tags($_GET['id']);
    $sql=mysql_query("Select * from jobs_opening where posid = '$getid'");
    $row=mysql_fetch_array($sql);

  ?>

  <br>
<form action="" method="POST" autocomplete="off">
<h4><center>Position applying for : <?php echo $pos; ?> </center></h4>
<br>
   <img src="../images/profile.jpg" width="100px" height="100px"><h3>  Personal Information</h3>
<br>
   <?php
    require_once('../admin/config/dbadmin.php');
  ?>
 

  <h2>Step <font color="red"> 1 </font> of  4 </h2>


  <div>

    <p>

       Please fill out the form properly. Fields with a (<font color="red"> * </font>) are required.
 </p>


  </div>
    <br>
<input type="hidden" name="posid" value="<?php echo $getid;?>">

        <label> Salary Expectation <font color="red">* </font> </label><input name="se" type="text" maxlength="20" autofocus> <font color="red"> Numeric only</font><br>
        <label>Firstname <font color="red">* </font></label><input name="fn" type="text" maxlength="50"><br>
        <label>Middlename <font color="red">* </font></label><input name="mn" type="text" maxlength="50"><br>
        <label>Lastname <font color="red">* </font></label><input name="ln" type="text" maxlength="50"><br>
        <label>Nickname <font color="red">* </font></label><input name="nn" type="text" maxlength="50"><br>
        <label>Present Address:<font color="red">* </font></label><textarea rows="10" cols="100" name="add"></textarea><br>
        <label>Contact No. <font color="red">* </font></label><input name="cn" type="text" maxlength="50"><br>
        <label>Email Address <font color="red">* </font></label><input name="eadd" type="text" maxlength="50"><br>
        <label>Birthdate <font color="red">* </font></label>
           <?php
            // Months
              $cmonth = array ("01"=>"January", "02"=>"February", "03"=> "March", "04"=>"April", "05"=>"May", "06"=>"June", "07"=>"July", "08"=>"August", "09"=>"September", "10"=>"October", "11"=>"November", "12"=>"December");
              $select = "<select name='bmonth'>\n";
              $select .= "\<option value=''";
              $select .= " selected=\"selected\">MM</option>\n";
              foreach ($cmonth as $key => $val) 
              {
                  $select .= "\<option value=\"".$key."\"";
                  $select .= ">".$val."</option>\n";
                      
              }
              $select .= "</select>";
              echo $select;
        
              // Date
              echo " <select name='bdate'>";
               echo"\<option value='' selected=\"selected\">DD</option>\n";
                for($day=1; $day <=31; $day++)
                  {
                     if(strlen($day)==1)
                     {
                       $day = "0".$day;
                     }
                    if($day==date('d'))
                    {

                      echo "<option value='$day'> ".$day." </option>";
                    }
                    else
                    {
                       echo "<option value='$day'> ".$day." </option>";

                    }
                  }
                    echo "</select>"; 

              //Year
              echo " <select name='byr'>";
               echo"\<option value='' selected=\"selected\">YYYY</option>\n";

                for($year=date('Y'); $year >=1960; $year--)
                  {
                   echo "<option value='$year'> ".$year." </option>";
                  }
                  echo "</select>"; 
             ?>
        <br>

      <label>Birthplace <font color="red">* </font></label><input name="bpl" type="text" maxlength="50"><br>
      <label>Gender <font color="red">* </font></label>
         <div class="div"><input  name="gen" type="radio" value="Female"> Female</input></div>
         <div class="div"><input  name="gen" type="radio" value="Male"> Male </div><br>
      <label>Civil Status <font color="red">* </font></label>
          <select name="cs">
            <option value=""> </option>
            <option value="Single"> Single</option>
            <option value="Married"> Married</option>
          </select><br>

     <label>Name of Spouse </label><input name="nsp" type="text" maxlength="50"><br>
     <label>Occupation of Spouse </label><input name="osp" type="text" maxlength="50"><br>
     <label>Employer of Spouse </label><input name="esp" type="text" maxlength="50"><br>
     <label>No. of Children </label><input name="ch" type="text" maxlength="50"><br>
     
     <input type="submit" value="Save and Proceed to Educational Background" name="perinfo">
  </form> <br>
  <div align='left'><a href="index.php"> <h2> Back </h2></a></div>

</div>
<script type="text/javascript" language="javascript1.2" src="../styles/menu.js"></script>
</body>
</html>