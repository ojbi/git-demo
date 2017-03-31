<?php



// delete educ info
require_once('conn.php');
if($_GET['id'])
{
$id=$_GET['id'];

 $sql = "delete from educ_info where educid='$id'";
 mysql_query( $sql);


}

// delete user

if($_GET['userid'])
{
$uid=$_GET['userid'];

 $sql = "delete from tbl_user where userid='$uid'";
 mysql_query( $sql);

}


// delete jobs


if($_GET['jid'])
{

$jid= $_GET['jid'];
$sql= "delete from jobs_opening where posid = '$jid'";
mysql_query($sql);


}

//delete work exp

if($_GET['workid'])
{

	$workid=$_GET['workid'];
	$sql="delete from work_info where workid = '$workid'";
	mysql_query($sql);
}
?>