<?php
include('dbcon.php');
ob_start();
$name=$_POST['Cname'];
$web=$_POST['web'];
$dis=$_POST['dis'];
$email=$_POST['email'];
$pwd=$_POST['pwd'];
$pwd1=  md5($pwd);
$phone=$_POST['phone'];
$active='1';
$post='5';


                                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "logo/" . $_FILES["image"]["name"]);
                                $location = "logo/" . $_FILES["image"]["name"];
		
?>
<html>
<body>
<h1><?php echo $email?></h1>
</body>
</html>
	<?php							
							
    


$sql="INSERT INTO company (name,web,description,email,phone,logo) VALUES(
					'".$name."',
					'".$web."',
					'".$dis."',
					'".$email."',
					'".$phone."',
					'".$location."')";
					
					if(!mysql_query($sql,$con)){
						echo 'error'. mysql_error();
						//Header("Location: AdminAddCompany.php");
					}
					else{
						$sql_u="INSERT INTO login (email,password,post,active) VALUES(
					
					'".$email."',
					'".$pwd1."',
					'".$post."',
					'".$active."')";
					mysql_query($sql_u,$con);
						//echo $time_stamp;
						//echo(date_default_timezone_get());
						Header("Location: AdminAddCompany.php");
					}
		
?>