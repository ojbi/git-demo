
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
        //retriev all users

        $sql=mysql_query("Select * from educ_info WHERE per_id = '$perid'")or die (mysql_error());
        $row=mysql_num_rows($sql);

      

          // if no users yet
          if ($row > 0) 
          {
            
          
        

echo "  <div class='eductablelayout'>
  <table class='hovertable' align = 'center'>
  <tr>
    <th style='height:50px; width:350px;' >Education</th>
    <th style='height:50px; width:300px;'>Course</th>
    <th style='height:50px; width:200px;'>Years Attended</th>
    <th style='height:50px; width:300px;'>School</th>
    <th style='height:50px; width:300px;'>Address</th>
    <th style='height:50px; width:200px;'>Edit/delete</th>
  </tr>

";
          // displaying users
            while ($row = mysql_fetch_array($sql)) 
            {  
               $educid=$row["educid"];
               $educ= $row["educ"];
               $deg=$row["course"];
               $from= $row["fro"];
               $to = $row["to"];
               $hon= $row["hon"];
               $ns = $row["nschool"];
               $adds=$row["addschool"];



 
?>

<input type="hidden" name="educid" value="<?php echo $educid;?>">

<?php

echo "
              
                <tr class= 'record'>

                  <td style='overflow:hidden; width:300px;' align='center'>$educ</td>
                  <td style='overflow:hidden; width:296px;' align='center'> $deg</td>
                  <td style='overflow:hidden; width:196px;' align='center'> FROM : $from   TO : $to</td>
                  
                   <td style='overflow:hidden; width:296px;' align='center'>  $ns </td>
                    <td style='overflow:hidden; width:296px;' align='center'>  $adds</td>
                  <td style='overflow:hidden; width:196px;' align='center'> <center>
                  
                  <a href='editeduc.php?educid=$educid'><img src='../images/edit.jpg' width='30px' height='30px'></a>
                  <a href = '#' id = '$educid' class='delbutton'> 
                    <img src='../images/delete.png' width='30px' height='30px'></a></center></td>

                  </td>
                </tr>
             ";

              
          } // end of while
        echo "</table>"; // }

        }// end of else

        else{


echo mysql_error();


        }
?>
</div>


<div class="jobformlayout">


   <img src="../images/educ.png" width="100px" height="100px"><h3>  Educational Background</h3>
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
        <select name='educ' id='educ'>
            <option value='' > </option>
            <option value='High School Diploma'> High School Diploma</option>
            <option value='Vocational Diploma/Short Courses Certificate'> Vocational Diploma/Short Courses Certificate </option>
            <option value='College Diploma'>College Diploma </option>

        </select>


        <br>
        <label>Course / Degree <font color="red"> </font></label><input name="deg" type="text" maxlength="50"><br>
        <label>  Year Attended<font color="red">* </font></label>
              <?php
              echo "<select name='from'>FROM";
               echo"<option value='' selected=\"selected\">FROM</option>\n";

                for($year=date('Y'); $year >=1960; $year--)
                  {
                   echo "<option value='$year'> ".$year." </option>";
                  }
                  echo "</select>"; 

                   echo " <select name='to'>";
               echo"<option value='' selected=\"selected\">TO</option>\n";

                for($year=date('Y'); $year >=1960; $year--)
                  {
                   echo "<option value='$year'> ".$year." </option>";
                  }
                  echo "</select>";

                
             ?>



        <br>

      <label>Honors Received </label><textarea cols="20" rows="10" name='hon'></textarea><br>
      
     <label>Name of  School <font color="red">* </font></label><input name="sn" type="text" maxlength="50"><br>
 <label>Address of School <font color="red">* </font></label><input name="sa" type="text" maxlength="50"><br>
     <input type="submit" value="Save Education" name="educinfo"> <br><br>
     
    <div align='right'><a href="workexp.php"> <h2> Proceed to Employment </h2></a></div>
     <br><br>
  </form> 
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
   url: "../admin/config/delete.php",
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