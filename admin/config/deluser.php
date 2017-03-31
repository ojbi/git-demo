<?php



require_once('conn.php');
	$getid = strip_tags($_GET['us']);
	 // DELETE QUERY
		mysql_query("DELETE FROM tbl_user WHERE userid = '$getid' ");
	      echo "<script>
				   alert('Record Deleted.'); location.href ='../a_viewus.php';
			    </script>";
}
// end of deleting user

?>