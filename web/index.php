<?php
// Turn off all error reporting
error_reporting(0);

$limit = 10;
$page = $_GET['page'];
$pagenum = ((isset($page) || !empty($page)) ? $page : 1);
$offset =(($pagenum * $limit) - $limit);

if($page == 0){

header('location:index.php?page=1');

}

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
  
  


<div class="webjoblayout">
   <div class="jobsma">
<img src="../images/jobso.png" width="100px" height="100px"><h3>  Jobs Opening</h3>
</div>
<br><br>
<?php

$sql=mysql_query("SELECT * from jobs_opening ORDER BY opening_date LIMIT $offset, $limit");
$sql1=mysql_query("SELECT * from jobs_opening Where job_status_id='2' ORDER BY opening_date");
$count=mysql_num_rows($sql);
$count1=mysql_num_rows($sql1);
$totalpage=ceil($count1 / $limit);




if ($pagenum > $totalpage) {
 header("location:index.php?page=$totalpage");
}
else{

echo "";

}
if($sql){

  while ($row=mysql_fetch_array($sql)) {
    $id = $row['job_id'];
      $pos = $row['postitle'];
  $odate = date('M. d',strtotime($row['opening_date']));
  $cdate = date('M. d',strtotime($row['closing_date']));
  $reqz =$row['Requirements'];


  $req1 = explode("\n", $reqz);
  


?>
 

  <form action="" method="POST" >
    <input type="hidden" name="id" value ="<?php echo $id;?>">
     <table class = 'jobst'  style='table-layout:fixed; width:700px' align = 'center'>  
        <tr onmouseover='this.style.backgroundColor=#0080FF;'  onmouseout='this.style.backgroundColor=#d4e3e5;'>
            <td style='overflow:hidden; width:220px;' align='left'> 
      <a href="jobdetails.php?id=<?php echo "$id" ?>" id="ajobs"><?php echo $pos; ?></td>


  <td style='overflow:hidden; width:220px;' align='center'>
  <font color="#332C2C" size="3px"> <?php echo "$odate - $cdate"; ?> </td><tr></table>
  </a>
    </font>

  
</form>
  

  


<?php
}

if($pagenum > 1){

  ?>
<br>
<a id='prev' href="index.php?page=<?php echo $pagenum-1; ?>"> Previous </a>
<br><br>

<?php
}
if($pagenum < $totalpage){

  
?>
<br>
<a id='next' href="index.php?page=<?php echo $pagenum+1; ?>"> Next </a>
<br>
<br>






<?php
}
}


else{

  echo mysql_error();
}



  ?>

</div></div>

<script type="text/javascript" language="javascript1.2" src="../styles/menu.js"></script>
</body>
</html>