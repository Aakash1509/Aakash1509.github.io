<?php
    // Enter your host name, database username, password, and database name.
    // If you have not set database password on localhost then set empty.
    $con = mysqli_connect("localhost","root","","LoginSystem");
    // Check connection
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // $sql = "SELECT * FROM users";
    // $result = mysqli_query($con,$sql);
    // $row=mysqli_fetch_assoc($result);
    // echo $row['username'];
    // echo $row['email'];
?>