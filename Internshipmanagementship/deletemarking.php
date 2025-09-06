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

$id=$_POST['id'];


$sql="DELETE FROM marking  WHERE  id='".$id."'";
					
					if(!mysql_query($sql,$con)){
						//echo 'error'. mysql_error();
						Header("Location: CreateMarking.php");
					}
					else{
						
						Header("Location: CreateMarking.php");
					}
		
?>