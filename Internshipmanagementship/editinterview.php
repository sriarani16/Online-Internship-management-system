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

$im=$_POST['id'];


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
  
  
  <style type="text/css">

#popup a span {
	display: none;
}


#popup a:hover span {
	display: block;
	position: absolute;

	
	width: 120px;
	margin: 0px;
	padding: 2px;
	color: #335500;
	font-weight: normal;
	background: #000;
	text-align: left;
	border: 1px solid #666;
	height:150px;
	margin-left:150px;

}

</style>


  
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
                    <h2>Edit Interview</h2>
                    <div class="block">
                   
               
                
                <?php 
				
		 $sql_stu="SELECT * FROM student WHERE  im_no='".$im."'";
			  $result_stu=mysql_query($sql_stu);
			  $row_stu=mysql_fetch_assoc($result_stu);
			  
			  $f_name=$row_stu['fname'];
			  $cv=$row_stu['cv'];
			  $imagestu=$row_stu['image'];
		  
	 
                 echo' <div id="div'.$x.'" class="message info">   <table style="margin-top:15px;" class="form"  width="100%">
                               <tr  >
                          <div><form action="fixedtime.php" method="post">    
                               <td  align="center" width="20%" ><div id="popup"><h5><a href="example.jpg" rel="lightbox" title="'.$f_name.'"><span><img src="'.$imagestu.'" style="width:120px; height:150px;" alt="Little Egret"></span>'.$f_name.'</a></h5></div></td>
                               <td align="center" width="20%"><h5><a href="'.$cv.'" target="_blank"
							   >  View CV </h5></a></td>
                            
                               <td align="center"width="20%"><input type="date"  name="date" /></td>
                               <td align="center"width="20%"><select style="width:100px;" name="time" >
	
	
	<option value="7:00 AM">7:00 AM</option>
	<option value="7:15 AM">7:15 AM</option>
	<option value="7:30 AM">7:30 AM</option>
	<option value="7:45 AM">7:45 AM</option>
	
	<option value="8:00 AM">8:00 AM</option>
	<option value="8:15 AM">8:15 AM</option>
	<option value="8:30 AM">8:30 AM</option>
	<option value="8:45 AM">8:45 AM</option>
	
	<option value="9:00 AM">9:00 AM</option>
	<option value="9:15 AM">9:15 AM</option>
	<option value="9:30 AM">9:30 AM</option>
	<option value="9:45 AM">9:45 AM</option>
	
	<option value="10:00 AM">10:00 AM</option>
	<option value="10:15 AM">10:15 AM</option>
	<option value="10:30 AM">10:30 AM</option>
	<option value="10:45 AM">10:45 AM</option>
	
	<option value="11:00 AM">11:00 AM</option>
	<option value="11:15 AM">11:15 AM</option>
	<option value="11:30 AM">11:30 AM</option>
	<option value="11:45 AM">11:45 AM</option>
	
	<option value="12:00 PM">12:00 PM</option>
	<option value="12:15 PM">12:15 PM</option>
	<option value="12:30 PM">12:30 PM</option>
	<option value="12:45 PM">12:45 PM</option>
	
	<option value="1:00 PM">1:00 PM</option>
	<option value="1:15 PM">1:15 PM</option>
	<option value="1:30 PM">1:30 PM</option>
	<option value="1:45 PM">1:45 PM</option>
	
	<option value="2:00 PM">2:00 PM</option>
	<option value="2:15 PM">2:15 PM</option>
	<option value="2:30 PM">2:30 PM</option>
	<option value="2:45 PM">2:45 PM</option>
	
	<option value="3:00 PM">3:00 PM</option>
	<option value="3:15 PM">3:15 PM</option>
	<option value="3:30 PM">3:30 PM</option>
	<option value="3:45 PM">3:45 PM</option>
	
	<option value="4:00 PM">4:00 PM</option>
	<option value="4:15 PM">4:15 PM</option>
	<option value="4:30 PM">4:30 PM</option>
	<option value="4:45 PM">4:45 PM</option>
	
	<option value="5:00 PM">5:00 PM</option>
	<option value="5:15 PM">5:15 PM</option>
	<option value="5:30 PM">5:30 PM</option>
	<option value="5:45 PM">5:45 PM</option>
	
	<option value="6:00 PM">6:00 PM</option>
	<option value="6:15 PM">6:15 PM</option>
	<option value="6:30 PM">6:30 PM</option>
	<option value="6:45 PM">6:45 PM</option>
	
	<option value="7:00 PM">7:00 PM</option>
	<option value="7:15 PM">7:15 PM</option>
	<option value="7:30 PM">7:30 PM</option>
	<option value="7:45 PM">7:45 PM</option>
	
	<option value="8:00 PM">8:00 PM</option>
	<option value="8:15 PM">8:15 PM</option>
	<option value="8:30 PM">8:30 PM</option>
	<option value="8:45 PM">8:45 PM</option>
	 
	
</select></td>
 <input type="text" name="id" value="'.$im.'"  hidden="hidden"/>
<td align="center" width="20%"> <input type="submit" value="Resend" /> </form> </div>
<div>
 <form action="Deletestu.php" method="post">
  <input type="text" name="id" value="'.$im.'"  hidden="hidden"/>
<td align="center" width="20%">
<input type="submit" value="X"  style=" width:30px; background:#e1f2fc;" title="Delete"  /> </form>
   </td></div>
                             </tr>
                               </table></div>';
							   $x++;
                 	  
	
				?>
             
                             
                            
             
                   
            
 


     
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
