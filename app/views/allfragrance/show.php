<?php

ini_set('display_errors', 0);

require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/header.php');
require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/navbar.php');

?>



<section class="container mx-auto text-[#4c5372] mt-20 px-2 ">


    <div class="w-full h-full grid grid-cols-2">
        <div class="flex justify-center items-center">
            <div
                class="w-[500px] h-[590px] border flex justify-center items-center rounded-md relative overflow-hidden">
                <img src="<?php echo IMG_ROOT; ?><?php echo $data['singledata']['image'] ?>" alt=""
                    class="object-fit w-full h-full">

                <?php if ($data['singledata']['discount']): ?>
                    <div
                        class="bg-yellow-500 text-white text-lg absolute left-0 top-0 transform translate-y-8 -translate-x-16 origin-center -rotate-45 ... px-20 py-4">
                        <?php echo $data['singledata']['discount'] ?>% Discount
                    </div>
                <?php endif; ?>
            </div>
        </div>
        <div>


            <div class="mr-10">

                <!-- <form action="" method="post"> -->
                <h1 class="text-3xl">
                    <?php echo $data['singledata']['name'] ?> By
                    <?php echo $data['brand']['name'] ?>
                    EDT
                </h1>

                <?php if ($data['status']['id'] == 1): ?>
                    <p class="mt-3 text-xs">Available
                        <span class="text-green-600"> (
                            <?php echo $data['status']['name'] ?>)
                        </span>
                    </p>

                <?php else: ?>
                    <p class="mt-3 text-xs">
                        <span class="text-red-600"> (
                            <?php echo $data['status']['name'] ?>)
                        </span>
                    </p>

                <?php endif; ?>

                <form action="" method="POST" enctype="multipart/form-data">

                    <div class="flex items-center space-x-20 my-5">



                        <div>
                            <span class="text-[#4c5372] font-normal text-3xl"><sup>$</sup>
                                <?php echo $data['singledata']['price'] ?>
                            </span>
                        </div>

                        <div class="w-[2px] h-8 bg-[#4c5372]"></div>
                        <div class="flex items-center space-x-2 my-5">

                            <span class="text-lg text-[#4c5372]">Quantity : </span>

                            <div class="flex items-center">

                                <input type="number" name="singlequantity" id="valueinput"
                                    class="w-[60px] flex justify-center items-center bg-transparent font-semibold focus:outline-none px-3 py-2 originquantity"
                                    value="1" min="1">


                            </div>


                        </div>



                    </div>

                    <!-- if number is under 3, 3 left product</span> -->



                    <div class="flex  items-center my-5 space-x-2">



                        <button type="submit" name="addtocart"
                            class="text-gray-100 border border-gray-500 bg-gray-500 flex justify-center items-center drop-shadow-lg rounded-md px-6 py-3 hover:drop-shadow-[0_7px_7px_#d4d4d8] hover:opacity-90"
                            id="addtocart">Add to cart</button>


                        <input type="hidden" name="singlename" value="<?php echo $data['singledata']['name']; ?>">
                        <input type="hidden" name="singlebrand" value=" <?php echo $data['singledata']['brand_id'] ?>">
                        <input type="hidden" name="singleprice" value="<?php echo $data['singledata']['price']; ?>">



                        <button type="button" name="addtocart"
                            class=" border border-gray-500 flex justify-center items-center drop-shadow-lg rounded-md px-6 py-3 hover:drop-shadow-[0_7px_7px_#d4d4d8] hover:opacity-90"
                            id="addtocart">Add to wish</button>
                    </div>
                </form>





                <!-- flash  -->


                <div id="alertcart">
                    <!-- <span class="flex justify-start items-center p-1">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 ml-4">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                </svg>
                <span>Item added to the cart</span>
            </span>
            <a href="shopcartpage.php" class="text-indigo-500 mr-4 hover:text-indigo-700">
                View cart 
            </a>-->

                    <?php if (flash('added')): ?>
                        <div class="w-[400px]  flex justify-between items-center mt-3 rounded-md">
                            <span class="flex justify-start items-center p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6 text-green-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>
                                <span class="ml-2">
                                    Items added successfully
                                </span>
                            </span>
                            <a href="shopcartpage.php" class="text-indigo-500 mr-4 hover:text-indigo-700">
                                View cart
                            </a>
                        </div>

                    <?php elseif (flash('already_added')): ?>
                        <div class="w-[400px]  flex justify-between items-center mt-3 rounded-md">
                            <span class="flex justify-start items-center p-1">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                    stroke="currentColor" class="w-6 h-6 text-red-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z" />
                                </svg>
                                <span class="ml-2">
                                    Items already added
                                </span>
                            </span>
                            <a href="shopcartpage.php" class="text-indigo-500 mr-4 hover:text-indigo-700">
                                View cart
                            </a>
                        </div>
                    <?php endif; ?>

                </div>


                <!-- </form> -->






                <!-- Rating  -->
                <div class="mt-10">
                    <div class="flex items-center mb-5">
                        <h3 class="font-normal text-lg">Rating</h3>
                        <span id="writereview" class="m-3 cursor-pointer" onclick="writereviewfun()">Write
                            review
                            <span>(

                                Review)
                            </span></span>
                    </div>
                    <div class="mb-3">
                        <div>
                            <span class="text-xl text-yellow-500 font-semibold"><span id="averagerating">

                                    5
                                </span>/5.0</span>
                        </div>
                        <div class="flex  items-center">

                        </div>
                    </div>

                    <ul class="">
                        <li class="flex items-center">
                            <div class="w-2">
                                1
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-yellow-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                            </div>
                            <div class="w-64 h-4 bg-stone-100 border ml-2 rounded progress-container">
                                <div class="w-32 h-full bg-yellow-500 rounded-tl rounded-bl progress"
                                    id="two-star-progresss"></div>

                            </div>


                        </li>

                        <li class="flex items-center">
                            <div class="w-2">
                                2
                            </div>
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24"
                                    stroke-width="1.5" stroke="currentColor" class="w-5 h-5 text-yellow-500">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                                </svg>
                            </div>
                            <div class="w-64 h-4 bg-stone-100 border ml-2 rounded progress-container">
                                <div class="w-32 h-full bg-yellow-500 rounded-tl rounded-bl progress"
                                    id="two-star-progresss"></div>

                            </div>


                        </li>
                        <li class="flex items-center">
                            <div class="w-2">
                                3
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5 text-yellow-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                            </svg>
                            <div class="w-64 h-4 bg-stone-100 border ml-2 rounded progress-container">
                                <div class="w-32 h-4 bg-yellow-500 rounded-tl rounded-bl progress"
                                    id="two-star-progresss">
                                </div>

                            </div>


                        </li>
                        <li class="flex items-center">
                            <div class="w-2">
                                4
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5 text-yellow-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                            </svg>
                            <div class="w-64 h-4 bg-stone-100 border ml-2 rounded progress-container">
                                <div class="w-32 h-4 bg-yellow-500 rounded-tl rounded-bl progress"
                                    id="two-star-progresss">
                                </div>

                            </div>


                        </li>
                        <li class="flex items-center">
                            <div class="w-2">
                                5
                            </div>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="yellow" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-5 h-5 text-yellow-500">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                            </svg>
                            <div class="w-64 h-4 bg-stone-100 border ml-2 rounded progress-container">
                                <div class="w-32 h-4 bg-yellow-500 rounded-tl rounded-bl progress"
                                    id="two-star-progresss">
                                </div>

                            </div>


                        </li>

                    </ul>
                </div>
            </div>





        </div>
    </div>

    <div class="w-full flex justify-center items-center mt-5">
        <div class="w-[80%]">
            <h3 class="text-xl flex items-center p-1 mb-5">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 9h16.5m-16.5 6.75h16.5" />
                </svg>

                Reviews
            </h3>

            <div id="review_content">








            </div>
        </div>
    </div>

</section>





<!-- modal  -->
<section id="modal" class="w-full h-screen fixed top-0 left-0 hidden">
    <div id="modaldialog"
        class="w-full h-full bg-[linear-gradient(rgba(0,0,0,.5),rgba(0,0,0,.5))] flex justify-center items-center  absolute inset-0 modalcontainer">
        <div class="w-[500px] h-[300px] bg-stone-200 modal">
            <div id="crossx" onclick="crossx()" class="w-full flex justify-end items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                    stroke="currentColor" class="w-6 h-6 text-gray-600 mr-5 mt-3">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>

            </div>
            <div class="w-full modal-body">
                <div class="w-full">
                    <!-- <form action="" method="post" class="w-full"> -->
                    <div class="w-full h-10 flex justify-center items-center mb-3">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-yellow-500 submit-star" id="submit-star-1"
                            value="1" data-rating="1">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                        </svg>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-yellow-500 submit-star" id="submit-star-2"
                            value="2" data-rating="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-yellow-500 submit-star" id="submit-star-3"
                            value="3" data-rating="3">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-yellow-500 submit-star" id="submit-star-4"
                            value="4" data-rating="4">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                        </svg>

                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="w-6 h-6 text-yellow-500 submit-star" id="submit-star-5"
                            value="5" data-rating="5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M11.48 3.499a.562.562 0 011.04 0l2.125 5.111a.563.563 0 00.475.345l5.518.442c.499.04.701.663.321.988l-4.204 3.602a.563.563 0 00-.182.557l1.285 5.385a.562.562 0 01-.84.61l-4.725-2.885a.563.563 0 00-.586 0L6.982 20.54a.562.562 0 01-.84-.61l1.285-5.386a.562.562 0 00-.182-.557l-4.204-3.602a.563.563 0 01.321-.988l5.518-.442a.563.563 0 00.475-.345L11.48 3.5z" />
                        </svg>
                    </div>

                    <div class="w-full flex justify-center items-center flex-col ">
                        <input type="text" name="username" id="username" class="w-[90%] mb-3 p-3"
                            placeholder="Enter your name">
                        <textarea name="userreview" id="userreview" class="w-[90%] p-2" cols="30" rows=""
                            placeholder="Type review here"></textarea>
                    </div>

                    <div class="w-full flex justify-center items-center mt-3">
                        <button type="button" name="submit" class="w-[90%] bg-gray-400 p-2"
                            id="submitreview">Submit</button>
                    </div>
                    <!-- </form> -->
                </div>
            </div>

        </div>
    </div>
</section>








<!-- -->




<script>
    const quantity = document.querySelector('.quantity');
    const originquantity = document.querySelector('.originquantity');
    console.log(originquantity.value)
</script>



</body>

</html>