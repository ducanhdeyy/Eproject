<?php
$conn = mysqli_connect('localhost','root','','fanofan');
if(!$conn){
  echo mysqli_connect_error();
}
if(isset($_POST['signup'])){
  $name = $_POST['name'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $password1 = $_POST['password1'];
  $phone = $_POST['phone'];
  if($password != $password1){
    header("location:signup.php");
  }
  $sql = "SELECT *FROM user WHERE email='$email'";
  $rs = mysqli_query($conn,$sql);
  $password = md5($password);
  if(mysqli_num_rows($rs)>0){
    echo 'Tài khoản đã tồn tại';
  } else{
    $sql = "INSERT INTO user(author,email,password,phone) VALUES('$name','$email',$password','$phone')";
    mysqli_query($conn,$sql);
    echo "Đăng ký thành công";
    header("location:index.php");
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />
  <title>Signup</title>
  <link rel="stylesheet" href="../Eprojects/admin/assets/main.css" />
  <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
  <!-- header -->
  <header style="background-color: #f8f9fa;">
    <!-- container -->
    <div class="container">
      <nav class="flex justify-center items-center py-5 lg:pl-60 pl-1">
        <!-- logo -->
        <div style="height: 35px; width: 138px;" class="w-32 md:w-full z-20">
          <a href="index.php"><img src="../Eprojects/admin/assets/main.css" alt=""></a>
        </div>
        <!-- link -->
      </nav>
    </div>
    <div class="wrapper">
      <div class="signup">
        <h1 class="signup-heading">Sign up</h1>
        <div class="signup-or"><span>Or</span></div>
        <form action="" class="signup-form" method="POST" enctype="multipart/form-data">
          <label for="fullname" class="signup-label">Full name</label>
          <input type="text" id="fullname" class="signup-input" name="name" placeholder="Nguyen Duc Anh">
          <label for="email" class="signup-label">Email</label>
          <input type="email" id="email" class="signup-input" name="email" placeholder="Eg: a@gmai.com">
          <label for="password" class="signup-label">Password</label>
          <input type="password" id="password" class="signup-input" name="password" placeholder="Mời bạn nhập mật khẩu">
          <label for="password" class="signup-label">Repeat password </label>
          <input type="password" id="password" class="signup-input" name="password1" placeholder="Mời bạn nhập lại mật khẩu">
          <label for="phone" class="signup-label">Phone</label>
          <input type="text" id="password" class="signup-input" name="phone" placeholder="Mời bạn nhập số điện thoại">
          <button class="signup-submit" name="signup">Sign up</button>
        </form>
        <p class="signup-already">
          <span>Already have an account ?</span>
          <a href="signin.php" class="signup-login-link">Login</a>
        </p>
      </div>
    </div>
</body>

</html>