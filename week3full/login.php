<html>

<head>
    <title>Online voting system - Home</title>
    <link rel="stylesheet" href="stylesheet.css">
</head>

<body>
<?php
    session_start();
    include("registration.php");

    // $mobile = $_POST['mob'];
    // $pass = $_POST['pass'];
    // $role = $_POST['role'];
    // $name = $_POST['name'];
    // $email = $_POST['email'];
    // $id = $_POST['id'];
    // $password = $_POST['password'];
    // $department = $_POST['department'];

    // $check = mysqli_query($con, "select * from user where id='$id' and password='$password' and department='$department' ");

    // if(mysqli_num_rows($check)>0){
    //     // $getGroups = mysqli_query($con, "select name, photo, votes, id from user where role=2 ");
    //     // if(mysqli_num_rows($getGroups)>0){
    //     //     $groups = mysqli_fetch_all($getGroups, MYSQLI_ASSOC);
    //     //     $_SESSION['groups'] = $groups;
    //     // }
    //     $data = mysqli_fetch_array($check);
    //     $_SESSION['id'] = $data['id'];
    //     // $_SESSION['status'] = $data['status'];
    //     $_SESSION['data'] = $data;
    //     echo '<script>
    //             window.location = "dashboard.php";
    //         </script>';
    // }
    // else{
    //     echo '<script>
    //             alert("Invalid credentials!");
    //             window.location = "../";
    //         </script>';
    // }
    if (isset($_POST['id'])) {
        $id = stripslashes($_REQUEST['id']);    // removes backslashes
        $id = mysqli_real_escape_string($con, $id);
        $password = stripslashes($_REQUEST['password']);
        $password = mysqli_real_escape_string($con, $password);
        // Check user is exist in the database
        $query    = "SELECT * FROM `users` WHERE id='$id'
                     AND password='" . md5($password) . "'";
        $result = mysqli_query($con, $query) or die(mysql_error());
        $rows = mysqli_num_rows($result);
        if ($rows == 1) {
            $_SESSION['id'] = $id;
            // Redirect to user dashboard page
            //header("Location:dashboard.php");
            echo "You are logged in";
        } else {
            echo "<div class='form'>
                  <h3>Incorrect Username/password.</h3><br/>
                  <p class='link'>Click here to <a href='login.php'>Login</a> again.</p>
                  </div>";
        }
    }
?>
    <center>
        <div id="headerSection">
            <h1>Online Voting System</h1>
        </div>
        <hr>

        <div id="loginSection">
            <h2>Login</h2>
            <form action="login.php" method="POST">
                <!-- <input type="number" name="mob" placeholder="Enter mobile" required><br><br> -->
                <input type="text" name="id" placeholder="ID"><br><br>
                <input type="password" name="password" placeholder="Enter password" required><br><br>
                <!-- <select name="role" style="width: 15%; border: 2px solid black">
                        <option value="1">Voter</option>
                        <option value="2">Group</option>
                    </select><br><br>                   -->
                <div class="from-group mb-3">
                    <select name="department" class="form-control">
                        <option>Department</option>
                        <option value="CSPIT-CSE">CSPIT-CSE</option>
                        <option value="CSPIT-CE">CSPIT-CE</option>
                        <option value="CSPIT-IT">CSPIT-IT</option>
                        <option value="CSPIT-EC">CSPIT-EC</option>
                        <option value="DEPSTAR-CSE">DEPSTAR-CSE</option>
                        <option value="DEPSTAR-CE">DEPSTAR-CE</option>
                        <option value="DEPSTAR-IT">DEPSTAR-IT</option>
                    </select>
                </div><br><br>
                <button id="loginbtn" type="submit" name="loginbtn">Login</button><br><br>
                New user? <a href="registration.php">Register here</a>
            </form>
        </div>

    </center>
</body>

</html>