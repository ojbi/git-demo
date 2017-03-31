
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

  <div class="main">
  
  


  <div class="formlayout">



  
    
      <h4> Log In</h4>
  
    <?php
require_once('../admin/config/dbadmin.php');
?>
    <form action="#" method="POST" autocomplete="off">

  


  <label>Username :</label><input id="us" name="us" type="text" maxlenght="50" autofocus><br>
        <label>Password :</label><input id="ps" name="ps" type="password" maxlength="50"><br><br>

        <input type="submit" value="Log in" name="log" id="log">
<br></form>
  </div>
  




</div>

<script type="text/javascript" language="javascript1.2" src="../styles/menu.js"></script>
</body>
</html>