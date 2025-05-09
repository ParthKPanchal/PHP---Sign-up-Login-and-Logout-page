<?php

$login=0;
$invalid=0;
    if($_SERVER['REQUEST_METHOD']=='POST'){
        include 'connect.php';
        $username=$_POST['username'];
        $password=$_POST['password'];

        $sql="SELECT * from `registration` where username='$username' AND password='$password'";
        $result=mysqli_query($con,$sql);
        if($result){
          $num=mysqli_num_rows($result);
          if($num>0){
            // echo "Login Successfully";
            $login=1;
            session_start();
            $_SESSION['username']=$username;
            header('location:home.php');
          }else{
            // echo "Invalid Data";
            $invalid=1;
          }
        }

    }
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
  </head>
  <body>
  <?php
  if($invalid){
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
  <strong>ERROR!!! </strong> Details were invalid credentials.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  ?>

<?php
  if($login){
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
  <strong>Congratulation! </strong> You are successfully Logged in.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';
  }
  ?>
    <h1 class="text-center">Login to our website</h1>
   <div class="Container m-5">
   <form action="login.php" method="post">
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">User Name</label>
    <input type="text" class="form-control" placeholder="Enter your username" name="username">
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" placeholder="Enter your Password" name="password">
  </div>
  <button type="submit" class="btn btn-primary w-100">Login</button>
</form>
   </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js" integrity="sha384-j1CDi7MgGQ12Z7Qab0qlWQ/Qqz24Gc6BM0thvEMVjHnfYGF0rmFCozFSxQBxwHKO" crossorigin="anonymous"></script>
  </body>
</html>