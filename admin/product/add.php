<?php
session_start();
$dir = str_replace("admin\product", "", __DIR__);
require_once $dir . 'dals/ProductDAL.php';
require_once $dir . 'dals/CategoryDAL.php';

$dal = new ProductDAL();
$categoryDAL = new CategoryDAL();
$categoryList = $categoryDAL->getList();
if (isset($_FILES['image']) && $_FILES['image']['name'] != null && isset($_POST['name'])) {
    $newDir  = date('m') . '-' . date('Y'); //08-2022
    $relativeDir = '/uploads/' . $newDir;
    $newDir = $dir . $relativeDir;
    if (!file_exists($newDir) || is_file($newDir)) {
        mkdir($newDir);
    }
    $imageName = time() . $_FILES['image']['name'];
    $fullImagePath = $newDir . '/' . $imageName;
    try {
        move_uploaded_file($_FILES['image']['tmp_name'], $fullImagePath);
        $data = $_POST;
        $data['image'] = $relativeDir . '/' . $imageName;
        $data['content'] = htmlentities($data['content']);
        $checked = $dal->addOne($data);
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
    } catch (\Throwable $th) {
    }
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
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">Account pages</h6>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../pages/profile.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-02 text-dark text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../pages/sign-in.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-single-copy-04 text-warning text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Sign In</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link " href="../pages/sign-up.php">
                        <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="ni ni-collection text-info text-sm opacity-10"></i>
                        </div>
                        <span class="nav-link-text ms-1">Sign Up</span>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <main class="main-content position-relative border-radius-lg ">
        <?php include_once '../common/nav.php' ?>
        <div class="container-fluid py-4">
            <div class="row">
                <div class="col-md-7 mt-4 mx-auto">
                    <div class="card h-100 mb-4 p-2">
                        <form method="post" enctype="multipart/form-data">
                            <div class="mb-2">
                                <label for="name" class="form-label">Image</label>
                                <input type="file" required class="form-control" name="image" id="image">
                            </div>


                            <div class="mb-2">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" required class="form-control" name="name" id="name">
                            </div>

                            <div class="mb-2">
                                <label for="price" class="form-label">Price</label>
                                <input type="text" required class="form-control" name="price" id="price">
                            </div>


                            <div class="mb-2">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-control" name="category_id" id="category">
                                    <?php foreach ($categoryList as $category) {
                                    ?>
                                        <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                                    <?php
                                    }  ?>
                                </select>
                            </div>


                            <div class="mb-3">
                                <label for="content" class="form-label">Content</label>
                                <textarea class="form-control" name="content" id="content">

                            </textarea>
                            </div>


                            <div>
                                <button class="btn btn-primary">Add</button>
                            </div>
                        </form>
                    </div>
                </div>
                <?php include_once '../common/footer.php' ?>
            </div>
    </main>
</body>

</html>