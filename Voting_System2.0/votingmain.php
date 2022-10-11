<?php
    session_start();
    include('connect.php');

    $getGroups = mysqli_query($connect, "select name, photo, votes from vote where role=2 ");
        if(mysqli_num_rows($getGroups)>0){
            $groups = mysqli_fetch_all($getGroups, MYSQLI_ASSOC);
            $_SESSION['groups'] = $groups;
            // $data = mysqli_fetch_array($getGroups);
            // $_SESSION['status'] = $data['status'];
        }
        // if(!isset($_SESSION['name'])){
        //     header("location: ../");
        // }
        // $data = $_SESSION['data'];
    
        // if($_SESSION['status']==1){
        //     $status = '<b style="color: green">Voted</b>';
        // }
        // else{
        //     $status = '<b style="color: red">Not Voted</b>';
        // }
        // $votes = $_POST['gvotes'];
        // $total_votes= $votes+1;
        // $gid = $_POST['gid'];
        // $uid = $_SESSION['id'];
    
        // $update_votes = mysqli_query($connect, "update vote set votes='$total_votes' where id='$gid'");
        // $update_status = mysqli_query($connect, "update vote set status=1 where id='$uid'");
    
        // if($update_status and $update_votes){
        //     $getGroups = mysqli_query($connect, "select name, photo, votes, id from vote where role=2 ");
        //     $groups = mysqli_fetch_all($getGroups, MYSQLI_ASSOC);
        //     $_SESSION['groups'] = $groups;
        //     $_SESSION['status'] = 1;
        //     echo '<script>
        //                 alert("Voting successfull!");
        //                 window.location = "../routes/dashboard.php";
        //             </script>';
        // }
        // else{
        //     echo '<script>
        //                 alert("Voting failed!.. Try again.");
        //                 window.location = "../routes/dashboard.php";
        //             </script>';
        // }
        
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Voting page</title>
    <link rel="stylesheet" href="stylevmain.css">
</head>
<body>
<header>
        <div class="main">
            <ul>
               <li><a href="index.html">About Us</a></li>
               <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        </header>

<div id="groupSection">
                    <?php

                    if(isset($_SESSION['groups'])){
                        $groups = $_SESSION['groups'];
                        for($i=0; $i<count($groups); $i++){
                            ?>
                                <div style="border-bottom: 1px solid #bdc3c7; margin-bottom: 10px">
                                <img style="float: right" src="../uploads/<?php echo $groups[$i]['photo']?>" height="80" width="80">
                                <b>Group Name : </b><?php echo $groups[$i]['name']?><br><br>
                                <b>Votes :</b> <?php echo $groups[$i]['votes']?><br><br>
                                <form method="POST" action="vote.php">
                                <input type="hidden" name="gvotes" value="<?php echo $groups[$i]['votes'] ?>">
                                <input type="hidden" name = "gname" value="<?php echo $groups[$i]['name'] ?>">
                                <?php

                                if($_SESSION['status']==1){
                                    ?>
                                    <button disabled style="padding: 5px; font-size: 15px; background-color: #27ae60; color: white; border-radius: 5px;" type="button">Voted</button>
                                    <?php
                                }
                                else{
                                    ?>
                                    <button style="padding: 5px; font-size: 15px; background-color: #3498db; color: white; border-radius: 5px;" type="submit">Vote</button>
                                    <?php
                                }
                                ?>
                                </form>
                                </div>
                            <?php
                        }
                    }
                    else{
                        ?>
                            <div style="border-bottom: 1px solid #bdc3c7; margin-bottom: 10px">
                                <b>No groups available right now.</b>    
                            </div>
                        <?php
                    }  
                    ?>
                </div>
</body>
</html> -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Voting page</title>
    <link rel="stylesheet" href="stylevmain.css">
    <style>
      #groupSection{
            margin:auto;
            /* border-radius: 30px; */
            /* background-color:white; */
            padding:0;
            /* width: auto; */
            /* padding: 20px; */
            /* float:right; */
            position:absolute;
    top:60%;
    left:50%;
    transform:translate(-50%,-50%);
        }
</style>        
</head> 
<body>
<header>
        <div class="main">
            <ul>
               <li><a href="index.html">About Us</a></li>
               <li><a href="logout.php">Logout</a></li>
            </ul>
        </div>
        </header>

<div id="groupSection">
<div class="desc">
<p><h4>List Of Volunteers</h4></p>
        </div>

                    <?php

                    if(isset($_SESSION['groups'])){
                        $groups = $_SESSION['groups'];
                        for($i=0; $i<count($groups); $i++){
                            ?>
                                <div style="border-bottom: 1px solid #bdc3c7; margin-bottom: 10px">
                                <img style="float: right" src="../uploads/<?php echo $groups[$i]['photo']?>" height="80" width="80">
                                <b>Group Name : </b><?php echo $groups[$i]['name']?><br><br>
                                <b>Votes :</b> <?php echo $groups[$i]['votes']?><br><br>
                                <form method="POST" action="vote.php">
                                <input type="hidden" name="gvotes" value="<?php echo $groups[$i]['votes'] ?>">
                                <input type="hidden" name = "gname" value="<?php echo $groups[$i]['name'] ?>">
                                <?php

                                if($update_votes){
                                    ?>
                                    <button disabled style="padding: 5px; font-size: 15px; background-color: #27ae60; color: white; border-radius: 5px;" type="button">Voted</button>
                                    <?php
                                }
                                else{
                                    ?>
                                    <button style="padding: 5px; font-size: 15px; background-color: #3498db; color: white; border-radius: 5px;" type="submit">Vote</button>
                                    <?php
                                }
                                ?>
                                </form>
                                </div>
                            <?php
                        }
                    }
                    else{
                        ?>
                            <div style="border-bottom: 1px solid #bdc3c7; margin-bottom: 10px">
                                <b>No groups available right now.</b>    
                            </div>
                        <?php
                    }  
                    ?>
                </div>
</body>
</html>