<?php 
include 'db.php';

include 'comp/header_login.php';
?>

<div class="container">
<div class="alert alert-primary" role="alert">
  *Data for login: test@gmail.com 123
</div>
<form action="login_process.php" method="post">
  <div class="form-group">
    <label>Email address</label>
    <input type="text" class="form-control" placeholder="Login" name="login" >
  </div>
  <div class="form-group">
    <label>Password</label>
    <input type="text" class="form-control" placeholder="Password" name="password" >
  </div>
  <button type="submit" class="btn btn-primary" name="submitted">Submit</button>
</form>
</div>

<?php 
include 'comp/footer.php';
?>