<!DOCTYPE html>
<?php
    include("session.php");
    $query="SELECT uid,name,password,contact FROM user where uid='".$_SESSION['login_user']."'";
    $result=mysqli_query($db,$query);
    $row=mysqli_fetch_array($result);
    $name=$row['name'];
    $username=$row['uid'];
    $password=$row['password'];
    $contact=$row['contact'];
    
    if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['post_submit']))
    {   
        if($password != $_POST['post_password'])
        {
            echo "Invalid Password Changes not saved";
        }
        else
        {
            echo "Update successful. Please login again to see results";
            $editquery=sprintf('UPDATE user SET uid="%s",name="%s",contact="%s" WHERE uid="%s"',mysqli_real_escape_string($db,$_POST['post_username']),mysqli_real_escape_string($db,$_POST['post_name']),mysqli_real_escape_string($db,$_POST['post_contact']),$_SESSION['login_user']);
            if(mysqli_query($db,$editquery))
            {
                session_destroy();
                header("Location: login.php?message='Update successful. Please login again.'");
            }
            else
            {
                echo "Edit failed";
            }
        }
    }
?>
<html lang="en">
<head>
        <title>
            Edit Profile
        </title>
        <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="dashboard_styles.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- [if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif] -->
    <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>

        <style>
            .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}   

div.form
{
    display: block;
    text-align: center;
}
form
{
    display: inline-block;
    margin-left: auto;
    margin-right: auto;
    text-align: left;
}

</style>
</head>

<header>
    <div class="wrapper">
    <img src="bicycle.png">
        <h1>Ride<span class="color">.it</span> </h1>
        
        <nav>
            <ul>
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="pickplan.php">Book</a></li>
                <li><a href="transhist.php">History</a></li>
                <li><a href="editprofile.php">Account</a></li>
                <li><a href="topriders.php">Leaderboard</a></li>
            </ul>
        </nav>
    </div>
</header>

    <body>
    <br /><br ><br /><br ><br />
        <div class="form">
        <form action="editprofile.php" method="post">
            <img src="account.png" height='250px' width='200px' class="center"><br /><br ><br /><br >
            <label style='font-family:crete round; font-size:160%; text-align:center;'>Edit Name: </label><input type="text" name="post_name" value="<?php echo $name ?>" class="box" style="font-family:crete round; font-size:18pt;"/><br /><br />
            <label style='font-family:crete round; font-size:160%; text-align:center;'>Edit UserName: </label><input type="text" name="post_username" value="<?php echo $username ?>" class="box" style="font-family:crete round; font-size:18pt;"/><br /><br />
            <label style='font-family:crete round; font-size:160%; text-align:center;'>Edit Contact Number: </label><input type="number" name="post_contact" value="<?php echo $contact ?>" class="box" style="font-family:crete round; font-size:18pt;"/><br /><br >
            <label style='font-family:crete round; font-size:160%; text-align:center;'>Confirm Password: </label><input type="password" name="post_password" class="box" style="font-family:crete round; font-size:18pt;"/><br /><br /><br /><br ><br /><br >
            <input type="submit" value="Update" name="post_submit" class="button-1"/><br />
        </form>
</div>
        <br />
        <p style='font-family:crete round; font-size:200%; text-align:center'><a href="logout.php"> Logout</a></p>
    </body>
</html>