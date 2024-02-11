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

                    <!-- <div class="h-auto mb-5">
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
                    </div> -->

                    <div class="h-auto mb-5">
                        <h1 class="uppercase mb-1">Brand</h1>
                        <span class="text-sm text-blue-300 ml-10">Click a letter to find a perfume</span>
                        <ul class="w-80  flex-wrap flex justify-start items-center mt-2">

                            <?php include_once "./brandname/brandnameall.php" ?>
                        </ul>
                    </div>


                    <div class="h-auto mb-5">
                        <h1 class="font-[500] uppercase mb-1">Price</h1>
                        <form action="" method="get">
                            <input type="text" name="startprice" placeholder=" Min"
                                value="<?php if (isset($_GET['startprice'])) {
                                    echo $_GET['startprice'];
                                } ?>"
                                class="w-20 border border-2 rounded m-1 p-1 focus:ring-1 focus:outline-none">

                            <input type="text" name="endprice" placeholder=" Max"
                                value="<?php if (isset($_GET['endprice'])) {
                                    echo $_GET['endprice'];
                                } ?>"
                                class="w-20 border border-2 rounded m-1 p-1 focus:ring-1 focus:outline-none">

                            <button type="submit" class="w-24 border border-2 rounded m-1 p-1">UPDATE</button>

                        </form>
                    </div>

                    <?php

                      require_once "database.php";
                     if(isset($_GET['startprice']) && isset($_GET['endprice'])){
                        try{

                              
                        }catch(Exception $e){
                          echo "Error Found ". $e->getMessage();
                        }
                     }
                    ?>

                    <div>
                        <h1 class="font-[500] uppercase mb-1">Type</h1>



                        <form id="" action="" method="post">
                            <label for="type" class="flex items-center">
                                <input type="checkbox" id="type" name="type" class="m-1">
                                Unisex
                            </label>
                        </form>

                        <form id="" action="" method="post">
                            <label for="ftype" class="flex items-center">
                                <input type="checkbox" id="ftype" name="type" class="m-1">
                                Women
                            </label>
                        </form>

                        <form id="" action="" method="post">
                            <label for="mtype" class="flex items-center">
                                <input type="checkbox" id="mtype" name="type" class="m-1">
                                Men
                            </label>
                        </form>
                    </div>

                </div>
            </div>


            <div class="col-span-2 ">
                <div>
                    <span class="uppercase text-xs">Home <span class="m-1">|</span> All's Fragrances</span>
                </div>





                <?php

                include_once "./backendfunction/allfrg.php";


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
            window.location.href = "index.php?type=on&unisexquery=1";
        } else {
            window.location.href = "index.php";
        }

    }


    function handleCheckboxClickmen() {
        const mcheckbox = document.getElementById('mtype');
        if (mcheckbox.checked) {
            window.location.href = "index.php?type=mon&menquery=1";
        } else {
            window.location.href = "index.php";
        }
    }

    function handleCheckboxClickwomen() {
        const fcheckbox = document.getElementById("ftype");
        if (fcheckbox.checked) {
            window.location.href = "index.php?type=fon&womenquery=1";
        } else {
            window.location.href = "index.php";
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