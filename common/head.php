<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>head</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
        integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <link rel="stylesheet" href="../assets/base.css">
</head>
<body>
<header style="background-color: #f8f9fa;">
        <!-- container -->
        <div class="container">
            <nav class="flex justify-between items-center py-5 lg:pl-40 px-2">
                <!-- logo -->
                <div style="height: 35px; width: 138px;" class="w-32 lg:w-full z-20">
                    <a href="home.html"><img
                            src="https://hieu-icetea.github.io/T1909M_FANoFAN/img/logo-fanofan-color.png" alt=""></a>
                </div>
                <!-- link -->
                <ul id="menu" class="invisible fixed z-20 top-0 left-0 w-full h-screen flex flex-col justify-center items-center bg-gray-900 bg-opacity-90 md:bg-transparent md:h-auto md:flex-row md:justify-around md:static
                    md:visible">
                    <li class="m-12 md:m-0"><a href="home.html"
                            class="text-white md:text-black hover:text-red-500">Home</a>
                    </li>
                    <li class="m-12 md:m-0"><a href="products-category.html"
                            class="text-white md:text-black hover:text-red-500">Product</a></li>
                    <!-- <li class="m-12 md:m-0"><a href="#" class="text-white md:text-black hover:text-red-500">About</a>
                    </li>
                    <li class="m-12 md:m-0"><a href="#" class="text-white md:text-black hover:text-red-500">Support</a>
                    </li> -->
                    <button class="m-12 md:m-0 text-white md:text-black hover:text-red-500"><a
                            href="signup.html">Signup</a></button>
                    <button class="m-12 md:m-0 text-white md:text-black hover:text-red-500""><a href="
                        login.html">Login</a> </button>
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
</body>
</html>