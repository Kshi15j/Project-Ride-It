<?php
    include('config.php');
    session_start();
    $result=mysqli_query($db,"SELECT current_trans FROM user where uid='".$_SESSION['login_user']."'");
    $row=mysqli_fetch_array($result);
    $n=$row['current_trans'];
    $_SESSION['curr_trans']=$n;
    if(!isset($_SESSION['login_user']))
    {
        header("location:login.php");
        die();
    }
?>