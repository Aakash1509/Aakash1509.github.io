<?php
//include auth_session.php file on all user panel pages
include("auth_session.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - Client area</title>
    <link rel="stylesheet" href="style.css" />
    <style>
        /* .navbar {
            background-color: yellow;
            /* border-radius: 30px; */
        /* }

        .navbar ul {
            overflow: auto;
        }
        .navbar li {
            float: right;
            list-style: none;
            margin:20px 20px;
        }
        .navbar li a{
            padding:3px 3px;
            text-decoration: none;
            color: black;
        }
        .navbar li a:hover{
            color:blue;
        } */ 
        #profile{
            border-radius: 30px;
            background-color:white;
            width: 30%;
            padding: 20px;
            float:left;
        }
        #Group{
            border-radius: 30px;
            background-color:white;
            width: 60%;
            padding: 20px;
            float:right;
        }
        #btn {
            border-radius: 30px;
    color: #fff;
    background: #55a1ff;
    border: 0;
    outline: 0;
    width: 100%;
    height: 50px;
    font-size: 16px;
    text-align: center;
    cursor: pointer;
}
    </style>
</head>
<body>
<header>
        <nav class="navbar">
            <ul>
                <li><a href="index.html">About Us</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
   
    <div class="form">
        
        <p>You are now on dashboard page.</p>
        <!-- <p><a href="logout.php">Logout</a></p> -->
    </div>
    <div id="profile">
    <p>Hey, <?php echo $_SESSION['username']; ?>!</p>
   
    </div>
    <div id="Group">
    <h2>Class Representative Elections</h2>
    <p>Get a chance to volunteer your class or help others by choosing the perfect volunteer by voting..</p>
    <p>To participate in this event</p>
    <a href="voting.php">
        <div >
        <button id="btn">Click here</button>
        </div>
        
    </a>
    <hr>
    <h2>Spoural</h2>
    <p>Get a chance to contribute in the sports festival</p>
    <p>To volunteer in Spoural</p>
    <a href="volunteering.php">
        <div>
        <button id="btn">Click here</button>
        </div>
        
    </a>
    </div>
</body>
</html>