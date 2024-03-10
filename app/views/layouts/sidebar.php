<?php
$currenturl = $_SERVER['REQUEST_URI'];
?>




<section class="container mx-auto text-[#4c5372] mt-20">
    <div class="w-full h-auto  flex items-start grid grid-cols-4 gap-6">
        <div class=" flex  justify-start ">
            <div class="">
                <!-- 
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
                </div> -->

                <div class="h-auto mb-10">

                    <h1>Fragrance Filter</h1>

                </div>


                <!-- brand letters  -->
                <div class="h-auto mb-10">
                    <h1 class="text-[#4c5372] font-medium mb-3">Brand</h1>
                    <span class="text-sm text-blue-300 ml-10">Click a letter to find a perfume</span>
                    <ul class="w-80  flex-wrap flex justify-start items-center mt-2">


                        <?php

                        // ini_set('display_errors', 1);
                        

                        $items = $data['sidebaritems'];


                        $itemsnames = array_column($items, 'name', 'id');
                        sort($itemsnames);

                        $dublicate = array();

                        foreach ($itemsnames as $id => $item) {

                            $firstword = explode(' ', $item)[0];
                            $firstletter = $firstword[0];


                            if (in_array($firstletter, $dublicate)) {
                                continue;
                            } else {
                                $dublicate[] = $firstletter;

                                ?>



                                <li
                                    class="w-7 h-7 bg-[#7c7e9d] <?php echo strpos($currenturl, $firstletter) !== false ? 'bg-[#7c7e9d] opacity-1 text-[#fffdf6]' : 'bg-bitstrong opacity-90'; ?> m-1">
                                    <form id="brand_letter" action="" method="GET" class="flex justify-center items-center">


                                        <button type="submit" class="text-center flex justify-center items-center letterbtn"
                                            data-id=<?php echo $id ?>>
                                            <input type="hidden" name="letter" value="<?php echo $firstletter; ?>">
                                            <input type="hidden" name="page" value="1">
                                            <?php echo ucfirst($firstletter); ?>
                                        </button>



                                    </form>
                                </li>

                                <?php
                            }
                        }

                        ?>






                    </ul>
                </div>
                <!-- end letters  -->


                <!-- price  -->
                <?php

                $currenturl = $_SERVER['REQUEST_URI'];
                $param = explode('=', $currenturl)[1];

                isset($param) ? $param : 1;


                ?>

                <div class="h-auto mb-10">
                    <h1 class="text-[#4c5372] font-medium mb-1">Price</h1>
                    <form id="price_form" action="" method="GET">
                        <input type="text" name="minprice" placeholder="Min" value="<?php echo $data['minprice'] ?>"
                            class="w-20 border border-[#7c7e9d] border-1 rounded m-1 px-2 py-1 focus:ring-1 focus:outline-none">

                        <input type="text" name="maxprice" placeholder="Max" value="<?php echo $data['maxprice'] ?>"
                            class="w-20 border border-[#7c7e9d] border-1 rounded m-1 px-2 py-1 focus:ring-1 focus:outline-none">

                        <input type="hidden" name="page" value="1">


                        <button type="submit"
                            class="bg-[#4c5372] text-[#fffdf6] uppercase border border-2 rounded px-2 py-1">Update</button>

                    </form>
                </div>
                <!-- end price  -->

                <!-- types  -->
                <div>
                    <h1 class="text-[#4c5372] font-medium mb-1">Gender</h1>
                    <form id="clothingForm" action="" method="get" class="mt-3 flex flex-col">

                        <?php foreach ($data['types'] as $type): ?>


                            <?php
                            $urlparts = parse_url($currenturl);
                            parse_str($urlparts['query'], $queryparameters);

                            ?>
                            <button type="submit">
                                <label for="types_<?php echo $type['id']; ?>" class="flex items-center">
                                    <input type="radio" id="types_<?php echo $type['id']; ?>" name="types"
                                        class="m-1 types-radio" data-id="<?php echo $type['id']; ?>"
                                        value="<?php echo $type['id']; ?>" <?php echo $type['id'] == $queryparameters['types'] ? 'checked' : ''; ?>>
                                    <?php echo $type['name']; ?>

                                </label>

                            </button>



                        <?php endforeach; ?>
                        <input type="hidden" name="page" value="1">

                    </form>




                </div>
                <!-- end types  -->
            </div>
        </div>





        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var radioButtons = document.querySelectorAll('input[type=radio]');
                radioButtons.forEach(function (radioButton) {
                    radioButton.addEventListener('click', function () {
                        document.getElementById('clothingForm').submit();
                    });
                });
            });


        </script>




        <script>
            document.addEventListener("DOMContentLoaded", function () {
                var form = document.querySelectorAll("form");

                for (var x = 0; x < form.length; x++) {
                    form[x].addEventListener('submit', function (event) {

                        var currenturl = window.location.href;

                        currenturl = currenturl + "minprice=&maxprice";

                        if (currenturl.indexOf('?') !== -1) {

                            currenturl += "&page=1";

                        } else {
                            form.action = currenturl + "?page=1";
                        }






                    });
                }





            });



        </script>