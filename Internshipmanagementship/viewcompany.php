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
$userid=$_SESSION['userid'];

//$company=$_POST['com'];
//$no=$_POST['number'];
//$cat=$_POST['cat'];

$sql_lsd="SELECT * FROM company WHERE email='".$userid."'";
			  $result_lsd=mysql_query($sql_lsd);
			  $row_lsd=mysql_fetch_assoc($result_lsd);
			  
			  $name=$row_lsd['name'];
    		

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
            <div class="box round first grid">
                <h2> Select Students For "<?php echo $name;?>"</h2>
                <div class="block">
                    
  
                    
                    <table class="data display datatable" id="example">
					<thead>
						<tr>
							<th>Name</th>
							<th>Phone</th>
							<th>Company Web</th>
                            <th>No of interns</th>
						<th>View</th>
							
						</tr>
					</thead>
					<tbody>
                    
                   
                    
						<?php
							
		

			
	 $query=mysql_query("select * from company ")or die(mysql_error());
	
	 while($row=mysql_fetch_array($query)){
		 $id=$row['id'];
		  $name=$row['name'];
		   $web=$row['web'];
		    $phone=$row['phone'];
			
$query1=mysql_query("select * from interview WHERE company='".$id."' and selection=1 ")or die(mysql_error());
	$x=0;
	 while($row1=mysql_fetch_array($query1)){ 
	 
	 $x++;
	 
	 
	 
	 }
						
						
					echo'<tr class="even gradeC">
							<td> <h6>'.$name.'</h6></td>
							<td><h6>'.$phone.'</h6></td>
							<td><a href="'.$web.'" target="blank">'.$name.' Offical Webside</a></td>
							<td class="center"><h6>'.$x.'</h6></td>
			<td class="center"> <a href="viewcomdetails.php?id='.$id.'">  View Details</a></td>';
						
						 }
						?>
                       
                       
					</tbody>
				</table>
                    
                   
                    
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
