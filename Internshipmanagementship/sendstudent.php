<?php
session_start();
ob_start();
include('dbcon.php');
if (! $_SESSION['userid']) {
    // User not logged in, redirect to login page
    Header("Location: ll.php");
} else if ($_SESSION["user_post"] != 1) {
    Header("Location: kk.php");
}
$userid=$_SESSION['userid'];



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta http-equiv="Content-Script-Type" content="text/javascript" />
	<meta http-equiv="Content-Style-Type" content="text/css" />
	<meta name="gmapkey" content="" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />

	<title></title>
    
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="jqtransformplugin/jqtransform.css" type="text/css" media="all" />
	<link rel="stylesheet" href="css/demo.css" type="text/css" media="all" />
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
    <!-- BEGIN: load jquery -->
   
    
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    
       
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
      
    <script type="text/javascript" src="jqtransformplugin/jquery.jqtransform.js" ></script>
    <!-- END: load jquery -->
    <script src="js/pretty-photo/jquery.prettyPhoto.js" type="text/javascript"></script>
    <script src="js/setup.js" type="text/javascript"></script>
    <script type="text/javascript">

        $(document).ready(function () {
            setupPrettyPhoto();
            setupLeftMenu();
			setSidebarHeight();


        });
    </script>
  
	
		<script language="javascript">
		$(function(){
			$('form').jqTransform({imgPath:'jqtransformplugin/img/'});
		});
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
                <li class="ic-dashboard"><a href="AdminIndex.php"><span>Home</span></a> </li>
                <li class="ic-grid-tables"><a href="javascript:"><span>Interview</span></a>
                    <ul>
                        <li><a href="sendstudent.php">Send Students Details</a> </li>
                        <li><a href="selectedstudent.php">Selected Students Details</a> </li>                        
                        <li><a href="AdminViewInterview.php">View interview Schedule</a> </li>
                        <li><a href="AdminResult.php">Interview Results</a> </li>
                       
                    </ul>
                </li>
				
                <li class="ic-charts"><a href="#"><span>Assign Supervisor</span></a>
                <ul>
                        <li><a >Academic Supervisor</a> </li>
                        <li><a >Edit Academic Supervisor</a> </li>
                    </ul>
                </li>
                
               
                <li class="ic-form-style"><a href="#"><span>Reports</span></a>
<!--                 <ul>
                        <li><a target="_blank" href="pdfcomacc.php">Ac.Supervisor - Comapny</a> </li>
                        <li><a target="_blank" href="pdfcomind.php">Ind. Supervisor - Company</a> </li>
                         <li><a target="_blank" href="pdfcomstu.php">Company - Student</a> </li>
                        <li><a target="_blank" href="pdfintstu.php">Interview Schedule</a> </li>
                         <li><a target="_blank" href="pdfpendingstu.php">Pending Students</a> </li>
                      
                    </ul>-->
               <li class="ic-grid-tables"><a href="Adminpassword.php"><span> Time Schedule</span></a>        </li>
                 <li class="ic-notifications"><a href="Adminchangepassword.php"><span> Change Password</span></a>  </li>
                
                
                </li>

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
                                
                                <li><a href="viewstudentadmin.php">View Students </a> </li>
                              
                            </ul>
                        </li>
                        <li><a class="menuitem">Academic Supervisor</a>
                            <ul class="submenu">
                                <li><a >Add Ac.Supervisor</a> </li>
                               
                                <li><a >View Ac.Supervisor </a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Industrial Supervisor</a>
                            <ul class="submenu">
                                <li><a >Add Ind.Supervisor</a> </li>
                                
                                <li><a>View Ind.Supervisor </a> </li>
                            </ul>
                        </li>
                       <li><a class="menuitem">Company</a>
                            <ul class="submenu">
                                <li><a href="AdminAddCompany.php">Add Company</a> </li>
                              
                                <li><a href="viewcompany.php">View Company </a> </li>
                    
                            </ul>
                      </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid_10">
            <div class="box round first">
                    <h2>Send Students Details</h2>
                    <div class="block">
                    <br />
<br />
   <form action="sendstudentdetails.php" method="POST" >
<table style="margin: 0px auto;">
<tr>
<div class="rowElem"><td><label>Company</label></td><td>
<select name="com">
<?php
 $query=mysql_query("select * from company")or die(mysql_error());
	 	 while($row=mysql_fetch_array($query)){
			 $id=$row['id'];
		 $name=$row['name'];
		echo'<option value="'.$id.'">'.$name.'</option>';
		 }

?>
</select></div></td></tr>

<tr style="height:10px;"></tr><tr>
<div class="rowElem"><td><label>No Of Students</label></td><td><input type="text" name="number" /></div></td></tr>

	
            </table>
		<br />
<br />

		
		<div class="rowElem" style="margin-left:550px"><input type="submit" value="Start Selection" /></div>
		
				
	</form>
                     
<br />
<br />

                    
                    
                    
            </div></div>
        </div>
        <div class="clear">
        </div>
    </div>
    <div class="clear">
    </div>
    
</body>
</html>
