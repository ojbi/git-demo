<?
// Turn off all error reporting
error_reporting(0);
?>
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
</head>


<body>


  <div class="jobtop">
<!--Div for Table Users -->

<label> View and manage applicants who applied to jobs opening</label>
<br>
<b> To view jobs opening, select below :</b>
<br>
  <label> Job Opening : </label>
  
<form action="" method="POST">
  

  <select name="job">
    <option value="" selected="selected"> -------------------------------------------- </option>

<?php
$sql = mysql_query("SELECT * from jobs_opening where status ='open'");
while($row=mysql_fetch_array($sql)){


echo mysql_error();

$id=$row['posid'];
$pos= $row['postitle'];



?>

 <option value='<?php echo $id;?>'> <?php echo "$pos ";?> </option>

<?php } ?>


  </select> <a href="jobs.php?st=close"> [View all Closed/ Expired]</a><br>
  <label> ( this comes from your job opening that are open )</label>
  <input type="submit" name="view" value="View Applicants">

<br><br>

<label>Applicants are categorized under each folder. All new applicants goes to unprocessed folder. You can view your applicants by clicking on the folder provided that it has contents. Once you are inside tha folder, you can now move your applicants from one folde to another depending on your assesment on their qualification. </label>

</form>

</div>

<?php
require_once('config/dbadmin.php');
?>






<!-- End of Div -->

<script type="text/javascript" language="javascript1.2" src="../styles/menu.js"></script>

</body>
</html>