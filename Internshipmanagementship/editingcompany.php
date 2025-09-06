<?php
ob_start();
include('dbcon.php');
$id=$_POST['id'];
$name=$_POST['Cname'];
$web=$_POST['web'];
$dis=$_POST['dis'];
$email=$_POST['email'];

$phone=$_POST['phone'];


$sql="UPDATE company SET name='".$name."',web='".$web."',description='".$dis."',email='".$email."',phone='".$phone."' WHERE id='".$id."'";
					
					if(!mysql_query($sql,$con)){
						//echo 'error'. mysql_error();
						Header("Location: kk.php");
					}
					else{
						
						Header("Location: viewcompany.php");
					}
		
?>