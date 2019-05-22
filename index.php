<?php
session_start();
if(isset($_SESSION["logged"])){

include 'db.php';

include 'comp/header_main.php';

?>
<div class="container">
<br>
<?php 

    $sql = "SELECT * FROM categories INNER JOIN articles ON categories.id = articles.category_id;";
    $result = mysqli_query($connection, $sql);
    $resultCheck = mysqli_num_rows($result);
    
    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<h4>".$row['heading']."</h4><br><div class='row'><div class='col-md-6'><img class='img-fluid' src='".$row['image']."'></div><div class='col-md-6'><p>".$row['text']."</p><br><button type='button' class='btn btn-outline-primary'>Read more</button><br><br><b>Category:</b> ".$row['name']." <br><b>Author:</b> ".$row['author']."</div></div><br>";
        }
    }
?>

</div>
<?php 
include 'comp/footer.php';
    
}else{
    header("location: login.php?error=unauthorized");
    exit();
};

?>