<?php
session_start();
//echo __DIR__; //C:\xampp\htdocs\shops\admin\user
$dir = str_replace("admin\user","", __DIR__); //C:\xampp\htdocs\shops\
require_once $dir . 'dals/UserDAL.php'; //relative C:\xampp\htdocs\shops\UserDAL.php -> tuyet doi
$dal = new UserDAL();
if (isset($_POST['email'])) {
  
  $checked = $dal->addOne($_POST);
  if ($checked) {
    $_SESSION['add-status'] = [
      'success' => 1,
      'message' => 'Add successfully'
    ];
  } else {
    $_SESSION['add-status'] = [
      'success' => 0,
      'message' => 'Add failed'
    ];
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="" href="../assets/img/favicon.png">
  <title>
    User
  </title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <link id="pagestyle" href="../assets/css/argon-dashboard.css?v=2.0.4" rel="stylesheet" />
</head>

<body class="g-sidenav-show   bg-gray-100">
  <div class="min-height-300 bg-primary position-absolute w-100"></div>
  <aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-4 " id="sidenav-main">
    <div class="sidenav-header">
      <i class="fas fa-times p-3 cursor-pointer text-secondary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
      <a class="navbar-brand m-0" href="" target="_blank">
        <span class="ms-1 font-weight-bold text-3xl">FanoFan</span>
      </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse  w-auto " id="sidenav-collapse-main">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link " href="../user/user.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="fa fa-user me-sm-1-grid-58 text-warning text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1 pt-1">User</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../category/category.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-tv-2 text-primary text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Category</span>
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="../product/product.php">
            <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
              <i class="ni ni-credit-card text-success text-sm opacity-10"></i>
            </div>
            <span class="nav-link-text ms-1">Product</span>
          </a>
        </li>
      </ul>
    </div>
  </aside>
  <main class="main-content position-relative border-radius-lg ">
    <!-- End Navbar -->
    <?php include_once '../common/nav.php' ?>
    <div class="container-fluid py-4 px-12">
      <div class="row bg-white border-radius-2xl">
        <?php
        if (isset($_SESSION['add-status'])) {
          if ($_SESSION['add-status']['success'] == 1) {
            echo '<div class="alert alert-success" role="alert">
                    ' . $_SESSION['add-status']['message'] . '
                  </div>';
          } else {
            echo '<div class="alert alert-danger" role="alert">
                    ' . $_SESSION['add-status']['message'] . '
                  </div>';
          }
          unset($_SESSION['add-status']);
        }
        ?>
        <form method="post">
          <div class="m-4">
            <label for="exampleFormControlInput1" class="form-label">Author</label>
            <input type="name" required class="form-control" name="author" id="exampleFormControlInput1">
          </div>
          <div class="m-4">
            <label for="exampleFormControlInput1" class="form-label">Email address</label>
            <input type="email" required class="form-control" name="email" id="exampleFormControlInput1">
          </div>
          <div class="m-4">
            <label for="password" class="form-label">Password</label>
            <input type="text" required class="form-control" name="password" id="password">
          </div>
          <div class="m-4">
            <label for="phone" class="form-label">Phone</label>
            <input type="phone" required class="form-control" name="phone" id="phone">
          </div>

          <div>
            <button class="btn btn-primary m-4">Add</button>
          </div>
        </form>
      </div>
      <?php include_once '../common/footer.php' ?>
    </div>
  </main>
</body>

</html>