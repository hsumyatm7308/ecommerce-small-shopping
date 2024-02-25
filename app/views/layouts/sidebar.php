<?php
$currenturl = $_SERVER['REQUEST_URI'];
?>


<section class="container mx-auto mt-20">
    <div class="grid grid-cols-4 gap-6">
        <div class=" flex  justify-end ">
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
                    <h1 class="uppercase mb-3">Brand</h1>
                    <span class="text-sm text-blue-300 ml-10">Click a letter to find a perfume</span>
                    <ul class="w-80  flex-wrap flex justify-start items-center mt-2">


                        <?php

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




                                <li class="w-7 h-7 bg-stone-100 <?php echo strpos($currenturl, $firstletter) !== false ? 'bg-stone-300' : 'bg-stone-100'; ?> m-1 brand-letter "
                                    data-letter=<?php echo $firstletter ?>>

                                    <form action="?letters=<?php echo $firstletter ?>" method="GET"
                                        class="flex justify-center items-center">
                                        <input type="hidden" name="letters" value="<?php echo $firstletter ?>">
                                        <button type="submit" class="text-center flex justify-center items-center ">
                                            <?php
                                            echo ucfirst($firstletter);
                                            ?>
                                        </button>
                                    </form>




                                </li>

                                <?php
                            }
                        }

                        ?>





                    </ul>
                </div>


                <div class="h-auto mb-10">
                    <h1 class="uppercase mb-1">Price</h1>
                    <form action="" method="POST">
                        <input type="text" name="minprice" placeholder="Min" value=""
                            class="w-20 border border-2 rounded m-1 px-2 py-1 focus:ring-1 focus:outline-none">

                        <input type="text" name="maxprice" placeholder="Max" value=""
                            class="w-20 border border-2 rounded m-1 px-2 py-1 focus:ring-1 focus:outline-none">



                        <button type="submit"
                            class="bg-gray-200 text-gray-700 uppercase border border-2 rounded px-2 py-1">Update</button>

                    </form>
                </div>


                <div>
                    <h1 class="uppercase mb-1">Type</h1>
                    <form id="clothingForm" action="http://localhost/mvcshop/allfregrance?types=1" method="get"
                        class="mt-3 flex flex-col">

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

                    </form>

                    </form>



                </div>

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