<html>
    <head>
        <title> voting </title>
        <link rel="stylesheet" href="stylev.css">
    </head>
    <body>
    <?php
    include('connect.php');
    session_start();
    if(isset($_POST['name'])){
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $image = $_FILES['photo']['name'];
    $tmp_name = $_FILES['photo']['name'];
    $role = $_POST['role'];

    if($password!=$cpassword){
        echo '<script>
                alert("Passwords do not match!");
                window.location = "voting.php";
            </script>';
    }
    else{
             move_uploaded_file($tmp_name,"uploads/$image");
             $insert = "INSERT INTO `voting`.`vote` (`name`, `mobile`, `password`, `photo`, `role`, `status`, `votes`) VALUES ('$name', '$mobile', '$password', '$image','$role',0,0);";
             $result=mysqli_query($connect,$insert);
             if($result){
                 echo '<script>
                 alert("Registration successfull!");
                 window.location = "votingmain.php";
             </script>';
             }
             else{
                 echo "ERROR: $sql <br> $connect->error";
             }
    
         }
        }
        else {

        
?>
        <center>
            <div id="headerSection">
            <h1>Class Representative Elections</h1>  
            </div>
            <hr>

            <h2>Registration</h2>
                <form action="voting.php" method="POST" enctype="multipart/form-data">
                    <input type="text" name="name" placeholder="Name" required>&nbsp
                    <input type="number" name="mobile" placeholder="Mobile" required><br>
                    <input type="password" name="password" placeholder="Password" required>&nbsp
                    <input type="password" name="cpassword" placeholder="Confirm Password" required><br><br>
                    <div id="upload" style="width: 30%">
                        Upload image: <input type="file" id="profile" name="photo">
                    </div><br>
                    <select name="role" style="width: 15%; border: 2px solid black">
                        <option value="1">Voter</option>
                        <option value="2">Volunteer</option>
                    </select><br><br> 
                    <button id="loginbtn" type="submit" name="registerbtn">Ready</button><br><br>
                </form>
                
            </center>
            <?php
    }
?>
    </body>
</html>