<!DOCTYPE html>
<?php
    include('session.php');
    if(isset($_GET['message']))
    {
        echo "<script>";
        echo "alert(".$_GET['message'].")";
        echo "</script>";
    }
?>

<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="dashboard_styles.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Dashboard</title>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
    <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>

</head>

<style>
    .center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
    </style>



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
                <li><a href="editprofile.php">Account</a></li>
                <li><a href="topriders.php">Leaderboard</a></li>
                <li><a href="currtran.php">End Transaction</li>
            </ul>
        </nav>
    </div>
</header>
    
<div id="hero-image">
    <div class="wrapper">
        <h2>Ride it easy, with<br/>
        <strong>Ride.it</strong></h2>
    </div>
</div>
    
<div id="features">
    <div class="wrapper">
        <ul>
            <li class="feature-1">
                <h4>Affordable Prices</h4>
                <p>Choose plans based on your requirements, number of combinations to choose from.</p>
            </li>
            <li class="feature-2">
                <h4>Hassle free Experience</h4>
                <p>Book your ride online, Start it from our stands near mess-1.</p>
            </li>
            <li class="feature-3">
                <h4>Quality Bikes</h4>
                <p>Well maintained bikes which make your ride as smooth as possible.</p>
            </li>
            <div class="clear"></div>
        </ul>
    </div>
</div>
    

            
<p style='font-family:crete round; font-size:200%; text-align:center;' > Check if you made it to the leaderboard </p>
                
                
<a href="topriders.php"><img src="leaderboard.png" height="400px" width="1200px" class="center"></a>
           
       
        


    
<br>    

    
</body>
</html>
</html>