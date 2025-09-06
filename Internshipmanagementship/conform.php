<?php
session_start();
ob_start();
include('dbcon.php');
if (! $_SESSION['userid']) {
    // User not logged in, redirect to login page
    Header("Location: login.php");
} else if ($_SESSION["user_post"] != 2) {
    Header("Location: login.php");
}
$userid=$_SESSION['userid'];

 if(isset($_GET['comid'])){
   $comid=$_GET['comid'];
 
$sql="UPDATE interview SET conform='1' WHERE company='".$comid."' and im_no='".$userid."'";
					
					if(!mysql_query($sql,$con)){
						//echo 'error'. mysql_error();
						Header("Location: Profilestudent.php");
					}
					else{
						
						Header("Location: Profilestudent.php");
					} 
 
 
 
 
 
 
 
}





?>