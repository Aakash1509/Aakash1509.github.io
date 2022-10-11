<?php

$connect = mysqli_connect("localhost","root","","voting");

if(!$connect){
    die(mysqli_error($connect));
}
?>