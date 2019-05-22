<?php 
session_start();
unset($_SESSION["logged"]);
unset($_SESSION['update_id']);
header("location: login.php?logout=success");
exit();
?>