<?php
include('dbcon.php');
session_start();
ob_start();

if (! $_SESSION['userid']) {
    // User not logged in, redirect to login page
    Header("Location: login.php");
} else if ($_SESSION["user_post"] != 5) {
    Header("Location: login.php");
}
$userid=$_SESSION['userid'];

$id=$_POST['id'];
$remark=$_POST['remarks'];
$mark=$_POST['total'];

					
							
    


$sql="INSERT INTO selection (company,im_no,mark,remark) VALUES(
					
					'".$userid."',
					'".$id."',
					'".$mark."',
					'".$remark."')";
					
					if(!mysql_query($sql,$con)){
						//echo 'error'. mysql_error();
						Header("Location: InterviewSchedule.php");
					}
					else{
						$sql_lsd="SELECT * FROM company WHERE email='".$userid."'";
			  $result_lsd=mysql_query($sql_lsd);
			  $row_lsd=mysql_fetch_assoc($result_lsd);
			  			    $comid=$row_lsd['id'];
							
							
							$sql_u="UPDATE interview SET active=2 WHERE company='".$comid."'and im_no='".$id."'";
					mysql_query($sql_u,$con);
						
						Header("Location: InterviewSchedule.php");
					}
		
?>