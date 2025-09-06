<?php


session_start();
ob_start();
include('dbcon.php');
if (! $_SESSION['userid']) {
    // User not logged in, redirect to login page
    Header("Location: ll.php");
} else if ($_SESSION["user_post"] != 2) {
    Header("Location: kk.php");
}

$im=$_SESSION['userid'];




                               
                                $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                                $image_name = addslashes($_FILES['image']['name']);
                                $image_size = getimagesize($_FILES['image']['tmp_name']);

                                move_uploaded_file($_FILES["image"]["tmp_name"], "profileimage/" . $_FILES["image"]["name"]);
                                $location = "profileimage/" . $_FILES["image"]["name"];
								


$sql="UPDATE student SET image='".$location."' WHERE im_no='".$im."'";
					
					if(!mysql_query($sql,$con)){
						//echo 'error'. mysql_error();
						Header("Location: Profilestudent.php");
					}
					else{
						
						Header("Location: Profilestudent.php");
					}
		
?>