<!-- starttran.php -->


<!DOCTYPE html>
<head>
<title>
            Start Transaction
        </title>
        <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="dashboard_styles.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- [if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif] -->
    <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
</head>

<body>
    <header>
    <div class="wrapper">
    <img src="bicycle.png">
        <h1>Ride<span class="color">.it</span> </h1>
        
        <nav>
            <ul>
                <li><a href="dashboard.php">Home</a></li>
                <li><a href="pickplan.php">Book</a></li>
                <li><a href="transhist.php">History</a></li>
                <li><a href="#">Account</a></li>
                <li><a href="topriders.php">Leaderboard</a></li>
            </ul>
        </nav>
    </div>
</header>
<?php
    include("session.php");
    if($_SESSION["curr_trans"]==1)
    {   
        header("Location: dashboard.php");
    }
    $getplan=$_SESSION['get_plan'];
    $getcmp=$_SESSION['get_cmp'];
    $queryplan="Select * from plan where pid=$getplan";
    $plans=mysqli_query($db,$queryplan);
    $plan=mysqli_fetch_array($plans);
    $btype=$plan['type'];
    $bdur=$plan['duration'];
    $querycmp="select * from company where cid=$getcmp";
    $cmps=mysqli_query($db,$querycmp);
    $cmp=mysqli_fetch_array($cmps);
    $cname=$cmp['cname'];
    $price=$cmp[$btype];
    $querybike="select * from bike where cid='$getcmp' and type='$btype' and availability='1'";
    $bikes=mysqli_query($db,$querybike);
    $bike=mysqli_fetch_array($bikes);
    if(mysqli_num_rows($bikes))
    {
        echo "<p style='clear:left; font-family:crete round; font-size:200%; text-align:left;'>";
        echo "You have selected the following options<br /><br />";
        echo "Company: ".$cname."<br /><br />";
        echo "Bike Type: ".$btype."<br /><br />";
        echo "Duration: ".$bdur." hours<br /><br /><br />";
        echo "You have been alloted the following bike<br />";
        echo "</p>";
        if($btype=='Geared')
        {
            echo "<img src='gearcycle.png' width='400' height='250' align='left'><br />";
        }
        else if($btype=='Normal')
        {
            echo "<img src='nongeared.png' width='400' height='250' align='left'><br />";
        }
        else
        {
            echo "<img src='bmxcycle.png' width='400' height='250' align='left'><br />";
        }
        echo "<p style='clear:left; font-family:crete round; font-size:200%; text-align:center;'>";
        echo "Do you wish to continue?<br />";
        echo "<form action='starttran.php' method='post'> <input class='button-1' type='submit' value=' Confirm ' name='post_continue'/><br /> ";
        echo "<p style='clear:left; font-family:crete round; font-size:200%;'><a href=dashboard.php>Abort Transaction</p>";
        echo "</p>";
    }
    else
    {
        header("Location: pickcompany.php?message='No bikes available for this company.'");
    }
    if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['post_continue']))
    {
        $_SESSION["curr_trans"]=1;
        if(mysqli_query($db,"update user set current_trans=1 where uid='".$_SESSION['login_user']."'")&&mysqli_query($db,"update bike set availability=0 where bid='".$bike['bid']."'"))
        {
            $date=date('Y-m-d H:i:s',time());
            $enddate = date('Y-m-d H:i:s',strtotime("+1 day", time()));
            if(mysqli_query($db,"insert into bill values('','".$_SESSION['login_user']."','".$bike['bid']."','$getplan','0','$date','$enddate','$price','1')"))
            {
                header("Location:dashboard.php?message='Transaction started. Thanks for renting'");
            }
        } 
    }
?>
</body>
</html>