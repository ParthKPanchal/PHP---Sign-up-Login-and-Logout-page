<?php
$success=0;
$user=0;

    if($_SERVER['REQUEST_METHOD']=='POST'){
        include 'connect.php';
        $username=$_POST['username'];
        $password=$_POST['password'];

        $sql="SELECT * from `registration` where username='$username'";
        $result=mysqli_query($con,$sql);
        if($result){
          $num=mysqli_num_rows($result);
          if($num>0){
            // echo "User already exist";
            $user=1;
          }else{
            $sql="INSERT INTO `registration`(username,password) values('$username','$password')";
            $result=mysqli_query($con,$sql);
            if($result){
              // echo "Signup Successfull";
              $success=1;
            }else{
              die(mysqli_error($con));
            }
          }
        }

    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sign Up Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>
  <body>

  <?php
  if($user){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>Ohh no Sorry! </strong> User already exist.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  ?>

<?php
  if($success){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congratulation! </strong> You are successfully signed up.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  ?>
    <h1 class="text-center">Sign up page</h1>
   <div class="Container m-5">
   <form action="sign.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">User Name</label>
    <input type="text" class="form-control" placeholder="Enter your username" name="username">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" placeholder="Enter your Password" name="password">
  </div>
  <button type="submit" class="btn btn-primary w-100">Sign Up</button>
</form>
   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>