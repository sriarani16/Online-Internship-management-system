<?php
include('dbcon.php');
ob_start();
session_start();
if (! $_SESSION['userid']) {
    // User not logged in, redirect to login page
    Header("Location: login.php");
} else if ($_SESSION["user_post"] != 5) {
    Header("Location: login.php");
}
$userid=$_SESSION['userid'];
$cat=$_POST['cat'];
$mar=$_POST['marks'];



                              
							
    


$sql="INSERT INTO marking (company, category,catmark) VALUES(
				
					'".$userid."',
					'".$cat."',
					'".$mar."')";
					
					if(!mysql_query($sql,$con)){
						//echo 'error'. mysql_error();
						Header("Location: CreateMarking.php");
					}
					else{
						
						Header("Location: CreateMarking.php");
					}
		
?>