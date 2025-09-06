<?php

ob_start();
include ('dbcon.php');
//$con = mysql_connect($host,$user,$password);

$im=$_POST['im'];
$f_name=$_POST['fname'];
$l_name=$_POST['lname'];
$gender=$_POST['gender'];
$email=$_POST['email'];
$pwd=$_POST['pwd'];
$pwd1=  md5($pwd);
$phone=$_POST['phone'];
$active='1';
$post='2';


  


$sql="INSERT INTO student (im_no,fname,lname,gender,email,phone) VALUES(
					'".$im."',		
					'".$f_name."',
					'".$l_name."',
					'".$gender."',
					'".$email."',
					'".$phone."')";


					
					if(!mysql_query($sql,$con)){
                                           
						echo 'error'. mysql_error();
					   //Header("Location: AdminAddStudent.php");
					}
					else{
                                            
						$sql_u="INSERT INTO login (email,password,post,active) VALUES(
					
					'".$im."',
					'".$pwd1."',
					'".$post."',
					'".$active."')";
					mysql_query($sql_u,$con);
						//echo $time_stamp;
						//echo(date_default_timezone_get());
						Header("Location: AdminAddStudent.php");
					}
		
?>