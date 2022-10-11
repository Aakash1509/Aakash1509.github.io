<?php
session_start();
include('connect.php');

$votes=$_POST['gvotes'];
$total_votes=$votes+1;
$gname=$_POST['gname'];

$update_votes = mysqli_query($connect, "update vote set votes='$total_votes' where name='$gname'");

if($update_votes){
             $getGroups = mysqli_query($connect, "select name, photo, votes from vote where role=2 ");
             $groups = mysqli_fetch_all($getGroups, MYSQLI_ASSOC);
             $_SESSION['groups'] = $groups;
             $_SESSION['status'] = 1;
             echo '<script>
                         alert("Voting successfull! You cannot vote now and you are requested to logout.");
                         window.location = "votingmain.php";
                    </script>';
        }
        else{
        echo '<script>
                        alert("Voting failed!.. Try again.");
                        window.location = "votingmain.php";
                   </script>';
         }

?>