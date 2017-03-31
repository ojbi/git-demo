<?
session_start();
require_once("func_all.php");

if($msg) echo "<script>alert('$msg')</script>";

do_html_header(ucfirst($Action)." View Jobs Details");
$formname="thisonly";
$inputname= array("postitle");
$displayname= array("Position Title");
JS_CheckRequired($formname,$inputname,$displayname,"","");

$jobs = getdata_one("*","jobs_opening","job_id",$job_id);
$status = getdata("select * from job_status");

if ($Action=='add'){
	echo "<form method=post action='sqladd.php?what=jobs' name='$formname' onsubmit='return CheckRequired()'>";
}
if ($Action=='edit'){
	echo "<form method=post action='sqlupdate.php?what=jobs&job_id=$job_id' name='$formname' onsubmit='return CheckRequired()'>";
}


?>
<tr><td align="center" valign="top">
		<table border=0 width=70% cellpadding='0' cellspacing='4'>
		<tr><td valign="top"><br>
					<table border=0 cellpadding='0' cellspacing='0' width="100%">
					<tr><td valign="top"><img src="img/addleft.gif" border="0"></td>
					<td background="img/addtile.gif" width="50%"><a href='manage_jobs.php'><b>List of Job Openings</b></a></td>
					<td background="img/addtile.gif" width="50%" align="right"><a href='edit_jobs.php?Action=add'><B>Add job Openings</b></a>&nbsp;</td>
					<td valign="top"><img src="img/addright.gif" border="0"></td></tr>
					</table>
					
					</td></tr>
					 </table>
<form method=post action='sqladd.php?what=jobs' name="<?=$formname?>" onsubmit="return CheckRequired()"  enctype="MULTIPART/FORM-DATA" >
 <tr>
 	<td align=center valign=top>
      <table align=center cellpadding='2' cellspacing='2' border="0"><br>
        <tr><td colspan=2>
          <table border="0" cellpadding="0" cellspacing="0" width=100%>
				<tr>
					<td><img src="img/topleft-login.gif" border="0"></td>
					<td background="img/toptile-login.gif"><img src="img/toptile-login.gif" border="0"></td>
					<td><img src="img/topright-login.gif" border="0"></td>
				</tr>
				<tr><td background="img/midleft-login.gif"><img src="img/midleft-login.gif" border="0"></td>
					<td width="100%" align="center" bgcolor="#dbdee3">
						<table width="100%" cellpadding='3' cellspacing='3'>
								<tr>
									
		     				     	<td colspan=3 class="box" align=center>
		     				     		<h1> <?=$jobs['postitle']?> </h1> </td>
						 		</tr>
						 		<tr>
									<td class="box"><b>Opening Date:</b></td>
		     						<td colspan=3 class="box">
		     					          <? list ($opening_year, $opening_month, $opening_day) = split ('-',date('M d, Y', strtotime($jobs['opening_date']))); ?>
		     					          <?echo "$opening_month $opening_day $opening_year";
		     					          ?>
										 

								 	</td>
								</tr>
								<tr>
									<td class="box"><b>Closing Date:</b></td>
		     						<td colspan=3 class="box">
		     					         <? list ($opening_year, $opening_month, $opening_day) = split ('-',date('M d, Y', strtotime($jobs['closing_date']))); ?>
		     					          <?echo "$opening_month $opening_day $opening_year";
		     					          ?>


								 		 								 	</td>
								</tr>
								<tr>
											     						


		     						<td class="box"><b>Status:</b></td>
		     						<td class="box" colspan=3> <?=getname($jobs['job_status_id'],"job_status","job_status_id")?>     </select>  



		     						</td>

								</tr>
								
								<tr>
									<td class="box" valign=top><b>Responsibilities:</b></td>
		     						<td class="box" colspan=3> 
										<ul>
      										<?

									      $res= explode("\n", $jobs['Responsibilities']);
									      foreach($res as $val){
        										if(!empty($val)){
        									?>
   											<li type="square"> <?php  echo str_replace('-', ' ', $val); ?> </li>

											<?
											}}
											?>
   										 </ul>
		     							



		     						</td>
								</tr>

								<tr>
									<td class="box" valign=top><b>Requirements:</b></td>
		     						<td class="box" colspan=3>
		     							<ul>
      										<?

									      $req= explode("\n", $jobs['Requirements']);
									      foreach($req as $val){
        										if(!empty($val)){
        									?>
   											<li type="square"> <?php  echo str_replace('-', ' ', $val); ?> </li>

											<?
											}}
											?>
   										 </ul>





		     						</td>
								</tr>
								<td colspan=2 align=center>      
<a href="edit_jobs.php?Action=edit&job_id=<?=$job_id?>">Edit Job</a>&nbsp;&nbsp;

								</td>

								
						</table>
	               </td>
	           </tr>
             </table>
         </tr></td>
    </table>
  </td></tr>
</form>
<?
 do_html_footer();
?>