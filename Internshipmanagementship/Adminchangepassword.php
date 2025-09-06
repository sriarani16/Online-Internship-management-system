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
                  <img src="image/logoH.png"  alt="Logo" /> </div>
                  
                 
                <div class="floatright">
                    <div class="floatleft">
                          <img src="img/img-profile.jpg" alt="Profile Pic" /></div>
                    <div class="floatleft marginleft10">
                        <ul class="inline-ul floatleft">
                            <li>Register</li>
                            
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
            
        </div>
        <div class="clear">
        </div>
        <div class="grid_2">
            <div class="box sidemenu">
                <div class="block" id="section-menu">
                     <ul class="section menu">
                     <li><a href="AdminIndex.php">Home</a>
                           </li>
                        <li><a class="menuitem">Student</a>
                            <ul class="submenu">
                                <li><a>Add Student</a> </li>
                                <li><a>Edit Student </a> </li>
                              
                            </ul>
                        </li>
                        <li><a class="menuitem">Accademical Supervisor</a>
                            <ul class="submenu">
                                <li><a>Add Acc.Supervisor</a> </li>
                                <li><a>Edit Acc.Supervisor </a> </li>
                            </ul>
                        </li>
                        <li><a class="menuitem">Industrial Supervisor</a>
                            <ul class="submenu">
                                <li><a>Add Ind.Supervisor</a> </li>
                                <li><a>Edit Ind.Supervisor </a> </li>
                            </ul>
                        </li>
                       <li><a class="menuitem">Company</a>
                            <ul class="submenu">
                                <li><a>Add Company</a> </li>
                                <li><a>Edit Company </a> </li>
                    
                            </ul>
                      </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="grid_10">
            <div class="box round first">
                                <h2>Change admin</h2>
                    <div class="block">
                                    <form action="Adminchangepass.php" method="POST">
                    
                    
                    <table style="margin: 0px auto;"><tr>
		<div class="rowElem"><td><label>Password:</label></td><td><input type="password" /></div></td></tr>
        <tr  style="height:10px;"></tr>

            <tr style="height:10px;"></tr>
<div class="rowElem"><td><label>New Password</label></td><td><input type="password" name="pwd"/></div></td></tr>
<tr style="height:10px;"></tr>

            <tr style="height:10px;"></tr>
<div class="rowElem"><td><label>Conform Password</label></td><td><input type="password"/></div></td></tr>
<tr style="height:10px;"></tr>

	
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
