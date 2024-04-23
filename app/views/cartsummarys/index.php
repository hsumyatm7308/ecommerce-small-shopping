<?php

ini_set('display_errors', 0);

require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/header.php');
require_once ('/opt/lampp/htdocs/mvcshop/app/views/layouts/navbar.php');
?>




<section class="container mx-auto text-[#4c5372] mt-20 mb-20  px-2">
    <div class="mb-20">
        <div class="w-full flex flex-col justify-center items-center">
            <h1 class="text-3xl">Your Cart</h1>
            <div class="w-20 h-1 bg-yellow-500"></div>
        </div>

    </div>
    <div class="w-full py-5">



        <div class="w-full h-full font-medium border-b grid md:grid-cols-2 grid-cols-3  md:gap-12 gap-1 py-5">

            <div
                class="md:col-span-1 col-span-2 w-full flex items-center b grid md:grid-cols-2 grid-cols-3 md:gap-32 gap-3 ">
                <div class="md:col-span-1 col-span-2 w-full flex items-center grid grid-cols-2  md:gap-12 gap-2">
                    <span>Product</span>

                </div>
                <div class="flex justify-start translate scale-95 ml-5">
                    Quantity

                </div>
            </div>

            <div class="flex items-center justify-end grid grid-cols-2 md:px-10 px-5 ">
                <div class="flex md:justify-end justify-start items-center">
                    <!-- price  -->
                    <div class="flex md:justify-end justify-start items-center">
                        <span>Price</span>
                    </div>

                </div>
                <div class="flex md:justify-end justify-start items-center">
                    <!-- total price  -->
                    <div class="flex md:justify-end justify-start items-center ">
                        <span class="flex">Total <span class="md:flex ml-2 hidden">Price</span></span>

                    </div>
                </div>
            </div>
        </div>

        <?php foreach ($data['cartitems'] as $cartitem): ?>
            <div class="w-full h-full border-b grid md:grid-cols-2 grid-cols-3  md:gap-12 gap-1 py-5">

                <div
                    class="md:col-span-1 col-span-2 w-full flex items-center b grid md:grid-cols-2 grid-cols-3 md:gap-32 gap-3 ">
                    <div class="md:col-span-1 col-span-2 w-full flex items-center grid grid-cols-2  md:gap-12 gap-2">
                        <!-- img  -->
                        <div class="md:w-[100px] md:h-[100px] w-[75px] h-[75px] border rounded-md bg-gray-500">
                            <img src="<?php echo IMG_ROOT; ?><?php echo $cartitem['image'] ?>" alt="" width="200px">
                        </div>
                        <!-- name  -->
                        <div class="bg-red-00">
                            <div>
                                <h1 class=""><?php echo $cartitem['itemname'] ?></h1>
                                <span class="text-slate-400">by <?php echo $cartitem['brandname'] ?> EDT</span>

                            </div>
                            <div class="mt-3">

                                <button type="button" name="cart_removebtn" id="cart_removebtn"
                                    data-id="<?php echo $cartitem['cartorderid'] ?>" class="cart_removebtn">Remove</button>
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-start translate scale-95">
                        <form action="<?php echo URLROOT; ?>/cartsummarys/update" method="POST"
                            class="flex justify-start items-center">

                            <div>
                                <button type="submit" name="qty_decrease" id="qty_decrease"
                                    class="border rounded-md px-2 py-1 m-1 increase hover:bg-gray-200">
                                    <i class="fa-solid fa-chevron-down text-gray-300 hover:text-gray-500"></i>
                                </button>
                                <input type="hidden" name="cart_qty_dec" value="<?php echo $cartitem['oquantity'] - 1 ?>">

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

                            <input type="hidden" name="cart_qty_id" value="<?php echo $cartitem['cartorderid'] ?>">
                        </form>
                    </div>
                </div>

                <div class="flex items-center justify-end grid grid-cols-2 md:px-10 px-5 ">
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


        <div class="w-full h-full  grid md:grid-cols-3 grid-cols-1  gap-12  pb-5 mb-5 ">

            <div
                class="md:col-span-2 col-span-1 w-full md:flex flex-col justify-center md:items-start items-center text-lg py-5 md:px-0 px-10 mt-5">
                <div class="flex items-center">
                    <span class="font-medium">Shipping Method</span>
                </div>


                <div class="mt-5">
                    <form id="ship-form" action="<?php echo URLROOT; ?>/cartsummarys/insertshipcost" method="POST"
                        class="space-y-3">
                        <div class=" flex justify-between py-1 ships-radio">
                            <div class="col-span-3">
                                <input type="radio" name="shipcost" value="0" id="shipcost_free" class="mycheckbox"
                                    <?php echo $data['shipmethod']['method'] == 0 ? 'checked' : '' ?>>
                                <label for="shipcost_free">
                                    <span class="text-md font-normal"> Fast shipping </span>
                                </label>
                            </div>
                            <div class="flex justify-center items-center ml-24">
                                <span class="font-medium text-lg">Free</span>
                            </div>
                        </div>

                        <div class=" flex justify-between py-1 ships-radio">
                            <div class="col-span-3">
                                <input type="radio" name="shipcost" value="1" id="shipcost_fast" <?php echo $data['shipmethod']['method'] == 1 ? 'checked' : '' ?>>
                                <label for="shipcost_fast">
                                    <span class="font-normal"> Standard shipping </span>
                                </label>
                            </div>
                            <div class="flex justify-center items-center ml-24">
                                <span class="font-medium">$ 12.00</span>
                            </div>
                        </div>

                        <div class=" flex justify-between py-1 ships-radio">
                            <div class="col-span-3">
                                <input type="radio" name="shipcost" value="2" id="shipcost_fastest" <?php echo $data['shipmethod']['method'] == 2 ? 'checked' : '' ?>>
                                <label for="shipcost_fastest">
                                    <span class="font-normal"> Fastest shipping</span>
                                </label>
                            </div>
                            <div class="flex justify-center items-center ml-24">
                                <span class="font-medium">$ 25.00</span>
                            </div>
                        </div>
                    </form>
                </div>

            </div>

            <div class="flex justify-end items-center b grid grid-cols-2 gap-y-5 text-lg px-10 py-5">
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


        <div class="w-full  text-lg">



            <div class="w-full flex justify-between">
                <div class=" md:flex flex-col justify-start items-start py-3 hidden">
                    <a href="<?php echo URLROOT; ?>/allfragrance&all?page=1"
                        class="w-full flex justify-center items-center inline-block">Continue
                        Shopping</a>

                    <div class="w-14 h-1 bg-yellow-500 -mr-10 mt-2"></div>
                </div>

                <div class=" flex justify-center items-center px-10">
                    <form action="" method="post" class="w-full inline-block ">
                        <button type="" id="checkout" name="checkout"
                            class="text-xl w-[400px] h-14 bg-[#4c5372] text-white flex justify-center items-center border hover:border-2 rounded-md">Checkout</button>

                    </form>

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
                <form id="deleteform" action="<?php echo URLROOT; ?>/cartsummarys/destroy" method="POST">
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

<script>
    const cart_removebtns = document.querySelectorAll('.cart_removebtn');
    cart_removebtns.forEach((ele, idx) => {
        ele.addEventListener('click', function () {
            document.getElementById('deletemodal').classList.toggle('hidden')
            const orderid = ele.getAttribute('data-id');

            document.getElementById('delete_id').value = orderid;


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

        return totaltax;
    }




    const shippingbtn = document.querySelectorAll('.ships-radio')
    const shipform = document.getElementById('ship-form');
    for (let i = 0; i < shippingbtn.length; i++) {
        shippingbtn[i].addEventListener('change', function () {
            shipform.submit()
        })
    }




</script>