<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Login</title>
    <link rel="stylesheet" href="style.css"/>
    <!-- <style>
        .navbar {
             background-color: yellow;
            /* border-radius: 30px; */
        }

        .navbar ul {
            overflow: auto;
            margin: 0;
            padding: 20;
            overflow: hidden;
        
        }
        .navbar li {
            /* display: inline-block; */
            float: right;
            list-style: none;
            margin:20px 20px;
        }
        .navbar li a{
            display: inline-block;
            padding:5px 25px;
            text-decoration: silver;
            color: black;
        }
        .navbar li a:hover{
            color: magenta;
        }
       
    </style> -->
</head>
<body>
<?php
    require('db.php');
    session_start();
    // When form submitted, check and create user session.
    if (isset($_POST['username'])) {
        $username = stripslashes($_REQUEST['username']);    // removes backslashes
        $username = mysqli_real_escape_string($con, $username);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE username='$username'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['username'] = $username;
            $_SESSION['email'] = $email;
            // Redirect to user dashboard page
            header("Location: dashboard.php");
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    } else {
?>
<header>
        <!-- <nav class="navbar">
            <ul>
                <li></li>
                <li><a href="#">Contact Us</a></li>
                <li><a href="index.html">About Us</a></li>
                <li><a href="home.html">Home</a></li>
            </ul>
        </nav> -->
        <div class="main">
            <ul>
                <li><a href="home.html">Home</a></li>
               <li><a href="index.html">About Us</a></li>
               <li><a href="#">Contact</a></li>
            </ul>
        </div>
    </header>
    <form class="form" method="post" name="login">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="username" placeholder="User ID" autofocus="true"/>
        <input type="password" class="login-input" name="password" placeholder="Password"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <p class="link"><a href="registration.php">New Registration</a></p>
  </form>
<?php
    }
?>
</body>
</html>