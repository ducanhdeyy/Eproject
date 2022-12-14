<?php
require_once('./../../config.php');

$conn = mysqli_connect('localhost', 'root', '', 'fanofan');
if (!$conn) {
  echo mysqli_connect_error();
}
$categoryRS = mysqli_query($conn, "SELECT * FROM category");
if (isset($_FILES['image']) && $_FILES['image']['name']) {
  $duongDanAnh = 'uploads/' . time() . $_FILES['image']['name'];
  move_uploaded_file($_FILES['image']['tmp_name'], $duongDanAnh);
  $name = $_POST['name'];
  $category_id = $_POST['category_id'];
  $price = $_POST['price'];
  $content = $_POST['content'];
  mysqli_query($conn, "INSERT INTO product(name,price,content,image,category_id) VALUES('$name','$price','$content','$duongDanAnh','$category_id')");
  echo mysqli_error($conn);
}
$rs = mysqli_query($conn, "SELECT *,product.id as product_id,product.name as product_name,category.name as category_name FROM product INNER JOIN category ON product.category_id=category.id");
// lấy về số bản ghi có trong bảng
$a = mysqli_num_rows($rs);
// làm tròn số tranglên 
$sotrang = ceil($a / 10);
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $location = ($id - 1) * 10;
  $productList = mysqli_query($conn, "SELECT *,product.id as product_id,product.name as product_name,category.name as category_name FROM product INNER JOIN category ON product.category_id=category.id LIMIT $location,10");
} else {
  $id = 1;
  $location = ($id - 1) * 10;
  $productList = mysqli_query($conn, "SELECT *,product.id as product_id,product.name as product_name,category.name as category_name FROM product INNER JOIN category ON product.category_id=category.id LIMIT $location,10");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <title>
  </title>
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- CSS Files -->
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
          <a class="nav-link active" href="../product/product.php">
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
    <?php include_once '../common/nav.php' ?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-13 mt-4">
          <div class="card h-100 m-auto pl-2">
            <table class="border border-separate border-spacing-2 border-slate-500 ...">
              <a class="py-2 m-auto font-weight-bolder" href="add.php">Add product</a>
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">ID</th>
                  <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">Name</th>
                  <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">price</th>
                  <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">content</th>
                  <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">image</th>
                  <th class="text-center text-uppercase text-secondary text-sm font-weight-bolder">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php while ($product = mysqli_fetch_assoc($productList)) : ?>
                  <tr>
                    <td class="text-center"><?php echo $product['product_id']; ?></td>
                    <td class="text-center"><?php echo $product['product_name']; ?></td>
                    <td class="text-center"><?php echo $product['price']; ?></td>
                    <td class="text-center"><?php echo $product['content']; ?></td>
                    <td class="text-center"><img src="<?php echo BASE_URL . $product['image']; ?>" alt="" width="50"></td>
                    <td class="action">
                      <a class="text-secondary font-weight-bold text-sm p-1" href="edit.php?id=<?php echo $product['product_id']; ?>">Edit</a>
                      <a class="text-secondary font-weight-bold text-sm p-1" href="delete.php?id=<?php echo $product['product_id']; ?>" onclick=" return confirm('Bạn thật sự muốn xóa ?') ">Delete</a>
                    </td>
                  <?php endwhile ?>

                  </tr>
                  <tr>
                    <th>
                      <?php $i = 1;
                      while ($i <= $sotrang) { ?>
                        <div style="width: 100px; list-style:none; display:inline-block">
                          <li class="page-item  <?php if (!$id) {
                                                  $id = 1;
                                                }
                                                echo ($id == $i) ? 'active' : ''; ?>"><a class="page-link" href="<?php 'admin/product/product.php' ?>?id=<?php echo $i ?>"><?php echo $i ?></a></li>
                        </div>
                      <?php $i++;
                      } ?>
                    </th>
                  </tr>
              </tbody>


            </table>
          </div>
        </div>
        <?php include_once '../common/footer.php' ?>
      </div>
      <style>
        .action {
          text-align: center;
        }
      </style>
  </main>
  <!--   Core JS Files   -->
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap.min.js"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
  <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <script src="../assets/js/argon-dashboard.min.js?v=2.0.4"></script>
</body>

</html>