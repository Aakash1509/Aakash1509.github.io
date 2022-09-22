<?php
$insert = false;
if(isset($_POST['name'])){
    // Set connection variables
    // $server = "localhost";
    // $username = "root";
    // $password = "";

    // Create a database connection
    $con = mysqli_connect("localhost","root","","voting_system");

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $name = $_POST['name'];
    $email = $_POST['email'];
    $id = $_POST['id'];
    $password = $_POST['password'];
    $department = $_POST['department'];
    $sql = "INSERT INTO `voting_system`.`voting table`(`name`,`email`, `id`, `password`,`Department`) VALUES ('$name','$email','$id','$password','$department');";

    if($con->query($sql) == true){
        $insert=true;}
        else
    {
        echo "ERROR: $sql <br> $connect->ERROR";
    }

    //$con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Online Voting System - Registration</title>
    <link rel="stylesheet" href="stylesheet1.css">
    
</head>
<body bgcolor = #b8e984>
    <!-- <img class="vote" src="vote.jpg" alt="vote"> -->
    <div id = "headerSection">
        <h1>Online Voting System</h1>
    </div>
    <hr>
    <div id="bodySection">
        <h2>Registration</h2>
        <form action="registration.php" method="POST">
            <input type="text" name="name" placeholder="Name"><br><br>
            <input type="email" name="email" placeholder="Email"><br><br>
            <input type="text" name="id" placeholder="ID"><br><br>
            <input type="password" name="password" placeholder="Password"><br><br>
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
            <button style="padding:5px;font-size: 15px;background-color: #3498db;color:white;border-radius: 5px;">Register</button><br><br>
            Already user? <a href="index.html">Login here</a>
        </form>
    </div>
</body>
</html>