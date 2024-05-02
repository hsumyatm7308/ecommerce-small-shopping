<?php

ini_set('display_errors', 0);

require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/header.php');
require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/navbar.php');

$countreply = new Review();
$vote = new Vote();
$curid = new Curitemid();
$pagination = new Pagination();
?>



<section class="container mx-auto text-[#4c5372] mt-20 px-10 ">


    <div class="w-full h-full grid md:grid-cols-2 grid-cols-1 gap-12">
        <div class="flex justify-start items-center py-5">
            <div class="w-[500px] h-[590px] border flex justify-start items-center rounded-md relative overflow-hidden">
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

        <div class="py-5">


            <div class="">

                <h1 class="text-3xl">
                    <?php echo $data['singledata']['name'] ?> By
                    <?php echo $data['brand']['name'] ?> 6.7 Oz
                    EDT
                </h1>

                <?php if ($data['status']['id'] == 1): ?>

                    <?php if ($data['singledata']['quantity'] <= 5): ?>

                        <p class="mt-3 text-xs">Available
                            <span class="text-red-600"> (
                                <?php echo $data['singledata']['quantity'] ?> product left)
                            </span>
                        </p>

                    <?php else: ?>

                        <p class="mt-3 text-xs">Available
                            <span class="text-green-600"> (
                                <?php echo $data['status']['name'] ?>)
                            </span>
                        </p>

                    <?php endif; ?>

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




                    <div class="flex  items-center my-5 space-x-2">



                        <button type="submit" name="addtocart"
                            class="border border-gray-200 bg-[#4c5372] <?php echo $data['singledata']['status_id'] == '1' ? 'text-gray-100 border-gray-500 bg-[#4c5372]' : 'text-gray-400 ' ?> flex justify-center items-center drop-shadow-lg rounded-md px-6 py-3 hover:drop-shadow-[0_7px_7px_#d4d4d8] hover:opacity-90"
                            id="addtocart" <?php echo $data['singledata']['status_id'] == '1' ? '' : 'disabled' ?>>Add to
                            cart</button>



                        <button type="submit" name="addtowish" id="addtowish"
                            class=" border border-gray-500 flex justify-center items-center drop-shadow-lg rounded-md px-6 py-3 hover:drop-shadow-[0_7px_7px_#d4d4d8] hover:opacity-90"
                            id="addtocart">Add to wish</button>



                        <input type="hidden" name="singleid" value="<?php echo $data['singledata']['id']; ?>">
                        <input type="hidden" name="singlebrand" value=" <?php echo $data['singledata']['brand_id'] ?>">
                        <input type="hidden" name="singleprice" value="<?php echo $data['singledata']['price']; ?>">
                        <input type="hidden" name="addtowish_itemid" value="<?php echo $data['singledata']['id']; ?>">


                        <!-- for cookie  -->

                        <input type="hidden" name="single_ck_img" value="<?php echo $data['singledata']['image'] ?>">
                        <input type="hidden" name="single_ck_name" value="<?php echo $data['singledata']['name']; ?>">
                        <input type="hidden" name="single_ck_brand"
                            value=" <?php echo $data['singledata']['brandname'] ?>">

                    </div>
                </form>





                <!-- flash  -->
                <div id="alertcart">
                    <?php $message = $pagination->getparameter()['message'];





                    ?>
                    <?php if ($message === 'added'): ?>
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
                            <a href="<?php echo URLROOT; ?>/cartsummarys"
                                class="text-indigo-500 mr-4 hover:text-indigo-700">
                                View cart
                            </a>
                        </div>

                    <?php elseif ($message === 'already_added'): ?>
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
                            <a href="<?php echo URLROOT; ?>/cartsummarys"
                                class="text-indigo-500 mr-4 hover:text-indigo-700">
                                View cart
                            </a>
                        </div>
                    <?php endif; ?>
                </div>








                <!-- Rating  -->
                <div class="mt-10">
                    <div class="flex items-center mb-5">
                        <h3 class="font-normal text-lg">Rating</h3>
                        <span id="writereview" class="m-3 cursor-pointer" onclick="onclickfun()">Write
                            review
                            <span>(
                                <span>
                                    <?php echo $countreply->reviewcount($curid->getitemid()); ?>

                                    <?php if ($countreply->reviewcount($curid->getitemid()) > 1): ?>
                                        Reviews
                                    <?php else: ?>
                                        Review
                                    <?php endif; ?>
                                </span>
                                )
                            </span></span>
                    </div>
                    <div class="mb-3">
                        <div>
                            <span class="text-xl text-yellow-500 font-semibold"><span id="averagerating">

                                    <?php echo $data['averagerating'] ?>
                                </span>/ 5</span>
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
                                <div class="h-full bg-yellow-500 rounded-tl rounded-bl progress" progress-id="1"
                                    id="one_star_progresss"></div>

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
                                <div class="h-full bg-yellow-500 rounded-tl rounded-bl progress" progress-id="2"
                                    id="two_star_progresss"></div>

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
                                <div class="h-4 bg-yellow-500 rounded-tl rounded-bl progress" progress-id="3"
                                    id="three_star_progresss">
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
                                <div class="h-4 bg-yellow-500 rounded-tl rounded-bl progress" progress-id="4"
                                    id="four_star_progresss">
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
                                <div class="h-4 bg-yellow-500 rounded-tl rounded-bl progress" progress-id="5"
                                    id="five_star_progresss">
                                </div>

                            </div>


                        </li>

                    </ul>
                </div>
            </div>





        </div>
    </div>

    <!-- Description and review  -->
    <?php
    require_once ('/opt/lampp/htdocs/mvcshop/app/views/reviews/index.php');
    ?>

    <!-- Recommend  -->
    <?php
    require_once ('/opt/lampp/htdocs/mvcshop/app/views/recommends/index.php');
    ?>


</section>








<!-- modal  -->
<section id="reviewmodal"
    class="w-full h-screen fixed top-0 left-0 <?php echo !empty($data['errmessage']) ? 'flex' : 'hidden' ?> ">
    <div id="modaldialog"
        class="w-full h-full bg-[linear-gradient(rgba(0,0,0,.8),rgba(0,0,0,.8))] flex justify-center items-center  absolute inset-0 modalcontainer">
        <div class="w-[1100px] bg-stone-200 modal  px-10">
            <div class="w-full h-20 border-b border-b-gray-100 relative">
                <div class="w-full h-full flex justify-center items-center">
                    <h1 class="text-2xl" id="review_title">Write a Review</h1>

                </div>
                <div class="absolute top-[50%] right-0 transform translate-y-[-50%] hover:bg-gray-300 rounded-full p-1"
                    onclick="window.location.href = window.location.href">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-8 h-8 text-gray-600 ">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>

                </div>

            </div>
            <div class="w-full py-10">
                <form action="" method="post" class="w-full">

                    <div class="grid grid-cols-2 gap-4  ">
                        <div class="space-y-10 flex flex-col justify-start items-center p-10">
                            <div class=" border flex justify-center items-center rounded-md relative overflow-hidden">
                                <img src="<?php echo IMG_ROOT; ?><?php echo $data['singledata']['image'] ?>" alt=""
                                    class="object-fit w-full h-full">

                                <?php if ($data['singledata']['discount']): ?>
                                    <div
                                        class="bg-yellow-500 text-white text-lg absolute left-0 top-0 transform translate-y-8 -translate-x-16 origin-center -rotate-45 ... px-20 py-4">
                                        <?php echo $data['singledata']['discount'] ?>% Discount
                                    </div>
                                <?php endif; ?>


                            </div>

                            <h1 class="text-2xl">
                                <?php echo $data['singledata']['name'] ?> By
                                <?php echo $data['brand']['name'] ?>
                                EDT
                            </h1>

                            <div>

                            </div>
                        </div>

                        <div class="">
                            <div class="w-full flex justify-start items-center flex-col">
                                <div class="w-full space-y-8">
                                    <div>
                                        <label for="rating"
                                            class="flex justify-between items-center"><span>Rating</span>
                                            <span
                                                class="text-xs text-red-500 <?php echo !empty($data['ratingerr']) ? '' : 'hidden' ?> errmessage">
                                                <?php echo $data['ratingerr'] ?>
                                            </span>
                                        </label>

                                        <div class="w-full relative custom-select">
                                            <select name="rating" id="rating"
                                                value="<?php echo !empty($data['errmessage']) ? $data['rating'] : '' ?>"
                                                class="block appearance-none w-full bg-white border border-gray-300  transition-all duration-300  hover:border-gray-400 px-4 py-2 pr-8 rounded-md shadow-sm focus:outline-none focus:border-gray-500 focus:ring-1 focus:ring-gray-100 focus:ring-opacity-50">
                                                <option value="0" id="choose_rating" selected disabled>Choose rating..
                                                </option>

                                                <option value="1" <?php echo $data['rating'] == 1 ? 'selected' : '' ?>>1
                                                    star</option>
                                                <option value="2" <?php echo $data['rating'] == 2 ? 'selected' : '' ?>>2
                                                    stars</option>
                                                <option value="3" <?php echo $data['rating'] == 3 ? 'selected' : '' ?>>3
                                                    starts</option>
                                                <option value="4" <?php echo $data['rating'] == 4 ? 'selected' : '' ?>>4
                                                    starts</option>
                                                <option value="5" <?php echo $data['rating'] == 5 ? 'selected' : '' ?>>5
                                                    starts</option>
                                            </select>

                                            <div
                                                class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-red-600">
                                                <svg class="w-4 h-4 fill-current text-gray-500" viewBox="0 0 20 20"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path fill-rule="evenodd" clip-rule="evenodd"
                                                        d="M10 12.586L5.707 8.293a1 1 0 00-1.414 1.414l5 5a1 1 0 001.414 0l5-5a1 1 0 00-1.414-1.414L10 12.586z" />
                                                </svg>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-full">
                                        <label for="username"
                                            class="flex justify-between items-center"><span>Name</span>
                                            <span
                                                class="text-xs text-red-500 <?php echo !empty($data['usernameerr']) ? '' : '' ?> errmessage">
                                                <?php echo $data['usernameerr'] ?>
                                            </span>
                                        </label>
                                        <input type="text" name="username" id="username"
                                            class="w-full <?php echo $_SESSION['user_id'] ? 'opacity-70' : '' ?> rounded-md px-3 py-3 focus:outline-none focus:border-gray-500 focus:ring-1 focus:ring-gray-100 focus:ring-opacity-50"
                                            value="<?php echo $_SESSION['user_id'] ? $data['user']['name'] : '' ?>"
                                            placeholder="Enter your name" autofocus="on" <?php echo $_SESSION['user_id'] ? 'readonly' : '' ?>>
                                    </div>

                                    <div class="w-full">
                                        <label for="useremail"
                                            class="flex justify-between items-center"><span>Email</span>
                                            <span
                                                class="text-xs text-red-500 <?php echo !empty($data['emailerr']) ? '' : '' ?> errmessage">
                                                <?php echo $data['emailerr'] ?>
                                            </span>
                                        </label>
                                        <input type="email" name="useremail" id="useremail"
                                            class="w-full <?php echo $_SESSION['user_id'] ? 'opacity-70' : '' ?> rounded-md px-3 py-3 focus:outline-none focus:border-gray-500 focus:ring-1 focus:ring-gray-100 focus:ring-opacity-50"
                                            value="<?php echo $_SESSION['user_id'] ? $data['user']['email'] : '' ?>"
                                            placeholder="Enter your email" <?php echo $_SESSION['user_id'] ? 'readonly' : '' ?>>
                                    </div>

                                    <div class="w-full">
                                        <label for="userreview"
                                            class="flex justify-between items-center"><span>Review</span>
                                            <span
                                                class="text-xs text-red-500 <?php echo !empty($data['reviewerr']) ? '' : '' ?> errmessage">
                                                <?php echo $data['reviewerr'] ?>
                                            </span>
                                        </label>
                                        <textarea name="userreview" id="userreview"
                                            class="w-full rounded-md focus:outline-none focus:border-gray-500 focus:ring-1 focus:ring-gray-100 focus:ring-opacity-50 px-3 py-3 <?php echo !empty($data['errmessage']) ? 'border border-red-200' : '' ?>"
                                            cols="30" rows=""
                                            placeholder="Type review here"><?php echo !empty($data['errmessage']) ? $data['review'] : '' ?></textarea>

                                    </div>
                                </div>

                                <div class="w-full flex justify-center items-center mt-8">
                                    <button type="submit" name="reviewbtn" class="w-full bg-gray-400 p-3"
                                        id="submitreview">Submit</button>
                                    <input type="hidden" name="itemid" value="<?php echo $data['singledata']['id']; ?>">
                                    <input type="hidden" name="reviewid" id="reviewid" value="">
                                </div>
                            </div>
                        </div>
                </form>
            </div>

        </div>
    </div>
</section>



<!-- get letter  -->
<section class=" w-full bg-[#fdfdfdfd] text-[#] mt-20 px-10 py-32">

    <div class="w-full container mx-auto">

        <div class="w-full flex justify-center items-center flex-col">
            <div>
                <div class="w-10 h-1 bg-yellow-500"></div>
                <div>
                    <h6>More Information</h6>
                </div>

            </div>
            <div class="py-10">
                <h1 class="capitalize text-3xl">Discover a World of Knowledge with Us</h1>
            </div>

            <form action="" class="flex justify-center items-center mt-10">

                <div class="w-full justify-center items-center">
                    <input type="text"
                        class="bg-[#ffff] border border-1 border-yellow-500 rounded-md focus:outline-none focus:ring-1 focus:ring-yellow-500 px-3 py-3"
                        placeholder="Enter your email">
                    <button class="border rounded-md px-4 py-3 bg-yellow-500">Send</button>
                </div>
            </form>
        </div>


    </div>


    </div>


    </div>

</section>


<?php
require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/footer.php');
?>


<script>
    function onclickfun() {
        document.getElementById('reviewmodal').classList.toggle('hidden');
        const getoldreview = document.getElementById('userreview');
        const rating = document.getElementById('rating');
        const review_title = document.getElementById('review_title');
        const submitreview = document.getElementById('submitreview');


        review_title.innerText = "Write a Review"
        getoldreview.value = '';
        rating.value = "0"
        submitreview.name = "reviewbtn"
    }
</script>


</body>

</html>