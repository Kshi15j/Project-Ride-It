<!-- pickplan.php -->
<!DOCTYPE html>
<?php
    include("session.php");
    if($_SESSION["curr_trans"]==1)
    {   
        header("Location: dashboard.php?message='You have one current transaction.Please end it to start a new one'");
    }
    $plans=mysqli_query($db,"SELECT * FROM plan");

    if($_SERVER["REQUEST_METHOD"]=="POST"&&isset($_POST['post_submit']))
    {
        $_SESSION['plan_select']=$_POST['post_plan'];
        header("Location: pickcompany.php");
    }
?>
<html lang="en">
<head>
        <title>
            Pick a Plan
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

<style>
/* The container */
.container {

  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}



/* Hide the browser's default radio button */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
}

/* Create a custom radio button */
.checkmark {

  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
  border-radius: 50%;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the radio button is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the indicator (the dot/circle - hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the indicator (dot/circle) when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the indicator (dot/circle) */
.container .checkmark:after {
 	top: 9px;
	left: 9px;
	width: 8px;
	height: 8px;
	border-radius: 50%;
	background: white;
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





        <table class=center>
        <caption><h3>Available Plans</h3></caption>
            <tr>
                <th>Plan ID</th>
                <th>Duration</th>
                <th>Bike Type</th>
            </tr>
            <?php
                while($row=mysqli_fetch_array($plans))
                {
                    echo "<tr>";
                        echo "<td>".$row['pid']."</td>";
                        echo "<td>".$row['duration']."</td>";
                        echo "<td>".$row['type']."</td>";
                    echo "</tr>";
                }
            ?>
        </table>
        <br />
        <br />
        <br>
        <br>

        

        <h3 style=text-align:center;'>Choose a Plan</h3>
        <br><br>
<div class="form">
        <form action="pickplan.php" method="post">  

<label class="container">Plan 1
<input type="radio" checked="checked" name="post_plan" value="1">
<span class="checkmark"></span>
</label><br /> 


<label class="container">Plan 2
<input type="radio" checked="checked" name="post_plan" value="2">
<span class="checkmark"></span>
</label><br />

<label class="container">Plan 3
<input type="radio" checked="checked" name="post_plan" value="3">
<span class="checkmark"></span>
</label><br />


            <!-- <input type="radio" name="post_plan" value="1" /> Plan 1 <br />    
            <input type="radio" name="post_plan" value="2" /> Plan 2 <br />
            <input type="radio" name="post_plan" value="3" /> Plan 3 <br />  -->
            <br>
        <br>
        <br>
            <input type="submit" value=" Submit " name="post_submit" class="button-1"/><br />   
        </form> 
        </div>
        <br>
        <br>
        <br>
        <p style='font-family:crete round; font-size:160%;'><a href=dashboard.php>Abort Transaction</p>
    </body>
</html>