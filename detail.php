<?php
require_once "config.php";
require_once "Utils.php";
require_once "dals/UserDAL.php";
if(!isset($_GET['id']) && is_numeric($_GET['id'])){
    header("location:index.php");
}
$id = $_GET['id'];
$conn = mysqli_connect('localhost','root','','fanofan');
if(!$conn){
    echo mysqli_connect_error();
}
$rs = mysqli_query($conn, "SELECT *FROM product WHERE id=$id");
$product = mysqli_fetch_assoc($rs);
$dal = new UserDAL();
$get = $dal->getOne($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../Eprojects/assets/base.css">
</head>

<body>
    <!-- header -->
    <header style="background-color: #f8f9fa;">
        <!-- container -->
        <div class="container">
            <nav class="flex justify-between items-center py-5 lg:pl-40 px-2">
                <!-- logo -->
                <div style="height: 35px; width: 138px;" class="w-32 lg:w-full z-20">
                    <a href="index.php"><img
                            src="https://hieu-icetea.github.io/T1909M_FANoFAN/img/logo-fanofan-color.png" alt=""></a>
                </div>
                <!-- link -->
                <ul id="menu" class="invisible fixed z-20 top-0 left-0 w-full h-screen flex flex-col justify-center items-center bg-gray-900 bg-opacity-90 md:bg-transparent md:h-auto md:flex-row md:justify-around md:static
                    md:visible">
                    <li class="m-12 md:m-0"><a href="index.php"
                            class="text-white md:text-black hover:text-red-500">Home</a>
                    </li>
                    <li class="m-12 md:m-0"><a href="product.php"
                            class="text-white md:text-black hover:text-red-500">Product</a></li>
                            <li class="m-12 lg:m-0"><a href="about.php"
                                class="text-white md:text-black hover:text-red-500">About</a></li>
                    <button class="m-12 md:m-0 text-white md:text-black hover:text-red-500"><a
                            href="signup.php">Signup</a></button>
                    <button class="m-12 md:m-0 text-white md:text-black hover:text-red-500""><a href="
                        signin.php">Login</a> </button>
                </ul>
                <!-- menu botton -->
                <div id="menu-button" class="z-20 md:hidden cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>

                </div>
            </nav>
        </div>
    </header>

    <div class="grid lg:grid-cols-2 grid-cols-1 gap-4 lg:mx-40 mx-0">
        <div>
            <img src="<?php echo BASE_URL . $product['image'] ?>" alt="">
            <div class="grid grid-cols-3 gap-4">
                <img src="<?php echo BASE_URL .  $product['image'] ?>" alt="">
                <img src="<?php echo BASE_URL .  $product['image'] ?>" alt="">
                <img src="<?php echo BASE_URL .  $product['image'] ?>" alt="">
            </div>
        </div>

        <div>
            <h3 class="font-bold text-2xl mt-6">Royal Strong PC fan</h3>
            <hr style="margin: 16px 0; width: 83%;">
            <table class="border-collapse border border-slate-500 ... lg:w-10/12 w-full ">
                <tbody class="text-left">
                    <tr>
                        <th class="border border-slate-300 px-1">Size</th>
                        <td class="border border-slate-300 px-1">Ceiling fan wingspan 1.42m</td>
                    </tr>
                    <tr>
                        <th class="border border-slate-300 px-1">Material</th>
                        <td class="border border-slate-300 px-1">PC plastic blades</td>
                    </tr>
                    <tr>
                        <th class="border border-slate-300 px-1">Number of wings</th>
                        <td class="border border-slate-300 px-1">Ceiling fan 5 wings</td>
                    </tr>
                    <tr>
                        <th class="border border-slate-300 px-1">Price range</th>
                        <td class="border border-slate-300 px-1">Less than 6 million</td>
                    </tr>
                    <tr>
                        <th class="border border-slate-300 px-1">Location</th>
                        <td class="border border-slate-300 px-1">Ourdoor, Indoors</td>
                    </tr>
                    <tr>
                        <th class="border border-slate-300 px-1">Lamp</th>
                        <td class="border border-slate-300 px-1">No lights</td>
                    </tr>

                </tbody>
            </table>
            <div class="border border-slate-300 mt-3 lg:w-10/12 w-full bg-slate-100">
                <p><i class="fa fa-check p-2" aria-hidden="true"></i>Guarantee:<strong>10 years.</strong>Warranty of
                    shaking.</p>
                <p><i class="fa fa-check p-2" aria-hidden="true"></i>Maintenance:<strong>Free.</strong>2 times/year.</p>
                <p><i class="fa fa-check p-1" aria-hidden="true"></i> Installation:<strong>Free.</strong></p>
            </div>
            <div>
                <p class="py-2 text-base">
                    <span style="color: #ff9900;"><i class="fa fa-star" aria-hidden="true"></i></span>
                    <span style="color: #ff9900;"><i class="fa fa-star" aria-hidden="true"></i></span>
                    <span style="color: #ff9900;"><i class="fa fa-star" aria-hidden="true"></i></span>
                    <span style="color: #ff9900;"><i class="fa fa-star" aria-hidden="true"></i></span>
                    <span><i class="fa fa-star-half-o" aria-hidden="true" style="color: #ff9900;"></i> 4.6/5(896
                        Customer reviews)</span>
                </p>
            </div>
            <div>
                <p class="ml-16 text-2xl text-red-600"><?php echo Utils::formatMoney($product['price']) ?></p>
            </div>
            <div class="container__product-item-source my-6">
                <a href=""
                    class="border border-inherit bg-slate-900 text-white px-4 py-2 rounded-md hover:bg-red-500 hover:border-transparent  justify-between items-center"><i
                        class="fa fa-cart-plus" aria-hidden="true"></i></a>
                <a href=""
                    class="border border-inherit bg-slate-900 text-white px-28 py-2 rounded-md hover:bg-red-500 hover:border-transparent  justify-between items-center ml-5">Buy
                </a>
            </div>
            <div class="border border-slate-300 mt-7 lg:w-10/12 w-full bg-slate-100 rounded-md p-2 text-center">
                <span><i class="fa fa-phone" aria-hidden="true"></i> Support: (036).8353.135</span>
            </div>
        </div>
    </div>
    <div class="grid lg:grid-cols-2 grid-cols-1 gap-4 lg:mx-40 mx-0">
        <div>
            <h2 class="font-bold text-3xl">Product information</h2>
            <p class="text-sm mt-3"><a href="" style="color: blueviolet;">Ceiling fan decorated</a> with 5 Royal Strong
                blades made of high-grade PC plastic,
                wingspan 1.42m designed 3D, the head curved soar creates good airflow, operates with 188x22mm
                Aluminum engine for good heat dissipation, With strong rotational speed up to 215 RPM when operating
                the fan rotates quickly and produces very cool air, the modern, elegant copper color fan is a
                preferred choice of many spaces such as: living room, dining room, bedroom, restaurant, hotel,
                corporate office, ...</p>
            <p class="text-sm mt-7">Royal Villa ceiling fans are a great choice for classic interior space, Royal Villa
                is suitable for
                installation in the living room of villas, villas, townhouses with high ceilings and large rooms.
                Delicately designed, sharp 2 lampshades made of marble, the Royal Villa ceiling fan includes 2
                lights above and below operating on / off separately on 6 LED light bulbs e14 warm light to the
                ceiling very nice warm, The bottom is 3 lam light bulb e14 warm light ancient luxury. Royal Villa
                Ceiling Fan consists of 5 wings of Plywood wooden wingspan of 1.52m operating with 100% copper core
                motor motor size up to 212x25mm fan power is 90w, very durable, strong operation, the arm blade is
                tilted 15 degrees help create a large airflow spread throughout the room space</p>
            <table class="border-collapse border border-slate-500 ... w-12/12 mt-7">
                <tbody class="text-left">
                    <tr>
                        <th class="border border-slate-300 px-1">Trademark</th>
                        <td class="border border-slate-300 px-1">ROYAL</td>
                    </tr>
                    <tr>
                        <th class="border border-slate-300 px-1">Made in</th>
                        <td class="border border-slate-300 px-1">Taiwan (Made in Taiwan, certificate of origin of CO, CQ
                            in full when selling goods).
                            Note: 100% Chinese goods are not available</td>
                    </tr>
                    <tr>
                        <th class="border border-slate-300 px-1">Engine</th>
                        <td class="border border-slate-300 px-1">Aluminum-188×22 (Super durable aluminum engine, smooth
                            operation, the latest technology
                            today)</td>
                    </tr>
                    <tr>
                        <th class="border border-slate-300 px-1">Voltage</th>
                        <td class="border border-slate-300 px-1">220 volt/50Hz</td>
                    </tr>
                    <tr>
                        <th class="border border-slate-300 px-1">Wattage</th>
                        <td class="border border-slate-300 px-1">50w</td>
                    </tr>
                    <tr>
                        <th class="border border-slate-300 px-1">Motor speed</th>
                        <td class="border border-slate-300 px-1">100 – 215 Rpm</td>
                    </tr>
                    <tr>
                        <th class="border border-slate-300 px-1">Wind flow</th>
                        <td class="border border-slate-300 px-1">7810.35 CFM</td>
                    </tr>
                    <tr>
                        <th class="border border-slate-300 px-1">Fan height</th>
                        <td class="border border-slate-300 px-1">33 cm (Depending on the height of your ceiling that
                            Royal technology will change
                            accordingly)</td>
                    </tr>
                    <tr>
                        <th class="border border-slate-300 px-1">Propeller</th>
                        <td class="border border-slate-300 px-1">5 blades made of high-class Composite, designed in 3D
                        </td>
                    </tr>
                    <tr>
                        <th class="border border-slate-300 px-1">Wingspan</th>
                        <td class="border border-slate-300 px-1">1,42m</td>
                    </tr>
                    <tr>
                        <th class="border border-slate-300 px-1">Control</th>
                        <td class="border border-slate-300 px-1">Fan Included Remote Control with 6 wind speeds - ROYAL
                            AC (Genuine - 1 year warranty).
                        </td>
                    </tr>
                    <tr>
                        <th class="border border-slate-300 px-1">Speed</th>
                        <td class="border border-slate-300 px-1">3 wind speeds (Extremely cool). The incline of the wing
                            is 14 degrees, the fan speed is
                            very strong wind, suitable for installing open space rooms such as living room, dining
                            room, common room, restaurant</td>
                    </tr>
                    <tr>
                        <th class="border border-slate-300 px-1">Weight</th>
                        <td class="border border-slate-300 px-1">7,8kg</td>
                    </tr>

                </tbody>
            </table>
            <hr class="mt-7">
            <h4 class="mt-7 font-bold text-3xl">CUSTOMER REVIEW</h4>
            <hr class="mt-3">
            <table class="mt-3">
                <tbody>
                    <tr>
                        <th><img style="width: 68.38px; height: 68.38px; border-radius: 50%; margin-right: 8px;"
                                src="../Eprojects/img/avt.jpg" alt=""></th>
                        <td>
                            <p>
                                <span><i class="fa fa-star" style="color: #ff9900;" aria-hidden="true"></i></span>
                                <span><i class="fa fa-star" style="color: #ff9900;" aria-hidden="true"></i></span>
                                <span><i class="fa fa-star" style="color: #ff9900;" aria-hidden="true"></i></span>
                                <span><i class="fa fa-star" style="color: #ff9900;" aria-hidden="true"></i></span>
                                <span><i class="fa fa-star-half-o" style="color: #ff9900;" aria-hidden="true"></i>4.6/5
                                    (896 reviews)</span>
                            </p>
                            <p>Unbelievable. Very awesome product</p>
                            <p class="mt-2"><a href=""
                                    class="border border-inherit bg-slate-900 text-white px-3 py-1 rounded-md hover:bg-red-500 hover:border-transparent justify-between items-center">Reply</a>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>

            <hr class="mt-3">
            <table class="mt-3">
                <tbody>
                    <tr>
                        <th><img style="width: 68.38px; height: 68.38px; border-radius: 50%; margin-right: 8px;"
                                src="../Eprojects/img/avt.jpg" alt=""></th>
                        <td>
                            <p>
                                <span><i class="fa fa-star" style="color: #ff9900;" aria-hidden="true"></i></span>
                                <span><i class="fa fa-star" style="color: #ff9900;" aria-hidden="true"></i></span>
                                <span><i class="fa fa-star" style="color: #ff9900;" aria-hidden="true"></i></span>
                                <span><i class="fa fa-star" style="color: #ff9900;" aria-hidden="true"></i></span>
                                <span><i class="fa fa-star-half-o" style="color: #ff9900;" aria-hidden="true"></i>4.6/5
                                    (896 reviews)</span>
                            </p>
                            <p>Unbelievable. Very awesome product</p>
                            <p class="mt-2"><a href=""
                                    class="border border-inherit bg-slate-900 text-white px-3 py-1 rounded-md hover:bg-red-500 hover:border-transparent justify-between items-center">Reply</a>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr class="mt-3">
            <table class="mt-3">
                <tbody>
                    <tr>
                        <th><img style="width: 68.38px; height: 68.38px; border-radius: 50%; margin-right: 8px;"
                                src="../Eprojects/img/avt.jpg" alt=""></th>
                        <td>
                            <p>
                                <span><i class="fa fa-star" style="color: #ff9900;" aria-hidden="true"></i></span>
                                <span><i class="fa fa-star" style="color: #ff9900;" aria-hidden="true"></i></span>
                                <span><i class="fa fa-star" style="color: #ff9900;" aria-hidden="true"></i></span>
                                <span><i class="fa fa-star" style="color: #ff9900;" aria-hidden="true"></i></span>
                                <span><i class="fa fa-star-half-o" style="color: #ff9900;" aria-hidden="true"></i>4.6/5
                                    (896 reviews)</span>
                            </p>
                            <p>Unbelievable. Very awesome product</p>
                            <p class="mt-2"><a href=""
                                    class="border border-inherit bg-slate-900 text-white px-3 py-1 rounded-md hover:bg-red-500 hover:border-transparent justify-between items-center">Reply</a>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
            <hr class="mt-3">
            <table class="mt-3">
                <tbody>
                    <tr>
                        <th><img style="width: 68.38px; height: 68.38px; border-radius: 50%; margin-right: 8px;"
                                src="../Eprojects/img/avt.jpg" alt=""></th>
                        <td>
                            <p>
                                <span><i class="fa fa-star" style="color: #ff9900;" aria-hidden="true"></i></span>
                                <span><i class="fa fa-star" style="color: #ff9900;" aria-hidden="true"></i></span>
                                <span><i class="fa fa-star" style="color: #ff9900;" aria-hidden="true"></i></span>
                                <span><i class="fa fa-star" style="color: #ff9900;" aria-hidden="true"></i></span>
                                <span><i class="fa fa-star-half-o" style="color: #ff9900;" aria-hidden="true"></i>4.6/5
                                    (896 reviews)</span>
                            </p>
                            <p>Unbelievable. Very awesome product</p>
                            <p class="mt-2"><a href=""
                                    class="border border-inherit bg-slate-900 text-white px-3 py-1 rounded-md hover:bg-red-500 hover:border-transparent justify-between items-center">Reply</a>
                            </p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="w-96">
            <h2 class="text-3xl font-bold mb-3">Related products</h2>
            <?php foreach($rs as $product): ?>
            <div class="relative block mt-4 rounded-sm bg-white shadow-lg shadow-indigo-500/40 ... transition-transform hover:translate-y-1">
                <div>
                    <img class="bg-no-repeat bg-contain bg-top-center rounded-t-sm" src="<?php echo BASE_URL . $product['image'] ?>"
                        alt="">
                </div>
                <div>
                    <h4 class="m-1 mb-1 text-xl font-semibold leading-7 h-16 text-black"><?php echo  $product['name'] ?></h4>
                    <p class="m-1 mb-1 text-sm leading-7 h-14 text-black block"><?php echo  $product['content'] ?></p>
                    <div class="flex items-baseline flex-wrap my-0 mx-2">
                        <span class="text-red-600 text-2xl mt-1"><?php echo Utils::formatMoney($product['price'])  ?></span>
                    </div>
                    <div class="text-lg flex pb-2 pt-2 px-2 font-light text-gray-500">
                        <a href=""
                            class="border border-inherit bg-slate-900 text-white px-3 py-1 rounded-md hover:bg-red-500 hover:border-transparent  justify-between items-center"><i
                                class="fa fa-cart-plus" aria-hidden="true"></i></a>
                        <a href="detail.php"
                            class="border border-inherit bg-slate-900 text-white px-3 py-1 rounded-md hover:bg-red-500 hover:border-transparent  justify-between items-center ml-2">Show
                            more</a>
                    </div>
                </div>
            </div>
            <?php endforeach ?>
        </div>
        

    </div>
    <section class="grid lg:grid-cols-4 grid-cols-1 gap-5 py-5 px-10 lg:mx-32 lg:mr-32 lg:text-left text-center">
        <div>
            <h6 class="text-lg font-bold uppercase text-gray-700">Copany name</h6>
            <p class="text-base">The FANoFAN Co. is the original and premier source for contemporary ceiling fan design,
                producing the
                most complete, exclusively modern collection of ceiling fans available.</p>
        </div>
        <div>
            <h6 class="text-lg font-bold uppercase text-gray-700">PRODUCTS</h6>
            <p><a class="text-base hover:text-orange-400" href="">Ceiling Fans</a></p>
            <p><a class="text-base hover:text-orange-400" href="">Table Fans</a></p>
            <p><a class="text-base hover:text-orange-400" href="">Exhaust</a></p>
            <p><a class="text-base hover:text-orange-400" href="">Royal Fans</a></p>
        </div>

        <div>
            <h6 class="text-lg font-bold uppercase text-gray-700">USEFUL LINKS</h6>
            <p><a class="text-base hover:text-orange-400" href="">Your Account</a></p>
            <p><a class="text-base hover:text-orange-400" href="">Become an Affiliate</a></p>
            <p><a class="text-base hover:text-orange-400" href="">Shipping Rates</a></p>
            <p><a class="text-base hover:text-orange-400" href="">Help</a></p>
        </div>

        <div>
            <h6 class="text-lg font-bold uppercase text-gray-700">CONTACT</h6>
            <p><i class="fa fa-home text-base" aria-hidden="true">Ha Noi, Viet Nam</i></p>
            <p><i class="fa fa-envelope-o text-base" aria-hidden="true">abcd@gmail.com</i></p>
            <p><i class="fa fa-phone text-base" aria-hidden="true">90-123-4567</i></p>
            <p><i class="fa fa-print text-base" aria-hidden="true">90-123-4567</i></p>
        </div>
    </section>
    <div class="text-center my-4">
        <p class="text-gray-500">&copy;2020 Copyright: FANoFAN.vn</p>
    </div>
    <script src="../Eprojects/main.js"></script>
</body>

</html>