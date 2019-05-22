<?php
session_start();
if(isset($_SESSION["logged"])){

include 'db.php';
include 'comp/header_main.php';

?>
<div class="container">
<br>
<?php 
    
$id = $_POST['id'];
$_SESSION['update_id'] = $id;
$add_query = "SELECT * FROM articles WHERE id = '$id';";
$add_result = mysqli_query($connection, $add_query);
mysqli_num_rows($add_result);    
$add_row = mysqli_fetch_assoc($add_result);
?>

<form action="update_db.php" method="post">
  <div class="form-group">
    <label>Article heading</label>
    <input type="text" name="heading" class="form-control" placeholder="your heading" value='<?php echo $add_row['heading'] ?>'>
  </div>
  <div class="form-group">
    <label>Image url</label>
    <input type="text" name="url" class="form-control" placeholder="your url" value='<?php echo $add_row['image'] ?>'>
  </div>
  <div class="form-group">
    <label>Article text</label>
    <textarea class="form-control" name="text"  rows="5"><?php echo $add_row['text'] ?></textarea>
  </div>
  <div class="form-group">
    <label>Author</label>
    <input type="text" class="form-control" placeholder="Author" name="author" value='<?php echo $add_row['author'] ?>'>
  </div>
  <button type="submit" class="btn btn-primary">Update</button>
</form>

</div>
<?php 
include 'comp/footer.php';
    
}else{
    header("location: login.php?error=unauthorized");
    exit();
};

?>