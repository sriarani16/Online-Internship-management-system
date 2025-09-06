<?php
session_start();
ob_start();
include('dbcon.php');
if (! $_SESSION['userid']) {
    // User not logged in, redirect to login page
    Header("Location: login.php");
} else if ($_SESSION["user_post"] != 2) {
    Header("Location: login.php");
}
$userid=$_SESSION['userid'];

$sql_lsd="SELECT * FROM student WHERE im_no='".$userid."'";
			  $result_lsd=mysql_query($sql_lsd);
			  $row_lsd=mysql_fetch_assoc($result_lsd);
			  
			  $f_name=$row_lsd['fname'];
    		  $image=$row_lsd['image'];
	  		  

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
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
                            <li><?php echo $f_name ?></li>
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
                <li class="ic-dashboard"><a href="Profilestudent.php"><span>Home</span></a> </li>
				<li class="ic-notifications"><a ><span>Edit My Details</span></a>     
                <ul>
                 <li><a href="password.php">Change Password</a> </li>
                        <li><a href="Stueditmydetails.php">Basic Info</a> </li>
                         <li><a href="uploadimage.php">Profile Image</a> </li>
                        <li><a href="Uploadzcv.php">CV</a> </li>
                    </ul>   </li>
                
                
                <li class="ic-form-style"><a href="#"><span>Progress Reports</span></a>
<!--                 <ul>
                        <li><a href="newreport.php">Create New</a> </li>
                        <li><a href="editreport.php">Edit Reports</a> </li><li><a href="sentreportstu.php">Sent Reports</a> </li>
                    </ul>
                -->
                </li>

            </ul>
        </div>
        <div class="clear">
        </div>
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                    <img src="<?php echo $image ?>" alt="Profile Pic"  style="  width: 95%;
    height: auto;
    max-width: 95%; border:#000 solid 5px" />
          


                    <h4 align="center" style=" background-color:#39F">My Interviews</h4>
<?php
				 $query =mysql_query("select * from interview  WHERE selection=0 and intdate>CURDATE() and active=1 and im_no='".$userid."' ORDER BY intdate")or die(mysql_error());
		       
				
	 while($row=mysql_fetch_array($query)){
		 
		 $time=$row['inttime'];
		  $date=$row['intdate'];
	  	$conform=$row['conform'];
			$company=$row['company'];
		$conform=$row['conform'];
		
				 $querycom=mysql_query("select * from company where id='".$company."'")or die(mysql_error());
				$rowcom=mysql_fetch_array($querycom);
		  $comname=$rowcom['name'];
			  $logo=$rowcom['logo'];
		
	  echo '<br /><table><tr><td><img src="'.$logo.'" style="width:35px; height:35px;" alt="Little Egret"></td><td>&nbsp;&nbsp; &nbsp;&nbsp;</td><td style="vertical-align:middle"><h1>'.$comname.'</h1></td></tr></table>';
	  
	  
	  echo' <b><h4>Date : '.$date.'</h4><h4>Time : '.$time.'</h4>';
if($conform==0){
	echo'<br /><a href="conform.php?comid='.$company.'">
<h5 style="border-radius:8px;background-color:#FFF;  float:right; margin-right:15px;color:green"> &nbsp;Confirm &nbsp;</h5></a><br />';


	}
	 }
	 
	  $query=mysql_query("select * from interview  WHERE selection=1  and im_no='".$userid."'")or die(mysql_error());
		       
				
	 while($row=mysql_fetch_array($query)){
		 
		 $time=$row['inttime'];
		  $date=$row['intdate'];
	  	$conform=$row['conform'];
			$company=$row['company'];
		$conform=$row['conform'];
		
				 $querycom=mysql_query("select * from company where id='".$company."'")or die(mysql_error());
				$rowcom=mysql_fetch_array($querycom);
		  $comname=$rowcom['name'];
			  $logo=$rowcom['logo'];
		
	  echo '<br /><table><tr><td><img src="'.$logo.'" style="width:35px; height:35px;" alt="Little Egret"></td><td>&nbsp;&nbsp; &nbsp;&nbsp;</td><td style="vertical-align:middle"><h1>'.$comname.'</h1></td></tr></table>';
	  echo '<h5 align="center">
	  <img  src="image/hand.gif"  style="width:105px; height:125px;" alt=""Well Done></h5><h4 align="center"> You are Selected</h4>';
	  
	 }
	 echo '<br /><hr style=" box-shadow: 0 0 10px 1px black;">';
?>
                </div>
            </div>
        </div>
        <div class="grid_10">
            <div class="box round first">
                    <h2>Student Profile</h2>
                    <div class="block">
          <?php 
			
			
				 $query=mysql_query("select * from interview  WHERE selection=0 and active=1 and intdate>CURDATE() ORDER BY intdate")or die(mysql_error());
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
	   $comid=$row['company'];
	   	 $sql_com="SELECT * FROM company WHERE  id='".$comid."'";
			  $result_com=mysql_query($sql_com);
			  $row_com=mysql_fetch_assoc($result_com);
			    $comname=$row_com['name'];
	   
	   
	  
                 echo' <div id="div'.$x.'" class="';if ($conform==1){echo 'message info';} else {echo 'message error'; } echo '">   <table style="margin-top:1px; margin-bottom:1px;" class="form"  width="100%">
                               <tr  >

                          <div>
                               <td  align="center" width="20%" ><div id="popup"><h5><a href="example.jpg" rel="lightbox" title="'.$f_name.'"><span><img src="'.$imagestu.'" style="width:120px; height:150px;" alt="Little Egret"></span>'.$f_name.'</a></h5></div></td>
							      <td align="center" width="20%"><h5> '.$comname.'</h5></td>
                              
							    <td align="center" width="20%"><h5> '.$phone.'</h5></td>
                            
                               <td align="center"width="20%"><input type="date"  name="date" value="'.$date.'" readonly="readonly" /></td>
                               <td align="center"width="20%">
							   
		<input type="text"  name="date" value="'.$time.'" readonly="readonly" />					   
							   </td>
 
 
   </td></div>
                             </tr>
                               </table></div>';
							   $x++;
                 	  
	 }
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
