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
			  	$l_name=$row_lsd['lname'];
				$gender=$row_lsd['gender'];
				$email=$row_lsd['email'];
				$Phone=$row_lsd['phone'];
				$NIC=$row_lsd['nic'];
				$DOB=$row_lsd['dateofbirth'];
				$gpa=$row_lsd['gpa'];
				$pre=$row_lsd['preference'];

	  		  

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
   
   
      
    <script language="javascript">



//  function f3()
//{
//var x=document.getElementById("NIC").value;
//var y = x.length;
//var z=x[9];
//if((y < 10) && z !=="V")
//{
////  alert("Plz Enter Valid NIC Number and");
//alert(z);
//}
//  
//}

//function f3(){
//    var NIC = document.getElementById('NIC');
//    var filter = /^([0-9])+([vV]){0,9}$/;
//    if (!filter.test(NIC.value)) {
//    alert('Please provide a valid NIC');
//    NIC.focus;
//    return false;
// }
//    
//}
function f1()
{
var x=document.getElementById("gpa").value;

if(x > 4)
{
  alert("Plz Enter Valid GPA");
}
  
}

function f3() {

    var NIC = document.getElementById("NIC");
    
    var filter=/^[0-9]{9}[vV]$/;

    if (!filter.test(NIC.value)) {
    alert('Please provide a valid NIC');
    NIC.focus;
    return false;
 }

}

  

function f4() {

    var email = document.getElementById('email');
    var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
    if (!filter.test(email.value)) {
    alert('Please provide a valid email address');
    email.focus;
    return false;
 }
}
function f5() {

    var fname = document.getElementById('fname');
    var filter = /^[A-Za-z]+$/;
    if (!filter.test(fname.value)) {
    alert('Please enter the alphabet characters only');
    fname.focus;
    return false;
 }
}

function f6() {

    var lname = document.getElementById('lname');
    var filter = /^[A-Za-z]+$/;
    if (!filter.test(lname.value)) {
    alert('Please enter the alphabet characters only');
    lname.focus;
    return false;
 }
}
function f7() {

    var email = document.getElementById('phone');
    var filter = /^\d{10}$/;
   

    if (!filter.test(email.value)) {
    alert('Please provide a valid phone number');
    email.focus;
    return false;
 }
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
                 <ul>
                        <li><a href="newreport.php">Create New</a> </li>
                        <li><a href="editreport.php">Edit Reports</a> </li><li><a href="sentreportstu.php">Sent Reports</a> </li>
                    </ul>
                
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
				 $query=mysql_query("select * from interview  WHERE selection=0 and intdate>CURDATE() and active=1 and im_no='".$userid."' ORDER BY intdate")or die(mysql_error());
		       
				
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
                    
                    <h2>Edit Your Details</h2>
                    <div class="block">
   
                              <form action="EdingStu.php" method="POST">
                    
                    
                    <table style="margin: 0px auto;"><tr>
		<div class="rowElem"><td><label>IM_No:</label></td><td><input type="text" name="im" value="<?php echo $userid ?>"/></div></td></tr>
        <tr  style="height:10px;"></tr>
        <div align="justify"; class="rowElem"><td><label>First Name:</label></td><td><input type="text" name="fname" value="<?php echo $f_name ?>" id="fname" onblur="f5()"/></div></td></tr>
         <tr style="height:10px;"></tr>
        <div class="rowElem"><td><label>Last Name:</label></td><td><input type="text" name="lname" value="<?php echo $l_name ?>" onblur="f6()" id="lname" /></div></td></tr>
         <tr style="height:10px;"></tr>
         <tr>	
		<div class="rowElem"><td><label>Gender :</label> </td>
			<td><input type="radio" id="" name="gender" value="1" <?php if($gender==1){echo'checked';}?> ><label>Male</label>
			<input type="radio" id="" name="gender" value="2" <?php if($gender==2){echo'checked';}?>><label>Female</label></div></td></tr>
            <tr style="height:10px;"></tr>

<div class="rowElem"><td><label>Email</label></td><td><input type="email" name="email" value="<?php echo $email ?>" id="email" onblur="f4()"/></div></td></tr>
 <tr style="height:10px;"></tr>
<div class="rowElem"><td><label>Phone No:</label></td><td><input type="text" name="phone" value="<?php echo $Phone ?>" id="phone" onblur="f7()"/></div></td></tr>
<tr style="height:10px;"></tr>
<div class="rowElem"><td><label>NIC:</label></td><td><input type="text" name="NIC" value="<?php echo $NIC ?> " id="NIC" onblur="f3()"/> </div></td></tr>
<tr style="height:10px;"></tr>
<div class="rowElem"><td><label>Date Of Birth:</label></td><td><input type="text" name="DOB" value="<?php echo $DOB ?>"/></div></td></tr>
<tr style="height:10px;"></tr>
<div class="rowElem"><td><label>GPA:</label></td><td><input type="text" id="gpa" onblur="f1()" name="GPA" value="<?php echo $gpa ?>"/></div></td></tr>
<tr style="height:10px;"></tr>
<div class="rowElem"><td><label>Perference</label></td><td><select name="prefer">
<option  value="1" <?php if($pre==1){echo'selected="selected"';}?>>SE</option>
<option value="2"<?php if($pre==2){echo'selected="selected"';}?>>Management</option>
<option value="3"<?php if($pre==3){echo'selected="selected"';}?>>QA</option>
<option value="4"<?php if($pre==4){echo'selected="selected"';}?>>BA</option>
</select>
</div></td></tr>

	
            </table>
		<br />
<br />

		
		<div class="rowElem" style="margin-left:550px"><input type="submit" value="UPDATE" /></div>
		
				
	</form>
                            
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
