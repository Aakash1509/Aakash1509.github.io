<!-- <?php
    session_start();
    if(!isset($_SESSION['data'])){
        header("location: ../");
    }
    // $data = $_SESSION['data'];

    // if($_SESSION['status']==1){
    //     $status = '<b style="color: green">Voted</b>';
    // }
    // else{
    //     $status = '<b style="color: red">Not Voted</b>';
    // }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System - Dashboard</title>
</head>
<body>
    <button>Back</button>
    <button>Logout</button>
    <h1>Online Voting System</h1>
    <hr>
    <div id="Profile"></div>
    <div id="Group"></div>
</body>
</html> -->
<?php
//include auth_session.php file on all user panel pages
include("login.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
</head>
<body>
    <div class="form">
        <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
        <p>You are now user dashboard page.</p>
        <p><a href="logout.php">Logout</a></p>
    </div>
</body>
</html>