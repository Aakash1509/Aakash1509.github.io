<?php
$insert = false;
if(isset($_POST['email'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    // echo "Success connecting to the db";

    // Collect post variables
    $email = $_POST['email'];
    $desc = $_POST['description'];
    $sugg = $_POST['suggestions'];
    $sql = "INSERT INTO `volunteering`.`tablev` (`email`,`description`, `suggestions`) VALUES ('$email','$desc', '$sugg');";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spoural Volunteering</title>
    <link rel="stylesheet" href="stylev.css">
    <!-- <style>
        .navbar {
            background-color: yellow;
            /* border-radius: 30px; */
        }

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
        }
        #profile{
            background-color:white;
            width: 30%;
            padding: 20px;
            float:left;
        }
        #Group{
            background-color:white;
            width: 60%;
            padding: 20px;
            float:right;
        }
        #btn {
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
    </style> -->
</head>

<body>
<header>
        <!-- <nav class="navbar">
            <ul>
            <li><a href="logout.php">Logout</a></li>
                <li><a href="index.html">About Us</a></li>
            </ul>
        </nav> -->
        <div class="main">
            <div class="logo">
            <img src="volunteering.webp">    
            </div> 
            <ul>
               <li><a href="index.html">About Us</a></li>
               <li><a href="#">Contact</a></li>
            </ul>
</div>
    </header>
    <div class="container">
        <h1>Fill up this form to volunteer in Spoural</h1>
        <!-- <p>Enter your details to confirm your participation in the trip</p> -->
        


        <form action="volunteering.php" method="post">
            <input type="email" name="email" id="email" placeholder="Enter your email">
            <textarea name="description" id="description" cols="30" rows="10"
                placeholder="Enter any other information here"></textarea>
                <textarea name="suggestions" id="suggestions" cols="30" rows="10"
                placeholder="Shower us with your suggestions if any"></textarea>  
            <button class="btn">Submit</button>

            <!-- <p class="submitMsg">Thanks for submittig your form,we are happy to see you joining us for Paris trip</p> -->
            <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form</p>";
        }
        ?>
        </form>

    </div>
    <script>src = "index.js"</script>

</body>

</html>
