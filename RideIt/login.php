<!DOCTYPE html>
<?php
    include("config.php");
    session_start();
    if(isset($_GET['message']))
    {
        echo "<script>";
        echo "alert(".$_GET['message'].")";
        echo "</script>";
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['post_submit']))
    {
        $userid=mysqli_real_escape_string($db,$_POST['post_username']);
        $password=mysqli_real_escape_string($db,$_POST['post_password']);

        $query="SELECT uid FROM user WHERE uid='$userid' and password='$password'";
        $result=mysqli_query($db,$query);
        $count=mysqli_num_rows($result);
        if($count==1)
        {
            $_SESSION['login_user']=$userid;
            header("Location: dashboard.php");
        }
        else
        {
            $error="INVALID CREDENTIALS";
            echo "Invalid Login";
        }
    }
?>

<html lang="en">
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <link rel="stylesheet" href="login.css" type="text/css">
    <h2 class="active"> Sign In </h2>
    <h2 class="inactive underlineHover"> <a href="signup.php">Sign Up</a> </h2>
    <div class="fadeIn first">
      <img src="account.png" id="icon" alt="User Icon" />
    </div>
    
        <!-- <form action="login.php" method="post">
            <label>UserName:</label><input type="text" name="post_username" class="box"/><br /><br />
            <label>Password:</label><input type="password" name="post_password" class="box"/><br /><br />
            <input type="submit" value=" Submit " name="post_submit"/><br />
        </form> -->

        <form action="login.php" method="post">
      <input type="text" id="username" class="fadeIn third" name="post_username" placeholder="username"><br><br>
      <input style='font-size:120%; text-align:center; background-color:#f6f6f6; border:none;'  type="password" id="password" class="fadeIn second" name="post_password" placeholder="password" size="27">

      <br><br>
      <input type="submit" class="fadeIn fourth" value="Login" name="post_submit">
      
        </form>






        <br />

        <!-- <div id="formFooter">
        <a class="underlineHover" href="#">Forgot Password?</a>
        </div> -->




        <!-- <a href="logout.php">Logout</a>

        </div>
        </div>

    </body>
</html>


