<!DOCTYPE html>
<?php
    include("config.php");
    if($_SERVER['REQUEST_METHOD']=="POST"&&isset($_POST['post_submit']))
    {
        $username=mysqli_real_escape_string($db,$_POST['post_username']);
        $password=mysqli_real_escape_string($db,$_POST['post_password']);
        $name=mysqli_real_escape_string($db,$_POST['post_name']);
        $email=mysqli_real_escape_string($db,$_POST['post_email']);
        $contact=mysqli_real_escape_string($db,$_POST['post_contact']);
        
        $query="INSERT INTO user VALUES ('$username','$name','$email','$password','$contact','0')";
        if(mysqli_query($db,$query))
        {
            header("Location: login.php?message='User created. Please Login'");
        }
        else
        {
            $error="INVALID CREDENTIALS";
            echo "Invalid Credentials";
        }
    }
?>
<html lang="en">
    <!-- <body>
    <form action="signup.php" method="post">
            <label>Name:</label><input type="text" name="post_name" class="box"/><br /><br />
            <label>Email ID:</label><input type="text" name="post_email" class="box"/><br /><br />
            <label>UserName:</label><input type="text" name="post_username" class="box"/><br /><br />
            <label>Password:</label><input type="password" name="post_password" class="box"/><br /><br />
            <label>Confirm Password:</label><input type="password" name="post_cpassword" class="box"/><br /><br />
            <label>Contact Number:</label><input type="number" name="post_contact" class="box"/><br /><br >
            <input type="submit" value="Submit" name="post_submit"/><br />
        </form>
        <br />
        <a href="login.php">Login</a>
    </body> -->
    <body>
    <div class="wrapper fadeInDown">
    <div id="formContent">
    <!-- Tabs Titles -->
    <link rel="stylesheet" href="login.css" type="text/css">

    <h2 class="active"> Sign Up </h2>
    <h2 class="inactive underlineHover"> <a href="login.php">Sign In </a></h2>

    <!-- Login Form -->
    <form action="signup.php" method="post">

    <!-- 33333333333333333333333333333333333333333333333 -->


        <!-- put in details from username -->
        <!-- change value of placeholder attribute in following tags -->


    <!-- 333333333333333333333333333333333333333333333333 -->
        <br><br>
      <input type="text" id="post_name" class="fadeIn third" name="post_name" placeholder="Name">
      <input type="text" id="post_email" class="fadeIn third" name="post_email" placeholder="Email">
      <input type="text" id="post_username" class="fadeIn third" name="post_username" placeholder="username">

      <input type="text" id="contact" class="fadeIn third" name="post_contact" placeholder="Contact Number"><br><br>
      <input style='font-size:120%; text-align:center; background-color:#f6f6f6; border:none;' type="password" id="password" class="fadeIn second" name="post_password" placeholder="Password" size="27"><br><br>
      <input style='font-size:120%; text-align:center; background-color:#f6f6f6; border:none;' type="password" id="cpassword" class="fadeIn second" name="post_cpassword" placeholder="Confirm Password" size="27">
      <br><br>
      <input type="submit" class="fadeIn fourth" value="Sign Up" name="post_submit">
    </form>



  </div>
</div>

</body>


</html>

