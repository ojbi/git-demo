
<html>
<head>
  <title>  Job Opening </title>
    <!--  ULTIMATE DROPDOWN MENU v3.4.1 by Brothercake  -->
    <!--  http://www.brothercake.com/dropdown/  -->
    <?php
       

   session_start();
    require_once('../webstyle.php');
    require_once('../admin/config/conn.php');
   
$perid = $_SESSION['perid'];

    ?>
</head>
<body>



<?php

$getid = strip_tags($_GET['educid']);
$sel = mysql_query("SELECT * from educ_info WHERE educid = '$getid'");
$rowsel = mysql_num_rows($sel);

if($rowsel > 0)
{
 while ($rowsel = mysql_fetch_array($sel)) {
   
 
               $educids=$rowsel["educid"];
               $educ= $rowsel["educ"];
               $deg=$rowsel["course"];
               $from= $rowsel["fro"];
               $to = $rowsel["to"];
               $hon= $rowsel["hon"];
               $ns = $rowsel["nschool"];
               $adds=$rowsel["addschool"];


}

?>

<div class="jobformlayout">


   <img src="../images/educ.png" width="100px" height="100px"><h3>  Edit Educational Background</h3>
<br>
<?php

require_once('../admin/config/dbadmin.php');
?> 
<form action="" method="POST" autocomplete="off">

  <div>

      <h2>Step <font color="red"> 2 </font> of  4 </h2>
    <p>

       Please fill out the form properly. Fields with a (<font color="red"> * </font>) are required.
 </p>
  </div>
    <br>

        <label> Education <font color="red">* </font> </label>
        <select name='educ' class='educ'>
            <option value='' > </option>
            <option <?=($educ=="High School Diploma")? "selected='selected'":''?>  value='High School Diploma'> High School Diploma</option>
            <option <?=($educ=="Vocational Diploma/Short Courses Certificate")? "selected='selected'":''?> value='Vocational Diploma/Short Courses Certificate'> Vocational Diploma/Short Courses Certificate </option>
            <option <?=($educ=="College Diploma")? "selected='selected'":''?> value='College Diploma'>College Diploma </option>

        </select>


        <br>
        <label>Course / Degree <font color="red"> </font></label><input name="deg" type="text" maxlength="50" value="<?php echo $deg;?>"><br>
        <label>  Year Attended<font color="red">* </font></label>
              <?php
              echo "<select name='from'>FROM";
               echo"<option value='$from' selected=\"selected\"> $from</option>\n";

                for($year=date('Y'); $year >=1960; $year--)
                  {
                   echo "<option value='$year'> ".$year." </option>";
                  }
                  echo "</select>"; 

                   echo " <select name='to'>";
               echo"<option value='$to' selected=\"selected\">$to</option>\n";

                for($year=date('Y'); $year >=1960; $year--)
                  {
                   echo "<option value='$year'> ".$year." </option>";
                  }
                  echo "</select>";

                
             ?>



        <br>

      <label>Honors Received </label><textarea cols="20" rows="10" name="hon"> <?php echo $hon; ?></textarea><br>
      
     <label>Name of  School <font color="red">* </font></label><input name="sn" type="text" maxlength="50" value="<?php echo $ns; ?>"><br>
 <label>Address of School <font color="red">* </font></label><input name="sa" type="text" maxlength="50" value="<?php echo $adds; ?>"><br>
     <input type="submit" value="Update Education" name="upeduc"> <br><br>
    <div align='right'><a href="workexp.php"> <h2> Proceed to Employment </h2></a></div>
     <br><br>
  </form>

<?php
}
?>

</div>
<script type="text/javascript" language="javascript1.2" src="../styles/menu.js"></script>
<script src="../js/jquery.js"></script>
  <script type="text/javascript">
$(function() {


$(".delbutton").click(function(){

//Save the link in a variable called element
var element = $(this);

//Find the id of the link that was clicked
var del_id = element.attr("id");

//Built a url to send
var info = 'id=' + del_id;
 if(confirm("Delete Educational Background ?"))
      {

 $.ajax({
   type: "GET",
   url: "config/delete.php",
   data: info,
   success: function(){
window.location.href="eduinfo.php";
   }
 });
        
    

 }

return false;

});

});
</script>

</body>
</html>