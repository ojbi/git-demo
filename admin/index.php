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

<div class="userLayout">
<h4>  Add New user</h4>
<br><br>
  <?php
    require_once('config/dbadmin.php');
  ?>

   <!--  Adding of User Form  -->
  <form action="" method="POST" autocomplete="off">
        <label> Name :</label><input id="name" name="name" type="text" maxlength="50" autofocus><br>
        <label>Username :</label><input id="us" name="us" type="text" maxlenght="50"><br>
        <label>Password :</label><input id="ps" name="ps" type="password" maxlength="50"><br>
        <label>Confirm Password :</label><input id="cps" name="cps" type="password" maxlength="50"><br>
                <label>Access Level :</label>
                  <select id="level" name="level">
                      <option value=""></option>
                      <option value="Human Resource">Human Resource</option>
                      <option value="Administrator">Administrator</option>
                  </select><br><br>
        <input type="submit" value="Save" name="addus" id="ussave">
    </form> 
    <!--  end of form -->
    <br><br>
</div></div>

<script type="text/javascript" language="javascript1.2" src="../styles/menu.js"></script>
</body>
</html>