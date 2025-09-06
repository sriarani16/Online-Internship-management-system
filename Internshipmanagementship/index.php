<?php // session_start();
//if (!$_SESSION["userid"]) {
//    
//} 

if(!isset($_SESSION["userid"])) session_start();
?>



<!doctype html>

<head>

    <!-- Basics -->

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    <title>Login</title>

    <!-- CSS -->

   <link rel="stylesheet" href="css/login/animate.css"> 
    <link rel="stylesheet" href="css/login/animate.css">
    <link rel="stylesheet" href="css/login/styles.css"> 

</head>


<body>

    <!-- Begin Page Content -->
    <div align="center"   style="color:#1A647C; margin-top:80px;  font-style:oblique;">
        <h2 style="font-size:45px;">Internship Management System </h2><br>
        
    </div>
    <div id="container">

        <form action="login.php" method="post" enctype="multipart/form-data">

            <label for="name">Username:</label> <input type="text" name="userid"> 
            
            <label for="username">Password:</label><input type="password" name="pass_word">   
            
            <div id="lower">
                <p><a href="#">Forgot your password?</a>
                <input type="submit" value="Login">
                </p>
            </div>
        </form>

    </div>


    <!-- End Page Content -->

</body>

</html>