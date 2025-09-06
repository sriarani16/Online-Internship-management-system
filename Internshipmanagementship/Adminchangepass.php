<?php
include('dbcon.php');
ob_start();
session_start();
include('dbcon.php');
if (! $_SESSION['userid']) {
    // User not logged in, redirect to login page
    Header("Location: ll.php");
} else if ($_SESSION["user_post"] != 1) {
    Header("Location: kk.php");
}

$user=$_SESSION['userid'];

$pwd=$_POST['pwd'];

$pwd1=  md5($pwd);


$sql="UPDATE login SET password='".$pwd1."' WHERE email='".$user."'";
					
					if(!mysql_query($sql,$con)){
						//echo 'error'. mysql_error();
						Header("Location: Adminchangepassword.php");
					}
					else{
						
						Header("Location: AdminIndex.php");
					}
		
?>