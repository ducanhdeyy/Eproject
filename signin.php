<?php
$conn = mysqli_connect('localhost','root','','fanofan');
if(!$conn){
  echo mysqli_connect_error();
}
if(isset($_POST['login'])){
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password = md5($_POST['password']);
  $sql = "SELECT * FROM user WHERE email = '$email' and password = '$password'";
  $success = mysqli_query($conn,$sql);
  if(mysqli_num_rows($success)==1){
    header('location:index.php');
  }else{
    echo "Bạn nhập sai mật khẩu, vui lòng nhập lại";
  }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <script src="https://cdn.tailwindcss.com"></script>
    <title>signin</title>
    <link rel="stylesheet" href="../Eprojects/admin/assets/main.css" />
  </head>
  <body>
    <!-- header -->
    <header style="background-color: #f8f9fa;">
      <!-- container -->
      <div class="container">
          <nav class="flex justify-center items-center py-5 lg:pl-60 pl-1">
              <!-- logo -->
              <div style="height: 35px; width: 138px;" class="w-32 md:w-full z-20">
                 <a href="index.php"><img src="../Eprojects/img/logo.png" alt=""></a>
              </div>
              <!-- link -->
          </nav>
      </div>
      <div class="wrapper">
        <div class="signup">
          <h1 class="signup-heading">Login</h1>
          <div class="signup-or"><span>Or</span></div>
          <form action="#" class="signup-form"method="POST" enctype="multipart/form-data">
            <label for="email" class="signup-label">Email</label>
            <input type="email" id="email" class="signup-input" name="email" placeholder="Eg: a@gmai.com">
            <label for="password" class="signup-label">Password</label>
            <input type="password" id="password" name="password" class="signup-input" placeholder="Mời bạn nhập mật khẩu">
            <button class="signup-submit" name="login">Login</button>
          </form>
          <p class="signup-already">
            <span>Don't have an account yet?</span>
            <a href="signup.php" class="signup-login-link">Signup</a>
          </p>
        </div>
      </div>
  </header>
  </body>
</html>