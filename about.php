<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/base.css">
</head>

<body>
    <!-- header -->
    <header style="background-color: #f8f9fa;">
        <!-- container -->
        <div class="container mx-auto px-4">
            <nav class="flex justify-between items-center py-5">
                <!-- logo -->
                <div style="height: 35px; width: 138px;" class="w-28 lg:w-full lg:mx-5 z-20 mx-0">
                    <a href="home.html"><img src="../Eprojects/img/logo.png" alt=""></a>
                </div>
                <!-- link -->
                <ul id="menu" class="invisible fixed z-20 top-0 left-0 w-full h-screen flex flex-col justify-center items-center bg-gray-900 bg-opacity-90 lg:bg-transparent lg:h-auto lg:flex-row lg:justify-evenly lg:static
                    md:visible">
                    <li class="m-12 lg:m-0"><a href="index.php"
                            class="text-white md:text-black hover:text-red-500">Home</a>
                    </li>
                    <li class="m-12 lg:m-0"><a href="product.php"
                            class="text-white md:text-black hover:text-red-500">Product</a></li>
                    <li class="m-12 lg:m-0"><a href="about.php"
                            class="text-white md:text-black hover:text-red-500">About</a></li>
                    <button class="m-12 lg:m-0 text-white md:text-black hover:text-red-500"><a
                            href="signup.php">Signup</a></button>
                    <button class="m-12 lg:m-0 text-white md:text-black hover:text-red-500"><a
                            href="login.php">Login</a> </button>
                </ul>
                <!-- menu botton -->
                <div id="menu-button" class="z-20 lg:hidden cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>

                </div>
            </nav>
        </div>
    </header>
    <div>
        <h2 class="text-center pt-4 pb-3 font-normal lg:text-5xl text-3xl uppercase tracking-wide text-slate-600 font-sans">MEET OUR
            TEAM</h2>
        <div class="lg:flex grid grid-cols-1 justify-center items-center">
            <div
                class="relative lg:w-1/5 my-6 lg:mx-3 pt-4 rounded-sm bg-slate-100 shadow-lg shadow-indigo-500/40 transition-transform hover:translate-y-1 px-4">
                <div>
                    <img class="bg-no-repeat bg-contain bg-top-center rounded-full" src="../Eprojects/img/avt1.jpg"
                        alt="">
                </div>
                <div>
                    <h4 class="mt-2 text-xl font-semibold leading-10 h-7  text-black text-center">Nguyễn Tuấn Anh</h4>
                    <p class="text-sm capitalize mb-1 text-slate-500 text-center leading-10 h-7">Web developed</p>
                </div>
                <div>
                    <ul class="flex justify-center mx-auto">
                        <li
                            class="border border-inherit text-white px-2 rounded-full bg-slate-400 mb-4 hover:border-transparent cursor-pointer transition-shadow">
                            <i class="fa fa-github" aria-hidden="true"></i></li>
                        <li
                            class="border border-inherit text-white px-2 rounded-full bg-slate-400 mb-4 hover:border-transparent cursor-pointer transition-shadow">
                            <i class="fa fa-facebook" aria-hidden="true"></i></li>
                        <li
                            class="border border-inherit text-white px-2 rounded-full bg-slate-400 mb-4 hover:border-transparent cursor-pointer transition-shadow">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i></li>
                    </ul>
                </div>
            </div>
            <div
                class="relative lg:w-1/5  my-6 lg:mx-3 pt-4 rounded-sm bg-white shadow-lg shadow-indigo-500/40 transition-transform hover:translate-y-1 px-4">
                <div>
                    <img class="bg-no-repeat bg-contain bg-top-center rounded-full" src="../Eprojects/admin/assets/img/avt.jpg"
                        alt="">
                </div>
                <div>
                    <h4 class="mt-2 text-xl font-semibold h-7 text-black text-center">Nguyễn Đức Anh</h4>
                    <p class="text-sm capitalize mb-1 text-slate-500 text-center h-6">UI/UX Designer</p>
                </div>
                <div>
                    <ul class="flex justify-center mx-auto">
                        <li
                            class="border border-inherit text-white px-2 rounded-full bg-slate-400 mb-4 hover:border-transparent cursor-pointer transition-shadow">
                            <i class="fa fa-github" aria-hidden="true"></i></li>
                        <li
                            class="border border-inherit text-white px-2 rounded-full bg-slate-400 mb-4 hover:border-transparent cursor-pointer transition-shadow">
                            <i class="fa fa-facebook" aria-hidden="true"></i></li>
                        <li
                            class="border border-inherit text-white px-2 rounded-full bg-slate-400 mb-4 hover:border-transparent cursor-pointer transition-shadow">
                            <i class="fa fa-envelope-o" aria-hidden="true"></i></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <section>
    <div class="w-full bg-no-repeat bg-cover relative h-96" style="background-image: url('img/factory.jpg');">
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 z-10 text-white text-center">
            <h1 class="text-4xl mb-5 font-bold max-w-2xl md:leading-relaxed md:text-7xl">ABOUT US</h1>
                <a class="text-center text-7xl px-4 no-underline inline-block transition-all" href=""><i
                        class="fa fa-facebook" aria-hidden="true"></i></a>
                <a class="text-center text-7xl px-4 no-underline inline-block transition-all" href=""><i
                        class="fa fa-twitter" aria-hidden="true"></i></a>
                <a class="text-center text-7xl px-4 no-underline inline-block transition-all" href=""><i
                        class="fa fa-google-plus" aria-hidden="true"></i></a>
                <a class="text-center text-7xl px-4 no-underline inline-block transition-all" href=""><i
                        class="fa fa-linkedin" aria-hidden="true"></i></a>
                <a class="text-center text-7xl px-4 no-underline inline-block transition-all" href=""><i
                        class="fa fa-instagram" aria-hidden="true"></i></a>
        </div>
    </div>
</section>
    <div class="row justify-content-center lg:px-44">
        <h3 class="my-4 text-center text-4xl text-inherit leading-5 pt-4 pb-2">THE FANOFAN STORY</h3>
        <hr class="mt-8 box-content truncate">
        <p class="pt-10 text-center text-sm">In 1999, the FANOFAN Company was born. Kind of. Then called the HTTH Fan Co. (HieuTungTuanHuy), we first made
            our mark selling massive ceiling fans that spun slowly but moved astounding amounts of air. The fans kept
            large spaces that lacked air conditioning, such as factories and dairy barns, feeling cool and
            comfortable—and soon enough, plenty of other customers wanted in. Things moved fast after that (and kept
            moving). Only a few years later, we officially changed our name after customers kept calling and asking if
            we made “those fans ceiling” When churches wanted to install fans to keep congregations comfortable, we
            developed the first silent fan motor to meet their needs.</p>
        <p class="pt-10 text-center text-sm">We created a residential fan that blew away ENERGY STAR® ratings and won awards worldwide. In 2014, we had
            the bright idea to create an LED fixture made of heavy-duty anodized, extruded aluminum so it can handle
            whatever you can dish out, launching a division appropriately called Fan Light™.</p>
        <p class="pt-10 text-center text-sm">And we’ve backed everything with serious research, intensive engineering, and an almost obsessive drive to
            innovate and improve. No matter what we’re doing, we go hard every single day, and we’re not stopping.</p>
    </div>

<div class="my-10">
    <iframe style="width: 100%;height:400px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.6586636434654!2d105.78130685041761!3d21.046339485920065!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ab3b4220c2bd%3A0x1c9e359e2a4f618c!2sB%C3%A1ch%20Khoa%20Aptech!5e0!3m2!1svi!2s!4v1664677603980!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
</div>

    <section class="grid lg:grid-cols-4 grid-cols-1 gap-5 py-5 px-10 mr-auto">
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
    <!-- mainjs -->
    <script src="../Eprojects/main.js"></script>
</body>

</html>