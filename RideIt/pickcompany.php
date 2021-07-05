<!-- pickcompany.php -->
<!DOCTYPE html>
<?php
    include("session.php");
    if($_SESSION["curr_trans"]==1)
    {   
        header("Location: dashboard.php");
    }
    if(isset($_GET['message']))
    {
        echo "<script>";
        echo "alert(".$_GET['message'].")";
        echo "</script>";
    }
    $get_plan=$_SESSION['plan_select'];
    echo $get_plan;
    $plans=mysqli_query($db,"SELECT * from plan where pid=$get_plan");
    $row=mysqli_fetch_array($plans);
    $type=$row['type'];
    $duration=$row['duration'];
    $query="SELECT c.* from company c,company_plan cp where cp.pid=$get_plan and cp.cid=c.cid";
    $cmps=mysqli_query($db,$query);
    if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['post_submit']))
    {
        $cmp_select=$_POST['post_cmp'];
        $_SESSION['get_plan']=$get_plan;$_SESSION['get_cmp']=$cmp_select;
        header("Location: starttran.php");
    }
?>
<html lang="en">
<head>
        <title>
            Pick a Company
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
    width:50%;
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
    <p style='font-family:crete round; font-size: 40px; text-align:center; color:#444 font-weight: bold;';>Current Transaction<p>
        <br><br>
    <div class="form">
    <form action="pickcompany.php" method="post">
        <table>
        
            <tr>
                <!-- -------------------------why------------------------ -->
                <th></th>
                <th>Company</th>
                <th>Price</th>
            </tr>
            <?php
                while($row=mysqli_fetch_array($cmps))
                {
                    echo "<tr>";
                        echo "<td><input type='radio' name='post_cmp' value='$row[cid]'/></td>";
                        echo "<td>".$row['cname']."</td>";
                        echo "<td>".$row[$type]."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
        <br />
        </br></br></br>
        <input type="submit" value=" Submit " name="post_submit" class="button-1"/><br /> 
        </form>
        </div>
        <br />

        <p style='font-family:crete round; font-size:160%;'><a href=pickplan.php>Back</p>
        
        <p style='font-family:crete round; font-size:160%;'><a href=dashboard.php>Abort Transaction</p>


    </body>
</html>