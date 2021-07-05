<!-- tranhist.php -->
<!DOCTYPE html>
<!-- <?php
    // include("session.php");
    // $trans=mysqli_query($db,"SELECT b.* FROM bill b,user u where b.uid=u.uid and b.uid='".$_SESSION['login_user']."' order by b.end_time");
?> -->
<html lang="en">
    <head>
    <style>
table, th, td {
  border: 1px solid black;
}
table.center {
  margin-left: auto;
  margin-right: auto;
}
th, td {
  padding: 10px;
}
</style>


    <link rel="stylesheet" type="text/css" href="reset.css">
    <link rel="stylesheet" type="text/css" href="dashboard_styles.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>Transaction History</title>
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
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
                <li><a href="#">Book</a></li>
                <li><a href="bill.php">History</a></li>
                <li><a href="#">Account</a></li>
            </ul>
        </nav>
    </div>
</header>

        <table class="center">
            <tr>
                <th>Bill ID</th>
                <th>Bike ID</th>
                <th>Distance</th>
                <th>Start Date</th>
                <th>End Date</th>
            </tr>
            <?php
                // while($row=mysqli_fetch_array($trans))
                // {
                //     echo "<tr>";
                //         echo "<td>".$row['billid']."</td>";
                //         echo "<td>".$row['bid']."</td>";
                //         echo "<td>".$row['distance']."</td>";
                //         echo "<td>".$row['start_time']."</td>";
                //         echo "<td>".$row['end_time']."</td>";
                //         echo "<td>".$row['amount']."</td>";
                //     echo "</tr>";
                // }
            ?>
        </table>
        <br />
        <br />
        
    </body>
</html>