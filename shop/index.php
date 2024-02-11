<?php



require_once "setcookie.php";

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="w-srceen ">

    <!-- Start Header  -->
    <style>
        input[type=search]::-ms-clear {
            display: none;
            width: 0;
            height: 0;
        }

        input[type=search]::-ms-reveal {
            display: none;
            width: 0;
            height: 0;


        }

        input[type="search"]::-webkit-search-decoration,
        input[type="search"]::-webkit-search-cancel-button,
        input[type="search"]::-webkit-search-results-button,
        input[type="search"]::-webkit-search-results-decoration {
            display: none;
        }

        #search:focus .searchbox {
            border: 2px solid blue;
        }
    </style>




    <header class="navbgmarker ">
        <!-- start nav  -->
        <nav class="w-full h-auto  flex items-center grid grid-cols-4 gap-6">

            <a href="http://localhost/perumdej/Perum-Dej/index.php" class="flex justify-center items-center">
                <img src="./assets/img/fav/perfumlogo.png" alt="" width="50px">
                <h1 class="font-[] text-xl">Perum Dej</h1>

            </a>


            <div class="flex justify-start items-center">
                <ul class="flex justify-start items-center text-[15px] uppercase cursor-pointer">
                    <?php
                    $currentPage = $_GET['page'] ?? '';
                    $currentMenPage = $_GET['menpage'] ?? '';
                    $currentWomenPage = $_GET['womenpage'] ?? '';

                    if (!empty($currentPage)) {
                        echo '<li class="mr-5 border border-stone-300 px-2 py-2 rounded-full hover:bg-gray-100"><a href="index.php?page=1">All</a></li>';

                    } else {
                        echo '<li class="mr-5 px-2 py-2 hover:border hover:border-stone-100 hover:rounded-full"><a href="index.php?page=1">All</a></li>';

                    }

                    if (!empty($currentMenPage)) {
                        echo '<li class="mr-5 border border-stone-300 px-2 py-2 rounded-full hover:bg-gray-100"><a href="menfrg.php?menpage=1">Men</a></li>';
                    } else {
                        echo '<li class="mr-5 px-2 py-2 hover:border hover:border-stone-100 hover:px-2 hover:py-2 hover:rounded-full"><a href="menfrg.php?menpage=1">Men</a></li>';
                    }

                    if (!empty($currentWomenPage)) {
                        echo '<li class="mr-5 border border-stone-300 px-2 py-2 rounded-full hover:bg-gray-100 "><a href="womenfrg.php?womenpage=1">Women</a></li>';
                    } else {
                        echo '<li class="mr-5 px-2 py-2 hover:border hover:border-stone-100 hover:px-2 hover:py-2 hover:rounded-full"><a href="womenfrg.php?womenpage=1">Women</a></li>';
                    }
                    ?>
                </ul>
            </div>



            <!-- <form action="" class=""> -->

            <div class="h-full  flex justify-center items-center flex-col relative ">
                <div class="flex justify-center items-center bg-gray-100 rounded-lg py-2 pl-1 pr-5 searchbox">
                    <input type="search" name="search" id="search"
                        class=" bg-gray-100 ml-4 pr-9 focus:outline-none placeholder-[#01125f]  placeholder-opacity-75 active:transparent "
                        placeholder="Search...">
                    <button type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-gray-500 ml-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg>

                    </button>


                </div>
                <div
                    class="w-[82%] max-h-52 overflow-y-scroll bg-gray-100 rounded-b-lg flex justify-start items-center flex-col absolute top-12 mt-1 result">
                    <!-- <span class="w-[82%] self-start ml-5 mb-1 px-3 py-2 border border-t-transparent border-l-transparent border-r-transparent border-b-gray-200">adfs</span> -->
                    <!-- <span class="w-[82%] self-start ml-5 mb-1 p-3 border border-t-transparent border-l-transparent border-r-transparent border-b-gray-200">adfs</span> -->
                </div>
            </div>
            <!-- </form> -->

            <div class="flex justify-center items-center p-3">


                <div class="flex justify-center items-center mr-10">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-gray-600 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>

                    <span class="ml-3 cursor-pointer">
                        <h1 class="accountbtn">Account</h1>
                        <ul id="account-dropdown"
                            class="w-36 bg-gray-200 border rounded-md hidden shadow-lg absolute p-2 mt-4">
                            <li class="p-2"><a href="">My Profile</a></li>
                            <div class="w-full h-[1px] bg-gray-100"></div>
                            <li class="p-2"><a href="">Log Out</a></li>
                        </ul>
                    </span>


                </div>



                <div id="bag-container" class=" flex justify-center items-center">
                    <a href="shopcartpage.php" class=" flex justify-center items-center p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-gray-600 cursor-pointer">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>

                        <sup id="bag-count" class="bg-gray-500  font-semibold px-2 py-2 rounded-full">
                            <span class="text-gray-100 countcart">

                                0


                            </span>
                        </sup>
                    </a>

                </div>
            </div>






        </nav>


    </header>





    <script>
        $(document).ready(function () {


            var getcookie = <?php
            require_once "temporaryid.php";
            require_once "database.php";

            $temp_customer_id = $_SESSION['id'];

            echo isset($_COOKIE['tempid' . $temp_customer_id]) ? 'true' : 'false';
            ?>

            if (getcookie) {
                var count = sessionStorage.getItem('countitem');
                $(".countcart").text(count);
            } else {
                sessionStorage.setItem('countitem', 0);
                $('.countcart').text(0);
            }










        });
    </script>






    <section class="container mx-auto mt-10">
        <div class="flex justify-between">
            <div class="flex justify-center">
                <h1 class=" text-3xl">ALL's FRAGRANCES</h1>
            </div>

            <?php require_once "sortingindex.php" ?>

        </div>
    </section>


    <section class="container mx-auto mt-20">
        <div class="grid grid-cols-4 gap-6">
            <div class=" flex  justify-end ">
                <div class="">

                    <div class="h-auto mb-10">
                        <h1 class="font-[500] uppercase mb-3">Filter by</h1>
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

                    <div class="h-auto mb-10">
                        <h1 class="uppercase mb-3">Brand</h1>
                        <span class="text-sm text-blue-300 ml-10">Click a letter to find a perfume</span>
                        <ul class="w-80  flex-wrap flex justify-start items-center mt-2">

                            <?php include_once "./brandname/brandnameall.php" ?>
                        </ul>
                    </div>


                    <div class="h-auto mb-10">
                        <h1 class="font-[500] uppercase mb-1">Price</h1>
                        <form action="index.php" method="get">
                            <input type="text" name="startprice" placeholder=" Min" value="<?php if (isset($_GET['startprice'])) {
                                echo $_GET['startprice'];
                            } ?>" class="w-20 border border-2 rounded m-1 p-1 focus:ring-1 focus:outline-none">

                            <input type="text" name="endprice" placeholder=" Max" value="<?php if (isset($_GET['endprice'])) {
                                echo $_GET['endprice'];
                            } ?>" class="w-20 border border-2 rounded m-1 p-1 focus:ring-1 focus:outline-none">



                            <script>
                                function updatePrice() {
                                    var startprice = document.getElementsByName('startprice')[0].value;
                                    var endprice = document.getElementsByName('endprice')[0].value;
                                    var updateURL = "index.php?page=1&startprice=" + startprice + "&endprice=" + endprice + "&price=1";
                                    document.getElementById('updateprice').href = updateURL;
                                }
                            </script>

                            <a href="#" type="text" id="updateprice" name="price" onclick="updatePrice()"
                                class="w-24 border border-2 rounded m-1 p-1">UPDATE</a>

                        </form>


                    </div>


                    <div>
                        <h1 class="font-[500] uppercase mb-1">Type</h1>



                        <form id="" action="" method="post" class="mt-3">
                            <label for="type" class="flex items-center">
                                <input type="checkbox" id="type" name="type" class="m-1">
                                Unisex
                            </label>

                            <label for="ftype" class="flex items-center">
                                <input type="checkbox" id="ftype" name="type" class="m-1">
                                Women
                            </label>

                            <label for="mtype" class="flex items-center">
                                <input type="checkbox" id="mtype" name="type" class="m-1">
                                Men
                            </label>
                        </form>
                    </div>

                </div>
            </div>


            <div class="col-span-3">
                <div class="mb-10">
                    <span class="uppercase text-xs">Home <span class="m-1">|</span> All's Fragrances</span>
                </div>





                <?php

                // require_once "./backendfunction/allfrg.php";
                // require_once "./filterby/allfilterprice.php";
                

                ?>


                <div class="grid grid-cols-4 gap-4">

                    <div class="w-full border p-3">
                        <div class="w-full h-[250px] bg-gray-100">
                            <img src="" alt="">
                        </div>

                        <div class="w-full py-4">
                            <p class="mb-4">Royal Tom By Blueprint EDT</p>
                            <div class="w-full flex justify-between items-center">
                                <span class="font-bold">$250</span>
                                <button type="button" class="px-3 py-2 bg-yellow-600">Add</button>
                            </div>
                        </div>
                    </div>


                    <div class="w-full border  p-3">
                        <div class="w-full h-[250px] bg-gray-100">
                            <img src="" alt="">
                        </div>

                        <div class="w-full py-4">
                            <p class="mb-4">Royal Tom By Blueprint EDT</p>
                            <div class="w-full flex justify-between items-center">
                                <span class="font-bold">$250</span>
                                <button type="button" class="px-3 py-2 bg-yellow-600">Add</button>
                            </div>
                        </div>
                    </div>

                    <div class="w-full border  p-3">
                        <div class="w-full h-[250px] bg-gray-100">
                            <img src="" alt="">
                        </div>

                        <div class="w-full py-4">
                            <p class="mb-4">Royal Tom By Blueprint EDT</p>
                            <div class="w-full flex justify-between items-center">
                                <span class="font-bold">$250</span>
                                <button type="button" class="px-3 py-2 bg-yellow-600">Add</button>
                            </div>
                        </div>
                    </div>


                    <div class="w-full border  p-3">
                        <div class="w-full h-[250px] bg-gray-100">
                            <img src="" alt="">
                        </div>

                        <div class="w-full py-4">
                            <p class="mb-4">Royal Tom By Blueprint EDT</p>
                            <div class="w-full flex justify-between items-center">
                                <span class="font-bold">$250</span>
                                <button type="button" class="px-3 py-2 bg-yellow-600">Add</button>
                            </div>
                        </div>
                    </div>


                    <div class="w-full border  p-3">
                        <div class="w-full h-[250px] bg-gray-100">
                            <img src="" alt="">
                        </div>

                        <div class="w-full py-4">
                            <p class="mb-4">Royal Tom By Blueprint EDT</p>
                            <div class="w-full flex justify-between items-center">
                                <span class="font-bold">$250</span>
                                <button type="button" class="px-3 py-2 bg-yellow-600">Add</button>
                            </div>
                        </div>
                    </div>



                </div>


            </div>

        </div>




        </div>
    </section>


</body>

</html>




<script>

    function handleCheckboxClick() {
        const checkbox = document.getElementById("type");
        if (checkbox.checked) {
            window.location.href = "index.php?page=1&type=on&unisexquery=1";
        } else {
            window.location.href = "index.php?page=1";
        }

    }


    function handleCheckboxClickmen() {
        const mcheckbox = document.getElementById('mtype');
        if (mcheckbox.checked) {
            window.location.href = "index.php?page=1&type=mon&menquery=1";
        } else {
            window.location.href = "index.php?page=1&";
        }
    }

    function handleCheckboxClickwomen() {
        const fcheckbox = document.getElementById("ftype");
        if (fcheckbox.checked) {
            window.location.href = "index.php?page=1&type=fon&womenquery=1";
        } else {
            window.location.href = "index.php?page=1";
        }
    }



    // Add event listener to checkbox

    document.getElementById("type").addEventListener("click", handleCheckboxClick);
    document.getElementById("ftype").addEventListener("click", handleCheckboxClickwomen);
    document.getElementById("mtype").addEventListener("click", handleCheckboxClickmen);



    const urlParams = new URLSearchParams(window.location.search);
    const typeParam = urlParams.get("type");
    const checkbox = document.getElementById("type");
    const mcheckbox = document.getElementById('mtype');
    const fcheckbox = document.getElementById("ftype");


    if (typeParam === "on") {
        checkbox.checked = true;
    } else {
        checkbox.checked = false;
    }

    if (typeParam === "mon") {
        mcheckbox.checked = true;
    } else {
        mcheckbox.checked = false;
    }


    if (typeParam === "fon") {
        fcheckbox.checked = true;
    } else {
        fcheckbox.checked = false;
    }




</script>