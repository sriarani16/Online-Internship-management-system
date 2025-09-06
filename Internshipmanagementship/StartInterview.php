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

$idstu=$_POST['id'];


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
                    <h2>Marking Interview</h2>
                    <div class="block">
                   
               
              
	          
               <br />
<br />
<div class="message info">
             
             <?php  
			  $query=mysql_query("select * from marking WHERE company='".$userid."'")or die(mysql_error());
			  
echo'<table style="margin-top:15px;" class="form"  width="100%">
             <tr style="background-color:#FFF;"><th style="text-align:left" width="50%" ><h5>Category</th><th><h5>Marks</h5></th><th></th></tr>';
	 $x=0;
	 while($row=mysql_fetch_array($query)){
		 $cat=$row['category'];
		 $marks=$row['catmark'];
		 		 $id=$row['id'];
		 
		  echo'<form method="post" action="deletemarking.php">  <tr>
                               <td style="text-align:justify;vertical-align:middle;" width="50%">
                               <h6>'.$cat.'</h6>
                                </td>
                               
							   <td align="center" style="vertical-align:middle;"width="25%"><h4>
     <input onblur="findTotal()" style="width:60px;" type="text" name="qty" id="qty"> /'.$marks.'</h4>
							   </td>
                              
                        </tr> <tr style="height:2px;background-color:#FFF; "><th> </th><th> </th><th> </th></tr> 
                             </form> ';
                              
                         
		 
		
		 $x=$marks+$x;
		 
		 
		 
		
	 }
			 echo '  </table><h2 id="t1" style="float:right">Total : 0/'.$x.'</h2> 
			 <br />

		 ';
		   	 ?>
              <script type="text/javascript">
function findTotal(){
    var arr = document.getElementsByName('qty');
    var tot=0;
    for(var i=0;i<arr.length;i++){
        if(parseInt(arr[i].value))
            tot += parseInt(arr[i].value);
    }
    document.getElementById('total').value = tot;
	 x= document.getElementById('t1') ;
   x.innerHTML="Total : "+ tot +"/100";  
}

    </script>
    <form method="post" action="addingmarks.php">
<h5>Remarks</h5> <textarea name="remarks" style="width:700px; height:100px;"></textarea>
             <input hidden="hidden"  type="text" name="total" id="total" value=""/>
             <input hidden="hidden" type="text" name="id" value="<?php echo $idstu;?>" >

             <input style="float:right; margin-right:170px; margin-top:40px;" type="submit" value="Save" />
             </form>
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
