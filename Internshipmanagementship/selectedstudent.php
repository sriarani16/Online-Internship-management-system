<?php
include('dbcon.php');
ob_start();
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
    <title>Pretty Photo | BlueWhale Admin</title>
    <link rel="stylesheet" type="text/css" href="css/reset.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/text.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/grid.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/layout.css" media="screen" />
    <link rel="stylesheet" type="text/css" href="css/nav.css" media="screen" />
    <link href="css/prettyPhoto.css" rel="stylesheet" type="text/css" />
    <!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
    <!--[if IE 7]><link rel="stylesheet" type="text/css" href="css/ie.css" media="screen" /><![endif]-->
    <!-- BEGIN: load jquery -->
    <script src="js/jquery-1.6.4.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/jquery-ui/jquery.ui.core.min.js"></script>
    <script src="js/jquery-ui/jquery.ui.widget.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.ui.accordion.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.core.min.js" type="text/javascript"></script>
    <script src="js/jquery-ui/jquery.effects.slide.min.js" type="text/javascript"></script>
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
                    <h2><span style="color:#00C"><a href="AdminViewInterviewTime.php">Change : Time Order</a></span></h2>
                    <div class="block">
                      <?php 
					       
				 $querycom=mysql_query("select * from company")or die(mysql_error());
	$x=0;
	 while($rowcom=mysql_fetch_array($querycom)){
		 
		 	  $comid=$rowcom['id'];
			  $comname=$rowcom['name'];
			  $logo=$rowcom['logo'];
		 echo '<table><tr><td><img src="'.$logo.'" style="width:35px; height:35px;" alt="Little Egret"></td><td>&nbsp;&nbsp; &nbsp;&nbsp;</td><td><h1>'.$comname.'</h1></td></tr></table>';	
				 $query=mysql_query("select * from interview  WHERE selection=0 and active=0 and company='".$comid."'")or die(mysql_error());
	$x=0;
	 while($row=mysql_fetch_array($query)){
		 $id=$row['im_no'];
		 $sql_stu="SELECT * FROM student WHERE  im_no='".$id."'";
			  $result_stu=mysql_query($sql_stu);
			  $row_stu=mysql_fetch_assoc($result_stu);
			    $phone=$row_stu['phone'];
			  $f_name=$row_stu['fname'];
			  $cv=$row_stu['cv'];
			  $imagestu=$row_stu['image'];
		  $time=$row['inttime'];
		  $date=$row['intdate'];
	  $conform=$row['conform'];
	 
                 echo' <div style="width:500px;" id="div'.$x.'" class="';if ($conform==1){echo 'message info';} else {echo 'message error'; } echo '">   <table style="margin-top:1px; margin-bottom:1px;" class="form"  width="100%">
                               <tr  >
                          <div>
                               <td  align="center" width="20%" ><div id="popup"><h5><a href="example.jpg" rel="lightbox" title="'.$f_name.'"><span><img src="'.$imagestu.'" style="width:120px; height:150px;" alt="Little Egret"></span>'.$f_name.'</a></h5></div></td>
                               <td align="center" width="20%"><h5><a href="'.$cv.'" target="_blank"
							   >  View CV </h5></a></td>
							    <td align="center" width="20%"><h5> '.$phone.'</h5></td>
                            
                               
 
 
   </td></div>
                             </tr>
                               </table></div>';
							   $x++;
                 	  
	 }}
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
