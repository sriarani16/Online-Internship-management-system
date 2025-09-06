<?php
session_start();
ob_start();
include('dbcon.php');
if (! $_SESSION['userid']) {
    // User not logged in, redirect to login page
    Header("Location: login.php");
} else if ($_SESSION["user_post"] != 1) {
    Header("Location: login.php");
}
$userid=$_SESSION['userid'];


 $aDoor = $_POST['student'];
 $company=$_POST['no'];
 $active=0;
 $selection=0;
    $N = count($aDoor);
 
       for($i=0; $i < $N; $i++)
    {
		
$sql="INSERT INTO interview (company,im_no,active,selection) VALUES(
				
					
					'".$company."',
					'".$aDoor[$i]."',
                                        '".$active."',
                                        '".$selection."')";
					
					if(!mysql_query($sql,$con)){
						echo 'error'. mysql_error();
						//Header("Location: AdminIndex.php");
					}
					else{
						
						Header("Location:AdminIndex.php");
					}
		

     
    }
 


?>
