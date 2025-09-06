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
if(isset($_GET['id'])){
			  $id=$_GET['id'];
}

$sql_lsd="SELECT * FROM student WHERE im_no='".$id."'";
			  $result_lsd=mysql_query($sql_lsd);
			  $row_lsd=mysql_fetch_assoc($result_lsd);
			  
			    $f_name=$row_lsd['fname'];
//                            $image=$row_lsd['image'];
			  	$l_name=$row_lsd['lname'];
				$gender=$row_lsd['gender'];
				$email=$row_lsd['email'];
				$Phone=$row_lsd['phone'];
				$NIC=$row_lsd['nic'];
				$DOB=$row_lsd['dateofbirth'];
				$gpa=$row_lsd['gpa'];
				$pre=$row_lsd['preference'];

	  		  

?>
    		



<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Typography | BlueWhale Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
    <link href="css/table/demo_page.css" rel="stylesheet" type="text/css" />
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.mouse.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.sortable.min.js" type="text/javascript"></script>
    <script src="js/table/jquery.dataTables.min.js" type="text/javascript"></script>
    <!-- END: load jquery -->
    <script type="text/javascript" src="js/table/table.js"></script>
    <script src="js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            setupLeftMenu();

            $('.datatable').dataTable();
			setSidebarHeight();


        });
    </script>
    <style type='text/css'>
 a img { display:none; }
 a:hover img { display:block; }
 </style> 
</head>
<body>
    <div class="container_12">
        <div class="grid_12 header-repeat">
            <div id="branding">
                <div class="floatleft">
                    <img src="image/logoH.png"  alt="Logo" /></div>
                <div class="floatright">
                    <div class="floatleft">
                        <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Admin</li>
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
        <div class="grid_12">
            <ul class="nav main">
                <li class="ic-dashboard"><a href="#"><span>Home</span></a> </li>
                <li class="ic-grid-tables"><a href="javascript:"><span>Interview</span></a>
                    <ul>
                        <li><a href="sendstudent.php">Send Students Details</a> </li>
                        <li><a href="#">View interview Schedule</a> </li>
                        <li><a href="#">Interview Results</a> </li>
                       
                    </ul>
                </li>
<!--				<li class="ic-notifications"><a href="#"><span>Add Notifications</span></a>        </li>-->
                <li class="ic-charts"><a href="#"><span>Assign Supervisor</span></a>
                <ul>
                        <li><a href="#">Accademic Supervisor</a> </li>
                        <li><a href="#">Industrial Supervisor</a> </li>
                    </ul>
                </li>
                
<!--                <li class="ic-gallery dd"><a href="#"><span>Message</span></a>
               		 <ul>
                        <li><a href="#">Inbox</a> </li>
                        <li><a href="#">Send Message</a> </li>
                    </ul>-->
                </li>
                <li class="ic-form-style"><a href="#"><span>Reports</span></a></li>

            </ul>
        </div>
        <div class="clear">
        </div>
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                     <ul class="section menu">
                        <li><a class="menuitem">Student</a>
                            <ul class="submenu">
                                <li><a href="AdminAddStudent.php">Add Student</a> </li>
                                <li><a>Edit Student </a> </li>
                                <li><a>View Student </a> </li>
                              
                            </ul>
                        </li>
                        <li><a class="menuitem">Accademic Supervisor</a>
                            <ul class="submenu">
                                <li><a >Add Acc.Supervisor</a> </li>
<!--                                <li><a>Edit Acc.Supervisor </a> </li>-->
                                <li><a>View Acc.Supervisor </a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Industrial Supervisor</a>
                            <ul class="submenu">
                                <li><>Add Ind.Supervisor</a> </li>
<!--                                <li><a>Edit Ind.Supervisor </a> </li>-->
                                <li><a>View Ind.Supervisor </a> </li>
                            </ul>
                        </li>
                       <li><a class="menuitem">Company</a>
                            <ul class="submenu">
                                <li><a href="AdminAddCompany.php">Add Company</a> </li>
<!--                                <li><a>Edit Company </a> </li>-->
                                <li><a>View Company </a> </li>
                    
                            </ul>
                      </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid_10">
            <div class="box round first grid">
<!--                <h2> Select Students For "<?php echo $name;?>"</h2>-->
                <div class="block">
                    
                     <form action="deletestudentadmin.php" method="POST">
                    
                    
                    <table style="margin: 0px auto;"><tr>
		<div class="rowElem"><td><label>IM_No:</label></td><td><input type="text" name="im" value="<?php echo $id ?>" readonly="readonly"/></div></td></tr>
        <tr  style="height:10px;"></tr>
        <div align="justify"; class="rowElem"><td><label>First Name:</label></td><td><input type="text" name="fname" value="<?php echo $f_name ?>"readonly="readonly"/></div></td></tr>
         <tr style="height:10px;"></tr>
        <div class="rowElem"><td><label>Last Name:</label></td><td><input type="text" name="lname" value="<?php echo $l_name ?>"readonly="readonly"/></div></td></tr>
         <tr style="height:10px;"></tr>
         <tr>	
		<div class="rowElem"><td><label>Gender :</label> </td>
			<td><input type="radio" id="" name="gender" value="1" <?php if($gender==1){echo'checked';}?>readonly="readonly" ><label>Male</label>
			<input type="radio" id="" name="gender" value="2" <?php if($gender==2){echo'checked';}?>readonly="readonly"><label>Female</label></div></td></tr>
            <tr style="height:10px;"></tr>

<div class="rowElem"><td><label>Email</label></td><td><input type="text" name="email" value="<?php echo $email ?>"readonly="readonly"/></div></td></tr>
 <tr style="height:10px;"></tr>
<div class="rowElem"><td><label>Phone No:</label></td><td><input type="text" name="phone" value="<?php echo $Phone ?>" readonly="readonly"/></div></td></tr>
<tr style="height:10px;"></tr>
<div class="rowElem"><td><label>NIC:</label></td><td><input type="text" name="NIC" value="<?php echo $NIC ?>" id="phone" readonly="readonly" onblur="f3()" maxlength="10"></div></td></tr>
<tr style="height:10px;"></tr>
<div class="rowElem"><td><label>Date Of Birth:</label></td><td><input type="text" name="DOB" value="<?php echo $DOB ?>" readonly="readonly"/></div></td></tr>
<tr style="height:10px;"></tr>
<div class="rowElem"><td><label>GPA:</label></td><td><input type="text" id="gpa" onblur="f1()" name="GPA" value="<?php echo $gpa ?>"readonly="readonly"/></div></td></tr>
<tr style="height:10px;"></tr>
<div class="rowElem"><td><label>Perference</label></td><td><select name="prefer" readonly="readonly">
<option  value="1" <?php if($pre==1){echo'selected="selected"';}?>>SE</option>
<option value="2"<?php if($pre==2){echo'selected="selected"';}?>>Management</option>
<option  value="1" <?php if($pre==3){echo'selected="selected"';}?>>QA</option>
<option value="2"<?php if($pre==4){echo'selected="selected"';}?>>BA</option>
</select>
</div></td></tr>

	
            </table>
		<br />
<br />

		
		<div class="rowElem" style="margin-left:550px"><input type="submit" value="Delete" /></div>
		
				
	</form>
                           
                  
                  
                  
                  
                    
                </div>
            </div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    <div id="site_info">
        <p>
             <a href="#"></a> Internship Management System
        </p>
    </div>
</body>
</html>
