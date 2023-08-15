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

<body class="">


    <header class="navbgmarker ">
        <!-- start nav  -->
        <nav class="w-screen h-auto  flex items-center grid grid-cols-4 p-3">
            <a href="" class="flex justify-center items-center">
                <img src="./assets/img/fav/perfumlogo.png" alt="" width="50px">
                <h1 class="font-[] text-xl">Perum Dej</h1>

            </a>

            <!-- <div class="flex justify-start items-center">
                <ul class="flex justify-start items-center text-[15px] uppercase ">
                    <li class="mr-5  border border-stone-300 px-2 py-2 rounded-full"><a href="index.php?page=1">All</a>
                    </li>
                    <li class="mr-5"><a href="menfrg.php?menpage=1">Men</a></li>
                    <li class="mr-5"><a href="womenfrg.php?womenpage=1">Women</a></li>

                </ul>
            </div> -->



            <?php

            // if (isset($_GET['index.php'])) {
            //     echo ' <li class="mr-5  border border-stone-300 px-2 py-2 rounded-full"><a href="index.php?page=1">All</a>';
            // } elseif (isset($_GET['menfrg.php'])) {
            //     echo '<li class="mr-5  border border-stone-300 px-2 py-2 rounded-full"><a href="index.php?page=1">All</a>';
            // }
            ?>

            <div class="flex justify-start items-center">
                <ul class="flex justify-start items-center text-[15px] uppercase cursor-pointer">
                    <?php
                    $currentPage = $_GET['page'] ?? '';
                    $currentMenPage = $_GET['menpage'] ?? '';
                    $currentWomenPage = $_GET['womenpage'] ?? '';

                    if (!empty($currentPage)) {
                        echo '<li class="mr-5 border border-stone-300 px-2 py-2 rounded-full hover:bg-gray-100"><a href="index.php?page=1">All</a></li>';

                    } else {
                        echo '<li class="mr-5 px-2 py-2 hover:border hover:border-stone-100 hover:rounded-full"><a href="index.php?page=1">All</a></li>';

                    }

                    if (!empty($currentMenPage)) {
                        echo '<li class="mr-5 border border-stone-300 px-2 py-2 rounded-full hover:bg-gray-100"><a href="menfrg.php?menpage=1">Men</a></li>';
                    } else {
                        echo '<li class="mr-5 px-2 py-2 hover:border hover:border-stone-100 hover:px-2 hover:py-2 hover:rounded-full"><a href="menfrg.php?menpage=1">Men</a></li>';
                    }

                    if (!empty($currentWomenPage)) {
                        echo '<li class="mr-5 border border-stone-300 px-2 py-2 rounded-full hover:bg-gray-100 "><a href="womenfrg.php?womenpage=1">Women</a></li>';
                    } else {
                        echo '<li class="mr-5 px-2 py-2 hover:border hover:border-stone-100 hover:px-2 hover:py-2 hover:rounded-full"><a href="womenfrg.php?womenpage=1">Women</a></li>';
                    }
                    ?>
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

                    <span class="ml-3 cursor-pointer">Account</span>

                </div>



                <div class="flex justify-center items-center">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-gray-600 cursor-pointer">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                        </svg>
                    </div>
                    <sup>
                        <?php
                        require_once "database.php";
                      
                            try {
                                $stmt = $conn->prepare("SELECT * FROM addtocart");
                                $stmt->bindParam(':id', $id);
                                $stmt->bindParam(':rating', $rating);
                                $stmt->execute();

                                echo $stmt->rowCount();

                            } catch (Exception $e) {
                                echo "Error Found : " . $e->getMessage();
                            }
                        

                        ?>
                    </sup>

                    <a href="shopcartpage.php" class="ml-3 cursor-pointer">Bag</a>
                </div>
            </div>


        </nav>

</body>
</header>



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
    });
</script>