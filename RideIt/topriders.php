<!-- topriders.php -->
<!DOCTYPE html>
<?php
    include("session.php");
    $trans=mysqli_query($db,"select uid,sum(distance) as dist from bill group by uid order by sum(distance) desc");
?>
<html lang="en">
    <head>
        <title>
            Top Riders
        </title>
        <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="dashboard_styles.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- [if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif] -->
    <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>

        <style>   
th{
    background-color:#5fbae9;
    color:white;
} 
table{
    width: 50%;
}

table, th, td {
    
  border: 2px solid black;
}
table.center {
  margin-left: auto;
  margin-right: auto;
}
th, td {
  padding: 10px;
}
</style>


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
                <li><a href="editprofile.php">Account</a></li>
                <li><a href="topriders.php">Leaderboard</a></li>
            </ul>
        </nav>
    </div>
</header>
    







        <table class=center>
            <caption><h3> Top Riders</h3> </caption>
            <tr>
                <th>Name</th>
                <th>Distance Last Week</th>
            </tr>
            <?php
                $i=1;
                while($row=mysqli_fetch_array($trans))
                {
                    $names=mysqli_query($db,"SELECT name from user where uid='".$row['uid']."'");
                    $name=mysqli_fetch_array($names);
                    echo "<tr>";
                        echo "<td>".$name['name']."</td>";
                        echo "<td>".$row['dist']."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
        <br />
        <br />
        
    </body>
</html>