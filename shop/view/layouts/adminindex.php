<?php



// require_once "setcookie.php";

?>



<?php require_once "adminheader.php" ?>

<body class="">

    <!-- Start Navbar  -->
    <?php
    require_once "adminnav.php";

    ?>

    <section class=" container mt-6 mb-10 mx-auto ">
        <div class=" flex justify-between items-center">
            <div class="flex justify-center">
                <h1 class="text-gray-500 text-3xl">
                    <?php
                    //  yield ('headertitle') 
                    ?>

                    <div>
                        <!-- <span>All's Fragrances</span> -->
                        <span class="uppercase text-xs">Home <span class="m-1">|</span> All's Fragrances</span>
                    </div>
                </h1>
            </div>

            <div>
                <ul class="flex justify-center items-center">
                    <li class="text-stone-400 mr-5 ">Sort by : </li>
                    <form action="" method="post" class="flex justify-center items-center">
                        <?php


                        if (isset($_POST['asc'])) {


                            echo '<li class="mr-5">
                                <button type="submit" name="asc" class="text-gray-500 p-1">Ascending price</button>
                            </li>';
                        } else {
                            echo '<li class="mr-5">
                            <button type="submit" name="asc" class="">Ascending price</button>
                        </li>';
                        }
                        if (isset($_POST['dec'])) {
                            echo '<li class="mr-5">
                                <button type="submit" name="dec" class="text-gray-500">Descending price</button>
                            </li>';
                        } else {
                            echo '<li class="mr-5">
                                <button type="submit" name="dec" class="text--500">Descending price</button>
                            </li>';
                        }

                        if (isset($_POST['rev'])) {
                            echo '<li class="mr-5">
                                <button type="submit" name="rev" class="text-gray-500">Review </button>
                            </li>';
                        } else {
                            echo '<li class="mr-5">
                                <button type="submit" name="rev" class="text--500">Review </button>
                            </li>';
                        }


                        ?>
                    </form>
                </ul>
            </div>

        </div>
    </section>


    <section class="container mx-auto ">
        <div class="grid grid-cols-4 gap-4">
            <div class="flex flex-col ...">

                <div class="h-auto mb-10">
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

                        <?php
                        // include_once "./brandname/brandnameall.php" 
                        ?>
                    </ul>
                </div>

                <div class="h-auto mb-5">
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



            <div class="col-span-3 ... ">




                <?php








                require_once "../../controller/Controller.php";





                // require_once "./backendfunction/allfrg.php";
                

                // require_once "./filterby/allfilterprice.php";
                

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