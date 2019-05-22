<?php
session_start();
if(isset($_SESSION["logged"])){

include 'db.php';

include 'comp/header_main.php';

?>
<div class="container">
<br>
<div class="alert alert-primary" role="alert">
  *For images use web url's!
</div>
<form action="insert_process.php" method="post">
  <div class="form-group">
    <label>Article heading</label>
    <input type="text" name="heading" class="form-control" placeholder="your heading">
  </div>
  <div class="form-group">
    <label>Image url</label>
    <input type="text" name="url" class="form-control" placeholder="your url">
  </div>
  <div class="form-group">
    <label>Article text</label>
    <textarea class="form-control" name="text"  rows="3"></textarea>
  </div>
  <div class="form-group">
    <label>Category</label>
    <select class="form-control" name="cat">
     <?php 

    $sql = "SELECT name FROM categories;";
    $result = mysqli_query($connection, $sql);
    $resultCheck = mysqli_num_rows($result);
    
    if($resultCheck > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo "<option>".$row['name']."</option>";
        }
    }
    
      ?>
    </select>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input type="text" class="form-control" placeholder="Author" name="author">
  </div>
  <button type="submit" class="btn btn-primary">Insert</button>
</form>

</div>
<?php 
include 'comp/footer.php';
    
}else{
    header("location: login.php?error=unauthorized");
    exit();
};

?>