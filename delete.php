<?php
session_start();
if(isset($_SESSION["logged"])){

include 'db.php';

include 'comp/header_main.php';

?>
<div class="container">
<br>
<?php 

    $sql = "SELECT id,heading FROM articles;";
    $result = mysqli_query($connection, $sql);
    $resultCheck = mysqli_num_rows($result);
    
    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<div class='card'><div class='card-body'><center><p>".$row['heading']."</p><form action='delete_form.php' method=post><input type=hidden value='".$row['id']."' name='id'><button type='submit' class='btn btn-danger'>Delete</button></form></center></div></div><br>";
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