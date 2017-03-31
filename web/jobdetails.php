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
    require_once('../admin/config/dbadmin.php');
    ?>
</head>
<body>

  <div class="main">
  
  <?php

  $getid=strip_tags($_GET['id']);

$sql=mysql_query("select * from jobs_opening where job_id= '$getid'");


if($sql){

  while ($row=mysql_fetch_array($sql)) {
    $id = $row['job_id'];
      $pos = $row['postitle'];
  $odate = date('M. d. y',strtotime($row['opening_date']));
  $cdate = date('M. d. y',strtotime($row['closing_date']));
  $reqz =$row['Requirements'];
 $res =$row['Responsibilities'];

  $req1 = explode("\n", $reqz);
$res1 = explode("\n", $res);

?>


<div class="webjoblayout">
  <div class="jobsweb">

  <br> <br>

  <from action="#" method="POST" >
    <input type="hidden" name="id" value ="<?php echo $id;?>">

<h4> <?php echo $pos; ?></h4>

  <table width="1200px">
  <td><img src="../images/clock.png" width="15px" height="15px">  &nbsp; <font color="#A4AAB1" size="3px"> <?php echo "Opening date: $odate"; ?> </font></td>
  <td><img src="../images/clock.png" width="15px" height="15px">  &nbsp; <font color="#A4AAB1" size="3px"><?php echo "Closing date: $cdate"; ?></font></td>
  </table>  </font>
  
  <h6>Requirements :</h6>
    <ul>
      <?php
      foreach($req1 as $val){
        if(!empty($val)){


        
            ?>
   <li type="square"> <?php  echo str_replace('-', ' ', $val); ?> </li>

<?php
}}
?>
    </ul>


<h6> Responsibilities :</h6>
<ul>
<?php

foreach($res1 as $val1){
  if(!empty($val1)){


            ?>
            
   <li type="square"> <?php  echo str_replace('-', ' ', $val1); ?> </li>

<?php
}}
?>


<br>
 <div align="right"> <a href="perinfo.php?id=<?php echo $id;?> ">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Apply &nbsp;&nbsp;&nbsp; </a></div>
</form>
  </div></div>

  


<?php
}


}


else{

  echo mysql_error();
}


  ?>

</div>

<script type="text/javascript" language="javascript1.2" src="../styles/menu.js"></script>
</body>
</html>