<?php
include('dbcon.php');
ob_start();
session_start();
include('dbcon.php');
if (! $_SESSION['userid']) {
    // User not logged in, redirect to login page
    Header("Location: ll.php");
} else if ($_SESSION["user_post"] != 2) {
    Header("Location: kk.php");
}

$im=$_SESSION['userid'];

$pwd=$_POST['pwd'];
$pwd1=  md5($pwd);



$sql="UPDATE login SET password='".$pwd1."' WHERE email='".$im."'";
					
					if(!mysql_query($sql,$con)){
						//echo 'error'. mysql_error();
						Header("Location: Profilestudent.php");
					}
					else{
						
						Header("Location: Profilestudent.php");
					}
		
?>