<!-- currtran.php -->
<!DOCTYPE html>

<?php
    include("session.php");
    if($_SESSION["curr_trans"]==0)
    {   
        header("Location: dashboard.php?message='You have no current transactions'");
    }
    $calldate=date('Y-m-d H:i:s',time());
    $trans=mysqli_query($db,"SELECT * FROM bill where uid='".$_SESSION['login_user']."' and current=1");
    $row=mysqli_fetch_array($trans);
    if($row['end_time']<$calldate)
    {
        $flag=100;
    }
    else
    {
        $flag=0;
    }
    $amount=($row['amount']+50+$flag);
    if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['post_end']))
    {
        if($_POST['post_code']!='123469')
        {
            echo "<script>";
            echo "alert('Invalid Security Code')";
            echo "</script>";
        }
        $_SESSION["curr_trans"]=0;
        if(mysqli_query($db,"update user set current_trans=0 where uid='".$_SESSION['login_user']."'")&&mysqli_query($db,"update bike set availability=1 where bid='".$row['bid']."'"))
        {
            $dist=$_POST['post_distance'];
            if(mysqli_query($db,"update bill set distance='$dist',end_time='$calldate',amount='".($row['amount']+50+$flag)."',current='0' where uid='".$_SESSION['login_user']."' and current=1"))
            {
                header("Location:dashboard.php?message='Transaction ended. Please visit us again'");
            }   
        }
    }
?>
<html lang="en">
<head>
        <title>
            Current Transaction
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

        <table class='center'>
        <caption><h3>Current Transaction</h3></caption>
            <tr>
                <th>Bill ID</th>
                <th>Bike ID</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Amount</th>
            </tr>
            <?php
                $i=1;
                while($i)
                {
                    echo "<tr>";
                        echo "<td>".$row['billid']."</td>";
                        echo "<td>".$row['bid']."</td>";
                        echo "<td>".$row['start_time']."</td>";
                        echo "<td>".$row['end_time']."</td>";
                        echo "<td>".$amount."</td>";
                    echo "</tr>";
                    $i=0;
                }
            ?>
        </table>
        <br/><br/><br/><br/><br/><br/><br/><br/>

        <p style='font-family:crete round; font-size:160%; text-align:center;'>Following details to be entered by employee at the booth</p>
        <br>
        <br>
        <div class="form">
        <form action='currtran.php' method='post'>
        <label style='font-family:crete round; font-size:120%; text-align:center;'>Distance:   </label><input type="number" name="post_distance" class="box"/><br/><br/>
        <label style='font-family:crete round; font-size:120%; text-align:center;'>Security Code: </label><input type="password" name="post_code" class="box"/><br/><br/><br/><br/>
        <input type='submit' value=' End Transaction ' name='post_end' class="button-1"/><br /> 
        </form>
        </div>
        <p style='font-family:crete round; font-size:160%;'><a href=dashboard.php>Return to Dashboard</p>
    </body>
</html>