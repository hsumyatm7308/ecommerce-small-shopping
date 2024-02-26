<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>shopping</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://cdn.tailwindcss.com"></script>

</head>


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


<body class="w-srceen ">





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
                    $currenturl = $_SERVER['REQUEST_URI'];
                    $param = explode('=', $currenturl)[1];

                    isset($param) ? $param : 1;

                    // echo $param;
                    ?>


                    <li
                        class="mr-5 <?php echo strpos($currenturl, 'allfregrance') !== false ? 'border' : ''; ?>  px-2 py-2 rounded-full hover:bg-gray-100">
                        <a href="<?php echo URLROOT; ?>/allfregrance?page=1">All</a>
                    </li>

                    <li
                        class="mr-5 <?php echo strpos($currenturl, 'menfregrance') !== false ? 'border' : ''; ?> px-2 py-2 rounded-full hover:bg-gray-100">
                        <a href="<?php echo URLROOT; ?>/menfregrance">Men</a>
                    </li>

                    <li
                        class="mr-5 <?php echo strpos($currenturl, 'womenfregrance') !== false ? 'border' : ''; ?> px-2 py-2 rounded-full hover:bg-gray-100 ">
                        <a href="<?php echo URLROOT; ?>/womenfregrance">Women</a>
                    </li>


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




    <section class="container mx-auto mt-10">
        <div class="flex justify-between">
            <div class="flex justify-center">
                <h1 class=" text-3xl">ALL's FRAGRANCES</h1>
            </div>

            <?php
            //  require_once "sortingindex.php" 
            ?>

        </div>
    </section>



    <!-- 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#search').keyup(function () {
                var query = $(this).val();
                console.log(query);

                if (query === '') {
                    $('.result').hide();

                } else {
                    $.post("searchfunction/search.php", { data: query }, function (searchstmt) {
                        $(".result").html(searchstmt);
                        $('.result').show();

                    });
                }



            });


            $('.accountbtn').click(function () {
                $('#account-dropdown').toggleClass('hidden')
            })



        });
    </script>

    <script>
        $(document).ready(function () {


            var getcookie = <?php
            // require_once "temporaryid.php";
            // require_once "database.php";
            
            // $temp_customer_id = $_SESSION['id'];
            
            // echo isset($_COOKIE['tempid' . $temp_customer_id]) ? 'true' : 'false';
            ?>

            if (getcookie) {
                var count = sessionStorage.getItem('countitem');
                $(".countcart").text(count);
            } else {
                sessionStorage.setItem('countitem', 0);
                $('.countcart').text(0);
            }










        });
    </script> -->