<?php
//echo __DIR__; //C:\xampp\htdocs\shops\admin\user
$dir = str_replace("admin\category", "", __DIR__); //C:\xampp\htdocs\shops\
require_once $dir . 'dals/CategoryDAL.php'; //relative C:\xampp\htdocs\shops\UserDAL.php -> tuyet doi
$dal = new CategoryDAL();
if (isset($_GET['action'])) {
  $id = $_GET['id'];

  if (is_numeric($id) && $_GET['action'] == 'delete') {
    $dal->deleteOne($id);
  }
}
$list = $dal->getList();
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
          <a class="nav-link active" href="../category/category.php">
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
    <?php include_once '../common/nav.php' ?>
    <div class="container-fluid py-4">
      <div class="row">
        <div class="col-md-6 mt-4 mx-auto">
          <div class="card h-100 mb-4 p-2">
            <table class="table ">
              <a href="add.php">Add Category</a>
              <thead>
                <tr>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7" scope="col">Id </th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7" scope="col">Name</th>
                  <th class="text-center text-uppercase text-secondary text-xs font-weight-bolder opacity-7" scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($list as $r) : ?>
                  <tr>
                    <th class="text-center" scope="row"><?php echo $r->id; ?></th>
                    <td class="text-center"><?php echo $r->name; ?></td>
                    <td class="text-center">
                      <a onclick="return confirm('Are you sure you want to delete ?')" class="text-secondary font-weight-bold text-xs p-1" href="?action=delete&id=<?php echo $r->id; ?>">Delete</a>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
        <div class="row mt-4">

        </div>
        <?php include_once '../common/footer.php' ?>
      </div>
  </main>
</body>

</html>