<?php

session_start();
ob_start();
include('dbcon.php');
if (! $_SESSION['userid']) {
    // User not logged in, redirect to login page
    Header("Location: login.php");
} else if ($_SESSION["user_post"] != 5) {
    Header("Location: login.php");
}
$userid=$_SESSION['userid'];
$sql_lsd="SELECT * FROM company WHERE email='".$userid."'";
			  $result_lsd=mysql_query($sql_lsd);
			  $row_lsd=mysql_fetch_assoc($result_lsd);
	
			    $comid=$row_lsd['id'];

$im=$_POST['id'];
$time=$_POST['time'];
$date=$_POST['date'];
$today= date("Y/m/d");

$sql="DELETE FROM interview  WHERE company='".$comid."' and im_no='".$im."'";
					
					if(!mysql_query($sql,$con)){
						//echo 'error'. mysql_error();
						Header("Location: InterviewSejnlect.php");
					}
					else{
						
						Header("Location: InterviewSelect.php");
					}
		
?>