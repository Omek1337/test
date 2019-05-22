<?php
session_start();
if(isset($_SESSION["logged"])){

include 'db.php';
 

$heading = $_POST['heading'];
$url = $_POST['url'];
$text = $_POST['text'];
$author = $_POST['author'];
$updated_id = $_SESSION['update_id'];
    
echo $updated_id."<br>";
    echo $heading."<br>";
    echo $url."<br>";
    echo $text."Text <br>";
    echo $author."<br> Author";

    
$add_query = "UPDATE articles SET heading = '$heading' , image = '$url', text = '$text', author = '$author' WHERE id = '$updated_id'";
mysqli_query($connection, $add_query);

header("location: update.php?update=success");
exit();
    
}else{
    header("location: login.php?error=unauthorized");
    exit();
};

?>