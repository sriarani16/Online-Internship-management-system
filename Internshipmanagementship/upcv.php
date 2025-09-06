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




                          
								 $cv = addslashes(file_get_contents($_FILES['filename']['tmp_name']));
                                $cv_name = addslashes($_FILES['filename']['name']);
                                $cv_size = getimagesize($_FILES['filename']['tmp_name']);
		
is_uploaded_file($_FILES['filename']['tmp_name']);
    move_uploaded_file($_FILES['filename']['tmp_name'], "CV/".$_FILES['filename']['name']);
         $cvlocation = "CV/" . $_FILES["filename"]["name"];
    


$sql="UPDATE student SET cv='".$cvlocation."' WHERE im_no='".$im."'";
					
					if(!mysql_query($sql,$con)){
						//echo 'error'. mysql_error();
						Header("Location: Profilestudent.php");
					}
					else{
						
						Header("Location: Profilestudent.php");
					}
		
?>