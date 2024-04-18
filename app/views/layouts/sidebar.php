<?php

$currentURL = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

$urlparts = parse_url($currentURL);
parse_str($urlparts['query'], $parameter);


?>




<section class="container mx-auto text-[#4c5372]  px-2  mb-10">
    <div class="w-full h-auto  flex items-start grid md:grid-cols-4 grid-cols-1 md:gap-6 gap-0">




        <div class="flex flex-col  justify-start ">
            <div class="">

                <div class="flex justify-center items-center md:hidden mb-5">

                    <a href="http://localhost/perumdej/Perum-Dej/index.php" class="">
                        <h1 class="text-[#4c5372] font-bold text-2xl">Perum Dej</h1>

                    </a>
                </div>


                <div class="w-full h-full flex justify-center items-center md:invisible visible">
                    <form action="" method="GET" class="w-full inline-block">
                        <div class="w-full h-full flex justify-center items-center  rounded-lg py-3 pl-1 pr-5">
                            <?php
                            $pagination = new Pagination();
                            $search = $pagination->getparameter()['srh'];


                            ?>
                            <input type="search" name="search" id="search" value="<?php echo $search ?>"
                                class="w-full h-full border border-[#949ab1] bg-transparent ml-4 p-3 pr-9 rounded-md opacity-80 focus:outline-none   placeholder-opacity-75 active:transparent search"
                                placeholder="Search..." autocomplete="off">
                            <button type="button" id="searchbtn" class="searchbtn">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6 text-gray-500 ml-5">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                                </svg>

                            </button>



                        </div>
                    </form>
                </div>
            </div>



            <!-- dropdown for sm  -->
            <div class="w-full h-14 border rounded-md flex justify-between items-center text-sm px-3 md:hidden"
                onclick="document.getElementById('filter').classList.toggle('hidden'); ">
                <div>
                    <span> Browse by Brand, Price & more</span>
                </div>
                <div class="flex justify-center items-center">
                    <span>show</span>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-4 h-4">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </div>
            </div>

            <div id="filter" class="md:flex md:flex-col hidden ">


                <div class="h-auto mb-10">

                    <h1>Fragrance Filter</h1>

                </div>




                <!-- brand letters  -->
                <div class="h-auto mb-10">
                    <h1 class="text-[#4c5372] font-medium mb-3">Brand</h1>
                    <span class="text-sm text-pink-400 ml-10">Click a letter to find a perfume</span>
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
                                    class="w-7 h-7 bg-[#4c5372] hover:bg-[#949ab1] <?php echo $parameter['letter'] == $firstletter ? ' bg-[#4c5372]  text-[#fffdf6]' : 'bg-[#7c7e9d]  text-[#fffdf6]'; ?> m-1">
                                    <form action="" method="GET" class="flex justify-center items-center">


                                        <input type="hidden" name="page" value="1">
                                        <button type="button" class="letterbtn" name="letter"
                                            value="<?php echo $firstletter; ?>">
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
                    <form id="price_form" action="" method="GET" class="space-x-3">
                        <input type="text" name="minprice" id="minprice" placeholder="Min"
                            value="<?php echo $data['minprice'] ?>"
                            class="w-20 border border-[#949ab1] border-1 rounded-md px-3 py-1 focus:ring-1 focus:outline-none">

                        <input type="text" name="maxprice" id="maxprice" placeholder="Max"
                            value="<?php echo $data['maxprice'] ?>"
                            class="w-20 border border-[#949ab1] border-1 rounded-md  px-3 py-1 focus:ring-1 focus:outline-none">

                        <input type="hidden" name="page" value="1">


                        <button type="button" id="updatebtn"
                            class="bg-[#4c5372] text-[#fffdf6] uppercase border border-2 rounded-md hover:opacity-90 px-3 py-1 updatebtn">Update</button>

                    </form>
                </div>
                <!-- end price  -->


                <!-- types  -->
                <div>
                    <h1 class="text-[#4c5372] font-medium mb-1">Types</h1>
                    <form id="clothingForm" action="" method="get" class="mt-3 flex flex-col">

                        <?php foreach ($data['types'] as $type): ?>


                            <?php
                            $urlparts = parse_url($currenturl);
                            parse_str($urlparts['query'], $queryparameters);

                            ?>
                            <label for="types_<?php echo $type['id']; ?>" class="flex items-center">
                                <input type="radio" id="types_<?php echo $type['id']; ?>" name="types"
                                    class="m-1 types-radio" data-id="<?php echo $type['id']; ?>"
                                    value="<?php echo $type['id']; ?>" <?php echo $type['id'] == $queryparameters['types'] ? 'checked' : ''; ?>>
                                <?php echo $type['name']; ?>

                            </label>



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
                var form = document.querySelectorAll("form");

                for (var x = 0; x < form.length; x++) {
                    form[x].addEventListener('submit', function (event) {
                        var currenturl = window.location.href;
                        form.action = currenturl + "?page=1";
                    });
                }

            });
        </script>



        <script>
            const updatebtn = document.getElementById('updatebtn');
            const letterbtn = document.querySelectorAll('.letterbtn');

            updatebtn.addEventListener('click', function () {
                const min = document.getElementById('minprice').value;
                const max = document.getElementById('maxprice').value;
                if (min && max) {
                    updatebtn.form.submit()

                    window.location.href = window.location.href + "&minprice=" + min + "&maxprice=" + max + "&page=1";

                }
            })

            const radioButtons = document.querySelectorAll('.types-radio')

            for (let i = 0; i < radioButtons.length; i++) {
                radioButtons[i].addEventListener('change', function () {
                    radioButtons[i].form.submit();
                    const getvalue = radioButtons[i].value;
                    window.location.href = window.location.href + "&types=" + getvalue + "&page=1";
                })
            }


            for (let i = 0; i < letterbtn.length; i++) {
                letterbtn[i].addEventListener('click', function () {
                    letterbtn[i].form.submit();
                    const getvalue = letterbtn[i].value;
                    window.location.href += "&letter=" + getvalue + "&page=1";

                });


            }







            const side_searchbtn = document.querySelector('.searchbtn');
            const side_search = document.querySelector('.search');

            console.log(side_search)

            side_searchbtn.addEventListener('click', function (e) {
                side_searchbtn.form.submit()
                window.location.href = "allfragrance&search?page=1" + '&srh=' + side_search.value;


            });


            side_search.addEventListener('keydown', function (e) {
                if (e.key === 'Enter') {
                    e.preventDefault(); // Prevent form submission
                    window.location.href = "allfragrance&search?page=1" + '&srh=' + side_search.value;
                }
            });



        </script>