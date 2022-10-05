<?php
require_once "config.php";
require_once 'Utils.php';
$conn = mysqli_connect('localhost', 'root', '', 'fanofan');
if (!$conn) {
    echo mysqli_connect_error();
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="./assets/base.css">
</head>

<body>
    <!-- header -->
    <header style="background-color: #f8f9fa;">
        <!-- container -->
        <div class="container mx-auto px-4">
            <nav class="flex justify-between items-center py-5">
                <!-- logo -->
                <div style="height: 35px; width: 138px;" class="w-28 lg:w-full lg:mx-5 z-20 mx-0">
                    <a href="index.php"><img src="./img/logo.png" alt=""></a>
                </div>
                <!-- link -->
                <ul id="menu" class="invisible fixed z-20 top-0 left-0 w-full h-screen flex flex-col justify-center items-center bg-gray-900 bg-opacity-90 lg:bg-transparent lg:h-auto lg:flex-row lg:justify-evenly lg:static
                    md:visible">
                    <li class="m-12 lg:m-0"><a href="index.php" class="text-white md:text-black hover:text-red-500">Home</a>
                    </li>
                    <li class="m-12 lg:m-0"><a href="product.php" class="text-white md:text-black hover:text-red-500">Product</a></li>
                    <li class="m-12 lg:m-0"><a href="about.php" class="text-white md:text-black hover:text-red-500">About</a></li>
                    <button class="m-12 lg:m-0 text-white md:text-black hover:text-red-500"><a href="signup.php">Signup</a></button>
                    <button class="m-12 lg:m-0 text-white md:text-black hover:text-red-500"><a href="login.php">Login</a> </button>
                </ul>
                <!-- menu botton -->
                <div id="menu-button" class="z-20 md:hidden cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>

                </div>
            </nav>
        </div>
    </header>
    <div class="grid lg:flex gap-3">
        <div class="w-full lg:ml-40 mx-0">
            <div class="border-2 border-sky-500 my-6 shadow-lg shadow-indigo-500/40 ...">
                <div class="card-header border-b-2 border-sky-500 bg-slate-400 px-3 text-xl text-white"> Ceiling Fans
                </div>
                <div class="">
                    <p><a class="px-3 hover:text-slate-600" href="# ">Modern Ceiling Fan</a></p>
                    <p><a class="px-3 hover:text-slate-600" href="# ">Classic Ceiling Fan</a> </p>
                    <p> <a class="px-3 hover:text-slate-600" href="# ">Beautiful Wall Fan</a> </p>
                    <p><a class="px-3 hover:text-slate-600" href="# ">Unique-Strange Ceiling fan</a> </p>
                    <p><a class="px-3 hover:text-slate-600" href="# ">Ceiling Fan Accessories</a></p>
                </div>
            </div>
            <div class="border-2 border-sky-500 shadow-lg shadow-indigo-500/40 ...">
                <div class="card-header border-b-2 border-sky-500 bg-slate-400 px-3 text-xl text-white">Table Fan
                </div>
                <div class="">
                    <p><a class="px-3 hover:text-slate-600" href="# ">Table fan with 3 wings</a> </p>
                    <p> <a class="px-3 hover:text-slate-600" href="# ">Table fan charged</a> </p>
                    <p><a class="px-3 hover:text-slate-600" href="# ">High foot fan</a> </p>
                    <p> <a class="px-3 hover:text-slate-600" href="# ">Misting fan</a> </p>
                    <p><a class="px-3 hover:text-slate-600" href="# ">Fans for outdoor</a> </p>
                </div>
            </div>
        </div>

        <div class="grid lg:grid-cols-3 grid-cols-1 gap-8 lg:mr-14 mt-3">
            <?php foreach ($rs as $product) : ?>
                <div>
                    <div class="relative block mt-3 rounded-sm bg-white shadow-lg shadow-indigo-500/40 ... transition-transform hover:translate-y-1">
                        <div>
                            <img class="bg-no-repeat bg-contain bg-top-center rounded-full w-50%" src="<?php echo BASE_URL . $product['image'] ?>" alt="">
                        </div>
                        <div>
                            <h4 class="m-2 mb-1 text-xl font-semibold lg:h-14 h-14 text-black"><?php echo $product['product_name'] ?></h4>
                            <p class="m-2 mb-1 text-sm lg:h-14 h-14 text-black block"><?php echo $product['content'] ?></p>
                            <div class="flex items-baseline flex-wrap my-0 mx-2">
                                <span class="text-red-600 text-2xl mt-1"><?php echo Utils::formatMoney($product['price']) ?></span>
                            </div>
                            <div class="text-lg flex pb-2 pt-2 px-2 font-light text-gray-500">
                                <a href="" class="border border-inherit bg-slate-900 text-white px-3 py-1 rounded-md hover:bg-red-500 hover:border-transparent  justify-between items-center"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                                <a href="detail.php?id=<?php echo $product['product_id']; ?>" class="border border-inherit bg-slate-900 text-white px-3 py-1 rounded-md hover:bg-red-500 hover:border-transparent  justify-between items-center ml-2">Show
                                    more</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach ?>
        </div>
    </div>
    <div class="text-right mr-16 mt-4">
        <?php $i = 1;
        while ($i <= $sotrang) { ?>
            <div style="width: 50px; list-style:none; display:inline-block">
                <li class="page-item  <?php if (!$id) {
                                            $id = 1;
                                        }
                                        echo ($id == $i) ? 'active' : ''; ?>"><a class="page-link border rounded-full ... text-xl p-2 bg-slate-900 text-white hover:bg-red-500 hover:border-transparent" href="<?php 'product.php' ?>?id=<?php echo $i ?>"><?php echo $i ?></a></li>
            </div>
        <?php $i++;
        } ?>
    </div>
    <!-- footer -->
    <section class="grid lg:grid-cols-4 grid-cols-1 gap-5 py-5 px-10 lg:mx-32 lg:mr-32 lg:text-left text-center">
        <div>
            <h6 class="text-lg font-bold uppercase text-gray-700">Copany name</h6>
            <hr style="height: 2em;width:25%;">
            <p class="text-base">The FANoFAN Co. is the original and premier source for contemporary ceiling fan design,
                producing the
                most complete, exclusively modern collection of ceiling fans available.</p>
        </div>
        <div>
            <h6 class="text-lg font-bold uppercase text-gray-700">PRODUCTS</h6>
            <hr style="height: 2em;width:25%;">
            <p><a class="text-base hover:text-orange-400" href="">Ceiling Fans</a></p>
            <p><a class="text-base hover:text-orange-400" href="">Table Fans</a></p>
            <p><a class="text-base hover:text-orange-400" href="">Exhaust</a></p>
            <p><a class="text-base hover:text-orange-400" href="">Royal Fans</a></p>
        </div>

        <div>
            <h6 class="text-lg font-bold uppercase text-gray-700">USEFUL LINKS</h6>
            <hr style="height: 2em;width:25%;">
            <p><a class="text-base hover:text-orange-400" href="">Your Account</a></p>
            <p><a class="text-base hover:text-orange-400" href="">Become an Affiliate</a></p>
            <p><a class="text-base hover:text-orange-400" href="">Shipping Rates</a></p>
            <p><a class="text-base hover:text-orange-400" href="">Help</a></p>
        </div>

        <div>
            <h6 class="text-lg font-bold uppercase text-gray-700">CONTACT</h6>
            <hr style="height: 2em;width:25%;">
            <p><i class="fa fa-home text-base" aria-hidden="true">Ha Noi, Viet Nam</i></p>
            <p><i class="fa fa-envelope-o text-base" aria-hidden="true">abcd@gmail.com</i></p>
            <p><i class="fa fa-phone text-base" aria-hidden="true">90-123-4567</i></p>
            <p><i class="fa fa-print text-base" aria-hidden="true">90-123-4567</i></p>
        </div>
    </section>
    <div class="text-center my-4">
        <p class="text-gray-500">&copy;2020 Copyright: FANoFAN.vn</p>
    </div>
    <a class="fixed w-20 h-14 bottom-10 right-40 bg-sky-600 text-white rounded-full text-center shadow-slate-500 hover:ease-out duration-300 ... " href=""><i class="fa fa-shopping-cart inline-block text-2xl mt-2.5 hover:text-red-500" aria-hidden="true"></i></a>
    <script src="../Eprojects/main.js"></script>
</body>

</html>