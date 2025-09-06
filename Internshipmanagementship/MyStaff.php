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




$sql_lsd="SELECT * FROM company WHERE email='".$userid."'";
			  $result_lsd=mysql_query($sql_lsd);
			  $row_lsd=mysql_fetch_assoc($result_lsd);
			  
			  $f_name=$row_lsd['name'];
    		  $image=$row_lsd['logo'];
			    $comid=$row_lsd['id'];
	  		  

?>



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Pretty Photo | BlueWhale Admin</title>
    
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
    <link href="css/fancy-button/fancy-button.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="css/slimbox.css" type="text/css" media="screen" /> 
  
  


  
  <script type="text/javascript" src="js/mootools.js"></script>
	<script type="text/javascript" src="js/slimbox.js"></script>
    <!--Jquery UI CSS-->
   
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-ui/jquery.ui.datepicker.min.js" type="text/javascript"></script>
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script src="js/pretty-photo/jquery.prettyPhoto.js" type="text/javascript"></script>
    <script src="js/setup.js" type="text/javascript"></script>
        <script src="js/jquery-ui/jquery.ui.datepicker.min.js" type="text/javascript"></script>

    <script type="text/javascript">

        $(document).ready(function () {
            setupPrettyPhoto();
            setupLeftMenu();
			setSidebarHeight();
setDatePicker('date-picker');

        });
    </script>



   <script type="text/javascript">

function removeElement(div) {

  var d = document.getElementById(div);
  d.remove();

}
</script>


</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft">
                    <img src="image/logoH.png"  alt="Logo" /></div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="<?php echo $image?>" alt="Profile Pic" style="width:25px; height:30px; border:#FFF solid 2px;" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li><?php echo $f_name?></li>
                            <li><a href="logout.php">Logout</a></li>
                        </ul>
                        <br />
<!--                        <span class="small grey">Last Login: 3 hours ago</span>-->
                    </div>
                </div>
                <div class="clear">
                </div>
            </div>
        </div>
        <div class="clear">
        </div>						
        
        <div class="clear">
        </div>
               <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                  <ul class="section menu">
                        <li><a class="menuitem">Student</a>
                            <ul class="submenu">
                                <li><a href="InterviewSelect.php">View Students Details</a> </li>
                                  <li><a href="Mystaff.php">My Staffs</a> </li>
                                
                              
                            </ul>
                        </li>
                        <li><a class="menuitem">Interview</a>
                            <ul class="submenu">
                                <li><a href="viewinterview.php">View Interview Schedule</a> </li>
                                <li><a href="InterviewSchedule.php">Start Interview </a> </li>
                                <li><a href="FinalSelect.php">Interview Final Selection</a> </li>
                               
                            </ul>
                        </li>
                        <li><a class="menuitem">Marking Scheme</a>
                            <ul class="submenu">
                                <li><a href="CreateMarking.php">Create Marking Scheme</a></a> </li>
                                <li><a href="CreateMarking.php">Edit Marking Scheme</a> </a> </li>
                               
                              
                            </ul>
                        </li>
                       
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid_10">
            <div class="box round first">
                    <h2>My Staffs</h2>
                    <div class="block">
                <div id="div'.$x.'" class="message info">   
               
                
                <?php 
				 $query=mysql_query("select * from interview  WHERE selection=1 and company='".$comid."'")or die(mysql_error());
	$x=0;
	 while($row=mysql_fetch_array($query)){
		 $id=$row['im_no'];
		 $sql_stu="SELECT * FROM student WHERE  im_no='".$id."'";
			  $result_stu=mysql_query($sql_stu);
			  $row_stu=mysql_fetch_assoc($result_stu);
			  
			  $f_name=$row_stu['fname'];
			   $l_name=$row_stu['lname'];
			  $cv=$row_stu['cv'];
			  $imagestu=$row_stu['image'];
		  $time=$row['inttime'];
		  $date=$row['intdate'];
	 
                 echo'    <table style="margin-top:15px;" class="form"  width="100%">
                               <tr  ><td align="center"><img src="'.$imagestu.'" style="width:80px; height:100px;" alt="Little Egret"></td>
                          <div><form action="StartInterview.php" method="post">    
                               <td  align="center" width="40%" style="vertical-align:middle"><div id="popup"><h5><a href="example.jpg" rel="lightbox" title="'.$f_name.'"><span></span>'.$f_name.'  '.$l_name.'</a></h5></div></td>
                               <td style="vertical-align:middle" align="center" width="40%"><h5><a href="'.$cv.'" target="_blank"
							   >  View CV </h5></a></td>
                            
                              </div>
<div>
 
                             </tr>
                               </table>';
							   $x++;
                 	  
	 }
				?>
             
                             
                            
             
                   
            </div>
 


     
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    
</body>
</html>
