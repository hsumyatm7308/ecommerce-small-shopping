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

                        <?php
                        // include_once "./brandname/brandnameall.php" 
                        ?>


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


                                <?php
                                $currenturl = $_SERVER['REQUEST_URI'];
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
                    <?php print_r($data['sidebarprice']) ?>

                </div>


                <div>
                    <h1 class="uppercase mb-1">Type</h1>



                    <form id="" action="" method="post" class="mt-3">
                        <?php foreach ($data['types'] as $type): ?>

                            <label for="type" class="flex items-center">
                                <input type="checkbox" id="type" name="type" class="m-1">
                                <?php echo $type['name']; ?>
                            </label>
                        <?php endforeach; ?>

                    </form>
                </div>

            </div>
        </div>





        <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

        <script>

            var brandletters = document.querySelectorAll('.brand-letter');


            $(document).ready(function () {
                $(document).on('click', '.brand-letter', function () {

                    var letters = $(this).attr('data-letter');

                    console.log(letters);

                    // $.ajax({
                    //     method: "GET",
                    //     url: 'http://localhost/mvcshop/allfregrance',
                    //     data: { letters: letters },
                    //     dataType: "html"
                    // }).done((data, status, xhr) => {
                    //     console.log(data, status, xhr, " success");
                    // }).fail((xhr, status, error) => {
                    //     console.log('Error:', error);
                    // });



                    // Construct the new URL with the letters parameter
                    // window.location.href = window.location.href.split('?')[0] + '?letters=' + letters;

                    // var getcururl = window.location.href.split('?')[0];
                    // console.log(getcururl);



                });
            });





        </script>