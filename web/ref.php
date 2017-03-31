
<html>
<head>
  <title>  Job Opening </title>
    <!--  ULTIMATE DROPDOWN MENU v3.4.1 by Brothercake  -->
    <!--  http://www.brothercake.com/dropdown/  -->
    <?php
    require_once('../webstyle.php');
    ?>
</head>
<body>
  

<div class="jobformlayout">

   <img src="../images/ref.jpg" width="100px" height="100px"><h3>&nbsp; References </h3>
<br>
   <?php
    require_once('../admin/config/dbadmin.php');
  ?>
 
<form action="" method="POST" autocomplete="off">

  <div>
    <p>
        <h2>Step <font color="red"> 4 </font> of  4 </h2>

       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Please fill out the form properly. Fields with a (<font color="red"> * </font>) are required.
 </p>
  </div
    <br>
        
        <h5>Reference No. 1</h5>
        <label> Name: <font color="red">* </font> </label><input name="rname" type="text" maxlength="50" autofocus><br>
        <label> Position Title <font color="red">* </font></label><input name="rpos" type="text" maxlength="50"><br>
        <label>Company Name <font color="red">* </font></label><input name="rcomp" type="text" maxlength="50"><br>
        <label>Contact No.<font color="red">* </font></label><input name="rcn" type="text" maxlength="50"><br>
        <label>Relationship <font color="red">* </font></label><input name="rrel" type="text" maxlength="50"><br>
        
        <h5>Reference No. 2</h5>
        <label> Name: <font color="red">* </font> </label><input name="rrname" type="text" maxlength="50"><br>
        <label> Position Title <font color="red">* </font></label><input name="rrpos" type="text" maxlength="50"><br>
        <label>Company Name <font color="red">* </font></label><input name="rrcomp" type="text" maxlength="50"><br>
        <label>Contact No.<font color="red">* </font></label><input name="rrcn" type="text" maxlength="50"><br>
        <label>Relationship <font color="red">* </font></label><input name="rrrel" type="text" maxlength="50"><br><br>
        



     <input type="submit" value="Finish Application" name="finish">
  </form> 
</div>
<script type="text/javascript" language="javascript1.2" src="../styles/menu.js"></script>
</body>
</html>