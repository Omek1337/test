<?php
session_start();
if(isset($_SESSION["logged"])){

include 'db.php';
    
$heading = $_POST['heading'];
$url = $_POST['url'];
$text = $_POST['text'];
$cat = $_POST['cat'];
$author = $_POST['author'];
    
$add_query = "SELECT id FROM categories WHERE name = '$cat';";
$add_result = mysqli_query($connection, $add_query);
$add_resultCheck = mysqli_num_rows($add_result);    
    
    if($add_resultCheck > 0){
        while($row = mysqli_fetch_assoc($add_result)){
           $cat = $row['id'];
        }
    }
    
$sql = "INSERT INTO articles (heading,image,text,category_id,author) VALUES ('$heading','$url','$text','$cat','$author');";
mysqli_query($connection, $sql); 

header("location: index.php?insert=success");
exit();  
  
}else{
    header("location: login.php?error=unauthorized");
    exit();
};
?>