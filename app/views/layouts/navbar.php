<body class="w-srceen bg-[#fffdf6] text-[#4c5372]">





    <header class="px-2">
        <!-- start nav  -->
        <nav class="w-full h-auto font-medium flex items-center grid grid-cols-4 gap-6">

            <a href="http://localhost/perumdej/Perum-Dej/index.php" class="flex justify-center items-center ">
                <!-- <img src="<?php echo URLROOT; ?>/public/assets/pflogo.png" alt="" width="50px"> -->
                <h1 class="text-[#4c5372] font-bold text-2xl">Perum Dej</h1>

            </a>


            <div class="flex justify-start items-center">
                <ul class=" flex justify-start items-center tracking-wide  cursor-pointer">

                    <li class="mr-5   px-2 py-2 rounded-full hover:bg-gray-100 nav_categ">
                        <a href="<?php echo URLROOT; ?>/allfragrance?page=1&all">Fragrance</a>
                    </li>

                    <li class="mr-5  px-2 py-2 rounded-full hover:bg-gray-100 nav_categ">
                        <a href="<?php echo URLROOT; ?>/allfragrance?page=1&lotions">Lotion</a>
                    </li>

                    <li class="mr-5 px-2 py-2 rounded-full hover:bg-gray-100 nav_categ">
                        <a href="<?php echo URLROOT; ?>/allfragrance?page=1&cosmetics">Cosmetics</a>
                    </li>


                </ul>
            </div>




            <div class="w-full h-full  flex justify-center items-center flex-col relative ">
                <form action="" method="GET" class="w-full inline-block">

                    <div class="w-full h-full flex justify-center items-center  rounded-lg py-3 pl-1 pr-5">
                        <?php
                        $pagination = new Pagination();
                        $search = $pagination->getparameter()['search'];

                        ?>
                        <input type="search" name="search" id="search" value="<?php echo $search ?>"
                            class="w-full h-full border border-[#949ab1] bg-transparent ml-4 p-3 pr-9 rounded-md opacity-80 focus:outline-none   placeholder-opacity-75 active:transparent "
                            placeholder="Search..." autocomplete="off">
                        <button type="button" id="searchbtn">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 text-gray-500 ml-5">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                            </svg>

                        </button>



                    </div>
                </form>

                <div
                    class="w-[82%] max-h-52 overflow-y-scroll bg-gray-100 rounded-b-lg flex justify-start items-center flex-col absolute top-12 mt-1 result">

                </div>
            </div>

            <div class="flex justify-center items-center p-3">


                <div class="flex justify-center items-center mr-10"
                    onclick="document.getElementById('account-dropdown').classList.toggle('hidden')">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6 text-gray-600 cursor-pointer">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                    </svg>

                    <span class="ml-3 cursor-pointer">
                        <h1 class="accountbtn">
                            <?php echo $data['user']['name'] ?>
                        </h1>
                        <ul id="account-dropdown"
                            class="w-36 bg-gray-200 border rounded-md  shadow-lg absolute p-2 mt-4 hidden">
                            <li class="p-2"><a href="">My Profile</a></li>
                            <div class="w-full h-[1px] bg-gray-100"></div>
                            <?php if (isset($_SESSION['user_id'])): ?>
                                <li class="transition-all duration-300 hover:bg-teal-200  border-b px-5 py-3"><a
                                        href="<?php echo URLROOT; ?>/users/logout"
                                        class="w-full inline-block text-red-600">Log
                                        Out</a>
                                </li>
                            <?php else: ?>

                                <li class="transition-all duration-300 hover:bg-teal-200 text-red-600  border-b px-5 py-3">
                                    <a href="<?php echo URLROOT; ?>/users/login" class="w-full inline-block">Sign
                                        In</a>
                                </li>

                            <?php endif; ?>
                        </ul>
                    </span>


                </div>



                <div id="bag-container" class=" flex justify-center items-center">
                    <a href="shopcartpage.php" class=" flex justify-center items-center p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-[#4c5372] cursor-pointer">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>

                        <sup id="bag-count" class="bg-[#4c5372] font-semibold px-2 py-2 rounded-full">
                            <span class="text-gray-100 countcart">

                                <?php

                                echo $data['orderitemcount'];
                                ?>


                            </span>
                        </sup>
                    </a>

                </div>
            </div>






        </nav>





    </header>

    <script>
        const currenturl = window.location.href;
        const nav_categs = document.querySelectorAll('.nav_categ');

        nav_categs.forEach((ele, idx) => {
            const ismatch = (currenturl.includes('all') && idx === 0) ||
                (currenturl.includes('lotions') && idx === 1) ||
                (currenturl.includes('cosmetics') && idx === 2);

            ele.classList.toggle('border', ismatch);

            if (ismatch) {
                nav_categs.forEach((othele, othidx) => {
                    if (othidx !== idx) {
                        othele.classList.remove('border');
                    }
                });
            }

            if (currenturl.includes('search')) {
                ele.classList.remove('border')
            }
        });

        const searchbtn = document.getElementById('searchbtn');
        const search = document.getElementById('search');

        searchbtn.addEventListener('click', function (e) {
            searchbtn.form.submit();
            window.location.href = "allfragrance?page=1&search&search=" + search.value;

            e.preventDefault();
        });





    </script>