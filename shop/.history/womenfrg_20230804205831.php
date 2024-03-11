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
    <?php
    require_once "headersection.php";
    ?>


    <section class=" mt-6 mb-5">
        <div class=" grid grid-cols-2 p-2">
            <div class="flex justify-center">
                <h1 class=" text-3xl">WOMEN's FRAGRANCES</h1>
            </div>

            <div>
                <ul class="flex justify-center items-center">
                    <li class="font-bold mr-5">Sort by : </li>

                    <form action="" method="post" class="flex justify-center items-center">
                        <ul>
                            <li>
                                <button type="submit" name="rev"
                                    class="<?= isset($_POST['rev']) ? 'text-blue-500' : 'text-gray-500' ?>">Review</button>
                            </li>
                            <?php
                            if (isset($_POST['asc']) || !empty($_GET['womenpage'])) {
                                echo '<li class="mr-5">
                <button type="submit" name="asc" class="text-blue-500 active">Ascending price</button>
            </li>';
                            } else {
                                echo '<li class="mr-5">
                <button type="submit" name="asc">Ascending price</button>
            </li>';
                            }
                            if (isset($_POST['dec'])) {
                                echo '<li class="mr-5">
                <button type="submit" name="dec" class="text-blue-500">Descending price</button>
            </li>';
                            } else {
                                echo '<li class="mr-5">
                <button type="submit" name="dec">Descending price</button>
            </li>';
                            }
                            ?>
                        </ul>
                    </form>
                    <script>
                        document.addEventListener('DOMContentLoaded', function () {
                            const buttons = document.querySelectorAll('.flex button');
                            buttons.forEach((button) => {
                                button.addEventListener('click', function () {
                                    buttons.forEach((btn) => {
                                        btn.classList.remove('text-blue-500', 'active');
                                    });
                                    this.classList.add('text-blue-500', 'active');
                                });
                            });

                            // Set the default active button on page load
                            const defaultActiveButton = document.querySelector('.flex button.active');
                            if (!defaultActiveButton) {
                                const defaultButton = document.querySelector('.flex button[name="asc"]');
                                defaultButton.classList.add('text-blue-500', 'active');
                            }
                        });
                    </script>

                    <form action="" method="post" class="flex justify-center items-center">

                        <!-- <li class="mr-5" name="asc">
                            <button type="submit" name="asc"> Ascending price</button>
                        </li>
                        <li class="mr-5">
                            <button type="submit" name="dec"> Descending price</button>
                        </li>
                        <li type="submit" class="mr-5">
                            <button type="submit" name="rev"> Review</button>
                        </li> -->

                        <?php


                        // if (isset($_POST['asc']) || !empty($_GET['womenpage'])) {
                        

                        //     echo '<li class="mr-5">
                        //         <button type="submit" name="asc" class="text-gray-500 p-1">Ascending price</button>
                        //     </li>';
                        // } else {
                        //     echo '<li class="mr-5">
                        //     <button type="submit" name="asc" class="">Ascending price</button>
                        // </li>';
                        // }
                        // if (isset($_POST['dec'])) {
                        //     echo '<li class="mr-5">
                        //         <button type="submit" name="dec" class="text-blue-500">Descending price</button>
                        //     </li>';
                        // } else {
                        //     echo '<li class="mr-5">
                        //         <button type="submit" name="dec" class="text--500">Descending price</button>
                        //     </li>';
                        // }
                        
                        // if (isset($_POST['rev'])) {
                        //     echo '<li class="mr-5">
                        //         <button type="submit" name="rev" class="text-blue-500">Review </button>
                        //     </li>';
                        // } else {
                        //     echo '<li class="mr-5">
                        //         <button type="submit" name="rev" class="text--500">Review </button>
                        //     </li>';
                        // }
                        

                        ?>
                    </form>
                </ul>
            </div>
        </div>
    </section>


    <section class="">
        <div class="grid grid-cols-3">
            <div class=" flex  justify-end ">
                <div class="w-80">

                    <!-- <div class="h-auto mb-5">
                        <h1 class="font-[500] uppercase mb-1">Filter by</h1>
                        <div id="history" class=" flex flex-wrap leading-3">
                            <span
                                class=" bg-stone-100 text-stone-400 capitalize border rounded p-1 m-1 flex justify-center items-center">
                                <span> Unisex</span>
                                <span class="text-xs text-stone-500 font-sans mx-1">x</span>
                            </span>

                            <span
                                class=" bg-stone-100 text-stone-400 capitalize border rounded p-1 m-1 flex justify-center items-center">
                                <span> Women</span>
                                <span class="text-xs text-stone-500 font-sans mx-1">x</span>
                            </span> -->



                    <?php
                    // require_once "filterby/filterhistoryby.php";
                    ?>
                    <!-- </div> -->
                    <!-- </div> -->

                    <div class="h-auto mb-5">
                        <h1 class="uppercase mb-1">Brand</h1>
                        <span class="text-sm text-blue-300 ml-10">Click a letter to find a perfume</span>
                        <ul class="w-80  flex-wrap flex justify-start items-center mt-2">

                            <?php require_once "./brandname/brandnamewomen.php" ?>

                        </ul>
                    </div>



                    <div class="h-auto mb-5">
                        <h1 class="font-[500] uppercase mb-1">Price</h1>
                        <form action="womenfrg.php" method="get">
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
                                    var updateURL = "womenfrg.php?womenpage=1&startprice=" + startprice + "&endprice=" + endprice + "&price=1";
                                    document.getElementById('updateprice').href = updateURL;
                                }
                            </script>
                            <a href="#" type="text" id="updateprice" name="price" onclick="updatePrice()"
                                class="w-24 border border-2 rounded m-1 p-1">UPDATE</a>
                        </form>
                    </div>


                    <div>
                        <h1 class="font-[500] uppercase mb-1">Type</h1>
                        <form id="unisexForm" action="womenfrg.php" method="get">
                            <label for="type" class="flex items-center">
                                <input type="checkbox" id="type" name="type" class="m-1">
                                Unisex
                            </label>
                        </form>

                        <div class="flex items-center">

                            <input type="checkbox" name="ftype" id="ftype" class="m-1">
                            <label for="ftype">Women</label>

                        </div>


                    </div>

                </div>
            </div>

            <div class="col-span-2 ">
                <div>
                    <span class="uppercase text-xs">Home <span class="m-1">|</span> Women's Fragrances</span>
                </div>

                <?php

                require_once "./backendfunction/womenbk.php";


                ?>
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
            window.location.href = "womenfrg.php?womenpage=1&type=on&unisexquery=1";
        } else {
            window.location.href = "womenfrg.php?womenpage=1";
        }
    }

    function handleCheckboxClickwomen() {
        const fcheckbox = document.getElementById("ftype");
        if (fcheckbox.checked) {
            window.location.href = "womenfrg.php?womenpage=1&type=fon&womenquery=1";
        } else {
            window.location.href = "womenfrg.php?womenpage=1";
        }
    }

    // Add event listener to checkbox
    document.getElementById("type").addEventListener("click", handleCheckboxClick);
    document.getElementById("ftype").addEventListener("click", handleCheckboxClickwomen);

    const urlParams = new URLSearchParams(window.location.search);
    const typeParam = urlParams.get("type");
    const checkbox = document.getElementById("type");
    const fcheckbox = document.getElementById("ftype");
    if (typeParam === "on") {
        checkbox.checked = true;
    } else {
        checkbox.checked = false;
    }

    if (typeParam === "fon") {
        fcheckbox.checked = true;
    } else {
        fcheckbox.checked = false;
    }
</script>