<?
// Turn off all error reporting
error_reporting(0);
?>
<html>
<head>
  <title> Admin </title>
<!--  ULTIMATE DROPDOWN MENU v3.4.1 by Brothercake  -->
<!--  http://www.brothercake.com/dropdown/  -->

<!--  Include styles  -->
    <?php
    require_once('../styles.php');
    
    ?>
</head>

<body>
  <!--  add/view user -->
<div class="nav">
    <div class="box"><img src="../images/adduser.jpg" width="30px" height="30px"><a href="index.php">  Add Users  </a></div>
    <div class="box"><img src="../images/users.jpg" width="30px" height="30px"><a href="a_viewus.php">  View Users  </a></div>
</div>


<div class="nusLayout">

<div class="formLayout">
  <?php
   $getid=$_GET['us'];
    require_once('config/dbadmin.php');

    $sql= mysql_query("select * from tbl_user where userid='$getid'");
    $row = mysql_fetch_array($sql);

$name=$row['name'];
$us=$row['username'];
$ps=$row['password'];
$al=$row['acceslevel'];

  
  ?>



<h4>  Update user Account</h4>

  
   <!--  Adding of User Form  -->
  <form action="" method="POST" autocomplete="off">
        <label> Name :</label><input  name="name" type="text" maxlength="50" value="<?php echo $name; ?>" ><br>
        <label>Username :</label><input name="us" type="text" maxlenght="50" value="<?php echo $us; ?>"><br>
        <label>Password :</label><input name="ps" type="password" maxlength="50" value="<?php echo $ps; ?>"><br>
        <label>Confirm Password :</label><input id="cps" name="cps" type="password" maxlength="50" value="<?php echo $ps?>"><br>
                <label>Access Level :</label>
                  <select name="level">
                      <option value=""></option>
                      <option <?=($al=="Human Resource")? "selected='selected'":''?> value="Human Resource">Human Resource</option>
                      <option <?=($al=="Administrator")? "selected='selected'":''?> value="Administrator">Administrator</option>
                  </select><br><br>
        <input type="submit" value="Update" name="updateus" id="upus">
    </form> 
    <!--  end of form -->
    <br><br>
</div></div>

<script type="text/javascript" language="javascript1.2" src="../styles/menu.js"></script>
</body>
</html>