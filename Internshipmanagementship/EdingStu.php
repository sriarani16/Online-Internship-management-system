<?php
ob_start();
include('dbcon.php');
$im=$_POST['im'];
$f_name=$_POST['fname'];
$l_name=$_POST['lname'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$Phone=$_POST['phone'];
$NIC=$_POST['NIC'];
$DOB=$_POST['DOB'];
$gpa=$_POST['GPA'];
$pre=$_POST['prefer'];


$sql="UPDATE student SET fname='".$f_name."',lname='".$l_name."',gender='".$gender."',email='".$email."',phone='".$Phone."',dateofbirth='".$DOB."',gpa='".$gpa."',preference='".$pre."',nic= '".$NIC."' WHERE im_no='".$im."'";
					
					if(!mysql_query($sql,$con)){
						echo 'error'. mysql_error();
						//Header("Location: Profilestudent.php");
					}
					else{
						
						Header("Location: Profilestudent.php");
					}
		
?>