<?php

session_start();
ob_start();
include('dbcon.php');




$im=$_POST['im'];


$sql="DELETE FROM student  WHERE  im_no='".$im."'";
					
					if(!mysql_query($sql,$con)){
						//echo 'error'. mysql_error();
						Header("Location: kk.php");
					}
					else{
					$sqll="DELETE FROM login WHERE email='".$im."'";
						mysql_query($sqll,$con);
						Header("Location: viewstudentadmin.php");
					}
		
?>