<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="">

    <!-- Start Header  -->
    <header class="">
        <!-- start nav  -->
        <nav class="w-screen h-auto  flex items-center grid grid-cols-4 p-5">
            <a href="" class="flex justify-center items-center">
                <img src="./assets/img/fav/perfumlogo.png" alt="" width="50px">
                <h1 class="font-[] text-xl">Perum Dej</h1>

            </a>

            <div class="flex justify-start items-center">
                <ul class="flex justify-start items-center text-[17px]">
                    <li class="mr-5"><a href="index.php">All</a></li>
                    <li class="mr-5"><a href="menfrg.php">Men</a></li>
                    <li class="mr-5"><a href="womenfrg.php">Women</a></li>
                    <!-- <li class="mr-5"><a href="">Unisex</a></li> -->

                </ul>
            </div>


            <form action="" class="flex justify-center items-center">
                <label for="search">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-gray-500">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>

                </label>
                <input type="search" name="search" id="search"
                    class=" border-b ml-4 focus:outline-none autofill:bg-yellow-200 placeholder-[#01125f]  placeholder-opacity-75 "
                    placeholder="Search...">
            </form>

            <div class="flex justify-center items-center p-3">


                <div class="flex justify-center items-center mr-10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>

                    <span class="ml-3">Account</span>

                </div>



                <div class="flex justify-center items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-gray-600">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                    </svg>
                    <span class="ml-3">Bag</span>
                </div>
            </div>


        </nav>
    </header>


    <section class=" mt-6 mb-5">
        <div class=" grid grid-cols-2 p-2">
            <div class="flex justify-center">
                <h1 class=" text-3xl">ALL's FRAGRANCES</h1>
            </div>

            <div>
                <ul class="flex justify-center items-center">
                    <li class="font-bold mr-5">Sort by : </li>
                    <li class="mr-5"><a href="" class="">Best Selling</a></li>
                    <li class="mr-5"><a href="" class="">Price Ascending</a></li>
                    <li class="mr-5"><a href="" class="">Price Descending</a></li>
                    <li class="mr-5"><a href="" class="">Review</a></li>
                </ul>
            </div>
        </div>
    </section>


    <section class="">
        <div class="grid grid-cols-3">
            <div class=" flex  justify-end ">
                <div class="w-80">

                    <div class="h-auto mb-5">
                        <h1 class="font-[500] uppercase mb-1">Filter by</h1>
                        <div class=" flex flex-wrap leading-3">
                            <span
                                class=" bg-stone-100 text-stone-400 capitalize border rounded p-1 m-1 flex justify-center items-center">
                                <span> Unisex</span>
                                <span class="text-xs text-stone-500 font-sans mx-1">x</span>
                            </span>

                            <span
                                class=" bg-stone-100 text-stone-400 capitalize border rounded p-1 m-1 flex justify-center items-center">
                                <span> Women</span>
                                <span class="text-xs text-stone-500 font-sans mx-1">x</span>
                            </span>


                            <span
                                class=" bg-stone-100 text-stone-400 capitalize border rounded p-1 m-1 flex justify-center items-center">
                                <span> A</span>
                                <span class="text-xs text-stone-500 font-sans mx-1">x</span>
                            </span>


                            <span
                                class=" bg-stone-100 text-stone-400 capitalize border rounded p-1 m-1 flex justify-center items-center">
                                <span> C</span>
                                <span class="text-xs text-stone-500 font-sans mx-1">x</span>
                            </span>


                            <span
                                class=" bg-stone-100 text-stone-400 capitalize border rounded p-1 m-1 flex justify-center items-center">
                                <span> E</span>
                                <span class="text-xs text-stone-500 font-sans mx-1">x</span>
                            </span>

                            <span
                                class=" bg-stone-100 text-stone-400 capitalize border rounded p-1 m-1 flex justify-center items-center">
                                <span class=""> Male
                                </span>
                                <span class="text-xs text-stone-500 font-sans mx-1">x</span>
                            </span>


                            <span
                                class=" bg-stone-100 text-stone-400 capitalize border rounded p-1 m-1 flex justify-center items-center">
                                <span> Male</span>
                                <span class="text-xs text-stone-500 font-sans mx-1">x</span>
                            </span>

                        </div>
                    </div>

                    <div class="h-auto mb-5">
                        <h1 class="uppercase mb-1">Brand</h1>
                        <span class="text-sm text-blue-300 ml-10">Click a letter to find a perfume</span>
                        <ul class="w-80  flex-wrap flex justify-start items-center mt-2">
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">A</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">B</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">C</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">D</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">E</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">F</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">G</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">H</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">I</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">J</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">K</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">L</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">M</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">N</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">O</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">P</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">Q</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">R</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">S</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">T</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">U</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">V</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">W</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">X</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">Y</li>
                            <li class="w-7 h-7 flex justify-center items-center m-1 bg-stone-100">Z</li>
                        </ul>
                    </div>


                    <div class="h-auto mb-5">
                        <h1 class="font-[500] uppercase mb-1">Price</h1>
                        <input type="text" placeholder=" Min"
                            class="w-20 border border-2 rounded m-1 p-1 focus:ring-1 focus:outline-none">

                        <input type="text" placeholder=" Max"
                            class="w-20 border border-2 rounded m-1 p-1 focus:ring-1 focus:outline-none">

                        <button type="submit" class="w-24 border border-2 rounded m-1 p-1">UPDATE</button>

                    </div>


                    <div>
                        <h1 class="font-[500] uppercase mb-1">Type</h1>
                        <form action="unisex-type.php" method="post">
                            <a href="unisex-type.php" class="flex items-center">

                                <input type="checkbox" name="type" id="type" class="m-1" >
                                <label for="type">Unisex</label>

                            </a>

                            <a class="flex items-center">

                                <input type="checkbox" name="ftype" id="ftype" class="m-1">
                                <label for="ftype">Women</label>

                            </a>

                            <a class="flex items-center">

                                <input type="checkbox" name="mtype" id="mtype" class="m-1">
                                <label for="mtype">Male</label>

                            </a>
                        </form>
                    </div>

                </div>
            </div>


            <div class="col-span-2 ">
                <div>
                    <span class="uppercase text-xs">Home <span class="m-1">|</span> All's Fragrances</span>
                </div>





                <?php

                require_once "allfrg.php";


                ?>



            </div>

        </div>




        </div>
    </section>


</body>

</html>