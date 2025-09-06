<?php

session_start();
ob_start();
include('dbcon.php');
if (isset($_POST['userid']) && isset($_POST['pass_word'])) {

    $userid = $_POST['userid'];
    $psw = $_POST['pass_word'];
    

      $psw1=  md5($psw);
      ?>


      <?php
    $getUser_sql = 'SELECT * FROM login WHERE email="' . $userid . '" AND password = "' . $psw1. '"';
    
    $getUser = mysql_query($getUser_sql);
    $getUser_result = mysql_fetch_assoc($getUser);
    $getUser_RecordCount = mysql_num_rows($getUser);

    if ($getUser_RecordCount < 1) {
         
        $message= "Username Password incorrect Please Try Again!";
        echo "<script type='text/javascript'>alert('$message');
        window.location = 'index.php';
        </script>";
  
        
    }
    else {
        
        echo $getUser_result['user_id'];
        $_SESSION['userid'] = $getUser_result['email'];
        $_SESSION['user_post'] = $getUser_result['post'];

        $u_post = $getUser_result['post'];
        if ($u_post == '1') {
            Header("Location: AdminIndex.php");
        } else if ($u_post == '2') {
            Header("Location: Profilestudent.php");
        }else if ($u_post == '3') {
            Header("Location: ProfileAcc.php");
        }else if ($u_post == '4') {
            Header("Location: ProfileInd.php");
        } else {
            Header("Location: CompanyIndex.php");
        }
        //Header("Location: index.php");
    }
} else {
    echo 'please input username and password';
}
?>