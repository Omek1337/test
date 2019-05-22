<?php 

$connection = mysqli_connect('localhost','root','','app');

// Check connection
if($connection === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

header('Content-type: text/html; charset=utf-8');

?>