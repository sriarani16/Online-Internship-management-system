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

$sql="UPDATE interview SET intdate='".$date."',inttime='".$time."',date='".$today."',active='1' WHERE company='".$comid."' and im_no='".$im."'";
					
					if(!mysql_query($sql,$con)){
						//echo 'error'. mysql_error();
						Header("Location: InterviewSejnlect.php");
					}
					else{
						$sql_stu="SELECT * FROM student WHERE im_no='".$im."'";
			  $result_stu=mysql_query($sql_stu);
			  $row_stu=mysql_fetch_assoc($result_stu);
	
			    $x=$row_stu['interview'];
				$y=$x+1;
						$sql_u="UPDATE student SET interview= '".$y."' WHERE im_no='".$im."'";
					mysql_query($sql_u,$con);
						
						Header("Location: InterviewSelect.php");
					}
		
?>