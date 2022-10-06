<?php
require_once "config.php";
require_once 'Utils.php';
require_once 'dals/CategoryDAL.php';
require_once 'dals/ProductDAL.php';
$conn = mysqli_connect('localhost','root','','fanofan');
if(!$conn){
  echo mysqli_connect_error();
}
$rs = mysqli_query($conn, "SELECT *,product.id as product_id,product.name as product_name,category.name as category_name FROM product INNER JOIN category ON product.category_id=category.id");
$categoryDAL = new CategoryDAL();
$categoryList = $categoryDAL->getList();
$productDAL = new ProductDAL();
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
   <!-- banner -->
   <section>
      <div class="w-full bg-no-repeat bg-cover relative h-96" style="background-image: url('./img/background.jpg');">
         <div class="absolute top-3/4 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 text-white text-center">
            <h1 class="text-4xl mb-5 font-bold max-w-2xl md:leading-relaxed md:text-5xl">Ceiling LED Light Fans</h1>
            <p class="text-xl mb-5 font-light">Feel the aristocratic style right in your living room
            <p>
         </div>
      </div>
   </section>

   <div class="container__product">
      <div class="mx-0 my-4 lg:mx-40">
         <h2 class="font-bold text-4xl">NEW Product</h2>
         <p class="text-base">List product description</p>
      </div>
      <div class="grid lg:grid-cols-4 grid-cols-1 gap-8 mx:0 lg:mx-40">
      <?php foreach($rs as $product): ?>
         <div class="relative block mt-3 rounded-sm bg-white shadow-lg shadow-indigo-500/40 ... transition-transform hover:translate-y-1">
            <div>
               <img class="bg-no-repeat bg-contain bg-top-center rounded-t-sm" src="<?php echo BASE_URL . $product['image']; ?>" alt="">
            </div>
            <div>
               <h4 class="m-2 mb-1 text-xl font-semibold leading-7 h-14 text-black"><?php echo $product['product_name']; ?></h4>
               <p class="m-2 mb-1 text-sm leading-7 h-20 text-black block"><?php echo $product['content']; ?></p>
               <div class="flex items-baseline flex-wrap my-0 mx-2">
                  <span class="text-red-600 text-2xl mt-1"><?php echo Utils::formatMoney($product['price'])  ?></span>
               </div>
               <div class="text-lg flex pb-2 pt-2 px-2  font-light text-gray-500">
                  <a href="add-to-card.php?id=<?php echo $product['product_id']; ?>" class="border border-inherit bg-slate-900 text-white px-3 py-1 rounded-md hover:bg-red-500 hover:border-transparent  justify-between items-center"><i class="fa fa-cart-plus" aria-hidden="true"></i></a>
                  <a href="detail.php?id=<?php echo $product['product_id']; ?>" class="border border-inherit bg-slate-900 text-white px-3 py-1 rounded-md hover:bg-red-500 hover:border-transparent  justify-between items-center ml-2">Show
                     more</a>
               </div>
            </div>
         </div>
         <?php endforeach ?>
      </div>
   </div>
   <a href="product.php"><button class="invisible border border-inherit bg-slate-900 text-white px-9 py-3 rounded-full hover:bg-red-500 hover:border-transparent flex justify-between items-center m-auto my-8 md:visible">More
         product >></button></a>
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
         <p><i class="fa fa-home text-base" aria-hidden="true"> Ha Noi, Viet Nam</i></p>
         <p><i class="fa fa-envelope-o text-base" aria-hidden="true"> abcd@gmail.com</i></p>
         <p><i class="fa fa-phone text-base" aria-hidden="true"> 90-123-4567</i></p>
         <p><i class="fa fa-print text-base" aria-hidden="true"> 90-123-4567</i></p>
      </div>
   </section>
   <div class="text-center my-4">
      <p class="text-gray-500">&copy;2020 Copyright: FANoFAN.vn</p>
   </div>
   <a class="fixed w-20 h-14 bottom-10 right-40 bg-sky-600 text-white rounded-full text-center shadow-slate-500 hover:ease-out duration-300 ... " href=""><i class="fa fa-shopping-cart inline-block text-2xl mt-2.5 hover:text-red-500" aria-hidden="true"></i></a>
   <!-- mainjs -->
   <script src="../Eprojects/main.js"></script>
</body>

</html>