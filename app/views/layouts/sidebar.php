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