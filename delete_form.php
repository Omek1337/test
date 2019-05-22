<?php
session_start();
if(isset($_SESSION["logged"])){

include 'db.php';
  
$id = $_POST['id'];
$add_query = "SELECT * FROM articles WHERE id = '$id';";
$add_result = mysqli_query($connection, $add_query);
mysqli_num_rows($add_result);    
$add_row = mysqli_fetch_assoc($add_result);

$delete_query = "DELETE FROM articles WHERE id = '$id';";
mysqli_query($connection, $delete_query); 
    
header("location: delete.php?delete=success");
exit();  
    
}else{
    header("location: login.php?error=unauthorized");
    exit();
};

?>