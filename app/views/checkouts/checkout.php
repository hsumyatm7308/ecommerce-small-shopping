<?php

ini_set('display_errors', 0);

require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/header.php');
require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/navbar.php');
?>




<section class="container mx-auto text-[#4c5372] mt-20 mb-20  px-2">
    <div class="mb-20">
        <div class="w-full flex  justify-center items-end space-x-2">

            <div class=" flex flex-col justify-center items-center">
                <div>
                    <i class="fa-solid fa-truck-fast text-2xl"></i>
                </div>
                <div class="flex justify-center items-center space-x-2">
                    <div>Shipping</div>

                </div>
            </div>

            <div class="w-14 h-[2px] bg-gray-200 mb-2"></div>


            <div class=" flex flex-col justify-center items-center">
                <div>
                    <i class="fa-regular fa-credit-card text-2xl"></i>
                </div>
                <div class="flex justify-center items-center space-x-2">
                    <div>Payment</div>

                </div>
            </div>

            <div class="w-14 h-[2px] bg-gray-200 mb-2"></div>


            <div class=" flex flex-col justify-center items-center">
                <div>
                    <i class="fa-brands fa-jedi-order text-2xl"></i>
                </div>
                <div class="flex justify-center items-center space-x-2 ">
                    <div>Order</div>

                </div>
            </div>

        </div>

    </div>
    <div class="w-full py-5">

        <div class="w-full grid grid-cols-3 gap-12">
            <div class="col-span-2">
                <div class="w-full ">
                    <!-- email  -->
                    <div class="mb-20">
                        <div class="flex justify-between items-center">
                            <div class="text-2xl font-medium">
                                Guest
                            </div>
                            <div class="guest_edit">
                                Edit
                            </div>
                        </div>
                        <form action="" method="POST">
                            <!-- address  -->
                            <div class="grid grid-cols-4 mt-10 rounded  mb-5">

                                <div
                                    class="col-span-3 w-full   mb-8 flex justify-center items-start flex-col  guestinfo_input <?php echo $_SESSION['user_email'] ? 'hidden' : '' ?> ">

                                    <div class="w-full  flex justify-center items-center space-x-2">

                                        <div class="w-full mb-8">
                                            <label for="">Email</label>
                                            <input type="email" name="guest_email"
                                                class="w-full border border-[#4c5372]  rounded bg-transparent focus:outline-none mt-2 p-2 guest_email_input"
                                                placeholder="Your email" value="">
                                        </div>


                                        <input type="hidden" name="upd_email_id" value="" class="upd_email">


                                        <div class="px-10 py-2 text-white bg-[#4c5372] rounded-md ">
                                            <button type="submit" name="guest_email_btn" class="guest_action"
                                                data-email="<?php echo $_SESSION['user_email'] ?>">Continue</button>
                                        </div>

                                    </div>

                                    <span class="text-sm text-red-500"><?php echo $data['email_exit'] ?></span>

                                </div>





                                <div
                                    class="col-span-3 w-full   mb-8 flex justify-center items-start flex-col  guestinfo_read <?php echo $_SESSION['user_email'] ? '' : 'hidden' ?>">

                                    <div class="w-full  flex justify-center items-center space-x-2">

                                        <div class="w-full mb-8">
                                            <label for="">Email</label>
                                            <input type="email" name=""
                                                class="w-full border border-[#4c5372]  <?php echo $_SESSION['user_email'] ? 'border-green-500' : 'border-[#4c5372]' ?> rounded bg-transparent focus:outline-none mt-2 p-2 "
                                                placeholder="Your email" value="<?php echo $_SESSION['user_email'] ?>">
                                        </div>


                                    </div>
                                </div>






                            </div>



                        </form>


                    </div>



                    <!-- deli  -->
                    <div class="mb-20">
                        <div class="flex justify-between items-center">
                            <div class="text-2xl font-medium">
                                Delivery Method
                            </div>
                            <div>
                                Edit
                            </div>
                        </div>

                        <div class="mt-5">
                            <div class="mt-3">
                                <ul class="space-y-2">
                                    <li>Standard Shipping</li>
                                    <li>Estimated Arrival: <span>April 22 -</span> <span>April 33</span></li>
                                    <li>Shipping as flat rate - $ 9.99</li>
                                </ul>
                            </div>
                        </div>

                    </div>

                    <!-- ship  -->
                    <div class="mb-20">
                        <div class="flex justify-between items-center">
                            <div class="text-2xl font-medium">
                                Shipping Method
                            </div>

                        </div>

                        <form action="">
                            <!-- address  -->
                            <div class="grid grid-cols-4 mt-10 rounded  mb-5">


                                <div
                                    class="col-span-3 w-full   mb-8 flex justify-center items-center flex-col  guestinfo">

                                    <div class="w-full grid grid-cols-2">

                                        <div class="w-full mb-8">
                                            <label for="">First Name</label>
                                            <input type="text" name="firstname"
                                                class="w-full border border-[#4c5372] rounded bg-transparent focus:outline-none mt-2 p-2 "
                                                placeholder="">
                                        </div>


                                        <div class="w inputval mb-2 ml-5">
                                            <label for="">Last Name *</label>

                                            <input type="text" name="lastname"
                                                class="w-full border border-[#4c5372]  rounded bg-transparent focus:outline-none mt-2 p-2 val"
                                                placeholder="">
                                        </div>

                                    </div>


                                    <div class="w-full mb-8">
                                        <label for="">Company</label>
                                        <input type="text" name="company"
                                            class="w-full border border-[#4c5372]  rounded bg-transparent focus:outline-none mt-2 p-2 "
                                            placeholder="option">
                                    </div>




                                    <div class="w-full inputval mb-8">
                                        <label for="">Address *</label>
                                        <input type="text" name="address"
                                            class="w-full border border-[#4c5372]  rounded  bg-transparent focus:outline-none mt-2 p-2 val"
                                            placeholder="">
                                    </div>




                                    <div class="w-full grid grid-cols-2">

                                        <div class="w-full mb-8">
                                            <label for="">Phone</label>
                                            <input type="text" name="phone"
                                                class="w-full border border-[#4c5372]  rounded bg-transparent focus:outline-none mt-2 p-2 "
                                                placeholder="option">
                                        </div>


                                        <div class="w inputval mb-2 ml-5">
                                            <label for="">Zip *</label>

                                            <input type="text" name="state"
                                                class="w-full border border-[#4c5372]  rounded bg-transparent focus:outline-none mt-2 p-2 val"
                                                placeholder="">
                                        </div>

                                    </div>





                                    <div class="w-full grid grid-cols-2">

                                        <div class="w-full mb-8">
                                            <label for="">City</label>
                                            <input type="text" name="city"
                                                class="w-full border border-[#4c5372]  rounded bg-transparent focus:outline-none mt-2 p-2 "
                                                placeholder="option">
                                        </div>






                                        <div class="inputval relative mb-8 ml-5">

                                            <label for="">State *</label>

                                            <select
                                                class="w-full border border-[#4c5372]  rounded  bg-transparent focus:outline-none mt-2 p-2 val select-box">
                                                <option value="">Auslia</option>
                                                <option value="">Myanmar</option>

                                            </select>

                                            <div class="arrow">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                    stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                                </svg>

                                            </div>


                                        </div>

                                    </div>



                                    <div class="w-full inputval relative mb-5 custom-select">

                                        <label for="">Country *</label>

                                        <select
                                            class="w-full border border-[#4c5372]  rounded  bg-transparent focus:outline-none mt-2 p-2 val select-box">
                                            <option value="">Auslia</option>
                                            <option value="">Myanmar</option>

                                        </select>

                                        <div class="arrow">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                                            </svg>

                                        </div>
                                    </div>




                                </div>


                            </div>

                            <!-- billing address  -->
                            <div class="">
                                <h1 class="text-lg font-medium">Billing Address</h1>
                                <div class="mt-5">
                                    <input type="checkbox" name="billaddresscheck" checked>
                                    <label for="">Use this address for billing</label>
                                </div>
                            </div>



                            <div class="grid grid-cols-4 mt-10 rounded  mb-10">
                                <div
                                    class="col-span-3 w-full   mb-8 flex justify-center items-center flex-col  guestinfo">
                                    <button type="" id="shipping_ctn" name="shipping_ctn"
                                        class="text-xl w-full h-14 bg-[#4c5372] text-white flex justify-center items-center border hover:border-2 rounded-md">Save
                                        & Continue</button>
                                </div>
                            </div>


                        </form>


                    </div>


                    <!-- payment  -->
                    <div class="mb-10">
                        <div class="flex justify-between items-center">
                            <div class="text-2xl font-medium">
                                Payment
                            </div>
                            <div>
                                Edit
                            </div>
                        </div>

                        <div class="mt-10">
                            <form action="" class=" justify-between items-center">
                                <!-- credit  -->
                                <div>
                                    <h1 class="text-lg font-medium">Credit Card</h1>
                                    <div class="grid grid-cols-4 mt-5 rounded  mb-5">


                                        <div
                                            class="col-span-3 w-full   mb-8 flex justify-center items-center flex-col  guestinfo">


                                            <div class="w-full mb-8">
                                                <label for="">Name On Card</label>
                                                <input type="text" name="credit_name" id="credit_name"
                                                    class="w-full border border-[#4c5372] rounded bg-transparent focus:outline-none mt-2 p-2 "
                                                    placeholder="">
                                            </div>





                                            <div class="w-full mb-8">
                                                <label for="">Credit Card Number</label>
                                                <input type="number" name="creditnumber"
                                                    class="w-full border border-[#4c5372]  rounded bg-transparent focus:outline-none mt-2 p-2 "
                                                    placeholder="xxxx xxxx xxxx xxxx">
                                            </div>





                                            <div class="w-full grid grid-cols-2">



                                                <div class="w-full mb-8">
                                                    <label for="">Expired Date</label>
                                                    <input type="date" name="expireddate"
                                                        class="w-full border border-[#4c5372]  rounded  bg-transparent focus:outline-none mt-2 p-2 val"
                                                        placeholder="">
                                                </div>



                                                <div class="w inputval mb-2 ml-5">
                                                    <label for="">Security Code</label>
                                                    <input type="number" name="address"
                                                        class="w-full border border-[#4c5372]  rounded  bg-transparent focus:outline-none mt-2 p-2 val"
                                                        placeholder="">
                                                </div>



                                            </div>
                                        </div>


                                    </div>


                                    <!-- payment  -->
                                    <div class="grid grid-cols-4 rounded  mb-10">
                                        <div
                                            class="col-span-3 w-full   mb-8 flex justify-center items-center flex-col  guestinfo ">

                                            <button type="" id="shipping_ctn" name="shipping_ctn"
                                                class="text-xl w-full h-14 bg-[#4c5372] text-white flex justify-center items-center border hover:border-2 rounded-md mb-10">Save
                                                & Continue</button>


                                            <div class="w-full border-t border-t-[#415a77] pt-5 ">
                                                <button type="" id="shipping_ctn" name="shipping_ctn"
                                                    class="text-xl w-full h-14 bg-yellow-500 text-white flex justify-center items-center border hover:border-2 rounded-md mb-5">
                                                    <i class="fa-brands fa-paypal"></i>
                                                    <span class="ml-3">Paypal</span></button>

                                                <button type="" id="shipping_ctn" name="shipping_ctn"
                                                    class="text-xl w-full h-14 bg-blue-500 text-white flex justify-center items-center border hover:border-2 rounded-md">
                                                    <img src="<?php echo URLROOT; ?>/public/assets/kbz/kbz1.png" alt=""
                                                        width="30px">
                                                    <span class="ml-3">KBZPay</span></button>
                                            </div>






                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>

                    </div>

                </div>
            </div>

            <!-- order summary  -->
            <div>
                <div class="w-full border-2 border-gray-200 rounded-md px-5">
                    <div class="py-5">
                        <h1 class="text-2xl">Order Summary</h1>
                    </div>
                    <?php foreach ($data['cartitems'] as $cartitem): ?>
                        <div class="w-full h-full border-b grid grid-cols-4 gap-5 py-5">

                            <div class="col-span-3 w-full flex  items-center gap-2">
                                <!-- img  -->
                                <div class="w-full flex justify-center items-center grid grid-cols-2">
                                    <div class="w-[75px] h-[75px] border bg-gray-500">
                                        <img src="<?php echo IMG_ROOT; ?><?php echo $cartitem['image'] ?>" alt=""
                                            width="200px">
                                    </div>

                                    <!-- name  -->
                                    <div class="">
                                        <h1 class=""><?php echo $cartitem['itemname'] ?></h1>
                                        <span class="text-slate-400 text-xs">by <?php echo $cartitem['brandname'] ?>
                                            EDT</span>
                                    </div>


                                </div>

                                <!-- qty  -->
                                <div class="scale-75">
                                    <form action="<?php echo URLROOT; ?>/checkouts/update" method="POST"
                                        class="flex justify-start items-center">

                                        <div>
                                            <button type="submit" name="qty_decrease" id="qty_decrease"
                                                class="border rounded-md px-2 py-1 m-1 increase hover:bg-gray-200">
                                                <i class="fa-solid fa-chevron-down text-gray-300 hover:text-gray-500"></i>
                                            </button>
                                            <input type="hidden" name="cart_qty_dec"
                                                value="<?php echo $cartitem['oquantity'] - 1 ?>">

                                        </div>

                                        <input type="text" name="" id="cart_qty"
                                            class="w-10 text-center rounded-md border border-2 inline-block bg-gray-200 px-2 py-1"
                                            value="<?php echo $cartitem['oquantity'] ?>" min="1">

                                        <div>
                                            <button type="submit" name="qty_increase" id="qty_increase"
                                                class="border rounded-md px-2 py-1 m-1 increase hover:bg-gray-200">
                                                <i class="fa-solid fa-chevron-up text-gray-300 hover:text-gray-500"></i>
                                            </button>
                                            <input type="hidden" name="cart_qty_inc" id="cart_qty_inc"
                                                value="<?php echo $cartitem['oquantity'] + 1 ?>">
                                        </div>

                                        <input type="hidden" name="cart_qty_id"
                                            value="<?php echo $cartitem['cartorderid'] ?>">
                                    </form>
                                </div>
                            </div>


                            <div class="flex items-center justify-center md:px-10 px-5 space-x-3">

                                <div class="flex md:justify-end justify-start items-center">
                                    <!-- total price  -->
                                    <div class="flex md:justify-end justify-start items-center ">
                                        $ <span class="each_total_price">
                                            <?php echo $cartitem['price'] ?></span>

                                    </div>
                                </div>

                                <div class="flex justify-center items-center">

                                    <button type="button" name="cart_removebtn" id="cart_removebtn"
                                        data-id="<?php echo $cartitem['cartorderid'] ?>" class="cart_removebtn"><i
                                            class="fa-regular fa-circle-xmark"></i></button>
                                </div>

                            </div>


                            <div class="flex items-center justify-end grid grid-cols-2 md:px-10 px-5 hidden">
                                <div class="flex md:justify-end justify-start items-center">
                                    <!-- price  -->
                                    <div class="flex md:justify-end justify-start items-center">
                                        <span>$ <?php echo $cartitem['price'] ?></span>
                                    </div>

                                </div>
                                <div class="flex md:justify-end justify-start items-center">
                                    <!-- total price  -->
                                    <div class="flex md:justify-end justify-start items-center ">
                                        $ <span class="each_total_price">
                                            <?php echo $cartitem['price'] * $cartitem['oquantity'] ?></span>

                                    </div>
                                </div>
                            </div>



                        </div>
                    <?php endforeach; ?>


                    <div class="w-full h-full    pb-5 mb-5 ">



                        <div class="flex justify-end items-center b grid grid-cols-2 gap-y-5 text-lg px-5 py-5">
                            <div class="flex justify-start items-center">
                                <!-- subtotal  -->
                                <div class="flex justify-end items-center">
                                    <span class="font-normal">Subtotal</span>
                                </div>



                            </div>
                            <div class="flex justify-end items-center">
                                <!-- subtotal price  -->
                                <div class="flex justify-end items-center">
                                    $<span class="subtotalprice"> </span>

                                </div>
                            </div>

                            <div class="flex justify-start items-center">
                                <!-- sale tax  -->
                                <div class="flex justify-end items-center">
                                    <span>Sales Tax</span>
                                </div>



                            </div>
                            <div class="flex justify-end items-center">
                                <!-- sale tax   -->
                                <div class="flex justify-end items-center">
                                    $<span class="saletax"> </span>

                                </div>
                            </div>

                            <div class="flex justify-start items-center">
                                <!-- shipping  -->
                                <div class="flex justify-end items-center">
                                    <span>Shipping</span>
                                </div>



                            </div>
                            <div class="flex justify-end items-center">
                                <!-- shipping  -->
                                <div class="flex justify-end items-center">
                                    $<span class="shippingcost">
                                        <?php echo ($data['shipmethod']['method'] == 0 ? 0 : (($data['shipmethod']['method'] == 1) ? 12 : (($data['shipmethod']['method'] == 2) ? 25 : ''))); ?>
                                </div>
                            </div>

                            <div class="col-span-2">
                                <div class="w-full border"></div>
                            </div>


                            <div class="flex justify-start items-center">
                                <!-- estimate  -->
                                <div class="flex justify-end items-center">
                                    <span>Estimated Total</span>
                                </div>



                            </div>
                            <div class="flex justify-end items-center">
                                <!-- estimate price  -->
                                <div class="flex justify-end items-center">
                                    $<span class="estimated font-medium text-2xl"></span>

                                </div>
                            </div>



                        </div>
                    </div>




                </div>

                <div class="w-full  text-lg mt-5">
                    <div class="w-full flex justify-center items-center">
                        <form action="" method="post" class="w-full inline-block ">
                            <button type="" id="complete_order" name="complete_order"
                                class="text-xl w-full h-14 bg-[#4c5372] text-white flex justify-center items-center rounded-md border hover:border-2">Complete
                                Order</button>
                        </form>
                    </div>
                </div>

            </div>

        </div>









    </div>
</section>


<!-- Delete modal  -->
<div id="deletemodal" class="w-full h-auto hidden">
    <div
        class="w-full h-screen flex justify-center items-center bg-[linear-gradient(rgba(0,0,0,.8),rgba(0,0,0,.8))]   overflow-x-auto  fixed left-0 top-0 z-20 md:p-20">
        <div
            class="w-[350px]  bg-stone-100  shadow-lg rounded-md border flex flex-col justify-center items-center py-5 px-10">


            <div class="flex justify-between items-center space-x-10 mt-3">


                <div class="delte_text">
                    <div class="w-full text-lg ">
                        <span>Are you sure to delete?.</span>
                    </div>
                </div>
            </div>


            <div class="w-full flex justify-end items-center mt-10 space-x-2">
                <button
                    class="bg-slate-200 hover:bg-slate-300 transition-all duration-300 rounded-md px-3 py-2 cancledelete"
                    onclick="window.location.href = window.location.href">Cancel</button>
                <form id="deleteform" action="<?php echo URLROOT; ?>/checkouts/destroy" method="POST">
                    <button type="submit" name="cart_delmodal_btn"
                        class="bg-red-500 rounded-md hover:opacity-90 px-3 py-2 deletemodal_btn">Delete</button>
                    <input type="hidden" name="cart_delete_id" id="delete_id" value="">
                </form>

            </div>

        </div>
    </div>




</div>




<?php
require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/footer.php');
?>

<style>
    .select-box {
        appearance: none;
        -webkit-appearance: none;
        -moz-appearance: none;
        background-color: transparent;
        border: 1px solid #4c5372;
        padding: 8px 24px 8px 8px;
        border-radius: 4px;
        width: 100%;
    }

    .arrow {
        position: absolute;
        top: 70%;
        right: 8px;
        transform: translateY(-50%);
        pointer-events: none;
    }

    .arrow svg {
        fill: none;
        stroke: #4c5372;
    }

    .select-box:hover,
    .select-box:focus {
        border-color: #6c728f;
    }

    .select-box:focus+.arrow svg {
        stroke: #6c728f;
    }
</style>

<script>
    const cart_removebtns = document.querySelectorAll('.cart_removebtn');
    cart_removebtns.forEach((ele, idx) => {
        ele.addEventListener('click', function () {
            document.getElementById('deletemodal').classList.toggle('hidden')
            const orderid = ele.getAttribute('data-id');

            document.getElementById('delete_id').value = orderid;

            console.log(orderid);


        })
    })

    const each_total_prices = document.querySelectorAll('.each_total_price');
    const estimated = document.querySelector('.estimated');

    let totalsum = 0;
    let totaltax = 0;
    let taxrate = 0.08;
    each_total_prices.forEach((ele) => {

        totalsum += parseFloat(ele.textContent);

        const productprice = parseFloat(ele.textContent);
        document.querySelector('.saletax').innerHTML = caculatesaletax(productprice, taxrate);

        estimated.innerHTML = totalsum + parseFloat(document.querySelector('.saletax').innerHTML) + parseFloat(document.querySelector('.shippingcost').textContent)


    })

    document.querySelector('.subtotalprice').innerHTML = totalsum;

    function caculatesaletax(productprice, taxrate) {
        const taxamount = productprice * taxrate;
        totaltax += taxamount;

        return totaltax.toFixed(2);
    }




    const shippingbtn = document.querySelectorAll('.ships-radio')
    const shipform = document.getElementById('ship-form');
    for (let i = 0; i < shippingbtn.length; i++) {
        shippingbtn[i].addEventListener('change', function () {
            shipform.submit()
        })
    }





    const guest_edit = document.querySelector('.guest_edit');
    const guestinfo_input = document.querySelector('.guestinfo_input');
    const guestinfo_read = document.querySelector('.guestinfo_read');
    const guest_action = document.querySelector('.guest_action');
    const upd_email = document.querySelector('.upd_email');

    const guest_email_input = document.querySelector('.guest_email_input');
    guest_edit.addEventListener('click', () => {

        guestinfo_input.classList.remove('hidden');
        guestinfo_read.classList.add('hidden');
        guest_action.textContent = 'Update';


        const oldemail = guest_action.getAttribute('data-email')
        guest_email_input.value = oldemail;

        upd_email.setAttribute('value', oldemail);

        guest_action.name = 'upd_email';

        console.log(guest_action)




    })


</script>