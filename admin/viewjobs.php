
<html>
<head>
  <title>  Admin </title>
<!--  ULTIMATE DROPDOWN MENU v3.4.1 by Brothercake  -->
<!--  http://www.brothercake.com/dropdown/  -->

<!-- Includes styles -->
<?php
require_once('../styles.php');
require_once('config/conn.php');
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
 
<!-- adding/viewing of users -->
<div class="nav">
   <div class="box"><img src="../images/adduser.jpg" width="30px" height="30px"><a href="index.php">  Add Users  </a></div>
    <div class="box"><img src="../images/users.jpg" width="30px" height="30px"><a href="a_viewus.php">   View Users  </a></div>
</div>
<!--Div for Table Users -->
<div class="tableLayout">
 <center><h3> Users Details </h3></center>

  <?php
    require_once('a_adduser.php');
  ?>

   <table class='hovertable' align = 'center'>
    <tr>
      <th style='height:50px;'>Username</th>
      <th style='height:50px;'>Name</th>
      <th style='height:50px;'>Access</th>
      <th style='height:50px;'>Delete</th>
    </tr>

    </table>

  <?php
        //retriev all users
        $sql=mysql_query("Select * from tbl_user")or die (mysql_error());
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
               $userid= $row["userid"];
               $name = $row["name"];
               $us= $row["username"];
               $level = $row["acceslevel"];
  ?>
               
              <table class = 'hovertable'  style='table-layout:fixed; width:400px' align = 'center'>   
              <input type = 'hidden' name = 'us' value = <?php echo '$userid'; ?> 
                <tr onmouseover='this.style.backgroundColor=#0080FF;'  onmouseout='this.style.backgroundColor=#d4e3e5;'>
                  <td style='overflow:hidden; width:220px;' align='center'> <?php echo $name; ?></td>
                  <td style='overflow:hidden; width:220px;' align='center'> <?php echo $us; ?></td>
                  <td style='overflow:hidden; width:220px;' align='center'> <?php echo $level; ?></td>
                  <td style='overflow:hidden; width:220px;' align='center'> <center>
                  <a href = 'config/dbadmin.php?us=<?php echo $userid;?>&command=delete' onclick='return confirmAction()'>
                   <img src='../images/delete.png' width='30px' height='30px'> </center></a></td>
                </tr>
             </table>

    <?php
          } // end of while
        } // end of else
?>
  <!-- End of Table -->
  <br><br>
</div>
<!-- End of Div -->
<script type="text/javascript" language="javascript1.2" src="../styles/menu.js"></script
</body>
</html>